<?php namespace fundstarter\storage\Staticpage;
 
interface IStaticpageRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}