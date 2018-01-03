<?php

namespace fundstarter\storage\Paymenthost;
//use fundstarter\storage\Paymenthost\PaymenthostRepository as PaymenthostRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Paymenthost;

class PaymenthostRepository implements IPaymenthostRepository {

    public function all() {
        $paymenthost = new Paymenthost;
        return $paymenthost->all();
    }
    public function create(array $input) {
        $paymenthost = new Paymenthost;
        $paymenthost->id = $input['id'];
		$paymenthost->projectid = $input['projectid'];
		$paymenthost->hostid = $input['hostid'];
		$paymenthost->amount = $input['amount'];
		$paymenthost->transactionid = $input['transactionid'];
		$paymenthost->transactiondate = $input['transactiondate'];
		$paymenthost->transactiontype = $input['transactiontype'];
		$paymenthost->paymentstatus = $input['paymentstatus'];
		$paymenthost->createdon = $input['createdon'];
        $paymenthost->save();
        return 1;
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $paymenthost = $this->find($id)->first();
		$paymenthost->id = $input['id'];
		$paymenthost->projectid = $input['projectid'];
		$paymenthost->hostid = $input['hostid'];
		$paymenthost->amount = $input['amount'];
		$paymenthost->transactionid = $input['transactionid'];
		$paymenthost->transactiondate = $input['transactiondate'];
		$paymenthost->transactiontype = $input['transactiontype'];
		$paymenthost->paymentstatus = $input['paymentstatus'];
		$paymenthost->createdon = $input['createdon'];
        $paymenthost->save();
        
        
    }

    public function getbyid($id) {
        $paymenthost = new Paymenthost;
        return $paymenthost->where('id', '=', $id)->get();
    }

  
}
