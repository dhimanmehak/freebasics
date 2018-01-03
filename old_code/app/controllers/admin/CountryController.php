<?php

use fundstarter\storage\Country\CountryRepository as CountryRepository;
use fundstarter\storage\State\StateRepository as StateRepository;

class CountryController extends BaseController {

    public function __construct(CountryRepository $countryRepository, StateRepository $stateRepository) {
        $this->country = $countryRepository;
        $this->state = $stateRepository;
    }

    public function index() {
        $countries = $this->country->all();
        return View::make('adminviews.country.countrylist', compact('countries'));
    }
    
    public function addcountry() {
        return View::make('adminviews.country.addcountry');
    }
    
    public function postaddcountry(){
        $input = Input::all();
        $countryid = $input['countryid'];
        $countryname = $input['countryname'];
        $result = $this->country->checkalreadyexists($countryid, $countryname);
        if ($result != '') {
            Session::flash('failed', 'Country name already exists!');
            return Redirect::back();
        } else {
            $this->country->create($input);
            Session::flash('success', 'Country successfully created!');
            return Redirect::to('countrylist');
        }
    }
    
    public function editcountry() {
        $id = Input::get('id');
        $countries = $this->country->getbyid($id);
        return View::make('adminviews.country.editcountry', compact('countries'));
    }

    public function posteditcountry() {
        $input = Input::all();
        $this->country->update($input);
        Session::flash('success', 'Country successfully updated!');
        return Redirect::to('countrylist');
    }

    public function viewcountry() {
        $id = Input::get('id');
        $countries = $this->country->getbyid($id);
        return View::make('adminviews.country.viewcountry', compact('countries'));
    }

    public function deletecountry() {
        $id = Input::get('id');
        $this->state->deletebycountryid($id);
        $this->country->deletebyid($id);
        Session::flash('success', 'Country successfully deleted!');
        return Redirect::to('countrylist');
    }

    public function addstate() {
        $countries = $this->country->all();
        return View::make('adminviews.country.addstate', compact('countries'));
    }

    public function postaddstate() {
        $input = Input::all();
        $countryid = $input['countryid'];
        $statename = $input['statename'];
        $result = $this->state->checkalreadyexists($countryid, $statename);
        if ($result != '') {
            Session::flash('failed', 'State name already exists!');
            return Redirect::back();
        } else {
            $this->state->create($input);
            Session::flash('success', 'State successfully created!');
            return Redirect::to('statelist?id=' . $input['countryid']);
        }
    }

    public function editstate() {
        $id = Input::get('id');
        $states = $this->state->getbyid($id);
        $countryid = $states[0]['countryid'];
        $countryname = $this->country->getnamebyid($countryid);
        $countries = $this->country->all();
        return View::make('adminviews.country.editstate', compact('states', 'countryname', 'countries'));
    }

    public function posteditstate() {
        $input = Input::all();
        $countryid = $input['countryid'];
        $statename = $input['statename'];
        $id = $input['id'];
        $result = $this->state->checkexists($id,$countryid, $statename);
        if ($result != '') {
            Session::flash('failed', 'State name already exists!');
            return Redirect::back();
        } else {
            $this->state->update($input);
            Session::flash('success', 'State successfully updated!');
            return Redirect::to('statelist?id=' . $input['countryid']);
        }
    }

    public function deletestate() {
        $id = Input::get('id');
        $states = $this->state->getbyid($id);
        $countryid = $states[0]['countryid'];
        $this->state->deletebyid($id);
        Session::flash('success', 'State successfully deleted!');
        return Redirect::to('statelist?id=' . $countryid);
    }

    public function statelist() {
        $countryid = Input::get('id');
        $states = $this->state->getbycountryid($countryid);
        return View::make('adminviews.country.statelist', compact('states'));
    }

    public function countrystatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        Country::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

    public function statestatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        State::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
