<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent {

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    
    public $timestamps = false;
    

}
