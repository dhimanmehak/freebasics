<?php

use PayPal\Types\AP\PayRequest;
use PayPal\Types\AP\Receiver;
use PayPal\Types\AP\ReceiverList;
use PayPal\Types\Common\RequestEnvelope;
use PayPal\Service\AdaptivePaymentsService;
use PayPal\Types\AP\PreapprovalRequest;
use PayPal\Types\AP\PreapprovalDetailsRequest;
use PayPal\Types\AP\ExecutePaymentRequest;
use PayPal\Types\AP\PaymentDetailsRequest;
use PayPal\Types\AP\RefundRequest;
use fundstarter\storage\Reward\RewardRepository as RewardRepository;
use fundstarter\storage\Backing\BackingRepository as BackingRepository;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\Payment\PaymentRepository as PaymentRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;

class PaypalController extends BaseController {

    public function __construct(NewsletterRepository $newsletterRepository, AdminsettingRepository $adminsettingRepository, UserRepository $userRepository, RewardRepository $rewardRepository, PaymentRepository $paymentRepository, ProjectRepository $projectRepository, BackingRepository $backingRepository) {
        $this->sdkConfig = array(
            "mode" => Config::get('adminconfig.paypalmode'),
            "acct1.UserName" => Config::get('adminconfig.paypalapiname'),
            "acct1.Password" => Config::get('adminconfig.paypalapipwd'),
            "acct1.Signature" => Config::get('adminconfig.paypalapikey'),
            "acct1.AppId" => Config::get('adminconfig.paypalid')
        );
        $this->reward = $rewardRepository;
        $this->backing = $backingRepository;
        $this->project = $projectRepository;
        $this->payment = $paymentRepository;
        $this->user = $userRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->newsletter = $newsletterRepository;
    }

    public function postback() {
        $rules = array(
            'reward' => 'required',
            'pledgeamount' => 'required|numeric|not_in:0',
        );
        $validator = Validator::make(Input::all(), $rules);
        $projectid = Input::get('projectid');
        $projectdetails = $this->project->getbyprojectid($projectid);
        if ($validator->fails()) {
            return Redirect::to('back/reward/' . $projectid)
                            ->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            if ($input['reward'] != 0) {
                $temppledgeamount = $this->reward->checkpledge($input['reward']);
                $pledgeamount = round(($temppledgeamount * $projectdetails->rate) * 100) / 100;
                if ($pledgeamount > $input['pledgeamount']) {
                    Session::flash('failed', 'Selected reward less than or equal to pledge amount you entered!!!');
                    return Redirect::back();
                } else {
                    $backingid = $this->backing->create($input);
                    return $this->payment($backingid);
                }
            } else {
                $backingid = $this->backing->create($input);
                return $this->payment($backingid);
            }
        }
    }

    public function payment($backingid) {

        $detail = $this->backing->getbyid($backingid);
        $userid = $detail['userid'];
        $projectid = $detail['projectid'];
        $pledgeamount = $detail['pledgeamount'];
        $paypalemail = $this->project->getpaypalemailbyid($projectid);
        $currencycode = $this->project->getcurrencycode($projectid);
        $admin = $this->adminsetting->getadmincommission();
        $payRequest = new PayRequest();
        $admincommission = $admin['admincommission'] / 100;

        $receiver = array();
        $receiver[0] = new Receiver();
        $receiver[0]->amount = (1 - $admincommission) * $pledgeamount;
        $receiver[0]->email = $paypalemail;
        $receiver[0]->primary = "false";

        $receiver[1] = new Receiver();
        $receiver[1]->amount = $pledgeamount;
        $receiver[1]->email = "admin@casperon.in";
        $receiver[1]->primary = "true";
        $receiverList = new ReceiverList($receiver);
        $payRequest->receiverList = $receiverList;

        $requestEnvelope = new RequestEnvelope("en_US");
        $payRequest->requestEnvelope = $requestEnvelope;
        $payRequest->actionType = "PAY_PRIMARY";
        $payRequest->cancelUrl = "https://devtools-paypal.com/guide/ap_chained_payment/php?cancel=true";
        $payRequest->returnUrl = URL::to('paymentdetails/' . $backingid);
        $payRequest->currencyCode = $currencycode;
        $payRequest->ipnNotificationUrl = "http://replaceIpnUrl.com";
        $adaptivePaymentsService = new AdaptivePaymentsService($this->sdkConfig);
        $payResponse = $adaptivePaymentsService->Pay($payRequest);
        $paykey = $payResponse->payKey;
        $this->payment->create($userid, $projectid, $pledgeamount, $backingid, $paykey);
        return Redirect::to("https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=" . $paykey);
    }

    public function executepayment($projectid) {
        $paykeys = $this->payment->getpaykeybyprojectid($projectid);
        foreach ($paykeys as $temp) {
            $executePaymentRequest = new ExecutePaymentRequest();
            $requestEnvelope = new RequestEnvelope("en_US");
            $executePaymentRequest->requestEnvelope = $requestEnvelope;
            $executePaymentRequest->payKey = $temp->paykey;
            $adaptivePaymentsService = new AdaptivePaymentsService($this->sdkConfig);
            $executePaymentResponse = $adaptivePaymentsService->ExecutePayment($executePaymentRequest);
            $ack = $executePaymentResponse->responseEnvelope->ack;
            if ($ack == "Success") {
                $this->project->updatefunded($projectid);
                Session::flash('success', 'Fund transfer successfull!');
                return Redirect::back();
            } else {
                $message = $executePaymentResponse->error[0]->message;
                Session::flash('failed', $message);
                return Redirect::back();
            }
        }
    }

    public function paymentdetails($backingid) {
        $paykey = $this->payment->getpaykeybybackingid($backingid);
        $paymentDetailsRequest = new PaymentDetailsRequest();
        $requestEnvelope = new RequestEnvelope("en_US");
        $paymentDetailsRequest->requestEnvelope = $requestEnvelope;
        $paymentDetailsRequest->payKey = $paykey;
        $adaptivePaymentsService = new AdaptivePaymentsService($this->sdkConfig);
        $paymentDetailsResponse = $adaptivePaymentsService->PaymentDetails($paymentDetailsRequest);
        $email = $paymentDetailsResponse->senderEmail;
        $transactionid = $paymentDetailsResponse->paymentInfoList->paymentInfo[1]->transactionId;
        $transactionstatus = $paymentDetailsResponse->paymentInfoList->paymentInfo[1]->transactionStatus;
        if ($transactionstatus == "COMPLETED") {
            $id = $this->payment->getidbybackingid($backingid);
            $this->payment->updatepayment($email, $transactionid, $id);
            $details = $this->payment->getbyid($id);
            $this->user->updatebackedcount($details['userid']);
            $this->sendmailtocreator($details['projectid'], $details['userid']);
            $this->project->updatetotalbacking($details['projectid'], $details['amount']);
            $result = $this->backing->getbyid($backingid);
            if ($result['rewardid'] != 0) {
                $this->reward->updatebackercount($result['rewardid']);
            }
            Session::flash('success', 'Backing Successfull!');
            return Redirect::to('backedprojects');
        } else {
            $id = $this->payment->getidbybackingid($backingid);
            $projectid = $this->payment->getprojectidbyid($id);
            $this->backing->deletebacking($backingid);
            $this->payment->deletepayment($id);
            Session::flash('failed', 'Transaction Failed');
            return Redirect::to('back/reward/' . $projectid);
        }
    }

    public function paydetails() {
        $paymentDetailsRequest = new PaymentDetailsRequest();
        $requestEnvelope = new RequestEnvelope("en_US");
        $paymentDetailsRequest->requestEnvelope = $requestEnvelope;
        $paymentDetailsRequest->payKey = "AP-2X103654TL964540W"; //$paykey;
        $adaptivePaymentsService = new AdaptivePaymentsService($this->sdkConfig);
        $paymentDetailsResponse = $adaptivePaymentsService->PaymentDetails($paymentDetailsRequest);
        print_r($paymentDetailsResponse);
    }

    public function refund() {
        $paykey = Session::get('paykey');
        $refundRequest = new RefundRequest();
        $requestEnvelope = new RequestEnvelope("en_US");
        $receiver = array();
        $receiver[0] = new Receiver();
        $receiver[0]->amount = "5";
        $receiver[0]->email = "vinomerchant@casperon.in";
        $receiver[0]->primary = "false";

        $receiver[1] = new Receiver();
        $receiver[1]->amount = "10";
        $receiver[1]->email = "admin@casperon.in";
        $receiver[1]->primary = "true";
        $receiverList = new ReceiverList($receiver);
        $refundRequest->receiverList = $receiverList;
        $refundRequest->requestEnvelope = $requestEnvelope;
        $refundRequest->payKey = $paykey;
        $adaptivePaymentsService = new AdaptivePaymentsService($this->sdkConfig);
        $refundResponse = $adaptivePaymentsService->Refund($refundRequest);
        print_r($refundResponse);
    }

    public function postpreapproval() {
        $requestEnvelope = new RequestEnvelope("en_US");
        $preapprovalRequest = new PreapprovalRequest();
        $preapprovalRequest->requestEnvelope = $requestEnvelope;
        $preapprovalRequest->currencyCode = "USD";
        $preapprovalRequest->startingDate = "2015-04-17";
        $preapprovalRequest->endingDate = "2015-04-17";

        $preapprovalRequest->maxAmountPerPayment = 100.0;
        $preapprovalRequest->maxNumberOfPayments = 2;
        $preapprovalRequest->maxTotalAmountOfAllPayments = 1000.0;

        $preapprovalRequest->senderEmail = "vijibuyer@casperon.in";
        $preapprovalRequest->cancelUrl = "https://devtools-paypal.com/guide/ap_preapprove_payment?cancel=true";
        $preapprovalRequest->returnUrl = "https://devtools-paypal.com/guide/ap_preapprove_payment?success=true";
        $preapprovalRequest->ipnNotificationUrl = "http://replaceIpnUrl.com";

        $sdkConfig = array(
            "mode" => "sandbox",
            "acct1.UserName" => "admin_api1.casperon.in",
            "acct1.Password" => "UFDKCLX7VHNALYVF",
            "acct1.Signature" => "AFcWxV21C7fd0v3bYYYRCpSSRl31Awzkb9OTqj.wTHEs5P1eM5wgk3zh",
            "acct1.AppId" => "APP-80W284485P519543T"
        );
        $adaptivePaymentsService = new AdaptivePaymentsService($sdkConfig);
        $preapprovalResponse = $adaptivePaymentsService->preapproval($preapprovalRequest);
        echo $preapprovalkey = $preapprovalResponse->preapprovalKey;
        return Redirect::to("https://www.sandbox.paypal.com/webscr?cmd=_ap-preapproval&preapprovalkey=" . $preapprovalkey);
    }

    public function preapprovaldetails() {
        $requestEnvelope = new RequestEnvelope("en_US");
        $preapprovalDetailsRequest = new PreapprovalDetailsRequest();
        $preapprovalDetailsRequest->requestEnvelope = $requestEnvelope;
        $preapprovalDetailsRequest->preapprovalKey = "PA-9N177935RN761871S";

        $sdkConfig = array(
            "mode" => "sandbox",
            "acct1.UserName" => "admin_api1.casperon.in",
            "acct1.Password" => "UFDKCLX7VHNALYVF",
            "acct1.Signature" => "AFcWxV21C7fd0v3bYYYRCpSSRl31Awzkb9OTqj.wTHEs5P1eM5wgk3zh",
            "acct1.AppId" => "APP-80W284485P519543T"
        );
        $adaptivePaymentsService = new AdaptivePaymentsService($sdkConfig);
        $preapprovalDetailsResponse = $adaptivePaymentsService->preapprovaldetails($preapprovalDetailsRequest);
        print_r($preapprovalDetailsResponse);
    }

    public function sendmailtocreator($projectid, $userid) {
        $project = $this->project->getbasicdetailsbyid($projectid);
        $projecttitle = $project->title;
        $adminsettings = $this->adminsetting->getfirst();
        $backername = $this->user->getusername($userid);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $templatename = "projectbacking";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $subject = $templatedetails['subject'];
        $emails = $this->project->getbyprojectidforpledge($projectid);
        if ($emails != '') {
            $email = $emails['email'];
            $data = array(
                'name' => $emails['name'],
                'backername' => $backername,
                'email' => $email,
                'logo' => $logo,
                'title' => $title,
                'projecttitle' => $projecttitle,
                'projectid' => $projectid,
                'subject' => $templatedetails['subject'],
                'sendername' => $templatedetails['sendername'],
                'senderemail' => $templatedetails['senderemail']
            );
            Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
        }
    }

}
