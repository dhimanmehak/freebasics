<?php


namespace appstorage\Category;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Category;

class CategoryRepository {

    public function all() {
        $category = new Category;
        return $category->orderBy('categoryname','asc')->get();
    }

}
