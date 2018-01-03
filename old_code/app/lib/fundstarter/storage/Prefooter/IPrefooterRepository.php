<?php namespace fundstarter\storage\Prefooter;
 
interface IPrefooterRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}