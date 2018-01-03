<?php


namespace appstorage\Payment;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Payment;

class PaymentRepository {

    public function all() {
        $payment = new Payment;
        return $payment->all();
    }

}
