<?php

namespace fundstarter\storage\Staticpage;

//use fundstarter\storage\Staticpage\StaticpageRepository as StaticpageRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Staticpage;

class StaticpageRepository implements IStaticpageRepository {

    public function all() {
        $staticpage = new Staticpage;
        return $staticpage->all();
    }

    public function create(array $input) {
        $staticpage = new Staticpage;
        $staticpage->pagename = $input['pagename'];
        $staticpage->pagetitle = $input['pagetitle'];
        $staticpage->seourl = strtolower(str_replace(' ', '-', $input['seourl']));
        $staticpage->hidden = $input['hidden'];
        $staticpage->header = $input['header'];
        $staticpage->footer = $input['footer'];
        if ($input['category'] == 'main') {
            $staticpage->category = 'main';
            $staticpage->parent = 'null';
        } else {
            $staticpage->category = 'sub';
            $staticpage->parent = $input['parent'];
        }
        $staticpage->metaname = $input['metaname'];
        $staticpage->metakeyword = $input['metakeyword'];
        $staticpage->metadescription = $input['metadescription'];
        $staticpage->description = $input['description'];
        $staticpage->status = $input['status'];
        $staticpage->save();
        return $staticpage->id;
    }

    public function update(array $input) {
        $staticpage = new Staticpage;
        $data = $staticpage->find($input['id']);
        $data->pagename = $input['pagename'];
        $data->pagetitle = $input['pagetitle'];
        $data->seourl = strtolower(str_replace(' ', '-', $input['seourl']));
        $data->hidden = $input['hidden'];
        $data->header = $input['header'];
        $data->footer = $input['footer'];
        $data->metaname = $input['metaname'];
        $data->metakeyword = $input['metakeyword'];
        $data->metadescription = $input['metadescription'];
        $data->description = $input['description'];
        $data->status = $input['status'];
        if ($input['category'] == 'sub') {
            $data->parent = $input['parent'];
        }
        $data->save();
        return array('pagetitle' => $data->title, 'description' => $data->description);
    }

    public function getbyseourl($seourl) {
        $staticpage = new Staticpage;
        return $staticpage->where('seourl', '=', $seourl)->first();
    }

    public function getbyid($id) {
        $staticpage = new Staticpage;
        return $staticpage->where('id', '=', $id)->get();
    }

    public function getmainpage() {
        $staticpage = new Staticpage;
        return $staticpage->where('category', '=', 'main')->get();
    }

    public function getcategory($id) {
        $staticpage = new Staticpage;
        return $staticpage->where('id', '=', $id)->pluck('category');
    }

    public function getparent($id) {
        $staticpage = new Staticpage;
        return $staticpage->where('id', '=', $id)->pluck('parent');
    }

    public function getparentname($parent) {
        $staticpage = new Staticpage;
        return $staticpage->where('id', '=', $parent)->pluck('pagename');
    }

    public function deletebyparent($parent) {
        $staticpage = new Staticpage;
        return $staticpage->where('parent', '=', $parent)->delete();
    }

    public function deletebyid($id) {
        $staticpage = new Staticpage;
        return $staticpage->where('id', '=', $id)->delete();
    }
    
    public function checkalreadyexists($pagename) {
        $staticpage = new Staticpage;
        return $staticpage->where('pagename', '=', $pagename)->pluck('id');
    }
    
    public function checksubpagenameexists($category, $pagename) {
        $staticpage = new Staticpage;
        return $staticpage->where('category', '=', $category)->where('pagename', '=', $pagename)->pluck('id');
    }

}
