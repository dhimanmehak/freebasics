<?php

use fundstarter\storage\Category\CategoryRepository as CategoryRepository;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Country\CountryRepository as CountryRepository;
use fundstarter\storage\Reward\RewardRepository as RewardRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;
use fundstarter\storage\Follow\FollowRepository as FollowRepository;
use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepository;
use Carbon\Carbon;

class ProjectController extends BaseController {

    public function __construct(CurrencyRepository $currecyRepository, FollowRepository $followRepository, AdminsettingRepository $adminsettingRepository, NewsletterRepository $newsletterRepository, CategoryRepository $categoryRepository, ProjectRepository $projectRepository, UserRepository $userRepository, CountryRepository $countryRepository, RewardRepository $rewardRepository) {
        $this->category = $categoryRepository;
        $this->project = $projectRepository;
        $this->user = $userRepository;
        $this->country = $countryRepository;
        $this->reward = $rewardRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->newsletter = $newsletterRepository;
        $this->follow = $followRepository;
        $this->currency = $currecyRepository;
    }

    public function index() {
        $fundedcount = count($this->project->getallfundedprojects());
        $livecount = count($this->project->getliveprojects());
        $failedcount = count($this->project->getfailedprojects());
        $totalcount = count($this->project->getall());
        $newcount = count($this->project->getallnewprojects());
        $suspendedcount=count($this->project->getsuspendedprojects());        
        $pendingcount = count($this->project->getpendingprojects());
        $fundedprojects = $this->project->getallfundedprojects();
        $liveprojects = $this->project->getliveprojects();
        $newprojects = $this->project->getallnewprojects();
        return View::make('adminviews.project.dashboard', compact('pendingcount','suspendedcount','fundedprojects', 'liveprojects', 'newprojects', 'newcount', 'livecount', 'failedcount', 'totalcount', 'fundedcount', 'projects'));
    }

    public function addproject() {
        $users = $this->user->all();
        $countries = $this->country->all();
        $categories = $this->category->all();
        return View::make('adminviews.project.addproject', compact('categories', 'users', 'countries'));
    }

    public function postaddproject() {
        $input = Input::all();
        $userid = $input['userid'];
        $result = $this->project->create($input);
        if ($result != 0) {
            $projectid = $result;
            $this->user->updatecreatedcount($userid);
            return Redirect::to('addprojectdetails?id=' . $projectid);
        } else {
            Session::flash('failed', 'This title already exists!!!');
            return Redirect::to('addproject');
        }
    }

    public function addprojectdetails() {
        $id = Input::get('id');
        $details = $this->project->getbasicdetailsbyid($id);
        $fundinggoal = $details['fundinggoal'];
		
		//echo $fundinggoal;
		
        $currencyid = $details['currencyid'];
		//echo $currencyid ;
        if ($fundinggoal != '' && $currencyid != '') {
            $currency = $this->currency->getcurrencybyid($currencyid);
            $rate = $currency['currencyrate'];
			//echo $currency;
			//echo $rate;
			
            $details['fundinggoal'] = $fundinggoal * $rate;
        }
        $title = $details['title'];
        $categoryid = $details['categoryid'];
        $userid = $details['userid'];
        $categories = $this->category->all();
        $countries = $this->country->all();
        $currencies = $this->currency->all();
        $users = $this->user->getuserbyid($userid);
        $rewards = $this->reward->getbyprojectidcreator($id);
        return View::make('adminviews.project.addprojectdetails', compact('currencies', 'id', 'title', 'categoryid', 'categories', 'userid', 'users', 'countries', 'details', 'rewards'));
    }

    public function postprojectdetails() {
        $rules = array(
            'projectimage' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:15000',
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            $project = Input::file('projectimage');
            if ($project != '') {
                $destinationPath = 'uploads/images/projects' . '/' . $input['title'];
                $projectmimetype = $project->getClientOriginalExtension();
                $filename = "projectimage";
                $file = $filename . '.' . $projectmimetype;
                $project->move($destinationPath, $file);
                $projectlink = $destinationPath . '/' . $file;
                $input['projectimage'] = $projectlink;
            } else {
                $input['projectimage'] = '';
            }
            $endingon = $input['fundingduration'];
            $datetime1 = Carbon::now();
            $datetime2 = new Carbon($input['fundingduration']);
            $interval = $datetime1->diff($datetime2);
            $temp = $interval->format('%a');
            $fundingduration = $temp + 1;
            $currecnyid = $input['currencyid'];
            $currecny = $this->currency->getcurrencybyid($currecnyid);
            //convert to default currency
            $rate = $currecny['currencyrate'];
            $fundinggoal = $input['fundinggoal'] * 1 / $rate;
            $input['fundinggoal'] = $fundinggoal;
            $input['fundingduration'] = $fundingduration;
            $input['endingon'] = $endingon;
            $this->project->updateprojectdetails($input);
            Session::flash('success', 'Project Updated Successfully');
            return Redirect::back();
        }
    }

    public function postprojectstory() {
        $rules = array(
            'projectvideo' => 'mimes:jpg,jpeg,bmp,gif,png,m4v,avi,flv,mp4,3gp,mov|max:15000',
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png,m4v,avi,flv,mp4,3gp,mov.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            Session::flash('error2', 'File type Error!');
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
        $youtube = Input::get('youtubelink');
        //return $youtube;
        $input = Input::all();
        $project = Input::file('projectvideo');
        //return $project;
        //echo "<pre>";print_r($_FILES);"</pre>";exit;
        if (($project != '') && ($youtube != '')) {
            Session::flash('error', 'You can upload video or paste your youtube link!');
            return Redirect::back();
        } else {
            if ($project != '') {
                $destinationPath = 'uploads/images/projects' . '/' . $input['id'];
                $projectmimetype = $project->getClientOriginalExtension();
                $filename = "projectvideo";
                $file = $filename . '.' . $projectmimetype;
                $project->move($destinationPath, $file);
                $projectlink = $destinationPath . '/' . $file;
                $input['projectvideo'] = $projectlink;
            } elseif ($youtube != '') {
                if (strpos($youtube, 'www.youtube.com/watch?v=') !== false) {
                    $temp = explode('?v=', $youtube);
                    $source = $temp[1];
                    $link = "http://www.youtube.com/embed/" . $source;
                    $input['projectvideo'] = $link;
                } else {
                    Session::flash('error', 'Please enter valid youtube url!');
                    return Redirect::back();
                }
            } else {
                $input['projectvideo'] = '';
            }
            $this->project->updateprojectstory($input);
            Session::flash('success', 'Story Updated Successfully!');
            return Redirect::back();
        }
//        $input = Input::all();
//        $project = Input::file('projectvideo');
//        if ($project != '') {
//            $destinationPath = 'uploads/images/projects' . '/' . $input['title'];
//            $projectmimetype = $project->getClientOriginalExtension();
//            $filename = "projectvideo";
//            $file = $filename . '.' . $projectmimetype;
//            $project->move($destinationPath, $file);
//            $projectlink = $destinationPath . '/' . $file;
//            $input['projectvideo'] = $projectlink;
//        } else {
//            $input['projectvideo'] = '';
//        }
//        $this->project->updateprojectstory($input);
//        return Redirect::back();
    }
    }

    public function viewproject() {
        $id = Input::get('id');
        $project = $this->project->getbyprojectid($id);
        $rewards = $this->reward->getbyprojectid($id);
        return View::make('adminviews.project.projectpreview', compact('project', 'rewards'));
    }

    public function projectlist() {
        $projecttype = Input::get('project');
        $fundedcount = count($this->project->getallfundedprojects());
        $livecount = count($this->project->getliveprojects());
        $failedcount = count($this->project->getfailedprojects());
        $pendingcount = count($this->project->getpendingprojects());
        $totalcount = count($this->project->getall());        
        $suspendedcount=count($this->project->getsuspendedprojects());
        $newcount = count($this->project->getallnewprojects());
        if ($projecttype == "funded") {
            $projects = $this->project->getallfundedprojects();
        } elseif ($projecttype == "live") {
            $projects = $this->project->getliveprojects();
        } elseif ($projecttype == "failed") {
            $projects = $this->project->getfailedprojects();
        } elseif ($projecttype == "pending") {
            $projects = $this->project->getpendingprojects();
        } elseif ($projecttype == "new") {
            $projects = $this->project->getallnewprojects();
        }elseif ($projecttype == "suspended") {
            $projects = $this->project->getsuspendedprojects();
        } else {
            $projecttype = '';
            $projects = $this->project->getall();
        }
        return View::make('adminviews.project.projectlist', compact('suspendedcount','pendingcount','projecttype', 'newcount', 'livecount', 'failedcount', 'totalcount', 'fundedcount', 'projects'));
    }

    public function featureprojects() {
        $this->project->updatefeaturedifexpired();
        $projectoftheday = $this->project->getbyprojectoftheday();
        $popularprojects = $this->project->getbypopularprojects();
        $newandnoteworthyprojects = $this->project->getnewandnoteworthyprojects();
        return View::make('adminviews.project.featureprojects', compact('projectoftheday', 'popularprojects', 'newandnoteworthyprojects'));
    }

    public function updatefeatured() {
        $status = Input::get('status');
        $id = Input::get('id');
        $feature = Input::get('feature');
        if ($feature == "projectoftheday") {
            $result = $this->project->updateprojectoftheday($id, $status);
        } elseif ($feature == "popular") {
            $result = $this->project->updatepopularprojects($id, $status);
        } else {
            $result = $this->project->updatenewandnoteworthyprojects($id, $status);
        }
        if ($result == 0) {
            Session::flash('error', 'Sorry! You reached maximum limit.');
        } else {
            Session::flash('success', 'Successfully updated');
        }
        return Redirect::back();
    }

    public function verifyaccount() {
        $users = $this->user->getforverification();
        return View::make('adminviews.project.verifyaccount', compact('users'));
    }

    public function viewverifyaccount() {
        $id = Input::get('id');
        $user = $this->user->getuserbyid($id);
        // print_r($user);exit;
        return View::make('adminviews.project.viewverifyaccount', compact('user'));
    }

    public function sendverification() {
        $email = Input::get('email');
        $id = $this->user->getidbyemail($email);
        $code = $this->user->updatemobileverificationcode($id);
        $name = $this->user->getusername($id);
        $adminsettings = $this->adminsetting->getfirst();
        $templatename = "emailverification";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $subject = $templatedetails['subject'];
        $data = array(
            'email' => $email,
            'logo' => $logo,
            'title' => $title,
            'name' => $name,
            'code' => $code,
            'id' => $id,
            'subject' => $templatedetails['subject'],
            'sendername' => $templatedetails['sendername'],
            'senderemail' => $templatedetails['senderemail']
        );
        Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
            $message->to($email)->subject($subject);
        });

        Session::flash('success', 'Verification mail sent!');
        return Redirect::back();
    }

    public function confirmsendverification($id, $code) {
        $this->user->updatemailstatus($id, $code);
        Session::flash('success', 'Email address verified!');
        return Redirect::to('myaccount');
    }

    public function sendmail($email, $userid, $status) {
        $name = $this->user->getusername($userid);
        $adminsettings = $this->adminsetting->getfirst();
        $templatename = "approvalstatus";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
       // $subject = $templatedetails['subject'];
        $subject = "Congrats! Your project has been approved!";
        if ($status == 2) {
            if (Config::get('adminconfig.listingfee') == 0) {
                $statusmessage = "Approved";
            } else {
                $statusmessage = "Approved. Kindly pay $" . Config::get('adminconfig.listingfee') . ' to list your project in Fundstarter';
            }
        } else if ($status == 3) {
            $statusmessage = "Denied";
        } else {
            return false;
        }
        $data = array(
            'email' => $email,
            'logo' => $logo,
            'title' => $title,
            'name' => $name,
            'subject' => $templatedetails['subject'],
            'sendername' => $templatedetails['sendername'],
            'senderemail' => $templatedetails['senderemail'],
            'status' => $statusmessage,
        );
        Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
        if ($status == 2) {
            return $this->sendmailtofollower($userid);
        }
    }

    public function sendmailtofollower($userid) {
        $following = $this->user->getuserbyid($userid);
        $adminsettings = $this->adminsetting->getfirst();
        $templatename = "followermail";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $subject = $templatedetails['subject'];
        $followerids = $this->follow->getfollower($userid);
        if ($followerids != '[]') {
            foreach ($followerids as $followerid) {
                $fid = $followerid['followerid'];
                $follower = $this->user->getuserbyid($fid);
                if ($follower != '') {
                    $email = $follower['email'];
                    $data = array(
                        'email' => $email,
                        'logo' => $logo,
                        'title' => $title,
                        'name' => $follower['name'],
                        'subject' => $templatedetails['subject'],
                        'sendername' => $templatedetails['sendername'],
                        'senderemail' => $templatedetails['senderemail'],
                        'followingname' => $following['username'],
                    );
                    Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
                        $message->to($email)->subject($subject);
                    });
                }
            }
        }
    }

    public function deleteverification() {
        $id = Input::get('id');
        $this->project->updatedeleteverification($id);
        Session::flash('success', 'Record deleted!');
        return Redirect::to('verifyaccount');
    }

    public function fundedprojectlist() {
        $projects = $this->project->getfundedprojects();
        return View::make('adminviews.project.fundedprojects', compact('projects'));
    }

    public function postreward() {
        $input = Input::all();
        if (Input::has('limit')) {
            $input['islimited'] = 1;
        } else {
            $input['islimited'] = 0;
        }
        $this->reward->create($input);
        Session::flash('success', 'Reward successfully added');
        return Redirect::back();
    }

    public function deletereward() {
        $id = Input::get('id');
        $this->reward->deletebyid($id);
        Session::flash('success', 'Reward successfully deleted!');
        return Redirect::back();
    }

    public function deleteproject() {
        $id = Input::get('id');
       // $this->reward->deletebyprojectid($id);
        $title = $this->project->getprojecttitlebyid($id);
        $filename = rand(100,1000);
        $file = $title . '_' . $filename;
        $this->project->deletebyid($id);
        DB::table('projects')->where('id','=',$id)->update(array('projectverified' => 4,'title'=> $file));
        $userid = $this->project->getuseridforliveproject($id);
        if ($userid != '') {
            $this->user->removecreatedcount($userid);
        }
        Session::flash('success', 'Project successfully deleted!');
        return Redirect::back();
    }

    public function editreward() {
        $id = Input::get('id');
        $reward = $this->reward->getbyidcreator($id);
        //$countries = $this->country->all();
        //return View::make('adminviews.project.editreward', compact('reward', 'countries'));
        return View::make('adminviews.project.editreward', compact('reward'));
    }

    public function posteditreward() {
        $input = Input::all();
        if (Input::has('limit')) {
            $input['islimited'] = 1;
        } else {
            $input['islimited'] = 0;
        }
        $this->reward->update($input);
        Session::flash('success', 'Reward successfully edited!');
        return Redirect::back();
    }

    public function postprojectseo() {
        $input = Input::all();
        $this->project->updateseo($input);
        Session::flash('success', 'SEO successfully added!');
        return Redirect::back();
    }

    public function approveproject() {
        $id = Input::get('id');
        $status = Input::get('status');
        $remarks = Input::get('remarks');
        $userid = $this->project->getuserid($id);
        $email = $this->user->getemail($userid);
        Project::where('id', '=', $id)->update(array('projectverified' => $status, 'remarks' => $remarks));
        $this->sendmail($email, $userid, $status);
        Session::flash('success', 'Status successfully updated!');
        return Redirect::to('projectlist');
    }

    public function addremarks() {
        $input = Input::all();
        $this->project->updateprojectbyid($input);
        Session::flash('success', 'Status Updated Successfully');
        return Redirect::back();
    }

    public function exportprojects() {
        $table = $this->project->getall();
        $body = "";
        $top = "<table>
		<thead>
		   <tr>
		      <th>S.No</th>
                      <th>Project Name</th>
		      <th>Category</th>
                      <th>Creator Name</th> 
                      <th>Funding Goal</th> 
                      <th>Total Backing</th> 
                      <th>Pledge Amount </th> 
                      <th>Ending on</th> 
                      <th>Is Funded</th> 
                    </tr>
                  </thead>
                  <tbody>";
        $bottom = "</tbody></table>";
        $i = 1;
        foreach ($table as $value) {
            $body .= "<tr>
		 <td>$i</td>
		<td>$value->title</td>
		<td>$value->categoryname</td>
		<td>$value->firstname $value->lastname</td>
		<td>$value->fundinggoal</td>
		<td>$value->totalbacking</td>
		<td>$value->totalpledgeamount</td>
                 <td>$value->endingon</td>
                 <td>$value->isfunded</td>
		</tr>";
            $i++;
        }
        $output = $top . $body . $bottom;
        $headers = array('Pragma' => 'public',
            'Expires' => 'public',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Cache-Control' => 'private',
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename=projects.xls',
            'Content-Transfer-Encoding' => ' binary');
        return Response::make($output, 200, $headers);
    }

}
