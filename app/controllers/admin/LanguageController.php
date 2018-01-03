<?php

use fundstarter\storage\Language\LanguageRepository as LanguageRepository;

class LanguageController extends BaseController {

    public function __construct(LanguageRepository $languageRepository) {
        $this->language = $languageRepository;
    }

    public function index() {
        $languages = $this->language->all();
        return View::make('adminviews.language.languagelist', compact('languages'));
    }

    public function addlanguage() {
        return View::make('adminviews.language.addlanguage');
    }

    public function postaddlanguage() {
        $input = Input::all();
        $langcode = $input['langcode'];
        $result = $this->language->checkalreadyexists($langcode);
        if ($result != '') {
            Session::flash('failed', 'Language already exists!');
            return Redirect::back();
        } else {
            $this->language->create($input);
            Session::flash('success', 'Language successfully added!');
            return Redirect::to('languagelist');
        }
    }

//    public function editlanguage() {
//        $id = Input::get('id');
//        $language = $this->language->getbyid($id);
//        return View::make('adminviews.language.editlanguage', compact('language'));
//    }
//    public function posteditlanguage() {
//        $input = Input::all();
//        $this->language->update($input);
//        Session::flash('success', 'Language successfully updated!');
//        return Redirect::to('languagelist');
//    }

    public function deletelanguage() {
        $id = Input::get('id');
        $this->language->deletebyid($id);
        Session::flash('success', 'Language successfully deleted!');
        return Redirect::to('languagelist');
    }

    public function editlanguage() {
        $selectedLanguage = Input::get('code');
        $page = Input::get('page');
        if($page==1){
           $page=''; 
        }
        // return $get_english_lang_count = directory_map(app_path() . "/lang/en/");
        $temp = scandir(app_path() . "/lang/en/", 1);
		$i = 0;
        foreach ($temp as $filename) {
            $mesg = substr($filename, 0, 8);
            if ($mesg == 'messages') {
                $i++;
            }
        }
        $count=$i;
        $languagDirectory = app_path() . "/lang/" . $selectedLanguage;
        if (!is_dir($languagDirectory)) {
            mkdir($languagDirectory, 0777);
            $filePath = app_path() . "/lang/" . $selectedLanguage . "/" . "messages".$page.".php";
            file_put_contents($filePath, '');
        }
        // $this->lang->load($selectedLanguage, $selectedLanguage);
        App::setLocale($selectedLanguage);

        $filePath = app_path() . "/lang/en/messages".$page.".php";
        $fileValues = file_get_contents($filePath);

        $file = explode(",", $fileValues);
        $exists = File::exists(app_path() . "/lang/" . $selectedLanguage . "/messages".$page.".php");
        $fileselectPath = app_path() . "/lang/" . $selectedLanguage . "/messages".$page.".php";
        if ($exists != 1) {
            File::put($fileselectPath, '');
        }
        $fileselectValues = file_get_contents($fileselectPath);
        $fileselect = explode(",", $fileselectValues);
        $pageno=Input::get('page');
        return View::make('adminviews.language.editlanguage', compact('file', 'selectedLanguage', 'fileselect','count','pageno'));
    }

    public function posteditlanguage() {
        $page=Input::get('page');
        if($page==1){
           $page=''; 
        }
        $getLanguageKeyDetails = Input::get('languageKeys');
        $getLanguageContentDetails = Input::get('language_vals');
        $selectedLanguage = Input::get('selectedLanguage');
        // echo "<pre>";print_r($getLanguageContentDetails);die;
        /* file write start */
        $loopItem = 0;
        $config = "<?php return array(";
        foreach ($getLanguageKeyDetails as $key_val) {
            $language_file_values = addslashes($getLanguageContentDetails[$loopItem]);
            $key_val = preg_replace('/\s+/', '', $key_val);
            $config .= "'$key_val' => '$language_file_values',";
            $loopItem = $loopItem + 1;
        }
        $config .= ");?>";

        $languagDirectory = app_path() . "/lang/" . $selectedLanguage;
        if (!is_dir($languagDirectory)) {
            mkdir($languagDirectory, 0777);
        }

        $filePath = app_path() . "/lang/" . $selectedLanguage . "/" . "messages".$page.".php";
        file_put_contents($filePath, $config);
        Session::flash('success', 'Language successfully updated!');
        return Redirect::to('languagelist');
    }

    public function languagestatus($id, $status) {
        if ($status == "1") {
            $change = "0";
        } else {
            $change = "1";
        }
        Language::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
