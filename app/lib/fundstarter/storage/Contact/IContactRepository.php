<?php namespace fundstarter\storage\Contact;
 
interface IContactRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}