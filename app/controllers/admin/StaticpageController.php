<?php

use fundstarter\storage\Staticpage\StaticpageRepository;


class StaticpageController extends BaseController {

    public function __construct(StaticpageRepository $staticpageRepository) {
        $this->staticpage = $staticpageRepository;
    }

    public function index() {
        $pages = $this->staticpage->all();
        return View::make('adminviews.staticpage.pagelist', compact('pages'));
    }

    public function addmainpage() {
        return View::make('adminviews.staticpage.addmainpage');
    }

    public function postmainpage() {
        $input = Input::all();
        if (Input::has('hidden')) {
            $input['hidden'] = 'on';
        } else {
            $input['hidden'] = 'off';
        }
        if (Input::has('header')) {
            $input['header'] = 'on';
        } else {
            $input['header'] = 'off';
        }
        if (Input::has('footer')) {
            $input['footer'] = 'on';
        } else {
            $input['footer'] = 'off';
        }
        $result = $this->staticpage->checkalreadyexists($input['pagename']);
        if ($result == '') {
            $this->staticpage->create($input);
            Session::flash('success', 'Page successfully added!');
            return Redirect::to('pagelist');
        } else {
            Session::flash('failed', 'Page Name already exists!');
            return Redirect::to('addmainpage');
        }
    }

    public function editmainpage() {
        $mainpages = $this->staticpage->getmainpage();
        $id = Input::get('id');
        $parent = $this->staticpage->getparent($id);
        $pages = $this->staticpage->getbyid($id);
        $category = $this->staticpage->getcategory($id);
        return View::make('adminviews.staticpage.editmainpage', compact('pages', 'mainpages', 'category', 'parent'));
    }

    public function viewmainpage() {
        $id = Input::get('id');
        $parent = $this->staticpage->getparent($id);
        $parentname = $this->staticpage->getparentname($parent);
        $category = $this->staticpage->getcategory($id);
        $pages = $this->staticpage->getbyid($id);
        return View::make('adminviews.staticpage.viewmainpage', compact('pages', 'category', 'parentname'));
    }

    public function posteditmainpage() {
        $input = Input::all();
        if (Input::has('hidden')) {
            $input['hidden'] = 'on';
        } else {
            $input['hidden'] = 'off';
        }
        if (Input::has('header')) {
            $input['header'] = 'on';
        } else {
            $input['header'] = 'off';
        }
        if (Input::has('footer')) {
            $input['footer'] = 'on';
        } else {
            $input['footer'] = 'off';
        }
        $this->staticpage->update($input);
        Session::flash('success', 'Page successfully updated!');
        return Redirect::to('pagelist');
    }

    public function deletepage() {
        $id = Input::get('id');
        $category = $this->staticpage->getcategory($id);
        if ($category == "main") {
            $this->staticpage->deletebyparent($id);
            $this->staticpage->deletebyid($id);
            Session::flash('success', 'Mainpage successfully deleted!');
            return Redirect::to('pagelist');
        } else {
            $this->staticpage->deletebyid($id);
            Session::flash('success', 'Subpage successfully deleted!');
            return Redirect::to('pagelist');
        }
    }

    public function addsubpage() {
        $mainpages = $this->staticpage->getmainpage();
        return View::make('adminviews.staticpage.addsubpage', compact('mainpages'));
    }

    public function postaddsubpage() {
        $input = Input::all();
        if (Input::has('hidden')) {
            $input['hidden'] = 'on';
        } else {
            $input['hidden'] = 'off';
        }
        if (Input::has('header')) {
            $input['header'] = 'on';
        } else {
            $input['header'] = 'off';
        }
        if (Input::has('footer')) {
            $input['footer'] = 'on';
        } else {
            $input['footer'] = 'off';
        }
        $result = $this->staticpage->checksubpagenameexists($input['category'], $input['pagename']);
        if ($result == '') {
            $this->staticpage->create($input);
            Session::flash('success', 'Subpage successfully added!');
            return Redirect::to('pagelist');
        } else {
            Session::flash('failed', 'Subpage name already exists!');
            return Redirect::to('addsubpage');
        }
    }

    public function staticpagestatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        Staticpage::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
