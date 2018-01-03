<?php

use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\History\HistoryRepository as HistoryRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;
use fundstarter\storage\Subscription\SubscriptionRepository as SubscriptionRepository;
use fundstarter\storage\Admin\AdminRepository as AdminRepository;
use Carbon\Carbon;

class SignupController extends BaseController {

    public function __construct(UserRepository $userRepository, HistoryRepository $historyRepository, AdminsettingRepository $adminsettingRepository, NewsletterRepository $newsletterRepository, SubscriptionRepository $subscriptionRepository, AdminRepository $adminRepository) {
        $this->user = $userRepository;
        $this->history = $historyRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->newsletter = $newsletterRepository;
        $this->subscription = $subscriptionRepository;
		$this->admin = $adminRepository;
    }

    public function index() {
       
        return View::make('mainviews.register');
    }

    public function login() {
        
	
	 //Session::put('url.intended',URL::previous());
	 
        return View::make('mainviews.login');
    }

    public function postsignup() {
		
		
		$subadmins = array();
		$adminsettings = $this->adminsetting->getfirst();
		
		$adminemail=$adminsettings->adminemail;
		
		$subadminsetting = $this->admin->getallsubadmin();
		
		foreach($subadminsetting as $subadminsettings)
		{
		$subadmins[]= $subadminsettings->email;
		
		}
		

        $rules = array(
            'firstname' => 'required|min:3|max:18', // just a normal required validation
            'lastname' => 'required|min:3|max:18',
            'username' => 'required|unique:users|min:3|max:18',
            'email' => 'required|email|unique:users', // required and must be unique in the users table
            //'confirm_email' => 'required|same:email',
            'password' => 'required|alphaNum|min:6|max:12', //|alphaNum|min:6  for secure password
            'confirm_password' => 'required|same:password', // required and has to match the password field
            'question' => 'required',
           'answer' => 'required|min:3|max:12'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('signup')
                            ->withErrors($validator)
                            ->withInput(Input::except('password', 'confirm_password'));
        } else {
            $input = Input::all();
            if (Input::has('subscription')) {
                $input['subscription'] = 1;
            } else {
                $input['subscription'] = 0;
            }
            $referralcookie = Cookie::get('referralcookie');
            if ($referralcookie != '') {
                $input['referrer'] = $referralcookie;
            } else {
                $input['referrer'] = '';
            }
            $input['ipaddress'] = Request::getClientIp();
            $this->user->saveuser($input);
           
            $this->sendsignupmessage($input['email']);
			$this->sendsignupadmin($subadmins);
            $this->user->updatereferrercount($referralcookie);
            $ipaddress = Request::getClientIp();
            $this->user->updatelastlogin($input['email'], $ipaddress);
//            Session::put('image', $result['image']);
//            Session::put('name', $result['name']);
//            Session::put('userid', $result['userid']);
//            Session::put('email', $input['email']);
//            Session::put('logintype', 'user');
            $cookie = Cookie::forget('referral');
            $selectedlanguage = Session::get('locale');
            Session::flash('success', Lang::get('messages2.activateyouraccount', array(), $selectedlanguage));
            return Redirect::to('login')->withCookie($cookie);
        }
    }

    public function dologin() {
	 
        $rules = array(
            'email' => 'required',
            'password' => 'required'                          //|alphaNum|min:6  for secure password
        );
        $selectedlanguage = Session::get('locale');
        $validator = Validator::make(Input::all(), $rules);

     
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $input = Input::all();
            $email = Input::get('email');
            $password = Input::get('password');
            $isactive = $this->user->checkstatus($email);
            if ($isactive == '') {
                Session::flash('failed', Lang::get('messages2.invalidcredentials', array(), $selectedlanguage));
                return Redirect::to('login');
            } else {
                $result = $this->user->checklogin($email, $password);
               if ($result === 2) {
                   Session::flash('failed', Lang::get('messages2.pleaseverifyyouremailbeforelogin',array(),$selectedlanguage));
                    return Redirect::to('login');
                } else {
                if ($result) {
                    $userid = User::where('email', '=', $email)->orWhere(function($query)use($email) {
                                $query->where('username', '=', $email);
                            })->first();
                    $input['ipaddress'] = Request::getClientIp();
                    $location = GeoIP::getLocation($input['ipaddress']);
                    $input['userid'] = $userid->id;
                    $input['location'] = $location['country'];
                    $timezone = $location['timezone'];
                    $date = Carbon::now();
                    $input['lastlogindate'] = $date->setTimezone($timezone);
                    $input['lastlogoutdate'] = $date->setTimezone($timezone);
                    $input['email'] = $userid->email;
                    $ipaddress = Request::getClientIp();
                    $result = $this->user->updatelastlogin($email, $ipaddress);
                    $this->history->create($input);
                    Session::put('image', $result['image']);
                    Session::put('name', $result['name']);
                    Session::put('userid', $result['userid']);
                    Session::put('email', $result['email']);
                    Session::put('logintype', 'user');
                    $url = URL::previous();
                    $segments = explode('/', $url);
                    $count = count($segments);
                    $last = $segments[$count - 1];
                    if ($last == "login") {
                        Session::flash('success', 'Login Successfull!');
                        //return Redirect::to('project/start');
						 return Redirect::intended();
                    } else {
                        Session::flash('success', 'Login Successfull!');
                      //  return Redirect::back('project/start');
					   
					   return Redirect::intended();
                    }
                } else {
                    Session::flash('failed', 'Login Failed!');
                    return Redirect::to('login');
                }
                }//main else end
            }
        }
    }

    public function sendverification($email) {
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
    }

    public function sendsignupmessage($email) {
        $id = $this->user->getidbyemail($email);
		$code = $this->user->updatemobileverificationcode($id);
        $name = $this->user->getusername($id);
        $adminsettings = $this->adminsetting->getfirst();
        $templatename = "signupmessage";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        //$subject = $templatedetails['subject'];
		$subject="Welcome to FreeBasics!";
        $data = array(
            'email' => $email,
            'logo' => $logo,
            'title' => $title,
            'name' => $name,
            'id' => $id,
			'code' => $code,
            'subject' => $templatedetails['subject'],
            'sendername' => $templatedetails['sendername'],
            'senderemail' => $templatedetails['senderemail']
        );
        Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
	
	 public function sendsignupadmin($email) {
		 
		 $emails=$email;
		
		 $adminsettings = $this->adminsetting->getfirst();
		 
		// $email="bhupinder1045@gmail.com";	
        $templatename = "signupadmin";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        //$subject = $templatedetails['subject'];
		$subject="Freebasics New User Registered";
        $data = array(
            //'email' => $email,
            'logo' => $logo,
            'title' => $title,
            'subject' 	=> $templatedetails['subject'],
            'sendername' => $templatedetails['sendername'],
            'senderemail' => $templatedetails['senderemail']
        );
        Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($emails, $subject) {
            $message->to($emails)->subject($subject);
        });
    }

    // Find confirmsendverification in CreateController

    public function postsubscription() {
        $input = Input::all();
        $rules = array(
            'email' => 'required|email|unique:subscriptions', // required and must be unique in the users table
        );
        $messages = array(
            'unique' => 'You are already subscribed.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $selectedlanguage = Session::get('locale');
        if ($validator->fails()) {
            return Redirect::to('/')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $result = $this->subscription->create($input);
            $this->sendconfirmation($input['email'], $result['code'], $input['email'], $result['subscriptionid']);
            Session::flash('subsuccess', Lang::get('messages2.subscriptionsuccessful', array(), $selectedlanguage));
            return Redirect::back();
        }
    }

    public function sendconfirmation($email, $code, $name, $id) {
        $adminsettings = $this->adminsetting->getfirst();
        $templatename = "subscriptionconfirmation";
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
    }

    public function confirmsubscription() {
        $id = Input::get('id');
        $code = Input::get('code');
        $result = $this->subscription->verifycode($id, $code);
        if ($result == 1) {
            Session::flash('success', 'Email verification successful!');
            return Redirect::to('login');
        } else {
            Session::flash('failed', 'Invalid request!');
            return Redirect::to('login');
        }
    }

    public function forgotpassword() {
        return View::make('mainviews.forgotpassword');
    }

    public function postforgotpwd() {
        $rules = array(
            'email' => 'required|email|exists:users',
        );
        $messages = ['exists' => trans('validation.invalidexistsemail')];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('user/forgotpassword')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $email = Input::get('email');
            Session::put('forgotemail', $email);
            $userinfo = User::where('email', '=', $email)->first();
            Session::put('question', $userinfo['question']);
            return Redirect::to('security');
            //return View::make('mainviews.security')->with('userinfo', $userinfo);
        }
    }

    public function postsecurity() {
        $rules = array(
            //'email' => 'required|email|exists:users',
            //'question' => 'required',
            'answer' => 'required|min:3|max:12'
        );
        $validator = Validator::make(Input::all(), $rules);
        $selectedlanguage = Session::get('locale');
        if ($validator->fails()) {
            return Redirect::to('security')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $email = Session::get('forgotemail');
            $question = Input::get('question');
            $answer = Input::get('answer');
            $exists = $this->user->checksecurity($email, $question, $answer);
            if ($exists == '') {
                Session::flash('failed', Lang::get('messages2.Mismatchofsecurityquestion', array(), $selectedlanguage));
                return Redirect::to('security')
                                ->withErrors($validator)
                                ->withInput();
            } else {
                //$newpassword = rand();
                // $id = $this->user->savenewpassword($email, $newpassword);
                $id = $this->user->getidbyemail($email);
                $name = $this->user->getusername($id);
                $adminsettings = $this->adminsetting->getfirst();
                $templatename = "forgotpassword";
                $templatedetails = $this->newsletter->getbytemplatename($templatename);
                $logo = $adminsettings['logo'];
                $title = $adminsettings['sitetitle'];
                //$subject = $templatedetails['subject'];
				$subject="Reset your FreeBasics account password";
                $data = array('email' => $email,
                    'logo' => $logo,
                    'title' => $title,
                    'name' => $name,
                    'id' => $id,
                    'subject' => $subject,
                    'sendername' => $templatedetails['sendername'],
                    'senderemail' => $templatedetails['senderemail']
                );
                // use Mail::send function to send email passing the data and using the $user variable in the closure
                Mail::send('emails.newsletters.' . $templatename, $data, function($message) use ($email, $subject, $name) {
                    $message->to($email, $name)->subject($subject);
                });
                Session::flash('success', Lang::get('messages2.resetpasswordlink', array(), $selectedlanguage));
                return Redirect::to('login');
            }
        }
    }

    public function resetforgotpwd($id) {
        $email = $this->user->getemail($id);
        return View::make('mainviews.resetforgotpassword', compact('id', 'email'));
    }

    public function postresetforgotpwd() {
        $rules = array(
            'password' => 'required|alphaNum|min:6|max:12', //|alphaNum|min:6  for secure password
            'confirm_password' => 'required|same:password'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $id = Input::get('id');
            return Redirect::to('user/forgotpassword/reset/' . $id)
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $id = Input::get('id');
            $email = $this->user->getemail($id);
            $password = Input::get('password');
            $this->user->saveresetpassword($id, $password);
            $userid = User::where('id', '=', $id)->first();
            $input['ipaddress'] = Request::getClientIp();
            $input['userid'] = $userid->id;
            $input['location'] = $userid->country;
            $input['lastlogindate'] = $userid->lastlogindate;
            $input['lastlogoutdate'] = $userid->lastlogoutdate;
            $input['email'] = $userid->email;
            $ipaddress = Request::getClientIp();
            $result = $this->user->updatelastlogin($email, $ipaddress);
            $this->history->create($input);
            Session::put('image', $result['image']);
            Session::put('name', $result['name']);
            Session::put('userid', $result['userid']);
            Session::put('email', $result['email']);
            Session::put('logintype', 'user');
            Session::flash('success', 'Password changed successfully!');
            return Redirect::to('/');
        }
    }

    public function security() {
        return View::make('mainviews.security');
    }

   /* public function fblogin() {
        $facebook = new Facebook(Config::get('adminconfig'));
        $params = array(
            'redirect_uri' => url('loginfbcallback'),
            'scope' => 'email', 'user_friends', 'read_stream, friends_likes',
        );
        return Redirect::to($facebook->getLoginUrl($params));
    }*/
	public function loginWithFacebook($catid) {
	
	// get data from input
	$code = Input::get( 'code' );
	
	// get fb service
	$fb = OAuth::consumer( 'Facebook' );

	// check if code is valid
	
	// if code is provided get user data and sign in
	if ( !empty( $code ) ) {
		
		// This was a callback request from facebook, get the token
		$token = $fb->requestAccessToken( $code );
		
		// Send a request with it
		$me = json_decode( $fb->request( '/me' ), true );
		
		// $accesstoken = '161163067777348|lH55gK9d6-1C8UWY8XWpz0hjRvI';
		$accesstoken=$token->getAccessToken();
        $contents = file_get_contents('https://graph.facebook.com/v2.4/' . $me['id'] . '?access_token=' . $accesstoken . '&&fields=email,about,first_name,last_name,gender');
        $json = json_decode($contents, true);
        $me['email'] = $json['email'];
        $me['first_name'] = $json['first_name'];
        $me['last_name'] = $json['last_name'];
        $me['gender'] = $json['gender'];
		//return Redirect::to('/');
		
		$email=$me['email'];
		
		$fbexists = $this->user->checkemailexists($email);
        if ($fbexists == '') {
            $referralcookie = Cookie::get('referral');
            if ($referralcookie != '') {
                $me['referrer'] = $referralcookie;
            } else {
                $me['referrer'] = '';
            }
            $img = file_get_contents('https://graph.facebook.com/v2.4/' . $me['id'] . '/picture?type=large');
            $file = 'uploads/images/users/' . $me['email'] . '.jpg';
            file_put_contents($file, $img);
            $me['image'] = $file;
            
            $me['ipaddress'] = Request::getClientIp();
          
				
			$this->user->updatereferrercount($referralcookie);
            $id = $this->user->createbyfb($me);
            Session::put('tempid', $id);
			         Session::put('image', $me['image']);
                    Session::put('name', $me['first_name']);
                    Session::put('userid', $id);
                    Session::put('email', $me['email']);
                    Session::put('logintype', 'facebook');


                    //pledgecountcode
                    
                      $countinput['catid']=$catid;
                      $countinput['userid']=$id;
                      $countinput['logintype']='facebook';
                      $this->user->createpledgecount($countinput);
                   
                        Session::flash('success', 'Login Successfull!');
                       // return Redirect::to('/')->with('popup', 'open');
					    return Redirect::to('align/goal')->with('popup', 'open');
           
            //$cookie = Cookie::forget('referral');
           // return Redirect::to('fblogin/createpassword')->withCookie($cookie);
        } else {
			// when fb user is already in database
            Session::put('tempid', $fbexists);
			
			  $userid = User::where('email', '=', $email)->orWhere(function($query)use($email) {
                                $query->where('username', '=', $email);
                            })->first();
                    $input['ipaddress'] = Request::getClientIp();
					
                    $location = GeoIP::getLocation($input['ipaddress']);
                    $input['userid'] = $userid->id;
                    $input['location'] = $location['country'];
                    $timezone = $location['timezone'];
                    $date = Carbon::now();
                    $input['lastlogindate'] = $date->setTimezone($timezone);
                    $input['lastlogoutdate'] = $date->setTimezone($timezone);
                    $input['email'] = $userid->email;
                    $ipaddress = Request::getClientIp();
                    $result = $this->user->updatelastlogin($email, $ipaddress);
                    $this->history->create($input);
                    Session::put('image', $result['image']);
                    Session::put('name', $result['name']);
                    Session::put('userid', $result['userid']);
                    Session::put('email', $result['email']);
                    Session::put('logintype', 'facebook');





                     
                      $countinput['catid']=$catid;
                      $countinput['userid']= $userid->id;
                      $countinput['logintype']='facebook';
                     $id= $this->user->createpledgecount($countinput);
                   
                      
                        Session::flash('success', 'Login Successfull!');
                        if($id =='')
                        {
                         
                        return Redirect::to('align/goal');
                        }
                        else
                        {
                            
                           return Redirect::to('align/goal')->with('popup', 'open'); 
                        }
                    
           
           
        }
		
		
		
	
	}
	// if not ask for permission first
	else {
		// get fb authorization
		$url = $fb->getAuthorizationUri();
		
		// return to facebook login url
		 return Redirect::to( (string)$url );
	}

}



public function loginWithFacebookNew() {
	
	// get data from input
	$code = Input::get( 'code' );
	
	// get fb service
	$fb = OAuth::consumer( 'Facebook' );

	
	
	// check if code is valid
	
	// if code is provided get user data and sign in
	if ( !empty( $code ) ) {
		
		// This was a callback request from facebook, get the token
		$token = $fb->requestAccessToken( $code );
		
		// Send a request with it
		$me = json_decode( $fb->request( '/me' ), true );
		$accesstoken=$token->getAccessToken();
		 //$accesstoken = '161163067777348|lH55gK9d6-1C8UWY8XWpz0hjRvI';
        $contents = file_get_contents('https://graph.facebook.com/v2.4/' . $me['id'] . '?access_token=' . $accesstoken . '&&fields=email,about,first_name,last_name,gender');
        $json = json_decode($contents, true);
        $me['email'] = $json['email'];
        $me['first_name'] = $json['first_name'];
        $me['last_name'] = $json['last_name'];
        $me['gender'] = $json['gender'];
		//return Redirect::to('/');
		
		$email=$me['email'];
		
		$fbexists = $this->user->checkemailexists($email);
        if ($fbexists == '') {
            $referralcookie = Cookie::get('referral');
            if ($referralcookie != '') {
                $me['referrer'] = $referralcookie;
            } else {
                $me['referrer'] = '';
            }
            $img = file_get_contents('https://graph.facebook.com/v2.4/' . $me['id'] . '/picture?type=large');
            $file = 'uploads/images/users/' . $me['email'] . '.jpg';
            file_put_contents($file, $img);
            $me['image'] = $file;
            
            $me['ipaddress'] = Request::getClientIp();
          
				
			$this->user->updatereferrercount($referralcookie);
            $id = $this->user->createbyfb($me);
            Session::put('tempid', $id);
			         Session::put('image', $me['image']);
                    Session::put('name', $me['first_name']);
                    Session::put('userid', $id);
                    Session::put('email', $me['email']);
                    Session::put('logintype', 'facebook');


                    
                   
                        Session::flash('success', 'Login Successfull!');
                        //return Redirect::to('project/start');
						return Redirect::intended();
           
           
        } else {
			// when fb user is already in database
            Session::put('tempid', $fbexists);
			
			  $userid = User::where('email', '=', $email)->orWhere(function($query)use($email) {
                                $query->where('username', '=', $email);
                            })->first();
                    $input['ipaddress'] = Request::getClientIp();
					
                    $location = GeoIP::getLocation($input['ipaddress']);
                    $input['userid'] = $userid->id;
                    $input['location'] = $location['country'];
                    $timezone = $location['timezone'];
                    $date = Carbon::now();
                    $input['lastlogindate'] = $date->setTimezone($timezone);
                    $input['lastlogoutdate'] = $date->setTimezone($timezone);
                    $input['email'] = $userid->email;
                    $ipaddress = Request::getClientIp();
                    $result = $this->user->updatelastlogin($email, $ipaddress);
                    $this->history->create($input);
                    Session::put('image', $result['image']);
                    Session::put('name', $result['name']);
                    Session::put('userid', $result['userid']);
                    Session::put('email', $result['email']);
                    Session::put('logintype', 'facebook');

                  
                   
                        Session::flash('success', 'Login Successfull!');
 //return Redirect::to('project/start');                  
				  //return Redirect::to('align/goal');
				  return Redirect::intended();
                    
           
           
        }
		
		
		
	
	}
	// if not ask for permission first
	else {
		// get fb authorization
		$url = $fb->getAuthorizationUri();
		
		// return to facebook login url
		
         return Redirect::to( (string)$url );
	}

}


	

    
    public function loginWithGoogleNew($id) {


Session::set('categoryid', $id);
        return Redirect::to('googlelogin');
        

    }
	//login with google
public function loginWithGoogle() {
  
 $catid = Session::get('categoryid');

	// get data from input
	$code = Input::get( 'code' );
	
	// get google service
	$googleService = OAuth::consumer( 'Google' );
	
	// check if code is valid
	
	// if code is provided get user data and sign in
	if ( !empty( $code ) ) {
	
		// This was a callback request from google, get the token
		$token = $googleService->requestAccessToken( $code );
		
		// Send a request with it
		$result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );
		
	      
		  
		$email=$result['email'];
		
		$google_exists = $this->user->checkemailexists($email);
		
		
        if ($google_exists == '') {
            $referralcookie = Cookie::get('referral');
            if ($referralcookie != '') {
                $result['referrer'] = $referralcookie;
            } else {
                $result['referrer'] = '';
            }
            $img =  file_get_contents($result['picture']);
            $file = 'uploads/images/users/' . $result['email'] . '.jpg';
            file_put_contents($file, $img);
            $result['image'] = $file;
            
            $result['ipaddress'] = Request::getClientIp();
          
				
			$this->user->updatereferrercount($referralcookie);
            $id = $this->user->createbygoogle($result);
			
			
            Session::put('tempid', $id);
			         Session::put('image', $result['image']);
                    Session::put('name', $result['given_name']);
                    Session::put('userid', $id);
                    Session::put('email', $result['email']);
                    Session::put('logintype', 'google');

                    //pledgecountcode
                    //   $catid= Session::get('catid');


                      $countinput['catid']=$catid;
                      $countinput['userid']=$id;
                      $countinput['logintype']='google';
                      $this->user->createpledgecount($countinput);
                      
                   
                        Session::flash('success', 'Login Successfull!');
                       // return Redirect::to('googlelogincallback');
                        return Redirect::to('align/goal')->with('popup', 'open');
           
            //$cookie = Cookie::forget('referral');
           // return Redirect::to('fblogin/createpassword')->withCookie($cookie);
        } else {
			// when google user is already in database
           
            Session::put('tempid', $google_exists);
			
			  $userid = User::where('email', '=', $email)->orWhere(function($query)use($email) {
                                $query->where('username', '=', $email);
                            })->first();
                    $input['ipaddress'] = Request::getClientIp();
					
                    $location = GeoIP::getLocation($input['ipaddress']);
                    $input['userid'] = $userid->id;
                    $input['location'] = $location['country'];
                    $timezone = $location['timezone'];
                    $date = Carbon::now();
                    $input['lastlogindate'] = $date->setTimezone($timezone);
                    $input['lastlogoutdate'] = $date->setTimezone($timezone);
                    $input['email'] = $userid->email;
                    $ipaddress = Request::getClientIp();
                    $result = $this->user->updatelastlogin($email, $ipaddress);
                    $this->history->create($input);
                    Session::put('image', $result['image']);
                    Session::put('name', $result['name']);
                    Session::put('userid', $result['userid']);
                    Session::put('email', $result['email']);
                    Session::put('logintype', 'google');

         
         

                   $countinput['catid']=$catid;
                      $countinput['userid']=$userid->id;
                      $countinput['logintype']='google';
$id=$this->user->createpledgecount($countinput);
                   
                        Session::flash('success', 'Login Successfull!');
                       // return Redirect::to('googlelogincallback');
                      //  return Redirect::to('align/goal');

                        if($id =='')
                        {
                        return Redirect::to('align/goal');
                        }
                        else
                        {
                           return Redirect::to('align/goal')->with('popup', 'open'); 
                        }
                    
           
           
        }
		
		
		
	
	}
	        
	
	// if not ask for permission first
	else {
		// get googleService authorization
		$url = $googleService->getAuthorizationUri();
		
		// return to google login url
		return Redirect::to( (string)$url );
	}
}
	


	public function loginWithTwitter($catid) {

	// get data from input
    
    

	$token = Input::get( 'oauth_token' );
	$verify = Input::get( 'oauth_verifier' );
	
	// get twitter service
	$tw = OAuth::consumer( 'Twitter' );
	
	// check if code is valid
	
	// if code is provided get user data and sign in
	if ( !empty( $token ) && !empty( $verify ) ) {
	
		// This was a callback request from twitter, get the token
		$token = $tw->requestAccessToken( $token, $verify );
		
		// Send a request with it
		$result = json_decode( $tw->request( 'account/verify_credentials.json' ), true );

      

        $twitterid=$result['id'];
       
		
		$twitter_exists = $this->user->checkaccountexists($twitterid);
		
		
        if ($twitter_exists == '') {
            $referralcookie = Cookie::get('referral');
            if ($referralcookie != '') {
                $result['referrer'] = $referralcookie;
            } else {
                $result['referrer'] = '';
            }
            $img =  file_get_contents($result['profile_image_url']);
            $file = 'uploads/images/users/' . $result['id'] . '.jpg';
            file_put_contents($file, $img);
            $result['image'] = $file;
            $result['twitterid']=$twitterid;
            $result['ipaddress'] = Request::getClientIp();
          
				
			$this->user->updatereferrercount($referralcookie);
            $id = $this->user->createtwitteraccount($result);
			
           
			
                             
                    

                    Session::put('tempid', $id);
			         Session::put('name', $result['name']);
                    Session::put('userid', $result['id']);
                    Session::put('image', $result['image']);
                    Session::put('logintype', 'twitter');
                      
                     
                      //pledgecountcode
                      
                      $countinput['catid']=$catid;
                      $countinput['userid']=$result['id'];
                      $countinput['logintype']='twitter';
                      $this->user->createpledgecount($countinput);
                   
                        Session::flash('success', 'Login Successfull!');
                        return Redirect::to('align/goal')->with('popup', 'open');
           
            } else {
			// when twitter user is already in database
            Session::put('tempid', $twitter_exists);
           
            $countinput['catid']=$catid;
                      $countinput['userid']=$result['id'];
                      $countinput['logintype']='twitter';
                    $id=  $this->user->createpledgecount($countinput);
                   
            
			
			  $userid = User::where('twitterid', '=', $twitterid)->orWhere(function($query)use($twitterid) {
                                $query->where('twitterid', '=', $twitterid);
                            })->first();
                    $input['ipaddress'] = Request::getClientIp();
					
                    $location = GeoIP::getLocation($input['ipaddress']);
                    $input['userid'] = $userid->id;
                    $input['location'] = $location['country'];
                    $timezone = $location['timezone'];
                    $date = Carbon::now();
                    $input['lastlogindate'] = $date->setTimezone($timezone);
                    $input['lastlogoutdate'] = $date->setTimezone($timezone);
                     $ipaddress = Request::getClientIp();
                    $result = $this->user->updatelastlogintwitter($twitterid, $ipaddress);
                    //$this->history->create($input);
                    Session::put('image', $result['image']);
                    Session::put('name', $result['name']);
                    Session::put('userid', $result['userid']);
                    Session::put('logintype', 'twitter');
                   
                        Session::flash('success', 'Login Successfull!');
                        // return Redirect::to('align/goal');
                        if($id =='')
                        {
                        return Redirect::to('align/goal');
                        }
                        else
                        {
                           return Redirect::to('align/goal')->with('popup', 'open'); 
                        }
                    
           
           
        }
		
		
		
	
	        
	}
	// if not ask for permission first
	else {
		// get request token
		$reqToken = $tw->requestRequestToken();
		
		// get Authorization Uri sending the request token
		
		$url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

		// return to twitter login url
		return Redirect::to( (string)$url );
	}
} //login with twitter end


//login with instagram

public function loginWithInstagramNew($id) {


Session::set('categoryid', $id);
        return Redirect::to('instagram/login');
        

    }
 public function loginWithInstagram() {
	
$catid=Session::get('categoryid');
	// get data from input
	$code = Input::get( 'code' );
	
    
	// get instagram service
	$instagramService  = OAuth::consumer( 'Instagram' );
	

	// check if code is valid
	
	// if code is provided get user data and sign in
	if ( !empty( $code ) ) {
         $state = isset($_GET['state']) ? $_GET['state'] : null;
	
		// This was a callback request from instagram, get the token
		 $instagramService->requestAccessToken($_GET['code'], $state);
		

		// Send a request with it
		 $result = json_decode($instagramService->request('users/self'), true);
          
       
         
         $instagramid=$result['data']['id'];
      
		
		$instagram_exists = $this->user->checkaccountexistsinstagram($instagramid);
		
		
        if ($instagram_exists == '') {
            $referralcookie = Cookie::get('referral');
            if ($referralcookie != '') {
                $result['referrer'] = $referralcookie;
            } else {
                $result['referrer'] = '';
            }
            $img =  file_get_contents($result['data']['profile_picture']);
            $file = 'uploads/images/users/' . $result['data']['id'] . '.jpg';
            file_put_contents($file, $img);
            $result['profile_picture'] = $file;
            $result['instagramid']=$instagramid;
            $result['full_name']=$result['data']['full_name'];
            $result['ipaddress'] = Request::getClientIp();
          
				
			$this->user->updatereferrercount($referralcookie);
            $id = $this->user->createinstagramaccount($result);
			
			
                             
                    

                    Session::put('tempid', $id);
			         Session::put('name', $result['data']['full_name']);
                    Session::put('userid', $id);
                    Session::put('image', $result['profile_picture']);
                    Session::put('logintype', 'instagram');

                    //pledgecountcode
                      
                      $countinput['catid']=$catid;
                      $countinput['userid']=$id;
                      $countinput['logintype']='instagram';
                      $this->user->createpledgecount($countinput);
                      
                   
                        Session::flash('success', 'Login Successfull!');
                        return Redirect::to('align/goal')->with('popup', 'open');
           
            } else {
			// when instagram user is already in database
            Session::put('tempid', $instagram_exists);
			
			  $userid = User::where('instagramid', '=', $instagramid)->orWhere(function($query)use($instagramid) {
                                $query->where('instagramid', '=', $instagramid);
                            })->first();
                    $input['ipaddress'] = Request::getClientIp();
					
                    $location = GeoIP::getLocation($input['ipaddress']);
                    $input['userid'] = $userid->id;
                    $input['location'] = $location['country'];
                    $timezone = $location['timezone'];
                    $date = Carbon::now();
                    $input['lastlogindate'] = $date->setTimezone($timezone);
                    $input['lastlogoutdate'] = $date->setTimezone($timezone);
                     $ipaddress = Request::getClientIp();
                    $result = $this->user->updatelastlogininstagram($instagramid, $ipaddress);
                    //$this->history->create($input);
                    
                    Session::put('image', $result['image']);
                    Session::put('name', $result['name']);
                    Session::put('userid', $result['userid']);
                    Session::put('logintype', 'instagram');


                     $countinput['catid']=$catid;
                      $countinput['userid']=$userid->id;
                      $countinput['logintype']='instagram';
                      $id=$this->user->createpledgecount($countinput);
                   
                   
                        Session::flash('success', 'Login Successfull!');
                        //return Redirect::to('align/goal');
                        if($id =='')
                        {
                        return Redirect::to('align/goal');
                        }
                        else
                        {
                           return Redirect::to('align/goal')->with('popup', 'open'); 
                        }
                    
           
           
        }
		
	      
	
		
	
	}
	        
	
	// if not ask for permission first
	else {
		// get instagramService authorization
		$url = $instagramService->getAuthorizationUri();
		
		// return to instagram login url
		return Redirect::to( (string)$url );
	}


 }

    public function fblogincallback() {
        $code = Input::get('code');
		
        if (strlen($code) == 0) {
            return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
        }
        $facebook = new Facebook(Config::get('adminconfig'));
        $uid = $facebook->getUser();

        if ($uid == 0) {
            return Redirect::to('/')->with('message', 'There was an error');
        }
        $me = $facebook->api('/me', 'GET');

        $accesstoken = Config::get('adminconfig.facebookaccesstoken');
        $contents = file_get_contents('https://graph.facebook.com/v2.4/' . $me['id'] . '?access_token=' . $accesstoken . '&&fields=email,about,first_name,last_name,gender');
        $json = json_decode($contents, true);
        $me['email'] = $json['email'];
        $me['first_name'] = $json['first_name'];
        $me['last_name'] = $json['last_name'];
        $me['gender'] = $json['gender'];

        // Replaced inside if becoz image should not change on login with facebook

        $email = $me['email'];
//        $id = $this->user->checkemailexistswithnormal($email);
//        if ($id != '') {
//            Session::flash('failed', 'Email already exists');
//            return Redirect::to('login');
//        } else {
        $fbexists = $this->user->checkemailexists($email);
        if ($fbexists == '') {
            $referralcookie = Cookie::get('referral');
            if ($referralcookie != '') {
                $me['referrer'] = $referralcookie;
            } else {
                $me['referrer'] = '';
            }
            $img = file_get_contents('https://graph.facebook.com/v2.4/' . $me['id'] . '/picture?type=large');
            $file = 'uploads/images/users/' . $me['email'] . '.jpg';
            file_put_contents($file, $img);
            $me['image'] = $file;
            $me['ipaddress'] = Request::getClientIp();
            $this->user->updatereferrercount($referralcookie);
            $id = $this->user->createbyfb($me);
            Session::put('tempid', $id);
            $cookie = Cookie::forget('referral');
            return Redirect::to('fblogin/createpassword')->withCookie($cookie);
        } else {
            Session::put('tempid', $fbexists);
            $passwordexists = $this->user->checkpasswordexists($email);
            if ($passwordexists == '') {
                return Redirect::to('fblogin/createpassword');
            } else {
                return Redirect::to('fblogin/checkpassword');
            }
        }
//        }
    }

    public function createfbpassword() {
        $id = Session::get('tempid');
        if ($id == '') {
            return Redirect::to('login');
        } else {
            $user = $this->user->getfirstbyid($id);
            return View::make('mainviews.fbcreatepassword', compact('id', 'user'));
        }
    }

    public function checkfbpassword() {
        $id = Session::get('tempid');
        if ($id == '') {
            return Redirect::to('login');
        } else {
            $user = $this->user->getfirstbyid($id);
            return View::make('mainviews.fbcheckpassword', compact('id', 'user'));
        }
    }

    public function postcreatefbpassword() {
        $rules = array(
            'password' => 'required|alphaNum|min:6|max:12', //|alphaNum|min:6  for secure password
            'confirm_password' => 'required|same:password',
            'username' => 'required|unique:users|max:12',
            'question' => 'required',
            'answer' => 'required|min:3|max:12'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('fblogin/createpassword')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $input = Input::all();
            $email = $this->user->createfbpassword($input);
            $this->sendsignupmessage($email);
            $selectedlanguage = Session::get('locale');
            Session::flash('success', Lang::get('messages2.activateyouraccount', array(), $selectedlanguage));
            Session::forget('tempid');
            return Redirect::to('login');
        }
    }

    public function postcheckfbpassword() {
        $rules = array(
            'password' => 'required|alphaNum|min:6', //|alphaNum|min:6  for secure password
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('fblogin/checkpassword')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $input = Input::all();
            $isactive = $this->user->checkstatusfblogin($input['id']);
            if ($isactive == '') {
                Session::flash('failed', 'Invalid Credentials!');
                return Redirect::back();
            } else {
                $email = $this->user->checkfbpassword($input);
                if ($email === 2) {
                    Session::flash('failed', 'Please verify your email before login!');
                    return Redirect::back();
                } else {
                    if ($email === 0) {
                        Session::flash('failed', 'Login Failed!');
                        return Redirect::back();
                    } else {
                        $ipaddress = Request::getClientIp();
                        $result = $this->user->updatelastlogin($email, $ipaddress);
                        Session::put('image', $result['image']);
                        Session::put('name', $result['name']);
                        Session::put('userid', $result['userid']);
                        Session::put('email', $email);
                        Session::flash('success', 'Login Successful!');
                        Session::forget('tempid');
                        return Redirect::to('/');
                    }
                }
            }
        }
    }

	
	


}
