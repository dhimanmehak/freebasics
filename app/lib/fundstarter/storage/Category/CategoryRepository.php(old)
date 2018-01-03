<?php

namespace fundstarter\storage\Category;

//use fundstarter\storage\Category\CategoryRepository as CategoryRepo;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Category;

class CategoryRepository implements ICategoryRepository {

    public function all() {
        $category = new Category;
        return $category->all();
    }

    public function create(array $input) {
        $category = new Category;
        $category->categoryname = $input['categoryname'];
        $category->categorycolorname = $input['categorycolorname'];
        $category->categorycolorcode = $input['categorycolorcode'];
        $category->categoryimage = $input['categoryimage'];
        $category->metatitle = $input['metatitle'];
        $category->metakeyword = $input['metakeyword'];
        $category->metadescription = $input['metadescription'];
        $category->status = 'active';
        $category->createdon = Carbon::now();
        $category->save();
        return 1;
    }

    public function update(array $input) {
        $category = new Category;
        $id = $input['id'];
        $data = $category->find($id);
        $data->categoryname = $input['categoryname'];
        $data->status = $input['status'];
        $data->categorycolorname = $input['categorycolorname'];
        $data->categorycolorcode = $input['categorycolorcode'];
        $data->categoryimage = $input['categoryimage'];
        $data->metatitle = $input['metatitle'];
        $data->metakeyword = $input['metakeyword'];
        $data->metadescription = $input['metadescription'];
        $data->save();
    }

    public function getbyid($id) {
        $category = new Category;
        return $category->where('id', '=', $id)->get();
    }

    public function checkalreadyexists($categoryname) {
        $category = new Category;
        return $category->where('categoryname', '=', $categoryname)->pluck('id');
    }

    public function deletecategory($id) {
        $category = new Category;
        return $category->where('id', '=', $id)->delete();
    }

    public function getallascending() {
        $category = new Category;
        return $category->orderBy('categoryname', 'asc')->where('status', 'active')->get();
    }

    public function getcategorywithprojectsascending() {
        $category = new Category;
        return $category->join('projects', 'categories.id', '=', 'projects.categoryid')->orderBy('categoryname', 'asc')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('projects.isfunded', '=', 0)->distinct()->get(array('categories.id', 'categories.categoryname'));
    }

    public function getfirst($id) {
        $category = new Category;
        return $category->where('id', '=', $id)->first();
    }

    public function allactive() {
        $category = new Category;
        return $category->where('status', '=', 'active')->get();
    }

}
