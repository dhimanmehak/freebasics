<?php

use fundstarter\storage\Category\CategoryRepository as CategoryRepository;



use fundstarter\storage\Subcategory\SubcategoryRepository as SubcategoryRepository;




class CategoryController extends BaseController {
	
	
	
	
	public function __construct(CategoryRepository $categoryrepository, SubcategoryRepository $subcategoryRepository) {
		
		
		
		$this->category = $categoryrepository;
		
		
		
		$this->subcategory = $subcategoryRepository;
		
		
		
	}
	
	
	
	
	public function index() {
		
		
		
		$allcategories = $this->category->all();
		
		
		
		return View::make('adminviews.category.categorylist', compact('allcategories'));
		
		
		
	}
	
	
	
	
	public function subcategorylist() {
		
		
		
		$allcategories = $this->subcategory->getall();
		
		
		
		return View::make('adminviews.category.subcategorylist', compact('allcategories'));
		
		
		
	}
	
	
	
	
	public function addcategory() {
		
		
		
		return View::make('adminviews.category.addcategory');
		
		
		
	}
	
	
	
	
	public function postaddcategory() {
		
		
		
		$input = Input::all();
		
		
		
		$rules = array(
		'categoryimage' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000'
		);
		
		
		
		
		$messages = array(
		'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
		);
		
		
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		
		if ($validator->fails()) {
			
			
			
			Session::flash('failed', 'Category image not valid!');
			
			
			
			return Redirect::to('addcategory');
			
			
			
		}
		
		
		
		else{
			
			
			
			$result = $this->category->checkalreadyexists($input['categoryname']);
			
			
			
			if ($result == '') {
				
				
				$logo = Input::file('categoryimage');
				
				
				$destinationPath = 'uploads/images';
				
				
				if ($logo != '') {
					
					
					$logomimetype = $logo->getClientOriginalExtension();
					
					
					$file = 'categoryimage.' . $logomimetype;
					
					
					$logo->move($destinationPath, $file);
					
					
					$logolink = $destinationPath . '/' . $file;
					
					
					$input['categoryimage'] = $logolink;
					
					
				}
				
				else {
					
					
					$input['categoryimage'] = '';
					
					
				}
				
				
				
				$this->category->create($input);
				
				
				
				Session::flash('success', 'Category successfully added!');
				
				
				
				return Redirect::to('categorylist');
				
				
				
			}
			
			
			else {
				
				
				
				Session::flash('failed', 'Category already exists!');
				
				
				
				return Redirect::to('addcategory');
				
				
				
			}
			
			
			
			
		}
		
		
		
		
	}
	
	
	
	
	public function editcategory() {
		
		
		
		$id = Input::get('id');
		
		
		
		$details = $this->category->getbyid($id);
		
		
		
		return View::make('adminviews.category.editcategory', compact('details'));
		
		
		
	}
	
	
	
	
	public function posteditcategory() {
		
		
		
		$input = Input::all();
		
		
		
		
		$logo = Input::file('categoryimage');
		
		
		$destinationPath = 'uploads/images';
		
		
		if ($logo != '') {
			
			
			$logomimetype = $logo->getClientOriginalExtension();
			
			
			$file = 'categoryimage.' . $logomimetype;
			
			
			$logo->move($destinationPath, $file);
			
			
			$logolink = $destinationPath . '/' . $file;
			
			
			$input['categoryimage'] = $logolink;
			
			
		}
		
		else {
			
			
			$input['categoryimage'] = '';
			
			
		}
		
		
		$this->category->update($input);
		
		
		
		Session::flash('success', 'Category successfully updated!');
		
		
		
		return Redirect::to('categorylist');
		
		
		
		
	}
	
	
	
	
	public function deletecategory() {
		
		
		
		$id = Input::get('id');
		
		
		
		$this->subcategory->deletebycategoryid($id);
		
		
		
		$this->category->deletecategory($id);
		
		
		
		Session::flash('success', 'Category successfully deleted!');
		
		
		
		return Redirect::to('categorylist');
		
		
		
	}
	
	
	
	
	public function addsubcategory() {
		
		
		
		$categories = $this->category->all();
		
		
		
		return View::make('adminviews.category.addsubcategory', compact('categories'));
		
		
		
	}
	
	
	
	
	public function postaddsubcategory() {
		
		
		
		$input = Input::all();
		
		
		
		$result = $this->subcategory->checksubcategoryexists($input['categoryid'], $input['subcategoryname']);
		
		
		
		if ($result == '') {
			
			
			
			$this->subcategory->create($input);
			
			
			
			Session::flash('success', 'Subcategory successfully added!');
			
			
			
			return Redirect::to('subcategorylist');
			
			
			
		}
		
		
		else {
			
			
			
			Session::flash('failed', 'Subcategory already exists!');
			
			
			
			return Redirect::to('addsubcategory');
			
			
			
		}
		
		
		
	}
	
	
	
	
	public function editsubcategory() {
		
		
		
		$allcategories = $this->category->all();
		
		
		
		$id = Input::get('id');
		
		
		
		$details = $this->subcategory->getbyid($id);
		
		
		
		return View::make('adminviews.category.editsubcategory', compact('details', 'allcategories'));
		
		
		
	}
	
	
	
	
	public function posteditsubcategory() {
		
		
		
		$input = Input::all();
		
		
		
		$this->subcategory->update($input);
		
		
		
		Session::flash('success', 'Subcategory successfully updated!');
		
		
		
		return Redirect::to('subcategorylist');
		
		
		
	}
	
	
	
	
	public function deletesubcategory() {
		
		
		
		$id = Input::get('id');
		
		
		
		$this->subcategory->deletesubcategory($id);
		
		
		
		Session::flash('success', 'Subcategory successfully deleted!');
		
		
		
		return Redirect::to('subcategorylist');
		
		
		
	}
	
	
	
	
	public function categorystatus($id, $status) {
		
		
		
		if ($status == "active") {
			
			
			
			$change = "inactive";
			
			
			
		}
		
		
		else {
			
			
			
			$change = "active";
			
			
			
		}
		
		
		
		Category::where('id', '=', $id)->update(array('status' => $change));
		
		
		
		return Redirect::back();
		
		
		
	}
	
	
	
	
	public function subcategorystatus($id, $status) {
		
		
		
		if ($status == "active") {
			
			
			
			$change = "inactive";
			
			
			
		}
		
		
		else {
			
			
			
			$change = "active";
			
			
			
		}
		
		
		
		Subcategory::where('id', '=', $id)->update(array('status' => $change));
		
		
		
		return Redirect::back();
		
		
		
	}
	
	
	
	
}



