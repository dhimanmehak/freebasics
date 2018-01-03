<?php

namespace fundstarter\storage\Projectview;

use Carbon\Carbon;
use Projectview;
use Illuminate\Support\Facades\Session;

class ProjectviewRepository implements IProjectviewRepository {

    public function create($projectid, $ipaddr) {
        $projectview = new Projectview;
        $today = Carbon::now()->toDateString();
        $result = $projectview->where('projectid', '=', $projectid)->where('created', '=', $today)->get();
        if ($result == '[]') {
            $projectview->projectid = $projectid;
            $projectview->ipaddress = $ipaddr;
            $projectview->created = Carbon::now();
            $projectview->save();
        }
    }

    public function getanalytics($projectid) {
	//echo  $projectid;exit;
        $projectview = new Projectview;
		
        $stack = array();
        for ($i = 0; $i < 30; $i++) {
            $today = Carbon::now();
            $date = $today->subDays($i)->toDateString();
			//echo "<pre>";print_r($date);"</pre>";exit;
            //$result = $projectview->where('projectid', '=', $projectid)->where('created', '=', $date)->count();
			$result = $projectview->where('projectid', '=', $projectid)->where('created', '=', $date)->count();
			//echo "<pre>";print_r($result);"</pre>";exit;
            $a = array('prodate' => $date, 'count' => $result);
            array_push($stack, $a);
			//echo "<pre>";print_r($a);"</pre>";exit;
        }
        $temp = $stack;
        $reverseArray = array_reverse($temp);
		//echo count($reverseArray);exit;
        //print_r($temp[0]);exit;
        //$max = max($temp);
        //$json = json_encode($temp);
        return $reverseArray;
    }

}
