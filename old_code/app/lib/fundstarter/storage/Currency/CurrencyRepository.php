<?php

namespace fundstarter\storage\Currency;

//use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Currency;

class CurrencyRepository implements ICurrencyRepository {

    public function all() {
        $currency = new Currency;
        return $currency->all();
    }

    public function allindesc() {
        $currency = new Currency;
        return $currency->orderBy('currencytype', 'desc')->get();
    }

    public function create(array $input) {
        $currency = new Currency;
        $currency->countryname = $input['country'];
        $currency->currencytype = $input['currencytype'];
        $currency->currencyrate = $input['currencyrate'];
        $currency->currencysymbol = $input['currencysymbol'];
        $currency->status = $input['status'];
        $currency->createdon = Carbon::now();
        $currency->save();
        return 1;
    }

    public function update(array $input) {
        $currency = new Currency;
        $data = $currency->find($input['id']);
        $data->countryname = $input['country'];
        $data->currencytype = $input['currencytype'];
        $data->currencyrate = $input['currencyrate'];
        $data->currencysymbol = $input['currencysymbol'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $currency = new Currency;
        return $currency->where('id', '=', $id)->get();
    }

    public function getcountry($id) {
        $currency = new Currency;
        return $currency->where('id', '=', $id)->pluck('countryname');
    }

    public function deletebyid($id) {
        $currency = new Currency;
        return $currency->where('id', '=', $id)->delete();
    }

    public function getcurrencyrate($currencytype) {
        $currency = new Currency;
        return $currency->where('currencytype', '=', $currencytype)->first();
    }

    public function convertcurrency($from, $to) {
        $currency = new Currency;
        $actualrate = $currency->where('currencytype', '=', $from)->pluck('currencyrate');
        if ($actualrate != 0) {
            $usdrate = 1 / $actualrate;
            $torate = $currency->where('currencytype', '=', $to)->pluck('currencyrate');
            return $conversion = $usdrate * $torate;
        }
    }

    public function getsymbol($currencytype) {
        $currency = new Currency;
        return $currency->where('currencytype', '=', $currencytype)->pluck('currencysymbol');
    }

    public function getsymbolbyid($id) {
        $currency = new Currency;
        return $currency->where('id', '=', $id)->pluck('currencysymbol');
    }

    public function getcurrencybyid($id) {
        $currency = new Currency;
        return $currency->where('id', '=', $id)->first();
    }

    public function getidbytype($currencytype) {
        $currency = new Currency;
        return $currency->where('currencytype', '=', $currencytype)->pluck('id');
    }
    
        
    public function converttodefault($fromcurrency){
        $currency = new Currency;
        return $currency->where('currencytype', '=', $fromcurrency)->pluck('currencyrate');
    }

}
