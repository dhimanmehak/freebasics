<?php

namespace fundstarter\storage\Admin;

//use fundstarter\storage\Admin\AdminRepository as AdminRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Admin;

class AdminRepository implements IAdminRepository {

    public function all() {
        $admin = new Admin;
        return $admin->all();
    }

    public function getsuperadmin() {
        $admin = new Admin;
        return $admin->where('admintype', '=', 'super')->first();
    }

    public function create(array $input) {
        $admin = new Admin;
        $admin->name = $input['name'];
        $admin->email = $input['email'];
	$admin->address = $input['address'];
        $admin->contact = $input['contact'];
        $admin->password = Hash::make($input['password']);
        $admin->admintype = 'sub';
        $admin->previleges = $input['privilege'];
        $admin->isverified = 1;
        $admin->status = 'inactive';
        $admin->createdon = Carbon::now();
        $admin->modifiedon = Carbon::now();
        $admin->save();
        return 1;
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $data = $this->find($id)->first();
        $data->name = $input['name'];
        $data->email = $input['email'];
        $data->password = Hash::make($input['password']);
        $data->admintype = $input['admintype'];
        $data->previleges = $input['previleges'];
        $data->lastlogindate = $input['lastlogindate'];
        $data->lastlogoutdate = $input['lastlogoutdate'];
        $data->lastloginip = $input['lastloginip'];
        $data->isverified = $input['isverified'];
        $data->pagination = $input['pagination'];
        $data->status = $input['status'];
        $data->createdon = $input['createdon'];
        $data->modifiedon = Carbon::now();
        $data->save();
    }

    public function getbyid($id) {
        $admin = new Admin;
        return $admin->where('id', '=', $id)->get();
    }

    public function getstatusbyemail($email) {
        $admin = new Admin;
        return $admin->where('email', '=', $email)->pluck('status');
    }
    
    public function getbyemail($email) {
        $admin = new Admin;
        return $admin->where('email', '=', $email)->first();
    }

    public function checklogin($email, $password) {
        $admin = new Admin;
        $hashed = $admin->where('email', '=', $email)->pluck('password');
        $result = Hash::check($password, $hashed);
        return $result;
    }

    public function checkmailexists($email) {
        $admin = new Admin;
        return $admin->where('email', '=', $email)->pluck('name');
    }

    public function savenewpassword($email, $newpassword) {
        $admin = new Admin;
        $password = Hash::make($newpassword);
        $id = $admin->where('email', '=', $email)->pluck('id');
        $data = $admin->find($id);
        $data->password = $password;
        $data->save();     
        return $id;
    }

    public function resetpassword($id, $password) {
        $admin = new Admin;
        $newpassword = Hash::make($password);
        $data = $admin->find($id);
        $data->password = $newpassword;
        $data->save();
        return $id;
    }

    public function updatelastlogin($email, $ipaddress) {
        $admin = new Admin;
        $id = $admin->where('email', '=', $email)->pluck('id');
        $data = $admin->find($id);
        $data->lastloginip = $ipaddress;
        $data->lastlogindate = Carbon::now();
//        $data->status = 'active';
        $data->save();
        return $id;
    }

    public function updatelastlogout($email) {
        $admin = new Admin;
        $id = $admin->where('email', '=', $email)->pluck('id');
        $data = $admin->find($id);
        $data->lastlogoutdate = Carbon::now();
        $data->save();
        return $id;
    }

    public function getid($email) {
        $admin = new Admin;
        return $admin->where('email', '=', $email)->pluck('id');
    }

    public function getallsubadmin() {
        $admin = new Admin;
        return $admin->where('admintype', '=', 'sub')->get();
    }

    public function updatesub($id, $name, $email, $address, $contact, $status, $privilege) {
        $admin = new Admin;
        $data = $admin->find($id);
        $data->name = $name;
        $data->email = $email;
	$data->address = $address;
        $data->contact = $contact;
        $data->status = $status;
        $data->previleges = $privilege;
        $data->modifiedon = Carbon::now();
        $data->save();
    }

    public function deletesub($id) {
        $admin = new Admin;
        $admin->where('id', '=', $id)->delete();
    }

    public function updateadmindetails($adminid, $adminname, $adminemail) {
        $admin = new Admin;
        $data = $admin->find($adminid);
        $data->name = $adminname;
        $data->email = $adminemail;
        $data->modifiedon = Carbon::now();
        $data->save();
    }

}
