<?php namespace fundstarter\storage\Adminsetting;
 
interface IAdminsettingRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}