<?php namespace fundstarter\storage\Sendmsg;
 
interface ISendmsgRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}