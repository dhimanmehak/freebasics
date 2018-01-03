<?php

namespace fundstarter\storage\Paymentgateway;

//use fundstarter\storage\Paymentgateway\PaymentgatewayRepository as PaymentgatewayRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Paymentgateway;

class PaymentgatewayRepository implements IPaymentgatewayRepository {

    public function all() {
        $paymentgateway = new Paymentgateway;
        return $paymentgateway->all();
    }

    public function create(array $input) {
        $paymentgateway = new Paymentgateway;
        $paymentgateway->id = $input['id'];
        $paymentgateway->gatewayname = $input['gatewayname'];
        $paymentgateway->settings = $input['settings'];
        $paymentgateway->status = $input['status'];
        $paymentgateway->save();
        return 1;
    }

    public function update(array $input) {
        $paymentgateway = new Paymentgateway;
        $data = $paymentgateway->find($input['id']);
        $data->gatewayname = $input['gatewayname'];
        $data->settings = $input['settings'];
        $data->save();
    }

    public function getbyid($id) {
        $paymentgateway = new Paymentgateway;
        return $paymentgateway->where('id', '=', $id)->first();
    }

}
