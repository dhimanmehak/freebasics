<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent {
    
        use SoftDeletingTrait;

        protected $dates = ['deleted_at'];

	public $timestamps = false;

        

}
