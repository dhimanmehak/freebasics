<?php

use fundstarter\storage\Category\CategoryRepository as CategoryRepository;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\Reward\RewardRepository as RewardRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Backing\BackingRepository as BackingRepository;
use fundstarter\storage\Comment\CommentRepository as CommentRepository;
use fundstarter\storage\Inboxmsg\InboxmsgRepository as InboxmsgRepository;
use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepository;
use Carbon\Carbon;

class ProfileController extends BaseController {

    public function __construct(CurrencyRepository $currencyRepository, InboxmsgRepository $inboxmsgRepository, BackingRepository $backingRepository, CommentRepository $commentRepository, UserRepository $userRepository, CategoryRepository $categoryRepository, RewardRepository $rewardRepository, ProjectRepository $projectRepository) {
        $this->category = $categoryRepository;
        $this->project = $projectRepository;
        $this->reward = $rewardRepository;
        $this->user = $userRepository;
        $this->backing = $backingRepository;
        $this->comment = $commentRepository;
        $this->inboxmsg = $inboxmsgRepository;
        $this->currency = $currencyRepository;
    }

    public function messages() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $recievedmsgs = $this->inboxmsg->getrecievedmsgbyid($id);
			
            return View::make('mainviews.stuff.message', compact('sendmsgs', 'recievedmsgs'));
        }
    }

    public function viewmessages($senderid) {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $name = $this->user->getfirstbyid($senderid);
            $id = $this->user->getidbyemail($email);
            $msgs = $this->inboxmsg->getmsgsbyuserid($id, $senderid);
            $selectmsg = Inboxmsg::where('senderid', '=', $senderid)->where('recieverid', '=', $id)->get();
            foreach ($selectmsg as $val) {
                $inboxmsg = Inboxmsg::find($val->id);
                $inboxmsg->status = 1;
                $inboxmsg->update();
            }//exit;
            return View::make('mainviews.stuff.viewmessage', compact('name', 'id', 'msgs'));
        }
    }

    public function postmessage() {
        $email = Session::get('email');
        $selectedlanguage = Session::get('locale');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $input = Input::all();
            $senderid = $this->user->getidbyemail($email);
            $input['senderid'] = $senderid;
            $this->inboxmsg->create($input);
            Session::flash('success', Lang::get('messages2.messagesuccessfullysent',array(),$selectedlanguage));
            return Redirect::back();
        }
    }

    public function deleteinboxmessage($id) {
        $this->inboxmsg->updaterecieverstatus($id);
        Session::flash('success', 'Delete sucessfull!');
        return Redirect::back();
    }

    public function viewinboxmessage($id) {
        $this->inboxmsg->updatemessagestatus($id);
        return $id;
    }

    public function deletesentmessage($id) {
        $this->inboxmsg->updatesenderstatus($id);
        Session::flash('success', 'Delete sucessfull!');
        return Redirect::back();
    }

    public function profile() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $details = $this->user->getfirstbyid($id);
            $date = new Carbon($details['createdon']);
            $formatted = $date->toFormattedDateString();
            $details['createdon'] = $formatted;
            $allcategories = $this->category->getallascending();
            $categories = DB::table('categories')
                    ->leftjoin('backings', 'backings.categoryid', '=', 'categories.id')
                    ->select('categories.id', 'categories.categoryname', DB::raw('count(categoryid) as total'))
                    ->where('backings.userid', '=', $id)
                    ->groupBy('categoryname')
                    ->orderBy('categoryname', 'asc')
                    ->get();
            $backedprojects = $this->backing->getbackingbyuserid($id);
            $walletbal = $this->wallet();
            $createdprojects = $this->project->getprojectsbyuserid($id);
            $commentscount = $this->comment->getcountbyuserid($id);
            $details['website'] = $this->addhttp($details['weburl']);
            View::share('metatitle', $details['firstname'] . ' ' . $details['lastname']);
            View::share('metakeyword', $details['firstname'] . ' ' . $details['lastname']);
            View::share('metadescription', $details['firstname'] . ' ' . $details['lastname']);
            return View::make('mainviews.stuff.profile', compact('walletbal', 'createdprojects', 'details', 'categories', 'allcategories', 'backedprojects', 'commentscount'));
        }
    }
    
        public function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }

    public function created() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $details = $this->user->getfirstbyid($id);
            $date = new Carbon($details['createdon']);
            $formatted = $date->toFormattedDateString();
            $details['createdon'] = $formatted;
            $allcategories = $this->category->getallascending();
            $categories = DB::table('categories')
                    ->leftjoin('backings', 'backings.categoryid', '=', 'categories.id')
                    ->select('categories.id', 'categories.categoryname', DB::raw('count(categoryid) as total'))
                    ->where('backings.userid', '=', $id)
                    ->groupBy('categoryname')
                    ->orderBy('categoryname', 'asc')
                    ->get();
            $createdprojects = $this->project->getprojectsbyuserid($id);
            $commentscount = $this->comment->getcountbyuserid($id);
            $backedprojects = $this->backing->getbackingbyuserid($id);
            View::share('metatitle', $details['firstname'] . ' ' . $details['lastname']);
            View::share('metakeyword', $details['firstname'] . ' ' . $details['lastname']);
            View::share('metadescription', $details['firstname'] . ' ' . $details['lastname']);
            return View::make('mainviews.stuff.created', compact('backedprojects', 'details', 'categories', 'allcategories', 'createdprojects', 'commentscount'));
        }
    }

    public function comments() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $details = $this->user->getfirstbyid($id);
            $date = new Carbon($details['createdon']);
            $formatted = $date->toFormattedDateString();
            $details['createdon'] = $formatted;
            $allcategories = $this->category->getallascending();
            $categories = DB::table('categories')
                    ->leftjoin('backings', 'backings.categoryid', '=', 'categories.id')
                    ->select('categories.id', 'categories.categoryname', DB::raw('count(categoryid) as total'))
                    ->where('backings.userid', '=', $id)
                    ->groupBy('categoryname')
                    ->orderBy('categoryname', 'asc')
                    ->get();
            $comments = $this->comment->getbyuserid($id);
            $createdprojects = $this->project->getprojectsbyuserid($id);
            $commentscount = $this->comment->getcountbyuserid($id);
            $backedprojects = $this->backing->getbackingbyuserid($id);
            View::share('metatitle', $details['firstname'] . ' ' . $details['lastname']);
            View::share('metakeyword', $details['firstname'] . ' ' . $details['lastname']);
            View::share('metadescription', $details['firstname'] . ' ' . $details['lastname']);
            return View::make('mainviews.stuff.comments', compact('backedprojects', 'createdprojects', 'details', 'categories', 'allcategories', 'comments', 'commentscount'));
        }
    }

    public function userprofile($username) {
        $id = $this->user->getidbyusername($username);
        $details = $this->user->getfirstbyid($id);
        $date = new Carbon($details['createdon']);
        $formatted = $date->toFormattedDateString();
        $details['createdon'] = $formatted;
        $allcategories = $this->category->getallascending();
        $categories = DB::table('categories')
                ->leftjoin('backings', 'backings.categoryid', '=', 'categories.id')
                ->select('categories.id', 'categories.categoryname', DB::raw('count(categoryid) as total'))
                ->where('backings.userid', '=', $id)
                ->groupBy('categoryname')
                ->orderBy('categoryname', 'asc')
                ->get();
        $backedprojects = $this->backing->getbackingbyuserid($id);
        $createdprojects = $this->project->getprojectsbyuserid($id);
        $commentscount = $this->comment->getcountbyuserid($id);
        $walletbal = "userprofile";
        View::share('metatitle', $details['firstname'] . ' ' . $details['lastname']);
        View::share('metakeyword', $details['firstname'] . ' ' . $details['lastname']);
        View::share('metadescription', $details['firstname'] . ' ' . $details['lastname']);
        return View::make('mainviews.stuff.profile', compact('walletbal', 'createdprojects', 'details', 'categories', 'allcategories', 'backedprojects', 'commentscount'));
    }

    public function usercreated($username) {
        $id = $this->user->getidbyusername($username);
        $details = $this->user->getfirstbyid($id);
        $date = new Carbon($details['createdon']);
        $formatted = $date->toFormattedDateString();
        $details['createdon'] = $formatted;
        $allcategories = $this->category->getallascending();
        $categories = DB::table('categories')
                ->leftjoin('backings', 'backings.categoryid', '=', 'categories.id')
                ->select('categories.id', 'categories.categoryname', DB::raw('count(categoryid) as total'))
                ->where('backings.userid', '=', $id)
                ->groupBy('categoryname')
                ->orderBy('categoryname', 'asc')
                ->get();
        $userprofile="user";
        $createdprojects = $this->project->getprojectsbyuserid($id);
        $commentscount = $this->comment->getcountbyuserid($id);
        $backedprojects = $this->backing->getbackingbyuserid($id);
        View::share('metatitle', $details['firstname'] . ' ' . $details['lastname']);
        View::share('metakeyword', $details['firstname'] . ' ' . $details['lastname']);
        View::share('metadescription', $details['firstname'] . ' ' . $details['lastname']);
        return View::make('mainviews.stuff.created', compact('userprofile','backedprojects', 'details', 'categories', 'allcategories', 'createdprojects', 'commentscount'));
    }

    public function usercomments($username) {
        $id = $this->user->getidbyusername($username);
        $details = $this->user->getfirstbyid($id);
        $date = new Carbon($details['createdon']);
        $formatted = $date->toFormattedDateString();
        $details['createdon'] = $formatted;
        $allcategories = $this->category->getallascending();
        $categories = DB::table('categories')
                ->leftjoin('backings', 'backings.categoryid', '=', 'categories.id')
                ->select('categories.id', 'categories.categoryname', DB::raw('count(categoryid) as total'))
                ->where('backings.userid', '=', $id)
                ->groupBy('categoryname')
                ->orderBy('categoryname', 'asc')
                ->get();
        $comments = $this->comment->getbyuserid($id);
        $createdprojects = $this->project->getprojectsbyuserid($id);
        $commentscount = $this->comment->getcountbyuserid($id);
        $backedprojects = $this->backing->getbackingbyuserid($id);
        View::share('metatitle', $details['firstname'] . ' ' . $details['lastname']);
        View::share('metakeyword', $details['firstname'] . ' ' . $details['lastname']);
        View::share('metadescription', $details['firstname'] . ' ' . $details['lastname']);
        return View::make('mainviews.stuff.comments', compact('backedprojects', 'createdprojects', 'details', 'categories', 'allcategories', 'comments', 'commentscount'));
    }

    public function activity() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $recentbackings = $this->backing->getrecentbackedprojectsbyuserid($id);
            return View::make('mainviews.stuff.activity', compact('recentbackings'));
        }
    }

    public function createdprojects() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $createdprojects = $this->project->getprojectsbyuserid($id);
           // return count($createdprojects);
            return View::make('mainviews.stuff.createdprojects', compact('createdprojects'));
        }
    }

    public function backedprojects() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $backedprojects = $this->backing->getbackedprojectsbyuserid($id);
            $backednorewardprojects = $this->backing->getbackednorewardprojectsbyuserid($id);
            return View::make('mainviews.stuff.backedprojects', compact('backedprojects', 'backednorewardprojects'));
        }
    }

    public function wallet() {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $id = $this->user->getidbyemail($email);
            $credits = $this->user->getusercredits($id);
            if (Config::get('adminconfig.affcommissiontype') == "flat") {
                $amount = Config::get('adminconfig.affiliatecommission');
                $totalcredits = $credits * $amount;
            }
            $wallet = array();
            if (Session::has('currency')) {
                $fromcurrency = Config::get('adminconfig.currency');
                $tocurrency = Session::get('currency');
                $rate = $this->currency->convertcurrency($fromcurrency, $tocurrency);
                $symbol = $this->currency->getsymbol($tocurrency);
                $walletamt = $totalcredits * $rate;
                $wallet['symbol'] = $symbol;
                $wallet['credits'] = $walletamt;
                return $wallet;
            } else {
                $fromcurrency = Config::get('adminconfig.currency');
                $symbol = $this->currency->getsymbol($fromcurrency);
                $rate = 1;
                $walletamt = $totalcredits * $rate;
                $wallet['symbol'] = $symbol;
                $wallet['credits'] = $walletamt;
                return $wallet;
            }
        }
    }

}
