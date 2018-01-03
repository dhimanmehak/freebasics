<?php namespace fundstarter\storage\Inboxmsg;
 
interface IInboxmsgRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}