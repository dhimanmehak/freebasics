<?php namespace fundstarter\storage\Paymenthost;
 
interface IPaymenthostRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}