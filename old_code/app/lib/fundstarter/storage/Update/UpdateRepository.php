<?php

namespace fundstarter\storage\Update;

use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepo;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Update;

class UpdateRepository implements IUpdateRepository {

    public function all() {
        $update = new Update;
        return $update->all();
    }

    public function create(array $input) {
        $update = new Update;
        
        $update->projectid = $input['id'];
        $update->userid = $input['userid'];
        $update->title = $input['title'];
        $update->description = $input['description'];
        $update->postedon = Carbon::now();
        $update->save();
        return 1;
    }

    public function update(array $input) {
        $update = new Update;
        $data = $update->find($input['id']);
        $data->projectid = $input['projectid'];
        $data->userid = $input['userid'];
        $data->title = $input['title'];
        $data->description = $input['description'];
        $data->save();
    }

    public function getbyid($id) {
        $update = new Update;
        return $update->where('id', '=', $id)->first();
    }

    public function deletesubscriptionbyid($id) {
        $update = new Update;
        return $update->where('id', '=', $id)->delete();
    }

    public function getactiveemail() {
        $update = new Update;
        return $update->where('isverified', '=', 'yes')->where('status', '=', 'active')->get();
    }

    public function getemailsbyid($ids) {
        $update = new Update;
        $updates = array();
        foreach ($ids as $id) {
            $temp = $update->where('id', '=', $id)->where('status', '=', 'active')->where('isverified', '=', 'yes')->pluck('email');
            array_push($updates, $temp);
        }
        return $updates;
    }

    /* ----------- User-------------- */

    public function getbyprojectid($id) {
        $update = new Update;
        return $update->where('projectid', '=', $id)->get();
    }

    public function checkalreadyexists($email) {
        $update = new Update;
        return $update->where('email', '=', $email)->pluck('id');
    }

    public function verifycode($id, $code) {
        $update = new Update;
        $status = $update->where('id', '=', $id)->where('verificationcode', '=', $code)->get();
        if ($status == '[]') {
            return 0;
        } else {
            $data = $update->find($id);
            $data['isverified'] = "yes";
            $data['status'] = "active";
            $data->save();
            return 1;
        }
    }

    public function deletebyid($id) {
        $update = new Update;
        return $update->where('id', '=', $id)->delete();
    }
    
    public function deletebyprojectid($id){
         $update = new Update;
        return $update->where('projectid', '=', $id)->delete();
    }

}
