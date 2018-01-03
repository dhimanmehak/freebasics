<?php

namespace appstorage\Backing;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Backing;

class BackingRepository {

    public function all() {
        $backing = new Backing;
        return $backing->all();
    }

    public function create(array $input) {
        $backing = new Backing;
        $backing->userid = $input['userid'];
        $backing->pledgeamount = $input['pledgeamount'];
        $backing->projectid = $input['projectid'];
        if (isset($input['posttype'])) {
            $backing->rewardid = $input['reward'];
        } else {
            $backing->rewardid = $input['rewardid'];
        }
        $backing->createdon = Carbon::now();
        $backing->save();
        return $backing->id;
    }

    public function getbyid($id) {
        $backing = new Backing;
        return $backing->where('id', '=', $id)->first();
    }

}
