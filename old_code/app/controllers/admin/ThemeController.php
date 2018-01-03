<?php

use fundstarter\storage\Admin\AdminRepository as AdminRepository;

class ThemeController extends BaseController {

    public function __construct(AdminRepository $adminrepository) {
        $this->admin = $adminrepository;
    }

    public function index() {
        $themes = $this->admin->getalltheme();
        return View::make('adminviews.theme.themelist', compact('themes'));
    }

    public function addtheme() {
        return View::make('adminviews.theme.addtheme');
    }
    
     public function edittheme() {
        return View::make('adminviews.theme.edittheme');
    }

    public function posttheme() {
        $input = Input::all();
        $result = $this->admin->checkmailexists($input['email']);
        if ($result == '') {
            $this->admin->create($input);
            Session::flash('success', 'Theme created successfully!');
            return Redirect::to('themelist');
        } else {
            Session::flash('failed', 'Mail already exists!');
            return Redirect::to('addtheme');
        }
    }
}