<?php namespace fundstarter\storage\Subcategory;
 
interface ISubcategoryRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}