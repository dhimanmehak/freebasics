<?php

namespace fundstarter\storage\Project;

use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepo;
use fundstarter\storage\User\UserRepository as UserRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Project;
use Illuminate\Support\Facades\Config;

class ProjectRepository implements IProjectRepository {

    public function all() {
        $project = new Project;
        return $project->all();
    }

    public function gethighesttotalpledge() {
        $project = new Project;
        return $project->max('totalpledgeamount');
    }

    public function create(array $input) {
        $exists = $this->checkalreadyexists($input['title']);
        if ($exists == '') {
            $project = new Project;
            $project->title = $input['title'];
            $project->userid = $input['userid'];
            $project->location = $input['countryid'];
            $project->categoryid = $input['categoryid'];
            $project->createdon = Carbon::now();
            $project->save();
            return $project->id;
        } else {
            return 0;
        }
    }

    public function updatefunded($id) {
        $project = new Project;
        $data = $project->find($id);
        $data->isfunded = 1;
        $data->save();
    }

    public function checkalreadyexists($title) {
        $project = new Project;
        return $project->where('title', '=', $title)->pluck('id');
    }

    public function getbyprojectoftheday() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.projectverified', '=', 2)->where('projects.endingon', '>', Carbon::now()->toDateString())->orderBy('projectoftheday', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.projectoftheday', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getbypopularprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.projectverified', '=', 2)->where('projects.endingon', '>', Carbon::now()->toDateString())->orderBy('popular', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.popular', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getnewandnoteworthyprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.projectverified', '=', 2)->where('projects.endingon', '>', Carbon::now()->toDateString())->orderBy('newandnoteworthy', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.newandnoteworthy', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getall() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.verifiedon', 'users.email', 'projects.userid'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getallbyuserforadmin($userid) {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.userid', '=', $userid)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.projectimage'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $details;
    }

    public function getallbyuser($userid) {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->join('countries', 'projects.location', '=', 'countries.id')->where('projects.projectverified', '=', 2)->where('projects.fundinggoal', '!=', 0)->where('projects.userid', '=', $userid)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.projectimage', 'countries.countryname'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $details;
    }

    public function getliveandexpiredprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 0)->where('projects.projectverified', '=', 2)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getallfundedprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 1)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getliveprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 0)->where('projects.projectverified', '=', 2)->where('projects.endingon', '>', Carbon::now()->toDateString())->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getfailedprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 0)->where('projects.projectverified', '=', 2)->where('projects.endingon', '<', Carbon::now()->toDateString())->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getpendingprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 0)->where('projects.projectverified', '=', 1)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getsuspendedprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 0)->where('projects.projectverified', '=', 3)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function getallnewprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 0)->where('projects.verifiedon', '=', Carbon::now()->toDateString())->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved', 'projects.endingon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

//    public function getforverification() {
//        $project = new Project;
//        $details = $project->where(function ($query) {
//                    $query->where('projects.projectverified', '=', 1)->where('projects.proofverified', '=', 1);
//                })->orwhere(function ($query) {
//                    $query->where('projects.projectverified', '=', 3)->where('projects.proofverified', '=', 3);
//                })->orwhere(function ($query) {
//                    $query->where('projects.projectverified', '=', 2)->where('projects.proofverified', '=', 2);
//                })->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->orderBy('updatedon', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.createdon', 'projects.projectverified', 'projects.updatedon', 'projects.likes', 'projects.feerecieved'));
//
//        //  $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.projectverified', '=', 1)->where('projects.proofverified', '=', 1)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.createdon', 'projects.projectverified', 'projects.proofverified', 'projects.updatedon'));
//        foreach ($details as $detail) {
//            $created = new Carbon($detail['verifiedon']);
//            $today = Carbon::now();
//            $difference = $created->diffInDays($today);
//            $dayscount = $detail['fundingduration'] - $difference;
//            $detail['dayscount'] = $dayscount;
//        }
//        return $details;
//    }


    public function getaddressbyid($id) {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.id', '=', $id)->first(array('projects.id', 'projects.title', 'projects.address1', 'projects.address2', 'projects.city', 'projects.state', 'projects.country', 'projects.pincode', 'users.firstname', 'users.lastname', 'projects.recipient', 'projects.businessname', 'projects.businesstype', 'projects.projectverified', 'projects.paypalemail', 'projects.prooftype', 'projects.identityproof', 'projects.updatedon', 'users.mobile', 'projects.likes', 'projects.feerecieved', 'projects.remarks'));
        return $details;
    }

    public function updatedeleteverification($id) {
        $project = new Project;
        $data = $project->find($id);
        $data->projectverified = 4;
        $data->proofverified = 4;
        $data->save();
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $project = $this->find($id)->first();
        $project->id = $input['id'];
        $project->title = $input['title'];
        $project->userid = $input['userid'];
        $project->categoryid = $input['categoryid'];
        $project->subcategoryid = $input['subcategoryid'];
        $project->shortblurb = $input['shortblurb'];
        $project->location = $input['location'];
        $project->fundingduration = $input['fundingduration'];
        $project->fundinggoal = $input['fundinggoal'];
        $project->currencyid = $input['currencyid'];
        $project->projectimage = $input['projectimage'];
        $project->projectvideo = $input['projectvideo'];
        $project->description = $input['description'];
        $project->risks = $input['risks'];
        $project->isfunded = $input['isfunded'];
        $project->createdon = $input['createdon'];
        $project->updatedon = $input['updatedon'];
        $project->save();
    }

    /*
      public function updateprojectdetails(array $input) {
      $project = new Project;
      $data = $project->find($input['id']);
      $data->categoryid = $input['categoryid'];
      $data->shortblurb = $input['shortblurb'];
      $data->location = $input['country'];
      $data->fundingduration = $input['fundingduration'];
      $data->fundinggoal = $input['fundinggoal'];
      $date = new Carbon($data->createdon);
      $enddate = $date->addDays($input['fundingduration']);
      $data->endingon = $enddate->toDateString();
      if ($input['projectimage'] != '') {
      $data->projectimage = $input['projectimage'];
      }
      $data->save();
      }
     */

    public function updateprojectdetails(array $input) {
        $project = new Project;
        $data = $project->find($input['id']);
        $data->categoryid = $input['categoryid'];
        $data->shortblurb = $input['shortblurb'];
        $data->location = $input['country'];
        $data->fundingduration = $input['fundingduration'];
        $data->fundinggoal = $input['fundinggoal'];
        $data->currencyid = $input['currencyid'];
        $data->endingon = $input['endingon'];
        if ($input['projectimage'] != '') {
            $data->projectimage = $input['projectimage'];
        }
        $data->save();
    }

    public function updateprojectstory(array $input) {
        $project = new Project;
        $data = $project->find($input['id']);
        if ($input['projectvideo'] != '') {
            $data->projectvideo = $input['projectvideo'];
        }
        $data->description = $input['description'];
        $data->risks = $input['risks'];
        $data->save();
    }

    public function getbyid($id) {
        $project = new Project;
        return $project->where('id', '=', $id)->get();
    }

    public function getbasicdetailsbyid($id) {
        $project = new Project;
        //$t = $project->where('id', '=', $id)->first();
        $t = $project->join('users', 'users.id', '=', 'projects.userid')
                        ->join('countries', 'projects.location', '=', 'countries.id')
                        ->join('categories', 'categories.id', '=', 'projects.categoryid')
                        ->where('projects.id', '=', $id)->first(array('projects.id', 'projects.title', 'projects.remarks',
            'projects.fundinggoal', 'projects.projectimage', 'projects.totalbacking', 'projects.shortblurb',
            'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.fundinggoal',
            'projects.description', 'projects.createdon', 'projects.risks', 'projects.categoryid', 'categories.categoryname', 'users.firstname', 'users.lastname',
            'users.country', 'users.state', 'users.biography', 'users.lastlogindate', 'users.dob', 'users.privilege', 'countries.countryname', 'projects.location',
            'countries.currencysymbol', 'users.image', 'users.weburl', 'users.createdcount', 'users.backedcount', 'projects.userid', 'users.email', 'users.mobile',
            'projects.projectverified', 'projects.metatitle', 'projects.metakeyword', 'projects.metadescription', 'countries.currencytype', 'projects.likes',
            'projects.feerecieved', 'users.followingcount', 'users.followerscount', 'projects.feerecieved', 'projects.endingon', 'projects.verifiedon', 'projects.currencyid'
        ));
        if ($t['endingon'] == "0000-00-00") {
            $t['dayscount'] = 0;
            $t['enddate'] = 0;
        } else {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $t;
    }

    public function deletebyid($id) {
        $project = new Project;
        return $project->where('id', '=', $id)->delete();
    }

    public function getprojectcount() {
        $project = new Project;
        return $project->where('fundinggoal', '!=', 0)->count();
    }

    public function gettotalfund() {
        $project = new Project;
        return $project->sum('totalpledgeamount');
    }

    public function getfundedprojectcount() {
        $project = new Project;
        return $project->where('isfunded', '=', 1)->count();
    }

    public function recentproject() {
        $project = new Project;
        return $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->orderBy('projects.createdon', 'desc')->where('projects.projectverified', '=', 2)->limit(10)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.likes', 'projects.feerecieved'));
    }

    public function getbyprojectidcreator($id) {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')
                        ->join('countries', 'projects.location', '=', 'countries.id')
                        ->join('categories', 'categories.id', '=', 'projects.categoryid')
                        ->where('projects.id', '=', $id)->first(array('projects.id', 'projects.title',
            'projects.fundinggoal', 'projects.projectimage', 'projects.totalbacking', 'projects.shortblurb',
            'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded',
            'projects.description', 'projects.createdon', 'projects.risks', 'projects.categoryid', 'categories.categoryname', 'users.firstname', 'users.lastname',
            'users.country', 'users.state', 'users.biography', 'users.lastlogindate', 'users.dob', 'users.privilege', 'countries.countryname', 'projects.location',
            'countries.currencysymbol', 'users.image', 'users.weburl', 'users.createdcount', 'users.backedcount', 'projects.userid', 'users.email', 'users.mobile',
            'projects.projectverified', 'projects.metatitle', 'projects.metakeyword', 'projects.metadescription', 'countries.currencytype', 'projects.likes',
            'projects.feerecieved', 'users.followingcount', 'users.followerscount', 'projects.feerecieved', 'projects.endingon', 'projects.remarks', 'projects.verifiedon', 'projects.currencyid'
        ));
        $endingon = new Carbon($temp['endingon']);
        $today = Carbon::now();
        $difference = $today->diffInDays($endingon, false);
        $temp['dayscount'] = $difference;
        $temp['enddate'] = $endingon;
        if ($temp['currencyid'] != '') {
            $currencyrepo = new CurrencyRepo;
            $currecny = $currencyrepo->getcurrencybyid($temp['currencyid']);
            $rate = $currecny['currencyrate'];
            $symbol = $currecny['currencysymbol'];
            $temp['rate'] = $rate;
            $temp['currencysymbol'] = $symbol;
        } else {
            $currencytype = Config::get('adminconfig.currency');
            $currencyrepo = new CurrencyRepo;
            $currencyid = $currencyrepo->getidbytype($currencytype);
            $currencysymbol = $currencyrepo->getsymbol($currencytype);
            $temp['currencysymbol'] = $currencysymbol;
            $temp['rate'] = 1;
            $temp['currencyid'] = $currencyid;
        }
        return $temp;
    }

    public function getbyprojectid($id) {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')
                        ->join('countries', 'projects.location', '=', 'countries.id')
                        ->join('categories', 'categories.id', '=', 'projects.categoryid')
                        ->where('projects.id', '=', $id)->first(array('projects.id', 'projects.title', 'projects.remarks',
            'projects.fundinggoal', 'projects.projectimage', 'projects.totalbacking', 'projects.shortblurb',
            'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded',
            'projects.description', 'projects.createdon', 'projects.risks', 'projects.categoryid', 'categories.categoryname', 'users.firstname', 'users.lastname',
            'users.country', 'users.state', 'users.biography', 'users.lastlogindate', 'users.dob', 'users.privilege', 'countries.countryname', 'projects.location',
            'countries.currencysymbol', 'users.image', 'users.weburl', 'users.createdcount', 'users.backedcount', 'projects.userid', 'users.email', 'users.mobile',
            'projects.projectverified', 'projects.metatitle', 'projects.metakeyword', 'projects.metadescription', 'countries.currencytype', 'projects.likes',
            'projects.feerecieved', 'users.followingcount', 'users.followerscount', 'projects.feerecieved', 'projects.endingon', 'projects.verifiedon', 'projects.currencyid', 'users.username', 'users.logintype'
        ));
        $endingon = new Carbon($temp['endingon']);
        $today = Carbon::now();
        $difference = $today->diffInDays($endingon, false);
        $temp['dayscount'] = $difference;
        $temp['enddate'] = $endingon;
        //$fromcurrency = $temp['currencytype'];
        if (Session::has('currency')) {
            $tocurrency = Session::get('currency');
            $currencyrepo = new CurrencyRepo;
            $currencyid = $currencyrepo->getidbytype($tocurrency);
            $currecny = $currencyrepo->getcurrencybyid($currencyid);
            $rate = $currecny['currencyrate'];
            $symbol = $currecny['currencysymbol'];
            //$rate = $currencyrepo->convertcurrency($fromcurrency, $tocurrency);
            //$symbol = $currencyrepo->getsymbol($tocurrency);
            $temp['rate'] = $rate;
            $temp['currencysymbol'] = $symbol;
        } else {
            $temp['rate'] = 1;
        }
        return $temp;
    }

    public function getfirstbyid($id) {
        $project = new Project;
        return $project->join('users', 'users.id', '=', 'projects.userid')->where('projects.id', '=', $id)->where('users.creatorcomments', '=', 1)->first(array('projects.id', 'projects.title', 'users.firstname', 'users.lastname', 'projects.userid', 'users.email', 'projects.likes', 'projects.feerecieved'));
    }

    public function getbyprojectidforpledge($id) {
        $project = new Project;
        return $project->join('users', 'users.id', '=', 'projects.userid')->where('projects.id', '=', $id)->where('users.creatorpledges', '=', 1)->first(array('projects.id', 'projects.title', 'users.firstname', 'users.lastname', 'projects.userid', 'users.email', 'projects.likes', 'projects.feerecieved'));
    }

    public function getbycategory() {
        $project = new Project;
        return $project->join('categories', 'categories.id', '=', 'projects.categoryid')->groupBy('categoryid')->where('projects.projectverified', '=', 2)->get();
    }

    public function getcountbycategory($id) {
        $project = new Project;
        return $project->where('categoryid', '=', $id)->where('projects.projectverified', '=', 2)->where('fundinggoal', '!=', 0)->count();
    }

    public function getprojectsearchbycountry($name) {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('countries.countryname', '=', $name)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function getallprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('projects.isfunded', '=', 0)->where('projects.totalpledgeamount', '!=', 0)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.endingon', 'projects.verifiedon'));
        foreach ($details as $t) {
            $enddate = new Carbon($t['endingon']);
            $today = Carbon::today();
            $fundinggoal = $t['fundinggoal'];
            $totalpledgeamount = $t['totalpledgeamount'];
            $difference = $today->diffInDays($enddate, false);
            if ($difference <= 0) {
                if ($totalpledgeamount >= $fundinggoal) {
                    $t['selected'] = "yes";
                } else {
                    $t['selected'] = "no";
                }
            } else {
                $t['selected'] = "null";
            }
        }
        return $details;
    }

    public function getprojectsearchbycategoryandcountry($id, $sort, $term, $countryid) {
        if ($sort == "magic") {
            $temp = $this->getsearchbymagic($id, $term, $countryid);
        } elseif ($sort == "popular") {
            $temp = $this->getsearchbypopularity($id, $term, $countryid);
        } elseif ($sort == "new") {
            $temp = $this->getsearchbynewest($id, $term, $countryid);
        } elseif ($sort == "enddate") {
            $temp = $this->getsearchbyenddate($id, $term, $countryid);
        } else {
            $temp = $this->getsearchbymostfunded($id, $term, $countryid);
        }
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function getsearchbymagic($id, $input, $countryid) {
        $project = new Project;
        $searchTerms = explode(' ', $input);
        if ($id == "all") {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        } else {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        }
    }

    public function getsearchbypopularity($id, $input, $countryid) {
        $project = new Project;
        $searchTerms = explode(' ', $input);
        if ($id == "all") {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalbacking', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalbacking', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        } else {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalbacking', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalbacking', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        }
    }

    public function getsearchbynewest($id, $input, $countryid) {
        $project = new Project;
        $searchTerms = explode(' ', $input);
        if ($id == "all") {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.id', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.id', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        } else {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.id', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.id', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        }
    }

    public function getsearchbyenddate($id, $input, $countryid) {
        $project = new Project;
        $searchTerms = explode(' ', $input);
        if ($id == "all") {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.endingon', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.endingon', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        } else {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.endingon', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.endingon', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        }
    }

    public function getsearchbymostfunded($id, $input, $countryid) {
        $project = new Project;
        $searchTerms = explode(' ', $input);
        if ($id == "all") {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalpledgeamount', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalpledgeamount', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        } else {
            if ($countryid == "all") {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalpledgeamount', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            } else {
                foreach ($searchTerms as $term) {
                    return $temp = $project->where('fundinggoal', '!=', 0)->where('projects.categoryid', '=', $id)->where('projects.location', '=', $countryid)->where('projects.projectverified', '=', 2)
                                    ->where(function($query)use($term) {
                                        $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                                    })
                                    ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->orderBy('projects.totalpledgeamount', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
                }
            }
        }
    }

    public function getprojectsbycategory($id, $sort) {
        if ($sort == "magic") {
            $temp = $this->getbymagic($id);
            // print_r($temp);exit;
        } elseif ($sort == "popular") {
            $temp = $this->getbypopularity($id);
        } elseif ($sort == "new") {
            $temp = $this->getbynewest($id);
        } elseif ($sort == "enddate") {
            $temp = $this->getbyenddate($id);
        } else {
            $temp = $this->getbymostfunded($id);
        }
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function getbymagic($id) {
        $project = new Project;
        if ($id == "all") {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        } else {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('projects.categoryid', '=', $id)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        }
    }

    public function getbypopularity($id) {
        $project = new Project;
        if ($id == "all") {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->orderBy('projects.totalbacking', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        } else {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('projects.categoryid', '=', $id)->orderBy('projects.totalbacking', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        }
    }

    public function getbynewest($id) {
        $project = new Project;
        if ($id == "all") {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->orderBy('projects.id', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        } else {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('projects.categoryid', '=', $id)->orderBy('projects.id', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        }
    }

    public function getbyenddate($id) {
        $project = new Project;
        if ($id == "all") {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->orderBy('projects.endingon', 'asc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        } else {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.categoryid', '=', $id)->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->orderBy('projects.endingon', 'asc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        }
    }

    public function getbymostfunded($id) {
        $project = new Project;
        if ($id == "all") {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->orderBy('projects.totalpledgeamount', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        } else {
            return $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('projects.categoryid', '=', $id)->orderBy('projects.totalpledgeamount', 'desc')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        }
    }

    /* ============== User =============== */

    public function getprojectsbyuserid($id) {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->where('projects.userid', '=', $id)->orderBy('projects.totalpledgeamount', 'desc')->
                get(array('projects.id', 'projects.title', 'projects.projectimage', 'users.lastname', 'users.firstname', 'projects.projectimage', 'projects.shortblurb', 'projects.projectverified', 'projects.endingon'));
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
        }
        return $temp;
    }

    public function getfirstpopularbycateogory($id) {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->orderBy('projects.totalbacking', 'desc')->orderBy('projects.id', 'desc')->orderBy('categories.categoryname', 'asc')->where('categories.status', 'active')->where('projects.categoryid', '=', $id)->where('projects.fundinggoal', '!=', 0)->where('endingon', '>=', Carbon::now()->toDateString())->where('projects.projectverified', '=', 2)->limit(1)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'projects.endingon', 'countries.countryname', 'projects.categoryid', 'countries.currencysymbol', 'countries.currencytype', 'projects.likes', 'projects.feerecieved', 'projects.verifiedon', 'projects.categoryid', 'projects.currencyid'));
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function getpopularprojects() {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->orderBy('projects.totalbacking', 'desc')->where('projects.popular', '=', 1)->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->limit(3)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.verifiedon', 'projects.endingon', 'projects.currencyid'));
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function getnewprojects() {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->orderBy('projects.totalbacking', 'desc')->orderBy('projects.id', 'desc')->where('projects.newandnoteworthy', '=', 1)->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->limit(3)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'projects.projectimage', 'countries.countryname', 'countries.currencytype', 'countries.currencysymbol', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function getstarredprojects() {
        $project = new Project;
        $result = array();
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('starredprojects', 'starredprojects.projectid', '=', 'projects.id')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->orderBy('projects.totalbacking', 'desc')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.endingon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'starredprojects.userid', 'projects.feerecieved', 'projects.currencyid', 'projects.likes'));
        foreach ($temp as $t) {
            $email = Session::get('email');
            $userrepo = new UserRepo;
            $id = $userrepo->getidbyemail($email);
            if ($id == $t->userid) {
                $endingon = new Carbon($t['endingon']);
                $today = Carbon::now();
                $difference = $today->diffInDays($endingon, false);
                $t['dayscount'] = $difference;
                if ($difference >= 0) {
                    array_push($result, $t);
                }
            }
        }
        return $result;
    }

    public function updatefeaturedifexpired() {
        $project = new Project;
        return $project->where('endingon', '<', Carbon::now()->toDateString())->update(array('popular' => 0, 'newandnoteworthy' => 0, 'projectoftheday' => 0));
    }

    public function getprojectoftheday() {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.projectoftheday', '=', 1)->where('projects.projectverified', '=', 2)->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->orderBy('projects.totalbacking', 'desc')->orderBy('projects.id', 'desc')->limit(3)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'projects.categoryid', 'countries.currencysymbol', 'countries.currencytype', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function saveuserproject(array $input) {
        $project = new Project;
        $project->title = $input['title'];
        $project->categoryid = $input['category'];
        $project->userid = $input['userid'];
        $project->location = $input['country'];
        $project->createdon = Carbon::now();
        $project->feerecieved = $input['feerecieved'];
        $project->save();
        return $project->id;
    }

    public function saveuserbasic(array $input) {
        //echo "<pre>";print_r($_POST);
        //echo "<pre>";print_r($_POST);exit;
        $project = new Project;
        $data = $project->find($input['id']);
        $data->title = $input['title'];
        $data->categoryid = $input['category'];
        $data->userid = $input['userid'];
        if ($input['image'] != '') {
            $data->projectimage = $input['image'];
        }
        //echo $input['image'];exit;
        $data->location = $input['location'];
        $data->currencyid = $input['currencyid'];
        $data->shortblurb = $input['shortblurb'];
        $data->fundingduration = $input['fundingduration'];
        $data->fundinggoal = $input['fundinggoal'];
        $data->endingon = $input['endingon'];
        $data->save();
    }

    public function updatetotalbacking($projectid, $pledgeamount) {
        $project = new Project;
        $data = $project->find($projectid);
        $totalbacking = $data->totalbacking + 1;
        $totalpledgeamount = $data->totalpledgeamount + $pledgeamount;
        $data->totalbacking = $totalbacking;
        $data->totalpledgeamount = $totalpledgeamount;
        $data->save();
    }

    public function updatecredittotalbacking($projectid, $pledgeamount) {
        $project = new Project;
        $data = $project->find($projectid);
        $totalcreditbacking = $data->totalcreditbacking + 1;
        $totalcreditamount = $data->totalcreditamount + $pledgeamount;
        $data->totalcreditbacking = $totalcreditbacking;
        $data->totalcreditamount = $totalcreditamount;
        $data->save();
    }

    public function getunlaunchedprojectbyuserid($userid) { //projects in draft and pending to be deleted.
        $project = new Project;
        return $temp = $project->where('userid', '=', $userid)->where(function($query) {
                    $query->where('projects.projectverified', '=', 1)->orwhere('projects.projectverified', '=', 0);
                })->get();
    }

    public function getbysearchterm($input) {
        $project = new Project;
        $searchTerms = explode(' ', $input);
        foreach ($searchTerms as $term) {
            $temp = $project->where('fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('categories.status', '=', 'active')
                            ->where(function($query)use($term) {
                                $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                            })
                            ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencysymbol', 'countries.currencytype', 'projects.likes', 'projects.feerecieved', 'projects.endingon', 'projects.currencyid'));
        }
        foreach ($temp as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
            if (Session::has('currency')) {
                $tocurrency = Session::get('currency');
                $currencyrepo = new CurrencyRepo;
                $currencyid = $currencyrepo->getidbytype($tocurrency);
                $currecny = $currencyrepo->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $symbol = $currecny['currencysymbol'];
                $t['rate'] = $rate;
                $t['currencysymbol'] = $symbol;
            } else {
                $t['rate'] = 1;
            }
        }
        return $temp;
    }

    public function getfundinggoalbyid($id) {
        $project = new Project;
        return $project->where('endingon', '=', Carbon::now()->toDateString())->where('id', '=', $id)->get();
    }

    public function getfundedprojects() {
        $project = new Project;
        $details = $project->join('users', 'users.id', '=', 'projects.userid')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.fundinggoal', '!=', 0)->where('projects.projectverified', '=', 2)->where('projects.isfunded', '=', 0)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'categories.categoryname', 'users.firstname', 'projects.createdon', 'projects.endingon', 'projects.likes', 'projects.verifiedon'));
        foreach ($details as $t) {
            $endingon = new Carbon($t['endingon']);
            $today = Carbon::now();
            $difference = $today->diffInDays($endingon, false);
            $t['dayscount'] = $difference;
            $t['enddate'] = $endingon;
        }
        return $details;
    }

    public function saveidentity(array $input) {
        $project = new Project;
        $data = $project->find($input['id']);
        $data->address1 = $input['address1'];
        $data->address2 = $input['address2'];
        $data->city = $input['city'];
        $data->state = $input['state'];
        $data->country = $input['country'];
        $data->pincode = $input['zipcode'];
        $data->recipient = $input['recipient'];
        $data->businessname = $input['business_name'];
        $data->businesstype = $input['business_type'];
        $data->paypalemail = $input['paypal_email'];
        $data->projectverified = 1;
        $data->save();
    }

    public function saveproof(array $input) {
        $project = new Project;
        $data = $project->find($input['id']);
        $data->prooftype = $input['prooftype'];
        $data->identityproof = $input['identityproof'];
        $data->proofverified = 1;
        $data->updatedon = Carbon::now();
        $data->save();
    }

    public function getpaypalemailbyid($projectid) {
        $project = new Project;
        return $project->where('id', '=', $projectid)->pluck('paypalemail');
    }

    public function getcurrencycode($projectid) {
        $project = new Project;
        return $project->join('countries', 'projects.location', '=', 'countries.id')->where('projects.id', '=', $projectid)->pluck('currencytype');
    }

    public function updateseo(array $input) {
        $project = new Project;
        $data = $project->find($input['id']);
        $data->metatitle = $input['metatitle'];
        $data->metakeyword = $input['metakeyword'];
        $data->metadescription = $input['metadescription'];
        $data->updatedon = Carbon::now();
        $data->save();
    }

    public function updatelikes($projectid, $count) {
        $project = new Project;
        $data = $project->find($projectid);
        $data->likes = $count;
        $data->save();
    }

    public function updatelistingfee($projectid) {
        $project = new Project;
        $data = $project->find($projectid);
        $data->feerecieved = 1;
        $data->save();
    }

    public function getuserid($id) {
        $project = new Project;
        return $project->where('id', '=', $id)->pluck('userid');
    }

    public function getuseridforliveproject($id) {
        $project = new Project;
        return $project->where('id', '=', $id)->where('projectverified', '=', 2)->pluck('userid');
    }

    public function getcountbycategoryandcountry($id, $countryid) {
        $project = new Project;
        return $project->where('categoryid', '=', $id)->where('location', '=', $countryid)->where('projects.projectverified', '=', 2)->where('fundinggoal', '!=', 0)->count();
    }

    public function updateprojectoftheday($id, $status) {
        $project = new Project;
        if ($status == 1) {
            $project->where('id', '=', $id)->update(array('projectoftheday' => 0));
            return 1;
        } else {
            $popcount = $project->where('projectoftheday', '=', 1)->count();
            if ($popcount < 1) {
                $project->where('id', '=', $id)->update(array('projectoftheday' => 1));
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function updatepopularprojects($id, $status) {
        $project = new Project;
        if ($status == 1) {
            $project->where('id', '=', $id)->update(array('popular' => 0));
            return 1;
        } else {
            $popcount = $project->where('popular', '=', 1)->count();
            if ($popcount < 3) {
                $project->where('id', '=', $id)->update(array('popular' => 1));
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function updatenewandnoteworthyprojects($id, $status) {
        $project = new Project;
        if ($status == 1) {
            $project->where('id', '=', $id)->update(array('newandnoteworthy' => 0));
            return 1;
        } else {
            $popcount = $project->where('newandnoteworthy', '=', 1)->count();
            if ($popcount < 3) {
                $project->where('id', '=', $id)->update(array('newandnoteworthy' => 1));
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function getprojectbyuser($userid, $projectid) {
        $project = new Project;
        return $project->where('id', '=', $projectid)->where('userid', '=', $userid)->pluck('id');
    }

    public function getcurrencyid($id) {
        $project = new Project;
        return $project->where('id', '=', $id)->pluck('currencyid');
    }

    public function updateprojectbyid(array $input) {
        $project = new Project;
        $data = $project->find($input['recieverid']);
        $data->remarks = $input['remarks'];
        $data->save();
    }

    public function getprojecttitlebyid($id) {
        $project = new Project;
        return $project->where('id', '=', $id)->pluck('title');
    }

    public function changerequestvalue($projectid, $fundinggoal, $fundingduration, $endingon) {
        $project = new Project;
        $data = $project->find($projectid);
        $data->fundinggoal = $fundinggoal;
        $data->fundingduration = $fundingduration;
        $data->endingon = $endingon;
        $data->save();
    }

}