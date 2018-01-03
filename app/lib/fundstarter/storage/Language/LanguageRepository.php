<?php

namespace fundstarter\storage\Language;

//use fundstarter\storage\Language\LanguageRepository as LanguageRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Language;

class LanguageRepository implements ILanguageRepository {

    public function all() {
        $language = new Language;
        return $language->orderby('languagename', 'asc')->get();
    }

    public function create(array $input) {
        $language = new Language;
        $language->languagename = $input['langname'];
        $language->languagecode = $input['langcode'];
        $language->status = $input['status'];
        $language->save();
        return 1;
    }

    public function update(array $input) {
        $language = new Language;
        $data = $language->find($input['id']);
        $data->languagename = $input['langname'];
        $data->languagecode = $input['langcode'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $language = new Language;
        return $language->where('id', '=', $id)->first();
    }

    public function deletebyid($id) {
        $language = new Language;
        $language->where('id', '=', $id)->delete();
    }

    public function checkalreadyexists($langcode) {
        $language = new Language;
        return $language->where('languagecode', '=', $langcode)->pluck('id');
    }

}
