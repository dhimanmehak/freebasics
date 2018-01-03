<?php

use fundstarter\storage\Request\RequestRepository as RequestRepository;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;
use Carbon\Carbon;

class RequestController extends BaseController {

    public function __construct(AdminsettingRepository $adminsettingRepository, NewsletterRepository $newsletterRepository, RequestRepository $requestRepository, UserRepository $userRepository, ProjectRepository $projectRepository) {
        $this->request = $requestRepository;
        $this->project = $projectRepository;
        $this->user = $userRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->newsletter = $newsletterRepository;
    }

    public function index() {
        $requests = $this->request->all();
        return View::make('adminviews.request.requestlist', compact('requests'));
    }

    public function viewrequest() {
        $id = Input::get('id');
        $request = $this->request->getbyid($id);
        return View::make('adminviews.request.viewrequest', compact('request'));
    }
    
    public function requeststatus() {
        $id = Input::get('id');
        $request = $this->request->getbyid($id);
        return View::make('adminviews.request.requeststatus', compact('request'));
    }

    public function changerequeststatus() {
        $id = Input::get('id');
        $status = Input::get('status');
        $result = $this->request->updatestatus($id, $status);
        $today = Carbon::now();
        $duration = $result['fundingduration'];
        $MyDateCarbon = \Carbon\Carbon::parse($today);
        $endingon = $MyDateCarbon->addDays($duration);
        if($result['status']){
           $this->project->changerequestvalue($result['projectid'],$result['fundinggoal'],$result['fundingduration'],$endingon);
        }
        $userid = $this->project->getuserid($result['projectid']);
        $email = $this->user->getemail($userid);
        $this->sendmail($email, $userid, $status);
        Session::flash('success', 'Status updatad!');
        return Redirect::to('requestlist');
    }

    public function sendmail($email, $userid, $status) {
        $name = $this->user->getusername($userid);
        $adminsettings = $this->adminsetting->getfirst();
        $templatename = "requeststatus";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $subject = $templatedetails['subject'];
        if ($status == 1) {
            $statusmessage = "Accepted";
        } else {
            $statusmessage = "Denied";
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
    }

    public function deleterequest() {
        $id = Input::get('id');
        $this->request->deletebyid($id);
        Session::flash('success', 'Request deleted successfully');
        return Redirect::to('requestlist');
    }

}
