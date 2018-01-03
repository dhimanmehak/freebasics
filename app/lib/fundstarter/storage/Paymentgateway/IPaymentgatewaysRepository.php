<?php namespace fundstarter\storage\Paymentgateway;
 
interface IPaymentgatewayRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}