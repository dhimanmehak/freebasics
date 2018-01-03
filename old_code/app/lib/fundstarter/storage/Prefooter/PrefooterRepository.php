<?php

namespace fundstarter\storage\Prefooter;

//use fundstarter\storage\Prefooter\PrefooterRepository as PrefooterRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Prefooter;

class PrefooterRepository implements IPrefooterRepository {

    public function all() {
        $prefooter = new Prefooter;
        return $prefooter->all();
    }

    public function create(array $input) {
        $prefooter = new Prefooter;
        $prefooter->title = $input['prefootertitle'];
        $prefooter->description = $input['description'];
        $prefooter->footerlink = $input['prefooterlink'];
        $prefooter->image = $input['prefooterimage'];
        $prefooter->createdon = Carbon::now();
        if ($this->getcount() < 6) {
            $prefooter->status = $input['status'];
        } else {
            $prefooter->status = "inactive";
        }
        $prefooter->save();
        return 1;
    }

    public function update(array $input) {
        $prefooter = new Prefooter;
        $data = $prefooter->find($input['id']);
        $data->title = $input['prefootertitle'];
        $data->description = $input['description'];
        if ($input['prefooterimage'] != '') {
            $data->image = $input['prefooterimage'];
        }
        $data->footerlink = $input['prefooterlink'];
        if ($this->getcount() < 6) {
            $data->status = $input['status'];
        } else {
            $data->status = "inactive";
        }
        $data->save();
    }

    public function getbyid($id) {
        $prefooter = new Prefooter;
        return $prefooter->where('id', '=', $id)->get();
    }

    public function deletebyid($id) {
        $prefooter = new Prefooter;
        return $prefooter->where('id', '=', $id)->delete();
    }

    public function getlimited() {
        $prefooter = new Prefooter;
        return $prefooter->where('status', '=', 'active')->take(6)->get();
    }

    public function getcount() {
        $prefooter = new Prefooter;
        return $prefooter->where('status', '=', 'active')->count();
    }

    public function checkalreadyexists($prefootertitle) {
        $prefooter = new Prefooter;
        return $prefooter->where('title', '=', $prefootertitle)->pluck('id');
    }
    
    public function checkexists($prefooterid,$prefootertitle){
         $prefooter = new Prefooter;
        return $prefooter->where('title', '=', $prefootertitle)->where('id', '!=', $prefooterid)->pluck('id');
    }

}
