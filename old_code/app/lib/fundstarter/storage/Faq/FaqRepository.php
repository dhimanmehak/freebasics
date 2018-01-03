<?php

namespace fundstarter\storage\Faq;

//use fundstarter\storage\Faq\FaqRepository as FaqRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faq;

class FaqRepository implements IFaqRepository {

    public function all() {
        $faq = new Faq;
        return $faq->all();
    }

    public function create(array $input) {
        $faq = new Faq;
        $faq->projectid = $input['id'];
        $faq->question = $input['question'];
        $faq->answer = $input['answer'];
        $faq->createdon = Carbon::now();
        $faq->save();
        return 1;
    }

    public function update(array $input) {
        $faq = new Faq;
        $data = $faq->find($input['id']);
        $data->question = $input['question'];
        $data->answer = $input['answer'];
        $data->save();
    }

    public function getbyid($id) {
        $faq = new Faq;
        return $faq->where('id', '=', $id)->first();
    }

    public function getbyprojectid($id) {
        $faq = new Faq;
        return $faq->where('projectid', '=', $id)->get();
    }

    public function getcountry($id) {
        $faq = new Faq;
        return $faq->where('id', '=', $id)->pluck('countryname');
    }

    public function deletebyid($id) {
        $faq = new Faq;
        return $faq->where('id', '=', $id)->delete();
    }

}
