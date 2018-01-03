<?php

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

class PaypalsampleController extends BaseController {

    private $_api_context;

    public function __construct(ProjectRepository $projectRepository) {
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->project = $projectRepository;
    }
      
    public function postback() {
        $rules = array(
            'reward' => 'required',
            'pledgeamount' => 'required|numeric|not_in:0',
        );
        $validator = Validator::make(Input::all(), $rules);
        $projectid = Input::get('projectid');
        if ($validator->fails()) {
            return Redirect::to('back/reward/' . $projectid)
                            ->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            if ($input['reward'] != 0) {
                $pledgeamount = $this->reward->checkpledge($input['reward']);
                if ($pledgeamount > $input['pledgeamount']) {
                    Session::flash('failed', 'Selected reward less than or equal to pledge amount you entered!!!');
                    return Redirect::back();
                } else {

                    $backingid = $this->backing->create($input);
                    return Redirect::to('back/paymentdetails/' . $backingid);
                }
            } else {
                $backingid = $this->backing->create($input);
                return Redirect::to('back/paymentdetails/' . $backingid);
            }
        }
    }

    public function postPayment() {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $data = $this->project->getbasicdetailsbyid(Input::get('projectid'));
        $pledgeamount = Input::get('pledgeamount');
        $item_1 = new Item();
        $item_1->setName($data->title) // item name
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($pledgeamount); // unit price
      
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal($pledgeamount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
                ->setCancelUrl(URL::route('payment.status'));

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

        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        return Redirect::route('original.route')
                        ->with('error', 'Unknown error occurred');
    }

    public function getPaymentStatus() {
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return Redirect::route('original.route')
                            ->with('error', 'Payment failed');
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

        echo '<pre>';
        print_r($result);
        echo '</pre>';
        exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made
            return Redirect::route('original.route')
                            ->with('success', 'Payment success');
        }
        return Redirect::route('original.route')
                        ->with('error', 'Payment failed');
    }

}
