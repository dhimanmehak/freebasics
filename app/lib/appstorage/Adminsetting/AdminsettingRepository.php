<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace appstorage\Adminsetting;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Adminsetting;

class AdminsettingRepository {
 
    public function getfirst() {
        $adminsetting = new Adminsetting;
        return $adminsetting->first();
    }

}
