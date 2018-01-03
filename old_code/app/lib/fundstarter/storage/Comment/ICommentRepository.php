<?php namespace fundstarter\storage\Comment;
 
interface ICommentRepository {
   
  public function all();
 
  public function create(array $input);
  
  public function update(array $input);
  
  public function getbyid($id);
  
}