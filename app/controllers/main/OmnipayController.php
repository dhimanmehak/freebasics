<?php

use Omnipay\Omnipay;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Reward\RewardRepository as RewardRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Backing\BackingRepository as BackingRepository;
use fundstarter\storage\Payment\PaymentRepository as PaymentRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;

class OmnipayController extends Controller {

    public function __construct(NewsletterRepository $newsletterRepository, PaymentRepository $paymentRepository, BackingRepository $backingRepository, AdminsettingRepository $adminsettingRepository, ProjectRepository $projectRepository, UserRepository $userRepository, RewardRepository $rewardRepository) {
        // setup PayPal api context
        $this->project = $projectRepository;
        $this->user = $userRepository;
        $this->reward = $rewardRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->backing = $backingRepository;
        $this->payment = $paymentRepository;
        $this->newsletter = $newsletterRepository;
        $this->username = Config::get('adminconfig.paypalapiname');
        $this->password = Config::get('adminconfig.paypalapipwd');
        $this->signature = Config::get('adminconfig.paypalapikey');
    }

    public function postPayment() {
        if (!$this->isDecimal(Input::get('listingfee'))) {
            $listingfee = Input::get('listingfee') . '.00';
        } else {
            $listingfee = Input::get('listingfee');
        }
        $projectid = Input::get('projectid');
        $params = array(
            'cancelUrl' => URL::to('project/account/' . $projectid),
            'returnUrl' => URL::to('payment_success'),
            'name' => Input::get('title'),
            'description' => Input::get('title'),
            'amount' => $listingfee,
            'currency' => Input::get('currencytype')
        );
        Session::put('params', $params);
        Session::save();
        Session::put('projid', $projectid);
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($this->username);
        $gateway->setPassword($this->password);
        $gateway->setSignature($this->signature);
        $gateway->setTestMode(true);
        $response = $gateway->purchase($params)->send();
        if ($response->isSuccessful()) {
            
        } elseif ($response->isRedirect()) {

            $response->redirect();
        } else {
            echo $response->getMessage();
        }
    }

    public function getSuccessPayment() {
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($this->username);
        $gateway->setPassword($this->password);
        $gateway->setSignature($this->signature);
        $gateway->setTestMode(true);

        $params = Session::get('params');
        $projectid = Session::get('projid');
        //Session::forget('projid');
        $response = $gateway->completePurchase($params)->send();
        $paypalResponse = $response->getData(); // this is the raw response object

        if (isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
            // Response
            $this->project->updatelistingfee($projectid);
            Session::flash('success', 'Payment Successfull');
            return Redirect::to('project/account/' . $projectid);
        } else {
            Session::flash('failed', 'Payment Failed');
            return Redirect::to('project/account/' . $projectid);
        }
    }

    public function postMembership() {
        if (!$this->isDecimal(Input::get('listingfee'))) {
            $listingfee = Input::get('membershipfee') . '.00';
        } else {
            $listingfee = Input::get('membershipfee');
        }
        $projectid = Input::get('projectid');
        $userid = Input::get('userid');
        $package = Input::get('package');
        $params = array(
            'cancelUrl' => URL::to('project/account/' . $projectid),
            'returnUrl' => URL::to('member_success'),
            'name' => Input::get('title'),
            'description' => Input::get('packagename'),
            'amount' => $listingfee,
            'currency' => Input::get('currencytype')
        );
        Session::put('params', $params);
        Session::save();
        Session::put('projid', $projectid);
        Session::put('userid', $userid);
        Session::put('package', $package);
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($this->username);
        $gateway->setPassword($this->password);
        $gateway->setSignature($this->signature);
        $gateway->setTestMode(true);
        $response = $gateway->purchase($params)->send();
        if ($response->isSuccessful()) {
            
        } elseif ($response->isRedirect()) {

            $response->redirect();
        } else {
            echo $response->getMessage();
        }
    }

    public function getSuccessMembership() {
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($this->username);
        $gateway->setPassword($this->password);
        $gateway->setSignature($this->signature);
        $gateway->setTestMode(true);

        $params = Session::get('params');
        $projectid = Session::get('projid');
        $package = Session::get('package');
        $userid = Session::get('userid');
        //Session::forget('projid');
        $response = $gateway->completePurchase($params)->send();
        $paypalResponse = $response->getData(); // this is the raw response object

        if (isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
            // Response

            $this->user->updatepackage($package, $userid);
            $this->project->updatelistingfee($projectid);
            Session::flash('success', 'Payment Successfull');
            return Redirect::to('project/account/' . $projectid);
        } else {
            Session::flash('failed', 'Payment Failed');
            return Redirect::to('project/account/' . $projectid);
        }
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
                    return $this->payment($input);
                }
            } else {
                return $this->payment($input);
            }
        }
    }

    public function payment($detail) {
        $projectid = $detail['projectid'];
        $pledgeamount = $detail['pledgeamount'];
        $currencycode = Session::get('currency');
        $result=$this->isDecimal($pledgeamount);
        if (!$result) {
            $amount = $pledgeamount . '.00';
        } else {
            $amount = $pledgeamount;
        }
//      return Config::get('adminconfig.admincommission');
//        $admincommission = $admin['admincommission'] / 100;
//        $amount = (1 - $admincommission) * $pledgeamount;
        $params = array(
            'cancelUrl' => URL::to('project/detail/' . $projectid),
            'returnUrl' => URL::to('back_success'),
            'name' => Input::get('title'),
            'description' => Input::get('packagename'),
            'amount' => $amount,
            'currency' => $currencycode
        );
        Session::put('params', $params);
        Session::save();
        Session::put('detail', $detail);
        Session::save();
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($this->username);
        $gateway->setPassword($this->password);
        $gateway->setSignature($this->signature);
        $gateway->setTestMode(true);
        $response = $gateway->purchase($params)->send();
        if ($response->isSuccessful()) {
            
        } elseif ($response->isRedirect()) {
            $response->redirect();
        } else {
            echo $response->getMessage();
        }
    }

    public function getSuccessBacking() {
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($this->username);
        $gateway->setPassword($this->password);
        $gateway->setSignature($this->signature);
        $gateway->setTestMode(true);

        $params = Session::get('params');
        $detail = Session::get('detail');
        $pledgeamount = $detail['pledgeamount'];
        $projectid = $detail['projectid'];
        $userid = $detail['userid'];
        $paypalemail = $this->project->getpaypalemailbyid($projectid);
        $response = $gateway->completePurchase($params)->send();
        $paypalResponse = $response->getData(); // this is the raw response object

        if (isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
            // Response
            $token = $paypalResponse['TOKEN'];
            $transactionid = $paypalResponse['PAYMENTINFO_0_TRANSACTIONID'];
            $backingid = $this->backing->create($detail);
            $this->user->updatebackedcount($detail['userid']);
            $this->sendmailtocreator($detail['projectid'], $detail['userid']);
            $this->project->updatetotalbacking($detail['projectid'], $detail['pledgeamount']);
            $result = $this->backing->getbyid($backingid);
            if ($result['rewardid'] != 0) {
                $this->reward->updatebackercount($result['rewardid']);
            }
            $this->payment->create($userid, $projectid, $pledgeamount, $backingid, $paypalemail, $token, $transactionid);
            Session::flash('success', 'Backing Successfull');
            return Redirect::to('project/detail/' . $projectid);
        } else {
            Session::flash('failed', 'Backing Failed');
            return Redirect::to('project/detail/' . $projectid);
        }
    }

    public function sendmailtocreator($projectid, $userid) {
        $project = $this->project->getbasicdetailsbyid($projectid);
        $projecttitle = $project->title;
        $creatorid = $project->userid;
        $adminsettings = $this->adminsetting->getfirst();
        $backername = $this->user->getusername($userid);
        $creatorname = $this->user->getusername($creatorid);
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
                'creatorname' => $creatorname,
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
    
    function isDecimal($value) 
{
     return ((float) $value !== floor($value));
}

}
