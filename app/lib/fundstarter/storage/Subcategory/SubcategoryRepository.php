<?php

namespace fundstarter\storage\Subcategory;

//use fundstarter\storage\Subcategory\SubcategoryRepository as SubcategoryRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Subcategory;

class SubcategoryRepository implements ISubcategoryRepository {

    public function all() {
        $subcategory = new Subcategory;
        return $subcategory->all();
    }

    public function create(array $input) {
        $subcategory = new Subcategory;
        $subcategory->categoryid = $input['categoryid'];
        $subcategory->subcategoryname = $input['subcategoryname'];
        $subcategory->status = 'active';
        $subcategory->save();
        return 1;
    }

    public function update(array $input) {
        $subcategory = new Subcategory;
        $data = $subcategory->find($input['id']);
        $data->categoryid = $input['categoryid'];
        $data->subcategoryname = $input['subcategoryname'];
        $data->status = $input['status'];
        $data->save();
    }

    public function getbyid($id) {
        $subcategory = new Subcategory;
        return $subcategory->leftjoin('categories', 'subcategories.categoryid', '=', 'categories.id')->where('subcategories.id', '=', $id)->get(array('subcategories.id', 'categories.categoryname', 'subcategories.status', 'subcategories.subcategoryname','subcategories.categoryid'));
    }

    public function checksubcategoryexists($categoryid, $subcategoryname) {
        $subcategory = new Subcategory;
        return $subcategory->where('categoryid', '=', $categoryid)->where('subcategoryname', '=', $subcategoryname)->pluck('id');
    }

    public function getall() {
        $subcategory = new Subcategory;
        return $subcategory->leftjoin('categories', 'subcategories.categoryid', '=', 'categories.id')->get(array('subcategories.id', 'categories.categoryname', 'subcategories.status', 'subcategories.subcategoryname'));
    }

    public function deletesubcategory($id) {
        $subcategory = new Subcategory;
        $subcategory->where('id', '=', $id)->delete();
    }

    public function deletebycategoryid($categoryid) {
        $subcategory = new Subcategory;
        $subcategory->where('categoryid', '=', $categoryid)->delete();
    }

}
