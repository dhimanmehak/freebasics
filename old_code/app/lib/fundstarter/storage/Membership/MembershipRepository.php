<?php

namespace fundstarter\storage\Membership;

//use fundstarter\storage\Membership\MembershipRepository as MembershipRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Membership;

class MembershipRepository implements IMembershipRepository {

    public function all() {
        $membership = new Membership;
        return $membership->all();
    }

    public function create(array $input) {
        $membership = new Membership;
        $membership->packagename = $input['packagename'];
        $membership->duration = $input['duration'];
        $membership->features = $input['features'];
        $membership->price = $input['price'];
        $membership->status = $input['status'];
        $membership->createdon = Carbon::now();
        $membership->save();
        return 1;
    }

    public function update(array $input) {
        $membership = new Membership;
        $data = $membership->find($input['id']);
        $data->packagename = $input['packagename'];
        $data->duration = $input['duration'];
        $data->features = $input['features'];
        $data->price = $input['price'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $membership = new Membership;
        return $membership->where('id', '=', $id)->first();
    }

    public function deletebyid($id) {
        $membership = new Membership;
        return $membership->where('id', '=', $id)->delete();
    }

    public function getpackages() {
        $membership = new Membership;
        return $membership->where('status', '=', 1)->take(3)->get();
    }

    public function getduration($id) {
        $membership = new Membership;
        return $membership->where('id', '=', $id)->pluck('duration');
    }

}
