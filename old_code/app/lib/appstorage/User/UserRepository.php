<?php

namespace appstorage\User;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use User;

class UserRepository {

    public function all() {
        $user = new User;
        return $user->all();
    }

    public function create(array $input) {
        $user = new User;
        $user->firstname = $input['firstname'];
        $user->lastname = $input['lastname'];
        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->logintype = 'mobile';
        $user->createdon = Carbon::now();
        $user->save();
        return array('firstname' => $input['firstname'], 'lastname' => $input['lastname'], 'username' => $input['username'], 'email' => $input['email'],'id'=>$user->id);
    }

    public function getbyid($id) {
        $user = new User;
        return $user->where('id', '=', $id)->get();
    }

    public function checkalreadyexists($email) {
        $user = new User;
        return $user->where('email', '=', $email)->pluck('id');
    }

    public function checkusernameexists($username) {
        $user = new User;
        return $user->where('username', '=', $username)->pluck('id');
    }

    public function checklogin($email, $password) {
        $user = new User;
        $verified = $user->where('email', '=', $email)->pluck('emailstatus');
        if ($verified == 0) {
            return 2;
        } else {
            $hashed = $user->where('email', '=', $email)->pluck('password');
            $result = Hash::check($password, $hashed);
            return $result;
        }
    }

    public function getbyemail($email) {
        $user = new User;
        return $user->where('email', '=', $email)->first(array('id','firstname', 'lastname', 'username', 'email'));
    }

    public function updatemailverificationcode($id) {
        $user = new User;
        $data = $user->find($id);
        $data->emailverificationcode = rand();
        $data->save();
        return $data->emailverificationcode;
    }

    public function updatemailstatus($id, $code) {
        $user = new User;
        $result = $user->where('id', '=', $id)->where('emailverificationcode', '=', $code)->pluck('id');
        if ($result != '') {
            $data = $user->find($id);
            $data->emailstatus = 1;
            $data->save();
            return 1;
        }
    }

    public function getusername($id) {
        $user = new User;
        return $user->where('id', '=', $id)->pluck('username');
    }

    public function getidbyemail($email) {
        $user = new User;
        return $user->where('email', '=', $email)->pluck('id');
    }

    public function savenewpassword($email, $newpassword) {
        $user = new User;
        $password = Hash::make($newpassword);
        $id = $user->where('email', '=', $email)->pluck('id');
        $data = $user->find($id);
        $data->password = $password;
        $data->save();
        return $id;
    }

    public function saveresetpassword($id, $password) {
        $user = new User;
        $hashed = Hash::make($password);
        $data = $user->find($id);
        $data->password = $hashed;
        $data->save();
        return $id;
    }

    public function updatepackage($package, $userid) {
        $user = new User;
        $data = $user->find($userid);
        $data->packageid = $package;
        $membershiprepo = new MembershipRepo;
        $duration = $membershiprepo->getduration($package);
        if ($duration == "month") {
            $data->packageenddate = Carbon::now()->addMonth();
        } else {
            $data->packageenddate = Carbon::now()->addYear();
        }
        $data->save();
    }

    public function updatebackedcount($userid) {
        $user = new User;
        $data = $user->find($userid);
        $backedcount = $data->backedcount + 1;
        $data->backedcount = $backedcount;
        $data->save();
    }

}
