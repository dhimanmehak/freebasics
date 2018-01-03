<?php

use fundstarter\storage\Admin\AdminRepository as AdminRepository;
use fundstarter\storage\Paymentgateway\PaymentgatewayRepository as PaymentgatewayRepository;
use fundstarter\storage\Contact\ContactRepository as ContactRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\Backing\BackingRepository as BackingRepository;
use fundstarter\storage\Request\RequestRepository as RequestRepository;

class AdminController extends BaseController {

    public function __construct(RequestRepository $requestRepository, BackingRepository $backingRepository, ProjectRepository $projectRepository, UserRepository $userRepository, AdminRepository $adminrepository, PaymentgatewayRepository $paymentgatewayRepository, ContactRepository $contactRepository) {
        parent::__construct();
        $this->admin = $adminrepository;
        $this->paymentgateway = $paymentgatewayRepository;
        $this->contact = $contactRepository;
        $this->user = $userRepository;
        $this->project = $projectRepository;
        $this->backing = $backingRepository;
        $this->request = $requestRepository;
    }

    public function index() {
        return View::make('adminviews.login');
    }

    public function postlogin() {
        $input = Input::all();
        $password = $input['password'];
        $status = $this->admin->getstatusbyemail($input['email']);
        if ($status == "active") {
            $result = $this->admin->checklogin($input['email'], $password);
            if ($result == 1) {
                $ipaddress = Request::getClientIp();
                $this->admin->updatelastlogin($input['email'], $ipaddress);
                $adminuser = $this->admin->getbyemail($input['email']);
                Session::put('admin', $input['email']);
                Session::put('admintempname', $adminuser['name']);
                Session::put('admintype', $adminuser['admintype']);
                Session::put('previleges', $adminuser['previleges']);
                Session::put('logintype', 'admin');
                $adminname = Session::get('admintempname');
                if ($adminname == "zoplay") {
                    Session::put('adminname', 'demo');
                } else {
                    Session::put('adminname', $adminname);
                }
                return Redirect::to('admindashboard');
            } else {
                Session::flash('failed', 'Invalid Email/Password');
                return Redirect::to('adminlogin');
            }
        } else {
            Session::flash('failed', 'Invalid Login');
            return Redirect::to('adminlogin');
        }
    }

    public function forgotpassword() {
        return View::make('adminviews.forgotpassword');
    }

    public function sendpassword() {
        $email = Input::get('email');
        $name = $this->admin->checkmailexists($email);
        if ($name == '') {
            Session::flash('failed', 'Invalid Email');
            return Redirect::to('forgotpassword');
        } else {
            $newpassword = rand();
            $id = $this->admin->savenewpassword($email, $newpassword);
            if ($id != '') {
                $user = array(
                    'email' => $email,
                    'name' => $name
                );

// the data that will be passed into the mail view blade template
                $data = array(
                    'id' => $id,
                    'detail' => $newpassword,
                    'name' => $user['name'],
                    'email' => $user['email']
                );

// use Mail::send function to send email passing the data and using the $user variable in the closure
                Mail::send('emails.forgotpassword', $data, function($message) use ($user) {
                    $message->from('admin@site.com', 'Site Admin');
                    $message->to($user['email'], $user['name'])->subject('Notification to change password!');
                });
            }
            Session::flash('success', 'Reset password link has been successfully sent to your email!');
            return Redirect::to('forgotpassword');
        }
    }

    public function resetforgotpassword() {
        $id = Input::get('id');
        return View::make('adminviews.resetforgotpassword', compact('id'));
    }

    public function dashboard() {
        $this->project->updatefeaturedifexpired();
        $requestcount = $this->request->getwaitingrequests();
        $usercount = $this->user->getusercount();
        $projectcount = $this->project->getprojectcount();
        $totalfund = $this->project->gettotalfund();
        $fundedprojectcount = $this->project->getfundedprojectcount();
        $backercount = $this->backing->getbackercount();
        $creatorcount = $this->user->getcreatorcount();
        $backingcount = $this->backing->getbackingcount();
        $newusercount = $this->user->getnewusercount();
        $recentusers = $this->user->getrecentuserslimited();
        $projects = $this->project->recentproject();
        $recentbackings = $this->backing->getrecentbackings();
        $newbackings = $this->backing->gettodaybackingcount();
        return View::make('adminviews.dashboard', compact('requestcount', 'newbackings', 'usercount', 'projectcount', 'totalfund', 'fundedprojectcount', 'backercount', 'creatorcount', 'backingcount', 'newusercount', 'recentusers', 'projects', 'recentbackings'));
    }

    public function paymentgateway() {
        $paymentgateways = $this->paymentgateway->all();
        return View::make('adminviews.paymentgateway', compact('paymentgateways'));
    }

    public function contactus() {
        $contacts = $this->contact->getall();
        return View::make('adminviews.contactus', compact('contacts'));
    }

    public function viewcontactus() {
        $id = Input::get('id');
        $contact = $this->contact->getbyid($id);
        return View::make('adminviews.viewcontactus', compact('contact'));
    }

    public function deletecontact() {
        $id = Input::get('id');
        $this->contact->deletebyid($id);
        Session::flash('success', 'Contact deleted successfully!');
        return Redirect::to('contactlist');
    }

    public function adminuser() {
        $adminuser = $this->admin->getsuperadmin();
        return View::make('adminviews.admin.adminuser', compact('adminuser'));
    }

    public function changepassword() {
        return View::make('adminviews.admin.changepassword');
    }

    public function postchangepassword() {
        $oldpassword = Input::get('oldpassword');
        $password = Input::get('password');
        $email = Session::get('admin');
        $id = $this->admin->getid($email);
        $result = $this->admin->checklogin($email, $oldpassword);
        if ($result) {
            $this->admin->resetpassword($id, $password);
            Session::flash('change', 'Password successfully changed!');
        } else {
            Session::flash('failed', 'Invalid credential!');
        }
        Input::get('password');
        return View::make('adminviews.admin.changepassword');
    }

    public function postresetforgotpassword() {
        $password = Input::get('password');
        $id = Input::get('id');
        $this->admin->resetpassword($id, $password);
        Session::flash('change', 'Password successfully changed!');
        return Redirect::to('adminlogin');
    }

    public function adminlogout() {
        $email = Session::get('admin');
        $this->admin->updatelastlogout($email);
        Session::forget('admin');
        return Redirect::to('adminlogin');
    }

    public function transferfund() {
        $fundedprojects = $this->project->getallprojects();
        return View::make('adminviews.transferfund', compact('fundedprojects'));
    }

    public function sample() {
        $contact = $this->contact->getsecond();
        return View::make('adminviews.sample', compact('contact'));
    }

    public function postsample() {
        $logo = Input::file('file');
        $destinationPath = 'uploads/images';
        $logomimetype = $logo->getClientOriginalExtension();
        $file = 'file.' . $logomimetype;
        $logo->move($destinationPath, $file);
        $logolink = $destinationPath . '/' . $file;
        $input['firstname'] = "sample";
        $input['lastname'] = "sample";
        $input['email'] = "sample";
        $input['mobile'] = "sample";
        $input['subject'] = $logolink;
        $input['message'] = $logolink;
        $this->contact->create($input);
        return Redirect::back();
    }

    public function deletesample() {
        $file = Input::get('file');
        $id = Input::get('id');
        unlink($file);
        $this->contact->deletebyid($id);
        return Redirect::back();
    }

    public function editpaymentgateway() {
        $id = Input::get('id');
        $paymentgateways = $this->paymentgateway->getbyid($id);
		//echo "<pre>";print_r($paymentgateways);exit;
        return View::make('adminviews.editpaymentgateway', compact('paymentgateways'));
    }

//    public function posteditpaymentgateway() {
//        $input = Input::all();
//        $this->paymentgateway->update($input);
//        Session::flash('success', 'Payment gateway updated successfully!');
//        return Redirect::to('paymentgateway');
//    }


    public function posteditpaymentgateway() {
        $id = Input::get('id');
        $mode = Input::get('mode');
        $status = Input::get('status');
        $gatewayname = Input::get('gatewayname');
        $gatewaySettings = array();
        $gatewaySettings['mode'] = $mode;
        $excludeArr = array("id", "mode");
        foreach (Input::all() as $key => $val) {
            if (!in_array($key, $excludeArr)) {
                $gatewaySettings[$key] = $val;
            }
        }
        $dataArr = array('id' => $id, 'mode' => $mode, 'gatewayname' => $gatewayname, 'status' => $status, 'settings' => serialize($gatewaySettings));
        if ($id == '') {
            Session::flash('success', 'Payment gateway added successfully');
        } else {
            $this->paymentgateway->update($dataArr);
            $this->filewrite();
            Session::flash('success', 'Payment gateway updated successfully');
        }
        return Redirect::to('paymentgateway');
    }

    public function filewrite() {
        $getPaymentSettings = $this->paymentgateway->all();
        $config = '<?php return array(';
        foreach ($getPaymentSettings as $key => $val) {
            $value = serialize($val);
            $config .= "\n'$key' => '$value', ";
        }
        $config.='); ?>';
        $file = app_path() . '/config/paymentconfig.php';
        file_put_contents($file, $config);
    }

    public function paymentgatewaystatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        Paymentgateway::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }


}
