<?php

namespace fundstarter\storage\State;

//use fundstarter\storage\State\StateRepository as StateRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use State;

class StateRepository implements IStateRepository {

    public function all() {
        $state = new State;
        return $state->all();
    }

    public function create(array $input) {
        $state = new State;
        $state->countryid = $input['countryid'];
        $state->statename = $input['statename'];
        $state->statecode = $input['statecode'];
        $state->status = $input['status'];
        $state->save();
        return 1;
    }

    public function update(array $input) {
        $state = new State;
        $data = $state->find($input['id']);
        $data->countryid = $input['countryid'];
        $data->statename = $input['statename'];
        $data->statecode = $input['statecode'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $state = new State;
        return $state->where('id', '=', $id)->get();
    }

    public function getbycountryid($countryid) {
        $state = new State;
        return $state->join('countries', 'countries.id', '=', 'states.countryid')->where('states.countryid', '=', $countryid)->get(array('states.id', 'states.statename', 'states.statecode', 'states.status', 'countries.countryname'));
    }

    public function deletebyid($id) {
        $state = new State;
        return $state->where('id', '=', $id)->delete();
    }

    public function deletebycountryid($countryid) {
        $state = new State;
        return $state->where('countryid', '=', $countryid)->delete();
    }
    
    public function checkalreadyexists($countryid, $statename){
        $state = new State;
        return $state->where('countryid', '=', $countryid)->where('statename', '=', $statename)->pluck('id');
    }
    
    public function checkexists($id,$countryid, $statename){
        $state = new State;
        return $state->where('countryid', '=', $countryid)->where('statename', '=', $statename)->where('id', '!=', $id)->pluck('id');
    }

}
