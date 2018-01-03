<?php

use fundstarter\storage\Prefooter\PrefooterRepository as PrefooterRepository;

class PrefooterController extends BaseController {

    public function __construct(PrefooterRepository $prefooterRepository) {
        $this->prefooter = $prefooterRepository;
    }

    public function index() {
        $prefooters = $this->prefooter->all();
        return View::make('adminviews.prefooter.prefooterlist', compact('prefooters'));
    }

    public function addprefooter() {
        return View::make('adminviews.prefooter.addprefooter');
    }

    public function postaddprefooter() {
        $rules = array(
            'prefooterimage' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            $prefootertitle = $input['prefootertitle'];
            $result = $this->prefooter->checkalreadyexists($prefootertitle);
            if ($result != '') {
                Session::flash('failed', 'Prefooter name already exists!');
                return Redirect::back();
            } else {
                $prefooter = Input::file('prefooterimage');
                $destinationPath = 'uploads/images/prefooters';
                $prefootermimetype = $prefooter->getClientOriginalExtension();
                if ($prefootermimetype == 'jpg' || 'png' || 'jpeg') {
                    $filename = rand(100000, 999999);
                    $file = $filename . '.' . $prefootermimetype;
                    $prefooter->move($destinationPath, $file);
                    $prefooterlink = $destinationPath . '/' . $file;
                    $input['prefooterimage'] = $prefooterlink;
                    $this->prefooter->create($input);
                    Session::flash('success', 'Prefooter added successfully');
                    return Redirect::to('prefooterlist');
                } else {
                    Session::flash('error', 'Unsupported format');
                    return Redirect::to('addprefooter');
                }
            }
        }
    }

    public function editprefooter() {
        $id = Input::get('id');
        $prefooters = $this->prefooter->getbyid($id);
        return View::make('adminviews.prefooter.editprefooter', compact('prefooters'));
    }

    public function posteditprefooter() {
        $rules = array(
            'prefooterimage' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            $prefooterid = $input['id'];
            $prefootertitle = $input['prefootertitle'];
            $result = $this->prefooter->checkexists($prefooterid,$prefootertitle);
            if ($result != '') {
                Session::flash('failed', 'Prefooter name already exists!');
                return Redirect::back();
            } else {
                $prefooter = Input::file('prefooterimage');
                $destinationPath = 'uploads/images/prefooters';
                if ($prefooter != '') {
                    $prefootermimetype = $prefooter->getClientOriginalExtension();
                    $filename = rand(100000, 999999);
                    $file = $filename . '.' . $prefootermimetype;
                    $prefooter->move($destinationPath, $file);
                    $prefooterlink = $destinationPath . '/' . $file;
                    $input['prefooterimage'] = $prefooterlink;
                } else {
                    $input['prefooterimage'] = '';
                }
                $this->prefooter->update($input);
                Session::flash('success', 'Prefooter updated successfully');
                return Redirect::to('prefooterlist');
            }
        }
    }

    public function deleteprefooter() {
        $id = Input::get('id');
        $this->prefooter->deletebyid($id);
        Session::flash('success', 'Prefooter deleted successfully');
        return Redirect::to('prefooterlist');
    }

    public function prefooterstatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        $count = $this->prefooter->getcount();
        if ($count >= 6 && $change == "active") {
            Session::flash('failed', 'Cannot exceed limit 6');
            return Redirect::back();
        } else {
            Prefooter::where('id', '=', $id)->update(array('status' => $change));
            return Redirect::back();
        }
    }

}
