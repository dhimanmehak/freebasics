<?php

use fundstarter\storage\Category\CategoryRepository as CategoryRepository;
use fundstarter\storage\Country\CountryRepository as CountryRepository;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Reward\RewardRepository as RewardRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;
use fundstarter\storage\Update\UpdateRepository as UpdateRepository;
use fundstarter\storage\Comment\CommentRepository as CommentRepository;
use fundstarter\storage\Backing\BackingRepository as BackingRepository;
use fundstarter\storage\Faq\FaqRepository as FaqRepository;
use fundstarter\storage\Request\RequestRepository as RequestRepository;
use fundstarter\storage\Membership\MembershipRepository as MembershipRepository;
use fundstarter\storage\Followproject\FollowprojectRepository as FollowprojectRepository;
use fundstarter\storage\Projectview\ProjectviewRepository as ProjectviewRepository;
use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepository;
use fundstarter\storage\Admin\AdminRepository as AdminRepository;
use Carbon\Carbon;

class CreateController extends BaseController {

    public function __construct(CurrencyRepository $currencyRepository, ProjectviewRepository $projectviewRepository, FollowprojectRepository $followprojectRepository, MembershipRepository $membershipRepository, RequestRepository $requestRepository, FaqRepository $faqRepository, CommentRepository $commentRepository, BackingRepository $backingRepository, UserRepository $userRepository, UpdateRepository $updateRepository, NewsletterRepository $newsletterRepository, AdminsettingRepository $adminsettingRepository, RewardRepository $rewardRepository, ProjectRepository $projectRepository, CategoryRepository $categoryRepository, CountryRepository $countryRepository, AdminRepository $adminRepository) {
        $this->category = $categoryRepository;
        $this->country = $countryRepository;
        $this->project = $projectRepository;
        $this->user = $userRepository;
        $this->reward = $rewardRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->newsletter = $newsletterRepository;
        $this->update = $updateRepository;
        $this->comment = $commentRepository;
        $this->backing = $backingRepository;
        $this->faq = $faqRepository;
        $this->request = $requestRepository;
        $this->membership = $membershipRepository;
        $this->followproject = $followprojectRepository;
        $this->projectview = $projectviewRepository;
        $this->currency = $currencyRepository;
		$this->admin = $adminRepository;
    }

    public function index() {
		
		
		
        $email = Session::get('email');
        if ($email == '') {
            //return Redirect::to('login')->with('redirectUrl', $requestUrl
			return Redirect::to('login');
			
        } else {
            $categories = $this->category->all();
            $countries = $this->country->all();
            return View::make('mainviews.create.start', compact('categories', 'countries'));
        }
    }

public function financial($id) {
        
        $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $views = $this->projectview->getanalytics($id);
            $countries = $this->country->all();
            $categories = $this->category->all();
            $currencies = $this->currency->all();
            $projectdetails = $this->project->getbyprojectidcreator($id);
            $fundinggoal = $projectdetails['fundinggoal'];
            $currencyid = $projectdetails['currencyid'];
            if ($fundinggoal != '' && $currencyid != '') {
                $currecny = $this->currency->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $projectdetails['fundinggoal'] = $fundinggoal * $rate;
            }
            if ($projectdetails['currencysymbol'] == '') {
                
            }
            if (empty($projectdetails)) {
                return View::make('mainviews.staticpages.404');
            } else {
                if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                    $basicstatus = 1;
                } else {
                    $basicstatus = 0;
                }
                if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                    $storystatus = 1;
                } else {
                    $storystatus = 0;
                }
                if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                    $aboutstatus = 1;
                } else {
                    $aboutstatus = 0;
                }
                if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                    $accountstatus = 1;
                } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                    $accountstatus = 2;
                } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                    $accountstatus = 3;
                } else {
                    $accountstatus = 0;
                }
                $rewards = $this->reward->getbyprojectidcreator($id);
                if ($rewards == '[]') {
                    $rewardstatus = 0;
                } else {
                    $rewardstatus = 1;
                }
            }
            return View::make('mainviews.create.financial', compact('currencies', 'views', 'basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'countries', 'categories'));
        }
    }

    public function poststart() {
        
        $rules = array(
            'title' => 'required|unique:projects,title,NULL,id,deleted_at,NULL', //|alphaNum|min:6  for secure password
            'country' => 'required|not_in:0'
            // 'project-captcha' => 'required|captcha'
        );
        $messages = array(
            'captcha' => 'Invalid captcha.'
        );

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('project/start')
                            ->withErrors($validator)->withInput();
        } else {
            $input = Input::all();
			$input['ipaddress'] = Request::getClientIp();
			
            $email = Session::get('email');
            $id = $this->user->getidbyemail($email);
            $input['userid'] = $id;
            $packagedetails = $this->user->checkpackageexists($id);
            $packageenddate = $packagedetails['packageenddate'];
            if ($packageenddate != 0) {
                $currenntdate = Carbon::now();
                if ($packageenddate >= $currenntdate) {
                    $input['feerecieved'] = 1;
                }
            }
            $input['feerecieved'] = 0;
            $title = $input['title'];
            $projid = $this->project->checkalreadyexists($title);
            if ($projid != '') {
                Session::flash('failed', 'Project title already exists!');
                return Redirect::back()->withInput();
                ;
            } else {
                $this->user->updatecreatedcount($input['userid']);
                $projectid = $this->project->saveuserproject($input);
            return Redirect::to('project/basic/' . Crypt::encrypt($projectid));
            }
        }
    }

    public function basic($id) {
        
        $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $views = $this->projectview->getanalytics($id);
            $countries = $this->country->all();
            $categories = $this->category->all();
            $currencies = $this->currency->all();
            $projectdetails = $this->project->getbyprojectidcreator($id);
            $fundinggoal = $projectdetails['fundinggoal'];
            $currencyid = $projectdetails['currencyid'];
			$fromcurrency=$projectdetails['currencytype'] ;
            if ($fundinggoal != '' && $currencyid != '') {
				$tocurrency = Session::get('currency');
			$currencyrepo = new CurrencyRepository;
			
                $currecny = $this->currency->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
				//$rate = $currencyrepo->convertcurrency($fromcurrency, $tocurrency);
                $projectdetails['fundinggoal'] = $fundinggoal * $rate;
            }
            if ($projectdetails['currencysymbol'] == '') {
                
            }
            if (empty($projectdetails)) {
                return View::make('mainviews.staticpages.404');
            } else {
                if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                    $basicstatus = 1;
                } else {
                    $basicstatus = 0;
                }
                if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                    $storystatus = 1;
                } else {
                    $storystatus = 0;
                }
                if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                    $aboutstatus = 1;
                } else {
                    $aboutstatus = 0;
                }
                if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                    $accountstatus = 1;
                } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                    $accountstatus = 2;
                } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                    $accountstatus = 3;
                } else {
                    $accountstatus = 0;
                }
                $rewards = $this->reward->getbyprojectidcreator($id);
                if ($rewards == '[]') {
                    $rewardstatus = 0;
                } else {
                    $rewardstatus = 1;
                }
            }
            return View::make('mainviews.create.basic', compact('currencies', 'views', 'basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'countries', 'categories'));
        }
    }



     public function basicstart($p_id) {
        
        $id = Crypt::decrypt($p_id);


       
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $views = $this->projectview->getanalytics($id);
            $countries = $this->country->all();
            $categories = $this->category->all();
            $currencies = $this->currency->all();
            $projectdetails = $this->project->getbyprojectidcreator($id);
          
            if (empty($projectdetails)) {
                return View::make('mainviews.staticpages.404');
            } else {
                if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                    $basicstatus = 1;
                } else {
                    $basicstatus = 0;
                }
                if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                    $storystatus = 1;
                } else {
                    $storystatus = 0;
                }
                if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                    $aboutstatus = 1;
                } else {
                    $aboutstatus = 0;
                }
                if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                    $accountstatus = 1;
                } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                    $accountstatus = 2;
                } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                    $accountstatus = 3;
                } else {
                    $accountstatus = 0;
                }
                $rewards = $this->reward->getbyprojectidcreator($id);
                if ($rewards == '[]') {
                    $rewardstatus = 0;
                } else {
                    $rewardstatus = 1;
                }
            }
            return View::make('mainviews.create.startnew', compact('currencies', 'views', 'basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'countries', 'categories'));
        }
    }


    

 public function postbasic() {
        
        $rules = array(
            'image' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
            'title' => 'required|unique:projects,title,NULL,id,deleted_at,NULL',
             'country' => 'required',
             'projectvideo' => 'mimes:jpg,jpeg,bmp,gif,png,m4v,avi,flv,mp4,3gp,mov,video/mp4|max:15000|required_if:uploaded,0',
            'shortblurb' => 'required|max:135'
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.',
            'fundinggoal.not_in' => 'Funding goal must be a valid number.',
			'projectvideo.required_if'=> trans('validation.required'),
        );


        $validator = Validator::make(Input::all(), $rules, $messages);

     
        if ($validator->fails()) {
            return Redirect::to('project/start')
                            ->withErrors($validator)->withInput();

                          
        
        } else {

            $input = Input::all();
          
		   
		   
            $email = Session::get('email');
            $id = $this->user->getidbyemail($email);
            $input['userid'] = $id;
            $packagedetails = $this->user->checkpackageexists($id);
            $packageenddate = $packagedetails['packageenddate'];
            if ($packageenddate != 0) {
                $currenntdate = Carbon::now();
                if ($packageenddate >= $currenntdate) {
                    $input['feerecieved'] = 1;
                }
            }
            $input['feerecieved'] = 0;
            $title = $input['title'];
            $projid = $this->project->checkalreadyexists($title);
            
            if ($projid != '') {
                Session::flash('failed', 'Project title already exists!');
                return Redirect::back()->withInput();
                ;
            } 
            
            else 
            {
                $this->user->updatecreatedcount($input['userid']);
                $projectid = $this->project->saveuserproject($input);

               
               $location=$input['country'];
               $shortblurb=$input['shortblurb'];
               $description=$input['description'];
               $risks=$input['risks'];
           
            $image = Input::file('image');
			  $projectvideo = Input::file('projectvideo');
            $input['id'] = $projectid ;
            $input['location'] = $location ;
            $input['shortblurb'] = $shortblurb ;
             $input['description'] = $description ;
              $input['risks'] = $risks ;
            
            if ($image != '') {
                $destinationPath = 'uploads/images/projects/' . $projectid;
                $imagemimetype = $image->getClientOriginalExtension();
                $file = 'projectimage.' . $imagemimetype;
                $image->move($destinationPath, $file);
                $imglink = $destinationPath . '/' . $file;
                $input['image'] = $imglink;
            } else {
                $input['image'] = '';
            }
			if($projectvideo !='')
			{
				$destinationPath = 'uploads/images/projects' . '/' . $input['id'];
                        $projectmimetype = $project->getClientOriginalExtension();
                        $filename = "projectvideo";
                        $file = $filename . '.' . $projectmimetype;
                        $project->move($destinationPath, $file);
                        $projectlink = $destinationPath . '/' . $file;
                        $input1['projectvideo'] = $projectlink;
						$input1['id'] = $projectid;
						$this->project->updateprojectstory($input1);
			}
			else {
                $input['projectvideo'] = '';
            }
			
			
            $id = $this->user->getidbyemail($email);
            $input['userid'] = $id;
            
			 $youtube  = $input['youtubelink'];
             
					
            $this->project->saveuserbasic($input);
            
			
            
                 
				

				 }
    }
	
 }
 



     public function postbasicupdate() {
		 
		 
        $rules = array(
            'image' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000|required_if:uploaded,0',
            'title' => 'required',
            'fundinggoal' => 'required|numeric|not_in:0',
            'fundingduration' => 'required',
            'shortblurb' => 'required|max:135'
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.',
            'fundinggoal.not_in' => 'Funding goal must be a valid number.',
			'image.required_if'=> trans('validation.required'),
			
			 
        );


        $validator = Validator::make(Input::all(), $rules, $messages);
        $selectedlanguage = Session::get('locale');
        $projectid = Input::get('id');
		
		
        if ($validator->fails()) {
            return Redirect::to('project/basic/' . Crypt::encrypt($projectid))
                            ->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            $email = Session::get('email');
            $image = Input::file('image');
            if ($image != '') {
                $destinationPath = 'uploads/images/projects/' . $projectid;
                $imagemimetype = $image->getClientOriginalExtension();
                $file = 'projectimage.' . $imagemimetype;
                $image->move($destinationPath, $file);
                $imglink = $destinationPath . '/' . $file;
                $input['image'] = $imglink;
            } else {
                $input['image'] = '';
            }
            $id = $this->user->getidbyemail($email);
            $input['userid'] = $id;
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

            if ($fundingduration > 60) {
                Session::flash('failed', 'Funding duration cannot exceed 60 days!');
                return Redirect::back();
            } else {
                $input['fundingduration'] = $fundingduration;
                $input['endingon'] = $endingon;
                $this->project->saveuserbasic($input);
                Session::flash('success', Lang::get('messages2.updatedsuccessfully',array(),$selectedlanguage));
                //echo $projectid;exit;
                return Redirect::to("project/reward/" . Crypt::encrypt($projectid));
                //return $this->reward($projectid);
            }
        }
    }


public function basicupdate($id)
{


    $rules = array(
            'image' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
            'title' => 'required',
           
            'shortblurb' => 'required|max:135',
            'projectvideo' => 'mimes:jpg,jpeg,bmp,gif,png,m4v,avi,flv,mp4,3gp,mov,video/mp4|max:15000|required_if:uploaded,0',
                'description' => 'required',
                'risks' => 'required'
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.',
            'fundinggoal.not_in' => 'Funding goal must be a valid number.',
            'projectvideo.required_if'=> trans('validation.required'),
                'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png,m4v,avi,flv,mp4,3gp,mov.'
        );


        $validator = Validator::make(Input::all(), $rules, $messages);
        $selectedlanguage = Session::get('locale');
        $projectid = Input::get('id');
		 
		
        if ($validator->fails()) {
            return Redirect::to('project/start/' . Crypt::encrypt($projectid))
                            ->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            
            $email = Session::get('email');
            $image = Input::file('image');
            
             $input['location']=$input['country'];
             $input['description'] = $input['description'] ;
            
            if ($image != '') {
                $destinationPath = 'uploads/images/projects/' . $projectid;
                $imagemimetype = $image->getClientOriginalExtension();
                $file = 'projectimage.' . $imagemimetype;
                $image->move($destinationPath, $file);
                $imglink = $destinationPath . '/' . $file;
                $input['image'] = $imglink;
            } else {
                $input['image'] = '';
            }
            $id = $this->user->getidbyemail($email);
            $input['userid'] = $id;
            
           
              
                $this->project->saveuserbasic($input);


                 $youtube = Input::get('youtubelink');
                
                $project = Input::file('projectvideo');
                
                if (($project != '') && ($youtube != '')) {
                    Session::flash('failed', 'You can upload video or paste your youtube link!');
                    return Redirect::back();
                } else {
                    if ($project != '') {
                        $destinationPath = 'uploads/images/projects' . '/' . $input['id'];
                        $projectmimetype = $project->getClientOriginalExtension();
                        $filename = "projectvideo";
                        $file = $filename . '.' . $projectmimetype;
                        $project->move($destinationPath, $file);
                        $projectlink = $destinationPath . '/' . $file;
                        $input1['projectvideo'] = $projectlink;
                    } elseif ($youtube != '') {
                        if (strpos($youtube, 'www.youtube.com/watch?v=') !== false) {
                            $temp = explode('?v=', $youtube);
                            $source = $temp[1];
                            $link = "http://www.youtube.com/embed/" . $source;
                            $input1['projectvideo'] = $link;
                        } else {
                            Session::flash('failed', 'Please enter valid youtube url!');
                            return Redirect::back();
                        }
                    } else {
                        $input1['projectvideo'] = '';
                    }
                    $input1['id'] = $projectid;
                    $input1['description']=$input['description'];
                    $input1['risks']=$input['risks'];
                    $this->project->updateprojectstory($input1);
                
                Session::flash('success', Lang::get('messages2.updatedsuccessfully',array(),$selectedlanguage));
                //echo $projectid;exit;
                return Redirect::to("project/financial/" . Crypt::encrypt($projectid));
                //return $this->reward($projectid);
            
        }
   
    }
}

 public function postfinancial() {
        $rules = array(
             'fundinggoal' => 'required|numeric|not_in:0',
            'fundingduration' => 'required',
        );

        $messages = array(
            
            'fundinggoal.not_in' => 'Funding goal must be a valid number.'
        );


        $validator = Validator::make(Input::all(), $rules, $messages);

       $projectid = Input::get('id');
      
      
        if ($validator->fails()) {
                return Redirect::to('project/financial/' . Crypt::encrypt($projectid))
                            ->withInput()->withErrors($validator);
        
        } else {

            $input = Input::all();
            $email = Session::get('email');
            $id = $this->user->getidbyemail($email);
            $input['userid'] = $id;
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

                if ($fundingduration < 1) {
                Session::flash('failed', 'Funding duration cannot less than 1 day!');
                return Redirect::back();
            } else {
                $input['fundingduration'] = $fundingduration;
                $input['endingon'] = $endingon;
                $this->project->saveuserfinancial($input);
                //Session::flash('success', Lang::get('messages2.updatedsuccessfully',array(),$selectedlanguage));
                //echo $projectid;exit;
                return Redirect::to("project/preview/" . Crypt::encrypt($projectid));
                //return $this->reward($projectid);
            }




        }
    }


 public function reward($id) {
        $id = Crypt::decrypt($id);

        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $countries = $this->country->all();
            $projectdetails = $this->project->getbyprojectidcreator($id);
            $rewards = $this->reward->getbyprojectidcreator($id);
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            return View::make('mainviews.create.reward', compact('basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'countries', 'id', 'rewards'));
        }
    }
    
    public function postreward() {
        //echo "<pre>";print_r($_POST);"</pre>";exit;
        $projectid = Input::get('id');
        $input = Input::all();
        if (Input::has('limit')) {
            $input['islimited'] = 1;
        } else {
            $input['islimited'] = 0;
        }
        //echo "<pre>";print_r($input['id']);"</pre>";exit;
        $selectedlanguage = Session::get('locale');
        if (isset($input['pledgeamount']) && !empty($input['pledgeamount']) && isset($input['description']) && !empty($input['description']) && isset($input['estimateddelivery']) && !empty($input['estimateddelivery'])) {
            $this->reward->create($input);
            Session::flash('success', Lang::get('messages2.updatedsuccessfully',array(),$selectedlanguage));
        } else {
            Session::flash('success', 'Updated successfully!');
        }
        return Redirect::to("project/story/" . Crypt::encrypt($projectid));
    }

    public function editreward($id) {
        $reward = $this->reward->getbyidcreator($id);
        $countries = $this->country->all();
        return View::make('mainviews.create.editreward', compact('reward', 'countries'));
    }

    public function posteditreward() {
        $input = Input::all();
        if (Input::has('limit')) {
            $input['islimited'] = 1;
        } else {
            $input['islimited'] = 0;
        }
        $this->reward->update($input);
        return Redirect::back();
    }

    public function story($id) {
        $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $projectdetails = $this->project->getbyprojectidcreator($id);
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            $rewards = $this->reward->getbyprojectidcreator($id);
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            return View::make('mainviews.create.story', compact('basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails'));
        }
    }

    public function deletereward($id) {
        $this->reward->deletebyid($id);
        $selectedlanguage = Session::get('locale');
        Session::flash('success', Lang::get('messages2.deletedsuccessfully',array(),$selectedlanguage));
        return Redirect::back();
    }

    public function postprojectstory() {
        $email = Session::get('email');
        $selectedlanguage = Session::get('locale');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $rules = array(
                //'projectvideo' => 'mimes:jpg,jpeg,bmp,gif,png,m4v,avi,flv,mp4,3gp,mov,video/mp4|max:15000|required_if:uploaded,0',
                'description' => 'required',
                'risks' => 'required'
            );
            $messages = array(
               // 'projectvideo.required_if'=> trans('validation.required'),
               // 'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png,m4v,avi,flv,mp4,3gp,mov.'
            );
           
            $validator = Validator::make(Input::all(), $rules, $messages);
            $projectid = Input::get('id');
            if ($validator->fails()) {
                return Redirect::to('project/story/' . Crypt::encrypt($projectid))
                                ->withErrors($validator)->withInput();
            } else {
                $youtube = Input::get('youtubelink');
                $input = Input::all();
                $project = Input::file('projectvideo');
                if (($project != '') && ($youtube != '')) {
                    Session::flash('failed', 'You can upload video or paste your youtube link!');
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
                            Session::flash('failed', 'Please enter valid youtube url!');
                            return Redirect::back();
                        }
                    } else {
                        $input['projectvideo'] = '';
                    }
                    $this->project->updateprojectstory($input);
                    Session::flash('success', Lang::get('messages2.updatedsuccessfully',array(),$selectedlanguage));
                    //return Redirect::back();
                    return Redirect::to("project/preview/" . Crypt::encrypt($projectid));
                    //return $this->about($projectid);
                }
            }
        }
    }

    public function about($id) {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $projectdetails = $this->project->getbyprojectidcreator($id);
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            $rewards = $this->reward->getbyprojectidcreator($id);
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            $userid = $this->user->getidbyemail($email);
            $userdetails = $this->user->getfirstbyid($userid);
            $countries = $this->country->all();
            return View::make('mainviews.create.about', compact('basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'userdetails', 'countries'));
        }
    }

    public function postabout() {
        $rules = array(
            'image' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
            'biography' => 'required',
            'state' => 'required'
        );
        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        $selectedlanguage = Session::get('locale');
        $projectid = Input::get('id');
        if ($validator->fails()) {
            return Redirect::to('project/about/' . $projectid)
                            ->withErrors($validator);
        } else {
            $input = Input::all();
            $email = Session::get('email');
            $image = Input::file('image');
            if ($image != '') {
                $destinationPath = 'uploads/images/users/';
                $imagemimetype = $image->getClientOriginalExtension();
                $file = $email . '.' . $imagemimetype;
                $image->move($destinationPath, $file);
                $imglink = $destinationPath . '/' . $file;
                $input['image'] = $imglink;
            } else {
                $input['image'] = '';
            }
            $this->user->updateabout($input);
            Session::flash('success', Lang::get('messages2.updatedsuccessfully',array(),$selectedlanguage));
            //return Redirect::back();
            return Redirect::to("project/account/" . $projectid);
            //return $this->account($projectid);
        }
    }

    public function account($id) {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $projectdetails = $this->project->getbyprojectidcreator($id);
            //echo "<pre>";print_r($projectdetails);"</pre>";exit;
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            $rewards = $this->reward->getbyprojectidcreator($id);
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            $userid = $this->user->getidbyemail($email);
            $userdetails = $this->user->getfirstbyid($userid);
            $countries = $this->country->all();
            $packages = $this->membership->getpackages();
            return View::make('mainviews.create.account', compact('packages', 'basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'countries', 'userdetails', 'email'));
        }
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

        Session::flash('email-success', 'Verification mail sent!');
       // return Redirect::back();
    }

    public function confirmsendverification($id, $code) {
        $email = $this->user->updatemailstatus($id, $code);
        $selectedlanguage = Session::get('locale');
        if (Session::get('email') == $email) {            
            Session::flash('success', 'Email address verified!');
            return Redirect::to('editprofile');
        } else {
            Session::flash('success', Lang::get('messages2.emailaddressverified',array(),$selectedlanguage));
            return Redirect::to('login');
        }
    }

    public function savemobile() {
        $input = Input::all();
        $this->user->savemobilenumber($input);
        Session::flash('success', 'Mobile number saved!');
        return Redirect::back();
    }

    public function postidentity() {
        $rules = array(
            'address1' => 'required',
//          'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required|not_in:0',
            'zipcode' => 'required|numeric|not_in:0',
            'recipient' => 'required',
            'paypal_email' => 'required|email'
        );
        $validator = Validator::make(Input::all(), $rules);
        $projectid = Input::get('id');
        if ($validator->fails()) {
            return Redirect::to('project/account/' . $projectid)
                            ->withErrors($validator)->withInput();
        } else {
            $input = Input::all();
            if ($input['recipient'] == "individual") {
                $input['business_type'] = "";
            }
            $this->project->saveidentity($input);
            Session::flash('success', 'Identity saved!');
            return Redirect::back();
        }
    }

    public function postproof() {
        $rules = array(
            'identityproof' => 'required|image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
            'prooftype' => 'required|not_in:0'
        );
        $validator = Validator::make(Input::all(), $rules);
        $projectid = Input::get('id');
        if ($validator->fails()) {
            return Redirect::to('project/account/' . $projectid)
                            ->withErrors($validator)->withInput();
        } else {
            $input = Input::all();
            $identityproof = Input::file('identityproof');
            $destinationPath = 'uploads/images/projects' . '/' . $input['id'];
            $projectmimetype = $identityproof->getClientOriginalExtension();
            $filename = "identityproof";
            $file = $filename . '.' . $projectmimetype;
            $identityproof->move($destinationPath, $file);
            $identityprooflink = $destinationPath . '/' . $file;
            $input['identityproof'] = $identityprooflink;
            $this->project->saveproof($input);
            Session::flash('success', 'Identity proof saved!');
            return Redirect::back();
        }
    }

    public function preview($id) {
        $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $views = $this->projectview->getanalytics($id);
            //print_r($views);exit;
            $projectdetails = $this->project->getbyprojectidcreator($id);
            $userid = $this->user->getidbyemail($email);
            $userdetails = $this->user->getfirstbyid($userid);
            $creatorbacked = $this->backing->creatorbackedprojects($userid);
            $creatorcreated = $this->project->getallbyuser($userid);
            $project = $this->project->getbyprojectidcreator($id);
            $fundinggoal = $projectdetails['fundinggoal'];
            $currencyid = $projectdetails['currencyid'];
            if ($fundinggoal != '' && $currencyid != '') {
                $currecny = $this->currency->getcurrencybyid($currencyid);
                $rate = $currecny['currencyrate'];
                $project['fundinggoal'] = $fundinggoal * $rate;
            }
            $rewards = $this->reward->getbyprojectidcreator($id);
            $updates = $this->update->getbyprojectid($id);
            $comments = $this->comment->getalldetailsbyprojectid($id);
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            $projectdetails['website'] = $this->addhttp($projectdetails['weburl']);
            return View::make('mainviews.create.preview', compact('creatorcreated', 'creatorbacked', 'views', 'basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'comments', 'projectdetails', 'userdetails', 'updates', 'email', 'project', 'rewards'));
        }
    }

    public function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }

    public function updates($id) {
         $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $projectdetails = $this->project->getbyprojectidcreator($id);

            $userid = $this->user->getidbyemail($email);
            $project = $this->project->getbyprojectidcreator($id);
            $updates = $this->update->getbyprojectid($id);
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            $rewards = $this->reward->getbyprojectidcreator($id);
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            return View::make('mainviews.create.update', compact('basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'userid', 'email', 'project', 'updates'));
        }
    }

    public function postupdate() {
        $rules = array(
            'title' => 'required',
         'description' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        $selectedlanguage = Session::get('locale');
        $projectid = Input::get('id');
       
        if ($validator->fails()) {
            return Redirect::to('project/updates/' . Crypt::encrypt($projectid))
                            ->withErrors($validator)->withInput();
        } else {
            $input = Input::all();
           
           
            $this->update->create($input);
            $this->sendmailtobackers($projectid);
            $this->sendmailtofollowers($projectid);
            Session::flash('success', Lang::get('messages2.updatedsuccessfully',array(),$selectedlanguage));
            return Redirect::back();
            //return $this->backers($projectid);
        }
    }

    public function deleteupdate($id) {
        $this->update->deletebyid($id);
        $selectedlanguage = Session::get('locale');
        Session::flash('success', Lang::get('messages2.deletedsuccessfully',array(),$selectedlanguage));
        return Redirect::back();
    }

    public function editupdate($id) {
        $update = $this->update->getbyid($id);
        return View::make('mainviews.create.editupdate', compact('update'));
    }

    public function posteditupdate() {
        $input = Input::all();
        $this->update->update($input);
        Session::flash('success', 'Edit Successfull!!!');
        return Redirect::back();
    }

    public function faq($id) {
        $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $projectdetails = $this->project->getbyprojectidcreator($id);
            $userid = $this->user->getidbyemail($email);
            $project = $this->project->getbyprojectidcreator($id);
            $faqs = $this->faq->getbyprojectid($id);
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            $rewards = $this->reward->getbyprojectidcreator($id);
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            return View::make('mainviews.create.faq', compact('basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'userid', 'email', 'project', 'faqs'));
        }
    }

    public function postfaq() {
        $rules = array(
            'question' => 'required',
            'answer' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        $projectid = Input::get('id');
        if ($validator->fails()) {
            return Redirect::to('project/faq/' . Crypt::encrypt($projectid))
                            ->withErrors($validator)->withInput();
        } else {
            $input = Input::all();
            $question = $input['question'];
            $projectid = $input['id'];
            $answer = $input['answer'];
            $count = Faq::where('question', '=', $question)->where('projectid', '=', $projectid)->count();
            if ($count > 0) {
                Session::flash('exist', 'FAQ Already Exist');
            } else {
                $this->faq->create($input);
                Session::flash('success', 'FAQ added Successfully');
            }
            return Redirect::back();
            //return $this->backers($projectid);
        }
    }

    public function deletefaq($id) {
        $this->faq->deletebyid($id);
        $selectedlanguage = Session::get('locale');
        Session::flash('success', Lang::get('messages2.deletedsuccessfully',array(),$selectedlanguage));
        return Redirect::back();
    }

    public function editfaq($id) {
        $faq = $this->faq->getbyid($id);
        return View::make('mainviews.create.editfaq', compact('faq'));
    }

    public function posteditfaq() {
        $input = Input::all();
        $this->faq->update($input);
        Session::flash('success', 'Edit Successfull!!!');
        return Redirect::back();
    }

    public function deleteproject($id) {
        $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $project = $this->project->getbasicdetailsbyid($id);
            return View::make('mainviews.create.deleteconfirmation', compact('project'));
        }
    }

    public function postdeleteproject($id) {
		
		$projectid = Crypt::decrypt($id);
		
       
            $email = Session::get('email');
            
            
                $this->comment->deletebyprojectid($projectid);
                $this->update->deletebyprojectid($projectid);
                $this->reward->deletebyprojectid($projectid);
                $this->project->deletebyid($projectid);
                $userid = $this->project->getuseridforliveproject($projectid);
				
                if ($userid != '') {
                    $this->user->removecreatedcount($userid);
                }
                $selectedlanguage = Session::get('locale');
                Session::flash('success', Lang::get('messages2.deletedsuccessfully',array(),$selectedlanguage));
                return Redirect::to('createdprojects');
            
        
    }

    public function sendmailtobackers($projectid) {
        $project = $this->project->getbasicdetailsbyid($projectid);
        $projecttitle = $project->title;
        $adminsettings = $this->adminsetting->getfirst();
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $templatename = "projectupdates";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        //$subject = $templatedetails['subject'];
        $subject = "Freebasics project update";
        $emails = $this->backing->getbackersbyprojectid($projectid);
				
        if ($emails != '') {
            foreach ($emails as $temp) {
                $email = $temp->email;
				
                $data = array(
                    'name' => $temp->firstname,
                    'email' => $email,
                    'logo' => $logo,
                    'title' => $title,
                    'projecttitle' => $projecttitle,
                    'projectid' => $projectid,
                    'subject' => $templatedetails['subject'],
                    'sendername' => $templatedetails['sendername'],
                    'senderemail' => $templatedetails['senderemail']
                );
                Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
                    $message->to($email)->subject($subject);
                });
            }
        }
    }

    public function sendmailtofollowers($projectid) {
        $project = $this->project->getbasicdetailsbyid($projectid);
        $projecttitle = $project->title;
        $adminsettings = $this->adminsetting->getfirst();
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $templatename = "projectupdates";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $subject = $templatedetails['subject'];
        $emails = $this->followproject->getfollowersbyprojectid($projectid);
        if ($emails != '') {
            foreach ($emails as $temp) {
                $email = $temp->email;
                $data = array(
                    'name' => $temp->firstname,
                    'email' => $email,
                    'logo' => $logo,
                    'title' => $title,
                    'projecttitle' => $projecttitle,
                    'projectid' => $projectid,
                    'subject' => $templatedetails['subject'],
                    'sendername' => $templatedetails['sendername'],
                    'senderemail' => $templatedetails['senderemail']
                );
                Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($email, $subject) {
                    $message->to($email)->subject($subject);
                });
            }
        }
    }

    public function backers($id) {
        $id = Crypt::decrypt($id);
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $projectdetails = $this->project->getbyprojectidcreator($id);
            $backingdetails = $this->backing->getallbackersbyprojectid($id);
            $withoutrewards = $this->backing->getallbackerswithoutrewardbyprojectid($id);
            $userid = $this->user->getidbyemail($email);
            $project = $this->project->getbyprojectidcreator($id);
            $updates = $this->update->getbyprojectid($id);
            if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
                $basicstatus = 1;
            } else {
                $basicstatus = 0;
            }
            if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
                $storystatus = 1;
            } else {
                $storystatus = 0;
            }
            if (($projectdetails['firstname'] != '') && ($projectdetails['lastname'] != '') && ($projectdetails['country'] != '') && ($projectdetails['state'] != '') && ($projectdetails['biography'] != '') && ($projectdetails['image'] != '')) {
                $aboutstatus = 1;
            } else {
                $aboutstatus = 0;
            }
            if (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 2) && ($projectdetails['proofverified'] == 2)) {
                $accountstatus = 1;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 1) && ($projectdetails['proofverified'] == 1)) {
                $accountstatus = 2;
            } elseif (($projectdetails['email'] != '') && ($projectdetails['idverified'] == 3) && ($projectdetails['proofverified'] == 3)) {
                $accountstatus = 3;
            } else {
                $accountstatus = 0;
            }
            $rewards = $this->reward->getbyprojectidcreator($id);
            if ($rewards == '[]') {
                $rewardstatus = 0;
            } else {
                $rewardstatus = 1;
            }
            return View::make('mainviews.create.backers', compact('basicstatus', 'rewardstatus', 'storystatus', 'aboutstatus', 'accountstatus', 'projectdetails', 'withoutrewards', 'backingdetails', 'userid', 'email', 'project', 'updates'));
        }
    }

    public function postrewardstatus() {
        $id = Input::get('backingid');
        $this->backing->updaterewardstatus($id);
        return Redirect::back();
    }

    public function storytest($id) {
        $email = Session::get('email');
        if ($email == '') {
            return Redirect::to('login');
        } else {
            $projectdetails = $this->project->getbyprojectidcreator($id);
            return View::make('mainviews.create.storytest', compact('projectdetails'));
        }
    }

    public function postrequest() {
        $input = Input::all();
        $this->request->create($input);
		$adminsettings = $this->adminsetting->getfirst();
		$subadminsetting = $this->admin->getallsubadmin();
		
		foreach($subadminsetting as $subadminsettings)
		{
		$subadmins[]= $subadminsettings->email;
		
		}
		 
		 $emails=$subadmins;
		
        $templatename = "changerequest";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        //$subject = $templatedetails['subject'];
		$project_title=$input['projecttitle'];
		$subject="Freebasics Change Request";
        $data = array(
            //'email' => $email,
            'logo' => $logo,
            'title' => $title,
            'subject' 	=> $templatedetails['subject'],
            'sendername' => $templatedetails['sendername'],
            'senderemail' => $templatedetails['senderemail'],
			'project_title' => $project_title
        );
		
        Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($emails, $subject) {
            $message->to($emails)->subject($subject);
        });
        Session::flash('success', Lang::get('messages2.requestsuccessfullysent'));
        return Redirect::back();
    }

    public function loadshippinglist($i, $selected_country) {
        $selected_countryArr = explode(':', urldecode($selected_country));
        //print_r($selected_country); die;
        //echo $selected_countryArr[1];die;
        $countryList = $this->country->all();
        echo '<tr id="tab_' . $i . '"><td width="30%"><p id="shipping_to_' . $i . '_lab" ></p><select name="shipping_to[]" id="shipping_to_' . $i . '" class="shipping_to" style="width: 200px; padding: 3px 0px; box-shadow: none; border: 1px solid rgb(205, 205, 205);"    onchange="display_sel_val(this); toggleDisability(this);">';
        echo '<option value="">Select a location</option>';
        foreach ($countryList as $country) {
            if (in_array($country->name, $selected_countryArr, TRUE)) {
                echo'<option value="' . $country->name . '" disabled>' . $country->name . '</option>';
            } else {
                echo'<option value="' . $country->id . '|' . $country->name . '">' . $country->name . '</option>';
            }
        }
        echo '</select><input type="hidden" name="ship_to_id[]" id="shipping_to_' . $i . '_id" />
		</td>
		<td width="20%" style="margin: 0px 0px 0px 50px;"><p style="width:auto; margin:2px 4px 0 0px">$</p><input type="text" value="" class="shipping_txt_box"  name="shipping_cost[]" id="shipping_cost_' . $i . '"></td>
		<td width="20%" style="margin: 0px 0px 0px 50px;"><p style="width:auto; margin:2px 4px 0 0px">$</p><input type="text" value="" class="shipping_txt_box"  name="shipping_with_another[]" id="shipping_with_another_' . $i . '"><a class="fa fa-close" onClick="close_shipping(' . $i . ')" href="javascript:void(0)" style="margin:7px 0 0 5px" id="' . $i . '"></a></td>
		</tr>
		';
    }

    public function projectviews() {
        return $this->projectview->getanalytics(30);
    }

    public function deletevideo() {
        $projectid = Input::get('videoid');
        $videodata = Project::find($projectid);
        $videoname = $videodata['projectvideo'];
        if (!empty($videoname) && isset($videoname) && !empty($projectid) && isset($projectid)) {
            $videodata->projectvideo = "";
            $videodata->update();
            Session::flash('success', 'Project video deleted successfully!!');
            return "1";
        }
    }

    public function publishproject() {
        $projectid = Input::get('projectid');
		
		 $input['ipaddress'] = Request::getClientIp();
		 
		
		 
        
        $projectdetails = $this->project->getbyprojectidcreator($projectid);
        $selectedlanguage = Session::get('locale');
        if (($projectdetails['title'] != '') && ($projectdetails['projectimage'] != '') && ($projectdetails['fundinggoal'] != 0) && ($projectdetails['fundingduration'] != 0) && ($projectdetails['shortblurb'] != '')) {
            $basicstatus = 1;
        } else {
            $basicstatus = 0;
        }
        if (($projectdetails['projectvideo'] != '') && ($projectdetails['description'] != '') && ($projectdetails['risks'] != '')) {
            $storystatus = 1;
        } else {
            $storystatus = 0;
        }
        $rewards = $this->reward->getbyprojectidcreator($projectid);
        if ($rewards == '[]') {
            $rewardstatus = 0;
        } else {
            $rewardstatus = 1;
        }
        $projetcdata = Project::find($projectid);
		
         $rewardstatus=1;
         $storystatus=1;
        
        if ($basicstatus != 0) {

            if ($rewardstatus != 0) {

                if ($storystatus != 0) {

                    $userid = $this->project->getuserid($projectid);
                   
                    $getstatus = $this->user->getverificationstatus($userid);
                    
                    if ($getstatus == 2) {
                        $projetcdata->projectverified = 1;
						$projetcdata->projectip = $input['ipaddress'];
                        $projetcdata->update();
                        Session::flash('success', Lang::get('messages2.adminapproval',array(),$selectedlanguage));
						
						 $adminsettings = $this->adminsetting->getfirst();
						 
		 $email=$adminsettings->adminemail;
		 
		 $subadmins = array();
		 	$subadminsetting = $this->admin->getallsubadmin();
		
		foreach($subadminsetting as $subadminsettings)
		{
		$subadmins[]= $subadminsettings->email;
		
		}
		
          $emails=$subadmins;		
        $templatename = "sendprojectapproval";
        $templatedetails = $this->newsletter->getbytemplatename($templatename);
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
		$project_title=$projetcdata->title;
        //$subject = $templatedetails['subject'];
		$subject="New Project submit for approval";
        $data = array(
           // 'email' => $email,
            'logo' => $logo,
            'title' => $title,
            'subject' 	=> $templatedetails['subject'],
            'sendername' => $templatedetails['sendername'],
            'senderemail' => $templatedetails['senderemail'],
			'project_title' =>$project_title
        );
        Mail::send('emails.newsletters.' . $templatename, $data, function($message)use ($emails, $subject) {
            $message->to($emails)->subject($subject);
        });
		
						
						
                      //  return Redirect::back();
                        return Redirect::back()->with('open_modal', 1);
                    } else {
                        return Redirect::to('editprofile')->withInput()->with('error', Lang::get('messages2.youcantpostproject',array(),$selectedlanguage));
                    }
                } else {
                    Session::flash('error', Lang::get('messages2.storypartisincomplete',array(),$selectedlanguage));
                    return Redirect::back();
                }
            } else {
                Session::flash('error', Lang::get('messages2.rewardspartisincomplete',array(),$selectedlanguage));
                return Redirect::back();
            }
        } else {
            Session::flash('error', Lang::get('messages2.basicpartisincomplete',array(),$selectedlanguage));
            return Redirect::back();
        }
    }

	
	 
	
    public function getcurrencysymbol() {
        $currencyid = Input::get('currency');
        return $this->currency->getsymbolbyid($currencyid);
    }
	
	public function disconnectstripe(){
	    $email = Session::get('email');
        $userid = $this->user->getidbyemail($email);
        if($userid) {
            $userid = $this->user->disconnectstripe($userid);
            Session::flash('success', 'Stripe Successfully Disconnected!');
            return Redirect::to('stripesettings');
        }
    }

}
