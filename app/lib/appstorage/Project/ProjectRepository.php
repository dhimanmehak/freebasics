<?php

namespace appstorage\Project;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Project;

class ProjectRepository {

    public function all() {
        $project = new Project;
        return $project->paginate(5);
    }

    public function getall() {
        $project = new Project;
        $data = array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname');
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.isfunded', '=', 0)->where('projects.idverified', '=', 2)->where('projects.proofverified', '=', 2)->where('projects.fundinggoal', '!=', 0)->where('projects.idverified', '=', 2)->where('projects.proofverified', '=', 2)->paginate(2, $data);
        foreach ($temp as $t) {
            $created = new Carbon($t['verifiedon']);
            $today = Carbon::now();
            $difference = $created->diffInDays($today);
            $dayscount = $t['fundingduration'] - $difference;
            $t['dayscount'] = $dayscount;
            $t['enddate'] = $today->addDays($dayscount)->toFormattedDateString();
        }
        return $temp;
    }

    public function getbyprojectid($projectid) {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.id', '=', $projectid)->where('projects.isfunded', '=', 0)->where('projects.idverified', '=', 2)->where('projects.proofverified', '=', 2)->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname'));
        foreach ($temp as $t) {
            $created = new Carbon($t['verifiedon']);
            $today = Carbon::now();
            $difference = $created->diffInDays($today);
            $dayscount = $t['fundingduration'] - $difference;
            $t['dayscount'] = $dayscount;
            $t['enddate'] = $today->addDays($dayscount)->toFormattedDateString();
        }
        return $temp;
    }

    public function updatelistingfee($projectid) {
        $project = new Project;
        $data = $project->find($projectid);
        $data->feerecieved = 1;
        $data->save();
    }

    public function getdetailsbyprojectid($id) {
        $project = new Project;
        $temp = $project->join('users', 'users.id', '=', 'projects.userid')->join('countries', 'projects.location', '=', 'countries.id')->join('categories', 'categories.id', '=', 'projects.categoryid')->where('projects.id', '=', $id)->first(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.projectimage', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.description', 'projects.createdon', 'projects.risks', 'projects.categoryid', 'categories.categoryname', 'users.firstname', 'users.lastname', 'users.country', 'users.state', 'users.biography', 'users.lastlogindate', 'countries.countryname', 'projects.location', 'countries.currencysymbol', 'users.image', 'users.weburl', 'users.createdcount', 'users.backedcount', 'projects.userid', 'users.email', 'projects.idverified', 'projects.proofverified', 'projects.metatitle', 'projects.metakeyword', 'projects.metadescription', 'countries.currencytype', 'projects.likes', 'projects.feerecieved', 'users.followingcount', 'users.followerscount', 'projects.feerecieved', 'projects.endingon'));
        $created = new Carbon($temp['verifiedon']);
        $today = Carbon::now();
        $difference = $created->diffInDays($today);
        $dayscount = $temp['fundingduration'] - $difference;
        $temp['dayscount'] = $dayscount;
        $temp['enddate'] = $today->addDays($dayscount)->toFormattedDateString();
        $fromcurrency = $temp['currencytype'];
        if (Session::has('currency')) {
            $tocurrency = Session::get('currency');
            $currencyrepo = new CurrencyRepo;
            $rate = $currencyrepo->convertcurrency($fromcurrency, $tocurrency);
            $symbol = $currencyrepo->getsymbol($tocurrency);
            $temp['rate'] = $rate;
            $temp['currencysymbol'] = $symbol;
        } else {
            $temp['rate'] = 1;
        }
        return $temp;
    }

    public function getpaypalemailbyid($projectid) {
        $project = new Project;
        return $project->where('id', '=', $projectid)->pluck('paypalemail');
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

    public function getbasicdetailsbyid($id) {
        $project = new Project;
        return $project->where('id', '=', $id)->first();
    }

    public function getbyprojectidforpledge($id) {
        $project = new Project;
        return $project->join('users', 'users.id', '=', 'projects.userid')->where('projects.id', '=', $id)->where('users.creatorpledges', '=', 1)->first(array('projects.id', 'projects.title', 'users.firstname', 'users.lastname', 'projects.userid', 'users.email', 'projects.likes', 'projects.feerecieved'));
    }

    public function getbysearchterm($input) {
        $project = new Project;
        $searchTerms = explode(' ', $input);
        foreach ($searchTerms as $term) {
            $temp = $project->where('fundinggoal', '!=', 0)->where('projects.idverified', '=', 2)->where('projects.proofverified', '=', 2)
                            ->where(function($query)use($term) {
                                $query->where('title', 'LIKE', '%' . $term . '%')->orwhere('users.firstname', 'LIKE', '%' . $term . '%')->orwhere('countryname', 'LIKE', '%' . $term . '%')->orwhere('lastname', 'LIKE', '%' . $term . '%')->orwhere('categoryname', 'LIKE', '%' . $term . '%');
                            })
                            ->leftjoin('users', 'projects.userid', '=', 'users.id')->leftjoin('categories', 'projects.categoryid', '=', 'categories.id')->leftjoin('countries', 'projects.location', '=', 'countries.id')->get(array('projects.id', 'projects.title', 'projects.fundinggoal', 'projects.totalbacking', 'projects.shortblurb', 'projects.projectvideo', 'projects.totalpledgeamount', 'projects.fundingduration', 'projects.isfunded', 'projects.createdon', 'projects.risks', 'categories.categoryname', 'users.firstname', 'users.lastname', 'projects.projectimage', 'countries.countryname', 'countries.currencysymbol', 'countries.currencytype', 'projects.likes', 'projects.feerecieved'));
        }
        foreach ($temp as $t) {
            $created = new Carbon($t['verifiedon']);
            $today = Carbon::now();
            $difference = $created->diffInDays($today);
            $dayscount = $t['fundingduration'] - $difference;
            $t['dayscount'] = $dayscount;
            $t['enddate'] = $today->addDays($dayscount)->toFormattedDateString();
            $t['rate'] = 1;
        }
        return $temp;
    }

}
