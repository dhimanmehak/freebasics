<?php

namespace fundstarter\storage\Country;

//use fundstarter\storage\Country\CountryRepository as CountryRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Country;

class CountryRepository implements ICountryRepository {

    public function all() {
        $country = new Country;
        return $country->orderby('countryname', 'asc')->get();
    }

    public function paypalsupported() {
        $country = new Country;
        return $country->where('paypalsupport', '=', 1)->orderby('countryname', 'asc')->get();
    }

    public function create(array $input) {
        $country = new Country;
        $country->countryname = $input['countryname'];
        $country->countryid = $input['countryid'];
        $country->countrycode = $input['countrycode'];
        $country->countrymobilecode = $input['countrymobilecode'];
        $country->currencytype = $input['currencytype'];
        $country->currencysymbol = $input['currencysymbol'];
        $country->defaultcurrency = $input['defaultcurrency'];
        $country->status = $input['status'];
        $country->createdon = Carbon::now();
        $country->save();
        return 1;
    }

    public function update(array $input) {
        $country = new Country;
        $data = $country->find($input['id']);
        $data->countryid = $input['countryid'];
        $data->countryname = $input['countryname'];
        $data->countrycode = $input['countrycode'];
        $data->countrymobilecode = $input['mobilecode'];
        $data->currencytype = $input['currencytype'];
        $data->currencysymbol = $input['currencysymbol'];
        $data->defaultcurrency = $input['defaultcurrency'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $country = new Country;
        return $country->where('id', '=', $id)->get();
    }

    public function deletebyid($id) {
        $country = new Country;
        $country->where('id', '=', $id)->delete();
    }

    public function getnamebyid($countryid) {
        $country = new Country;
        return $country->where('id', '=', $countryid)->pluck('countryname');
    }

    public function getfirst($id) {
        $country = new Country;
        return $country->where('id', '=', $id)->first();
    }
    
     public function checkalreadyexists($countryid, $countryname){
        $country = new Country;
        return $country->where('countryid', '=', $countryid)->where('countryname', '=', $countryname)->pluck('id');
    }

}
