<?php

namespace fundstarter\storage\City;
//use fundstarter\storage\City\CityRepository as CityRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use City;

class CityRepository implements ICityRepository {

    public function all() {
        $city = new City;
        return $city->all();
    }
    public function create(array $input) {
        $city = new City;
        $city->id = $input['id'];
		$city->stateid = $input['stateid'];
		$city->cityname = $input['cityname'];
		$city->createdon = $input['createdon'];
        $city->save();
        return 1;
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $city = $this->find($id)->first();
		$city->id = $input['id'];
		$city->stateid = $input['stateid'];
		$city->cityname = $input['cityname'];
		$city->createdon = $input['createdon'];
        
    }

    public function getbyid($id) {
        $city = new City;
        return $itie->where('id', '=', $id)->get();
    }

  
}
