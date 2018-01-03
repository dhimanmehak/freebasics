<?php

use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\Backing\BackingRepository as BackingRepository;
use fundstarter\storage\Reward\RewardRepository as RewardRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Country\CountryRepository as CountryRepository;

class BackingController extends BaseController {

    public function __construct(ProjectRepository $projectRepository, BackingRepository $backingRepository, RewardRepository $rewardRepository, UserRepository $userRepository, CountryRepository $countryRepository) {
        $this->project = $projectRepository;
        $this->backing = $backingRepository;
        $this->reward = $rewardRepository;
        $this->user = $userRepository;
        $this->country = $countryRepository;
    }

    public function index() {
        $projects = $this->project->getall();
        return View::make('adminviews.backing.backproject', compact('projects'));
    }

    public function backinglist() {
        $getdetails = $this->backing->getalldetails();
        return View::make('adminviews.backing.backinglist', compact('getdetails'));
    }

    public function backingbyprojectid() {
        $projectid = Input::get('id');
        $getdetails = $this->backing->getbyprojectid($projectid);
        return View::make('adminviews.backing.backingbyproject', compact('getdetails', 'projectid'));
    }

    public function projectpreview() {
        $id = Input::get('id');
        $project = $this->project->getbyprojectid($id);
        $rewards = $this->reward->getbyprojectid($id);
        return View::make('adminviews.backing.projectpreview', compact('project', 'rewards'));
    }

    public function backthisproject() {
        $id = Input::get('id');
        $project = $this->project->getbyprojectid($id);
        $rewards = $this->reward->getbyprojectid($id);
        $users = $this->user->all();
        return View::make('adminviews.backing.backthisproject', compact('project', 'rewards', 'users'));
    }

    public function postbacking() {
        $input = Input::all();
        $pledgeamount = $input['pledgeamount'];
        $projectid = Input::get('projectid');
        $projectdetail = $this->project->getbyprojectid($projectid);
        $rewardid = $input['rewardid'];
        $userid = $input['userid'];
        $email = Session::get('email');
        $countries = $this->country->all();
        if ($input['pledgeamount'] == 0) {
            Session::flash('failed', 'Please enter some valid amount!!!');
            return Redirect::back();
        } else {
            if ($input['rewardid'] != 0) {
                $pledgeamount = $this->reward->checkpledge($input['rewardid']);
                if ($pledgeamount > $input['pledgeamount']) {
                    Session::flash('failed', 'Select reward less than or equal to pledge amount you entered!!!');
                    return Redirect::back();
                } else {
                    $backingdetail = array('countries' => $countries, 'projectdetail' => $projectdetail, 'rewardid' => $rewardid, 'userid' => $userid, 'pledgeamount' => $pledgeamount);
                    Session::put('backingdetail', $backingdetail);
                    return Redirect::to('getpaymentdetails');
                }
            } else {
                $backingdetail = array('countries' => $countries, 'projectdetail' => $projectdetail, 'rewardid' => $rewardid, 'userid' => $userid, 'pledgeamount' => $pledgeamount);
                Session::put('backingdetail', $backingdetail);
                return Redirect::to('getpaymentdetails');
            }
        }
    }

    public function paymentdetails() {
        $backingid = Input::get('id');
        $backing = $this->backing->getbyid($backingid);
        $projectid = $backing['projectid'];
        $project = $this->project->getbyprojectid($projectid);
        $countries = $this->country->all();
        return View::make('adminviews.backing.paymentdetails', compact('backingid', 'projectid', 'project', 'countries', 'backing'));
    }

    public function postpayment() {
        $input = Input::all();
        if (Input::has('remember')) {
            $input['remember'] = 1;
        } else {
            $input['remember'] = 0;
        }
        $this->backing->savepaymentdetails($input);
        Session::flash('success', 'Backing Successfully Added');
        return Redirect::to('backinglist');
    }

    public function deletebacking() {
        $id = Input::get('id');
        $this->backing->deletebyid($id);
        Session::flash('success', 'Backing Successfully Deleted');
        return Redirect::back();
    }

    public function deletemultiple() {
        $ids = Input::get('checkbox');
        foreach ($ids as $id) {
            Backing::where('id', '=', $id)->delete();
        }
        Session::flash('success', 'Backing Successfully Deleted');
        return Redirect::back();
    }

    public function sample() {
        return $this->backing->getcomputeddetails();
    }

    public function exportbackers() {
        $projectid = Input::get('id');
        $table = $this->backing->getbyprojectid($projectid);
        $body = "";
        $top = "<table>
		<thead>
		   <tr>
		      <th>S.No</th>
                      <th>Project Name</th>
		      <th>Backer Name</th>
                      <th>Email</th> 
                      <th>Contact</th> 
                      <th>Reward</th> 
                    </tr>
                  </thead>
                  <tbody>";
        $bottom = "</tbody></table>";
        $i = 1;
        foreach ($table as $value) {
            $body .= "<tr>
		 <td>$i</td>
		<td>$value->title</td>
		<td>$value->firstname $value->lastname</td>
		<td>$value->email</td>
		<td>$value->mobile</td>
		<td>$value->description</td>
		</tr>";
            $i++;
        }
        $output = $top . $body . $bottom;
        $headers = array('Pragma' => 'public',
            'Expires' => 'public',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Cache-Control' => 'private',
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename=backers.xls',
            'Content-Transfer-Encoding' => ' binary');
        return Response::make($output, 200, $headers);
    }

}
