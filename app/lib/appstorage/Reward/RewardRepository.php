<?php

namespace appstorage\Reward;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Reward;

class RewardRepository {

    public function getbyprojectid($projectid) {
        $reward = new Reward;
        return $reward->where('projectid', $projectid)->get();
    }

    public function checkpledge($id) {
        $reward = new Reward;
        return $reward->where('id', '=', $id)->pluck('pledgeamount');
    }

    public function updatebackercount($rewardid) {
        $reward = new Reward;
        $data = $reward->find($rewardid);
        $backerscount = $data->backerscount + 1;
        $data->backerscount = $backerscount;
        $data->save();
    }

}
