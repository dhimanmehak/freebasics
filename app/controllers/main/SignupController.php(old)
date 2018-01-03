<?php

use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\History\HistoryRepository as HistoryRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;
use fundstarter\storage\Subscription\SubscriptionRepository as SubscriptionRepository;
use Carbon\Carbon;

class SignupController extends BaseController {

    public function __construct(UserRepository $userRepository, HistoryRepository $historyRepository, AdminsettingRepository $adminsettingRepository, NewsletterRepository $newsletterRepository, SubscriptionRepository $subscriptionRepository) {
        $this->user = $userRepository;
        $this->history = $historyRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->newsletter = $newsletterRepository;
        $this->subscription = $subscriptionRepository;
    }

    public function index() {
        return View::make('mainviews.register');
    }

    public function login() {
        return View::make('mainviews.login');
    }

    public function postsignup() {

        $rules = array(
            'firstname' => 'required|min:3|max:18', // just a normal required validation
            'lastname' => 'required|min:3|max:18',
            'username' => 'required|unique:users|min:3|max:18',
            'email' => 'required|email|unique:users', // required and must be unique in the users table
            'confirm_email' => 'required|same:email',
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
//                if ($result === 2) {
//                    Session::flash('failed', Lang::get('messages2.pleaseverifyyouremailbeforelogin',array(),$selectedlanguage));
//                    return Redirect::to('login');
//                } else {
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
                        return Redirect::to('/');
                    } else {
                        Session::flash('success', 'Login Successfull!');
                        return Redirect::back();
                    }
                } else {
                    Session::flash('failed', 'Login Failed!');
                    return Redirect::to('login');
                }
//                }
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
        $name = $this->user->getusername($id);
        $adminsettings = $this->adminsetting->getfirst();
        $templatename = "signupmessage";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $subject = $templatedetails['subject'];
        $data = array(
            'email' => $email,
            'logo' => $logo,
            'title' => $title,
            'name' => $name,
            'id' => $id,
            'subject' => $templatedetails['subject'],
            'sendername' => $templatedetails['sendername'],
            'senderemail' => $templatedetails['senderemail']
        );
        Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
            $message->to($email)->subject($subject);
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
                $subject = $templatedetails['subject'];
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

    public function fblogin() {
        $facebook = new Facebook(Config::get('adminconfig'));
        $params = array(
            'redirect_uri' => url('loginfbcallback'),
            'scope' => 'email', 'user_friends', 'read_stream, friends_likes',
        );
        return Redirect::to($facebook->getLoginUrl($params));
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

    public function twitterlogin() {
        // your SIGN IN WITH TWITTER  button should point to this route
        $sign_in_twitter = true;
        $force_login = false;

        // Make sure we make this request w/o tokens, overwrite the default values in case of login.
        Twitter::reconfig(['token' => '', 'secret' => '']);
        $token = Twitter::getRequestToken(route('twitter.callback'));

        if (isset($token['oauth_token_secret'])) {
            $url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

            Session::put('oauth_state', 'start');
            Session::put('oauth_request_token', $token['oauth_token']);
            Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

            return Redirect::to($url);
        }

        return Redirect::route('twitter/error');
    }

    public function twitterlogincallback() {
        // You should set this route on your Twitter Application settings as the callback
        // https://apps.twitter.com/app/YOUR-APP-ID/settings

        if (Session::has('oauth_request_token')) {
            $request_token = [
                'token' => Session::get('oauth_request_token'),
                'secret' => Session::get('oauth_request_token_secret'),
            ];

            Twitter::reconfig($request_token);

            $oauth_verifier = false;

            if (Input::has('oauth_verifier')) {
                $oauth_verifier = Input::get('oauth_verifier');
            }

            // getAccessToken() will reset the token for you
            $token = Twitter::getAccessToken($oauth_verifier);

            if (!isset($token['oauth_token_secret'])) {
                return Redirect::to('twitter/login')->with('flash_error', 'We could not log you in on Twitter.');
            }

            $credentials = Twitter::getCredentials();
            if (is_object($credentials) && !isset($credentials->error)) {
                $screenname = $credentials->screen_name;
                $name = $credentials->name;
                $twitterid = $credentials->id;
                $image = $credentials->profile_image_url;
                $result = $this->user->checkaccountexists($twitterid);
                Session::put('access_token', $token);
                if ($result == '') {
                    Session::put('screenname', $screenname);
                    Session::put('twitterid', $twitterid);
                    Session::put('twittername', $name);
                    Session::put('twitterimage', $image);
                    return Redirect::to('twitter/createlogin');
                } else {
                    Session::put('tempid', $result);
                    return Redirect::to('twitter/checklogin');
                }
            }
            return Redirect::route('twitter/error')->with('flash_error', 'Crab! Something went wrong while signing you up!');
        }
    }

    public function twittercreatelogin() {
        $screenname = Session::get('screenname');
        $name = Session::get('twittername');
        $image = Session::get('twitterimage');
        $twitterid = Session::get('twitterid');
        return View::make('mainviews.twittercreatelogin', compact('screenname', 'name', 'image', 'twitterid'));
    }

    public function twitterchecklogin() {
        $id = Session::get('tempid');
        $user = $this->user->getfirstbyid($id);
        return View::make('mainviews.twitterchecklogin', compact('id', 'user'));
    }

    public function twittererror() {
        return 'error';
    }

    public function twitterlogout() {
        Session::forget('access_token');
        return Redirect::to('/')->with('flash_notice', 'You\'ve successfully logged out!');
    }

    public function posttwittercreatelogin() {
        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:6|max:12', //|alphaNum|min:6  for secure password
            'confirm_password' => 'required|same:password',
            'username' => 'required|unique:users|max:12',
            'question' => 'required',
            'answer' => 'required|min:3|max:12'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('twitter/createlogin')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $input = Input::all();
            $img = pathinfo($input['image']);
            $imagefile = file_get_contents($input['image']);
            $extension = $img['extension'];
            $file = 'uploads/images/users/' . $input['email'] . '.' . $extension;
            file_put_contents($file, $imagefile);
            $input['image'] = $file;
            $referralcookie = Cookie::get('referral');
            if ($referralcookie != '') {
                $input['referrer'] = $referralcookie;
            } else {
                $input['referrer'] = '';
            }
            $input['ipaddress'] = Request::getClientIp();
            $this->user->updatereferrercount($referralcookie);
            $email = $this->user->createtwitteraccount($input);
            $this->sendsignupmessage($email);
            Session::forget('screenname');
            Session::forget('twittername');
            Session::forget('twitterimage');
            Session::forget('twitterid');
            $cookie = Cookie::forget('referral');
            $selectedlanguage = Session::get('locale');
            Session::flash('success', Lang::get('messages2.activateyouraccount', array(), $selectedlanguage));
            return Redirect::to('login')->withCookie($cookie);
        }
    }

    public function posttwitterchecklogin() {
        $rules = array(
            'password' => 'required|alphaNum|min:6', //|alphaNum|min:6  for secure password
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('twitter/checklogin')
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
                        Session::flash('success', 'Login Successfull!');
                        Session::forget('tempid');
                        return Redirect::to('/');
                    }
                }
            }
        }
    }

}
