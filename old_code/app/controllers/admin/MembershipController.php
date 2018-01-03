<?php

use fundstarter\storage\Membership\MembershipRepository as MembershipRepository;

class MembershipController extends BaseController {

    public function __construct(MembershipRepository $membershipRepository) {
        $this->membership = $membershipRepository;
    }

    public function index() {
        $memberships = $this->membership->all();
        return View::make('adminviews.membership.membershiplist', compact('memberships'));
    }

    public function addmembership() {
        return View::make('adminviews.membership.addmembership');
    }

    public function postaddmembership() {
        $input = Input::all();
        $this->membership->create($input);
        Session::flash('success', 'Membership added successfully');
        return Redirect::to('membershiplist');
    }

    public function editmembership() {
        $id = Input::get('id');
        $membership = $this->membership->getbyid($id);
        return View::make('adminviews.membership.editmembership', compact('membership'));
    }

    public function posteditmembership() {
        $input = Input::all();
        $this->membership->update($input);
        Session::flash('success', 'Membership updated successfully');
        return Redirect::to('membershiplist');
    }

    public function deletemembership() {
        $id = Input::get('id');
        $this->membership->deletebyid($id);
        Session::flash('success', 'Membership deleted successfully');
        return Redirect::to('membershiplist');
    }

    public function membershipstatus($id, $status) {
        if ($status == 1) {
            $change = 0;
        } else {
            $change = 1;
        }
        Membership::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
