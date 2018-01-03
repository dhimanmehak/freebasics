<?php

use fundstarter\storage\Slider\SliderRepository as SliderRepository;

class SliderController extends BaseController {

    public function __construct(SliderRepository $sliderRepository) {
        $this->slider = $sliderRepository;
    }

    public function index() {
        $sliders = $this->slider->all();
        return View::make('adminviews.slider.sliderlist', compact('sliders'));
    }

    public function addslider() {
        return View::make('adminviews.slider.addslider');
    }

    public function postaddslider() {
        $rules = array(
            'sliderimage' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            $slidername = $input['slidername'];
            $result = $this->slider->checkalreadyexists($slidername);
            if ($result != '') {
                Session::flash('failed', 'Slider name already exists!');
                return Redirect::back();
            } else {
                $slider = Input::file('sliderimage');
                $destinationPath = 'uploads/images/sliders';
                $slidermimetype = $slider->getClientOriginalExtension();
                if ($slidermimetype == 'jpg' || 'png' || 'jpeg') {
                    $filename = rand(100000, 999999);
                    $file = $filename . '.' . $slidermimetype;
                    $slider->move($destinationPath, $file);
                    $sliderlink = $destinationPath . '/' . $file;
                    $input['slider'] = $sliderlink;
                    $this->slider->create($input);
                    Session::flash('success', 'Slider added successfully');
                    return Redirect::to('sliderlist');
                } else {
                    Session::flash('error', 'Unsupported format');
                    return Redirect::to('addslider');
                }
            }
        }
    }

    public function editslider() {
        $id = Input::get('id');
        $sliders = $this->slider->getbyid($id);
        return View::make('adminviews.slider.editslider', compact('sliders'));
    }

    public function posteditslider() {
        $rules = array(
            'sliderimage' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            $sliderid = $input['id'];
            $slidername = $input['slidername'];
            $result = $this->slider->checkexists($sliderid,$slidername);
            if ($result != '') {
                Session::flash('failed', 'Slider name already exists!');
                return Redirect::back();
            } else {
                $slider = Input::file('sliderimage');
                if ($slider != '') {
                    $destinationPath = 'uploads/images/sliders';
                    $slidermimetype = $slider->getClientOriginalExtension();
                    $filename = rand(100000, 999999);
                    $file = $filename . '.' . $slidermimetype;
                    $slider->move($destinationPath, $file);
                    $sliderlink = $destinationPath . '/' . $file;
                    $input['slider'] = $sliderlink;
                } else {
                    $input['slider'] = '';
                }
                $this->slider->update($input);
                Session::flash('success', 'Slider successfully updated!');
                return Redirect::to('sliderlist');
            }
        }
    }

    public function deleteslider() {
        $id = Input::get('id');
        $this->slider->deletebyid($id);
        Session::flash('success', 'Slider successfully deleted!');
        return Redirect::to('sliderlist');
    }

    public function sliderstatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        Slider::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
