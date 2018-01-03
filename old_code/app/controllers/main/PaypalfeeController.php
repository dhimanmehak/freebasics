<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\User\UserRepository as UserRepository;

class PaypalfeeController extends BaseController {

    private $_api_context;

    public function __construct(ProjectRepository $projectRepository, UserRepository $userRepository) {
        // setup PayPal api context
        $this->project = $projectRepository;
        $this->user = $userRepository;
        $paypal_conf = Config::get('paypal');
        $clientid = Config::get('adminconfig.paypalclientid');
        $secret = Config::get('adminconfig.paypalsecret');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($clientid, $secret));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postFee() {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $listingfee = Input::get('listingfee');
        $projectid = Input::get('projectid');
        $item_1 = new Item();
        $item_1->setName('Listing Pay') // item name
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($listingfee); // unit price

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal($listingfee);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Listing Fee');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('project/account/' . $projectid))
                ->setCancelUrl(URL::to('project/account/' . $projectid));

        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());
        $this->getPaymentStatus($projectid);
        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }
        Session::flush('failed', 'Unknown error occurred');
        return Redirect::back();
    }

    public function postmembershipfee() {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $membershipfee = Input::get('membershipfee');
        $package = Input::get('package');
        $userid = Input::get('userid');
        $projectid = Input::get('projectid');
        $item_1 = new Item();
        $item_1->setName('Membership Package') // item name
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($membershipfee); // unit price

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal($membershipfee);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Membership Package');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('project/account/' . $projectid))
                ->setCancelUrl(URL::to('project/account/' . $projectid));

        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());
        $this->getPaymentStatusPackage($projectid, $package, $userid);
        Session::flash('success', 'Payment Successfull');
        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        Session::flush('failed', 'Unknown error occurred');
        return Redirect::back();
    }

    public function getPaymentStatus($projectid) {
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');


        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::flush('failed', 'Payment failed');
            return Redirect::back();
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary 
        // to execute a PayPal account payment. 
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);
//
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
//        exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made
            $this->project->updatelistingfee($projectid);
            Session::flash('success', 'Payment Successfull');
        }
        Session::flush('failed', 'Payment Failed');
        return Redirect::back();
    }

    public function getPaymentStatusPackage($projectid, $package, $userid) {
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::flush('failed', 'Payment failed');
            return Redirect::back();
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary 
        // to execute a PayPal account payment. 
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);
//
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
//        exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made
            $this->user->updatepackage($package, $userid);
            $this->project->updatelistingfee($projectid);
            Session::flash('success', 'Payment Successfull');
        }
        Session::flush('failed', 'Payment Failed');
        return Redirect::back();
    }

}
