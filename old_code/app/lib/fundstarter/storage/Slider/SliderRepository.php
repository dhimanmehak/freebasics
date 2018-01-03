<?php

namespace fundstarter\storage\Slider;

//use fundstarter\storage\Slider\SliderRepository as SliderRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Slider;

class SliderRepository implements ISliderRepository {

    public function all() {
        $slider = new Slider;
        return $slider->all();
    }

    public function create(array $input) {
        $slider = new Slider;
        $slider->slidername = $input['slidername'];
        $slider->slidertitle = $input['slidertitle'];
        $slider->sliderurl = $input['sliderurl'];
        $slider->sliderimage = $input['slider'];
        $slider->sliderdescription = $input['sliderdescription'];
        $slider->status = $input['status'];
        $slider->save();
        return 1;
    }

    public function update(array $input) {
        $slider = new Slider;
        $data = $slider->find($input['id']);
        $data->slidername = $input['slidername'];
        $data->slidertitle = $input['slidertitle'];
        $data->sliderurl = $input['sliderurl'];
        if ($input['slider'] != '') {
            $data->sliderimage = $input['slider'];
        }
        $data->sliderdescription = $input['sliderdescription'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $slider = new Slider;
        return $slider->where('id', '=', $id)->get();
    }

    public function deletebyid($id) {
        $slider = new Slider;
        return $slider->where('id', '=', $id)->delete();
    }

    public function getactivesliders() {
        $slider = new Slider;
        return $slider->where('status', '=', 'active')->get();
    }

    public function checkalreadyexists($slidername) {
        $slider = new Slider;
        return $slider->where('slidername', '=', $slidername)->pluck('id');
    }

    public function checkexists($sliderid, $slidername) {
        $slider = new Slider;
        return $slider->where('slidername', '=', $slidername)->where('id', '!=', $sliderid)->pluck('id');
    }

}
