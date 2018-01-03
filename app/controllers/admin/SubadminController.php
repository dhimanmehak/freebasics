<?php

use fundstarter\storage\Admin\AdminRepository as AdminRepository;

class SubadminController extends BaseController {

    public function __construct(AdminRepository $adminrepository) {
        $this->admin = $adminrepository;
    }

    public function index() {
        $subadmins = $this->admin->getallsubadmin();
        return View::make('adminviews.subadmin.subadminlist', compact('subadmins'));
    }

    public function addsubadmin() {
        return View::make('adminviews.subadmin.addsubadmin');
    }

    public function postsubadmin() {
        //echo "<pre>";print_r($_POST);"</pre>";exit;
        $input = Input::all();
        $result = $this->admin->checkmailexists($input['email']);
        if ($result == '') {
            if (Input::has('all')) {
                $privilege = "all";
            } else {
                $excludeArr = array("id", "name", "email", "status", "address", "contact");
                $privArr = array();
                foreach (Input::all() as $key => $val) {
                    if (!in_array($key, $excludeArr)) {
                        $privArr[$key] = $val;
                    }
                }
                $privilege = serialize($privArr);
            }
            $input['privilege']=$privilege;
            $this->admin->create($input);
            Session::flash('success', 'Subadmin created successfully!');
            return Redirect::to('subadminlist');
        } else {
            Session::flash('failed', 'Mail already exists!');
            return Redirect::to('addsubadmin');
        }
    }

    public function editsubadmin() {
        $id = Input::get('id');
        $subadmins = $this->admin->getbyid($id);
        $subadmin = $subadmins[0];
        if ($subadmin['previleges'] == "all") {
            $previleges = "all";
        } else {
            $previleges = unserialize($subadmin['previleges']);
            if (!is_array($previleges)) {
                $previleges = array();
            }
        }
        return View::make('adminviews.subadmin.editsubadmin', compact('subadmin', 'previleges'));
    }

    public function posteditsubadmin() {
        $id = Input::get('id');
        $name = Input::get('name');
        $email = Input::get('email');
        $status = Input::get('status');
        $address = Input::get('address');
        $contact = Input::get('contact');
        if (Input::has('all')) {
            $privilege = "all";
        } else {
            $excludeArr = array("id", "name", "email", "status", "address", "contact");
            $privArr = array();
            foreach (Input::all() as $key => $val) {
                if (!in_array($key, $excludeArr)) {
                    $privArr[$key] = $val;
                }
            }
            $privilege = serialize($privArr);
        }
        $this->admin->updatesub($id, $name, $email, $address, $contact, $status, $privilege);
        Session::flash('success', 'Subadmin updated successfully!');
        return Redirect::to('subadminlist');
    }

    public function viewsubadmin() {
        $id = Input::get('id');
        $subadmins = $this->admin->getbyid($id);
        $subadmin = $subadmins[0];
        if ($subadmin['previleges'] == "all") {
            $previleges = "all";
        } else {
            $previleges = unserialize($subadmin['previleges']);
            if (!is_array($previleges)) {
                $previleges = array();
            }
        }
        return View::make('adminviews.subadmin.viewsubadmin', compact('subadmin', 'previleges'));
    }

    public function deletesubadmin() {
        $id = Input::get('id');
        $this->admin->deletesub($id);
        Session::flash('success', 'Delete successfull!');
        return Redirect::to('subadminlist');
    }

    public function subadminstatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        Admin::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
