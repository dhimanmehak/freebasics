<?php

namespace fundstarter\storage\Subscription;

use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepo;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Subscription;

class SubscriptionRepository implements ISubscriptionRepository {

    public function all() {
        $subscription = new Subscription;
        return $subscription->all();
    }

    public function create(array $input) {
        $subscription = new Subscription;
        $result = $this->checkalreadyexists($input['email']);
        if ($result == '') {
            $subscription->email = $input['email'];
            $code = rand();
            $subscription->verificationcode = $code;
            $subscription->isverified = 'no';
            $subscription->status = 'inactive';
            $subscription->createdon = Carbon::now();
            $subscription->save();
            return array('code' => $code, 'subscriptionid' => $subscription->id);
        } else {
            return 0;
        }
    }

    public function update(array $input) {
        $subscription = new Subscription;
        $data = $subscription->find($input['id']);
        $data->email = $input['email'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $subscription = new Subscription;
        return $subscription->where('id', '=', $id)->get();
    }

    public function deletesubscriptionbyid($id) {
        $subscription = new Subscription;
        return $subscription->where('id', '=', $id)->delete();
    }

    public function getactiveemail() {
        $subscription = new Subscription;
        return $subscription->where('status', '=', 'active')->get();
    }

    public function getidbyemail($email) {
        $subscription = new Subscription;
        return $subscription->where('email', '=', $email)->pluck('id');       
    }
    public function unsubscribe($id) {
        $subscription = new Subscription;
        return $subscription->where('id', '=', $id)->update(['status' => 'inactive']); 
    }

    public function getemailsbyid($ids) {
        $subscription = new Subscription;
        $subscriptions = array();
        foreach ($ids as $id) {
            $temp = $subscription->where('id', '=', $id)->where('status', '=', 'active')->pluck('email');
            array_push($subscriptions, $temp);
        }
        return $subscriptions;
    }

    /* ----------- User-------------- */

    public function createfromsignup($email) {
        $subscription = new Subscription;
        $result = $this->checkalreadyexists($email);
        if ($result == '') {
            $subscription->email = $email;
            $code = rand();
            $subscription->verificationcode = $code;
            $subscription->isverified = 'yes';
            $subscription->status = 'active';
            $subscription->createdon = Carbon::now();
            $subscription->save();
            // return array('code' => $code, 'subscriptionid' => $subscription->id);
        }
    }

    public function checkalreadyexists($email) {
        $subscription = new Subscription;
        return $subscription->where('email', '=', $email)->pluck('id');
    }

    public function verifycode($id, $code) {
        $subscription = new Subscription;
        $status = $subscription->where('id', '=', $id)->where('verificationcode', '=', $code)->get();
        if ($status == '[]') {
            return 0;
        } else {
            $data = $subscription->find($id);
            $data['isverified'] = "yes";
            $data['status'] = "active";
            $data->save();
            return 1;
        }
    }

    public function userchangeactive($email) {
        $subscription = new Subscription;
        $id = $subscription->where('email', '=', $email)->pluck('id');
        if ($id == '') {
            $status = 'active';
            $this->createifnotexists($email, $status);
        } else {
            $data = $subscription->find($id);
            $data->status = "active";
            $data->save();
        }
    }

    public function userchangeinactive($email) {
        $subscription = new Subscription;
        $id = $subscription->where('email', '=', $email)->pluck('id');
        if ($id == '') {
            $status = 'inactive';
            $this->createifnotexists($email, $status);
        } else {
            $data = $subscription->find($id);
            $data->status = "inactive";
            $data->save();
        }
    }

    public function createifnotexists($email, $status) {
        $subscription = new Subscription;
        $result = $this->checkalreadyexists($email);
        if ($result == '') {
            $subscription->email = $email;
            $code = rand();
            $subscription->verificationcode = $code;
            $subscription->isverified = 'yes';
            $subscription->status = $status;
            $subscription->createdon = Carbon::now();
            $subscription->save();
        }
    }

}
