<?php

namespace fundstarter\storage\Payment;

//use fundstarter\storage\Payment\PaymentRepository as PaymentRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Payment;

class PaymentRepository implements IPaymentRepository {

    public function all() {
        $payment = new Payment;
        return $payment->all();
    }

    public function create($userid, $projectid, $pledgeamount, $backingid, $paypalemail, $token, $transactionid) {
        $payment = new Payment;
        $payment->userid = $userid;
        $payment->backingid = $backingid;
        $payment->projectid = $projectid;
        $payment->amount = $pledgeamount;
        $payment->transactionid = $transactionid;
        $payment->payeremail = $paypalemail;
        $payment->paykey = $token;
        $payment->paidon = Carbon::now();
        $payment->save();
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $payment = $this->find($id)->first();
        $payment->id = $input['id'];
        $payment->userid = $input['userid'];
        $payment->bakingid = $input['bakingid'];
        $payment->projectid = $input['projectid'];
        $payment->amount = $input['amount'];
        $payment->sessionid = $input['sessionid'];
        $payment->transactionid = $input['transactionid'];
        $payment->shippingstatus = $input['shippingstatus'];
        $payment->paymenttype = $input['paymenttype'];
        $payment->paypaltransactionid = $input['paypaltransactionid'];
        $payment->payeremail = $input['payeremail'];
        $payment->recievedstatus = $input['recievedstatus'];
        $payment->paidon = $input['paidon'];
        $payment->save();
    }

    public function getbyid($id) {
        $payment = new Payment;
        return $payment->where('id', '=', $id)->first();
    }
    
    public function getbyprojectid($projectid) {
        $payment = new Payment;
        return $payment->where('projectid', '=', $projectid)->get();
    }

    public function getpaykeybybackingid($backingid) {
        $payment = new Payment;
        return $payment->where('backingid', '=', $backingid)->pluck('paykey');
    }

    public function getpaykeybyprojectid($projectid) {
        $payment = new Payment;
        return $payment->where('projectid', '=', $projectid)->get();
    }

    public function getidbybackingid($backingid) {
        $payment = new Payment;
        return $payment->where('backingid', '=', $backingid)->pluck('id');
    }

    public function updatepayment($email, $transactionid, $id) {
        $payment = new Payment;
        $data = $payment->find($id);
        $data->payeremail = $email;
        $data->transactionid = $transactionid;
        $data->save();
    }

    public function getprojectidbyid($id) {
        $payment = new Payment;
        return $payment->where('id', '=', $id)->pluck('projectid');
    }

    public function deletepayment($id) {
        $payment = new Payment;
        $payment->where('id', '=', $id)->delete();
    }

}
