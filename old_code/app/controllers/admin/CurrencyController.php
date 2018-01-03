<?php

use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepository;
use fundstarter\storage\Country\CountryRepository as CountryRepository;

class CurrencyController extends BaseController {

    public function __construct(CurrencyRepository $currencyRepository, CountryRepository $countryRepository) {
        $this->currency = $currencyRepository;
        $this->country = $countryRepository;
    }

    public function index() {
        $currencies = $this->currency->all();
        return View::make('adminviews.currency.currencylist', compact('currencies'));
    }

    public function addcurrency() {
        $countries = $this->country->all();
        return View::make('adminviews.currency.addcurrency', compact('countries'));
    }

    public function postcurrency() {
        $input = Input::all();
        $this->currency->create($input);
        Session::flash('success', 'Currency successfully added!');
        return Redirect::to('currencylist');
    }

    public function editcurrency() {
        $id = Input::get('id');
        $currencies = $this->currency->getbyid($id);
        $countryname = $this->currency->getcountry($id);
        $countries = $this->country->all();
        return View::make('adminviews.currency.editcurrency', compact('countries', 'currencies', 'countryname'));
    }

    public function posteditcurrency() {
        $input = Input::all();
        $this->currency->update($input);
        Session::flash('success', 'Currency successfully updated!');
        return Redirect::to('currencylist');
    }

    public function deletecurrency() {
        $id = Input::get('id');
        $this->currency->deletebyid($id);
        Session::flash('success', 'Currency successfully deleted!');
        return Redirect::to('currencylist');
    }

    public function currencystatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        Currency::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
