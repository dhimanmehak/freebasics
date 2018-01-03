<?php

namespace fundstarter\storage\Reward;

use fundstarter\storage\Project\ProjectRepository as ProjectRepo;
use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Reward;
use Config;

class RewardRepository implements IRewardRepository {

    public function all() {
        $reward = new Reward;
        return $reward->all();
    }

    public function create(array $input) {
        $reward = new Reward;
        $reward->projectid = $input['id'];
        $projecterpo = new ProjectRepo;
        $currencyid = $projecterpo->getcurrencyid($input['id']);
        if ($currencyid != '') {
            $currencyrepo = new CurrencyRepo;
            $currency = $currencyrepo->getcurrencybyid($currencyid);
            $rate = $currency['currencyrate'];
            $reward->pledgeamount = $input['pledgeamount'] * 1 / $rate;
        } else {
            $reward->pledgeamount = $input['pledgeamount'];
        }
        $reward->description = $input['description'];
        $reward->estimateddelivery = $input['estimateddelivery'];
        $reward->islimited = $input['islimited'];
        $reward->quantity = $input['limitcount'];
        $reward->createdon = Carbon::now();
        $reward->updatedon = Carbon::now();
        $reward->save();
        if ($input['rewardCount'] >= 1) {
            for ($i = 0; $i < $input['rewardCount']; $i++) {
                $reward = new Reward;
                $reward->projectid = $input['id'];
                if ($currencyid != '') {
                    $currencyrepo = new CurrencyRepo;
                    $currency = $currencyrepo->getcurrencybyid($currencyid);
                    $rate = $currency['currencyrate'];
                    $reward->pledgeamount = $input['pledgeamount$' . $i] * 1 / $rate;
                } else {
                    $reward->pledgeamount = $input['pledgeamount$' . $i];
                }
                $reward->description = $input['description$' . $i];
                $reward->estimateddelivery = $input['estimateddelivery$'. $i];
                if ($input['limitcount$' . $i] != "") {
                    $reward->islimited = 1;
                    $reward->quantity = $input['limitcount$' . $i];
                } else {
                    $reward->islimited = 0;
                }
                $reward->createdon = Carbon::now();
                $reward->updatedon = Carbon::now();
                $reward->save();
            }
        }
        return 1;
    }

    public function update(array $input) {
        $reward = new Reward;
        $id = $input['id'];
        $data = $reward->find($id);
        $projecterpo = new ProjectRepo;
        $currencyid = $projecterpo->getcurrencyid($data['projectid']);
        if ($currencyid != '') {
            $currencyrepo = new CurrencyRepo;
            $currency = $currencyrepo->getcurrencybyid($currencyid);
            $rate = $currency['currencyrate'];
            $data->pledgeamount = $input['pledgeamount'] * 1 / $rate;
        } else {
            $data->pledgeamount = $input['pledgeamount'];
        }
        $data->description = $input['description'];
        $data->estimateddelivery = $input['estimateddelivery'];
        $data->islimited = $input['islimited'];
        $data->quantity = $input['limitcount'];
        $data->updatedon = Carbon::now();
        $data->save();
        return $id;
    }

    public function getbyid($id) {
        $reward = new Reward;
        return $reward->where('id', '=', $id)->first();
    }

    public function getbyidcreator($id) {
        $reward = new Reward;
        $temp = $reward->where('id', '=', $id)->first();
        $projectrepo = new ProjectRepo;
        $projectid = $temp['projectid'];
        $currencyid = $projectrepo->getcurrencyid($projectid);
        if ($currencyid != '') {
            $currencyrepo = new CurrencyRepo;
            $currency = $currencyrepo->getcurrencybyid($currencyid);
            $rate = $currency['currencyrate'];
            $symbol = $currency['currencysymbol'];
            $pledge = $temp['pledgeamount'] * $rate;
            $temp['pledgeamount'] = $pledge;
            $temp['currencysymbol'] = $symbol;
        } else {
            $currencytype = Config::get('adminconfig.currency');
            $currencyrepo = new CurrencyRepo;
            $currencysymbol = $currencyrepo->getsymbol($currencytype);
            $temp['currencysymbol'] = $currencysymbol;
        }
        return $temp;
    }

    public function getbyprojectid($id) {
        $reward = new Reward;
        return $reward->where('projectid', '=', $id)->get();
    }

    public function getbyprojectidcreator($id) {
        $reward = new Reward;
        $rewards = $reward->where('projectid', '=', $id)->get();

        $projectrepo = new ProjectRepo;
        $currencyid = $projectrepo->getcurrencyid($id);
        if ($currencyid != '') {
            foreach ($rewards as $reward) {
                $currencyrepo = new CurrencyRepo;
                $currency = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currency['currencyrate'];
                $pledge = $reward['pledgeamount'] * $rate;
                $reward['pledgeamount'] = $pledge;
                $reward['currencysymbol'] = $currency['currencysymbol'];
            }
        } else {
            foreach ($rewards as $reward) {
                $currencytype = Config::get('adminconfig.currency');
                $currencyrepo = new CurrencyRepo;
                $currencysymbol = $currencyrepo->getsymbol($currencytype);
                $reward['currencysymbol'] = $currencysymbol;
            }
        }
        return $rewards;
    }

    public function deletebyid($id) {
        $reward = new Reward;
        return $reward->where('id', '=', $id)->delete();
    }

    public function deletebyprojectid($id) {
        $reward = new Reward;
        return $reward->where('projectid', '=', $id)->delete();
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
