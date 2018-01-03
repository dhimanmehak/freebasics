<?php namespace fundstarter\storage\Payment;
 
interface IPaymentRepository {
   
  public function all();
 
  public function create($userid, $projectid, $pledgeamount, $backingid, $paypalemail, $token, $transactionid);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}