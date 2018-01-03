<?php

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */

use fundstarter\storage\Project\ProjectRepository as ProjectRepo;
use fundstarter\storage\Request\RequestRepository as RequestRepo;
use fundstarter\storage\Category\CategoryRepository as CategoryRepo;
use Carbon\Carbon;

Route::filter('role', function() {
    if (Session::get('admin') == '') {
        return Redirect::to('adminlogin');
    }
});

Route::filter('mainheader', function() {
    if (file_exists('dummy.php')) {
        App::singleton('project', function() {
            $email = Session::get('email');
            $id = User::where('email', '=', $email)->pluck('id');
            $project = Project::where('userid', '=', $id)->orderBy('id', 'DESC')->get(array('projectimage', 'title', 'id', 'projectverified', 'endingon'));
            foreach ($project as $t) {
                $end = new Carbon($t->endingon);
                $today = Carbon::now();
                $difference = $today->diffInDays($end, false);
                $t['dayscount'] = $difference;
            }
            return $project;
        });

        if (Session::get('admin') == "") {
            //  echo Redirect::away('adminlogin');die;
        }

        // If you use this line of code then it'll be available in any view
        // as $site_settings but you may also use app('site_settings') as well
        View::share('project', app('project'));


        if (Session::has('locale')) {
            $lang = Session::get('locale');
            App::setLocale($lang);
        } else {
            //App::setLocale('en');
			 App::setLocale(Config::get('adminconfig.language'));
        }



        //Messages
        $email = Session::get('email');
        $id = User::where('email', '=', $email)->pluck('id');
        $messages = Inboxmsg::where('recieverid', '=', $id)->where('status', '=', 0)->where('recieverstatus', '=', 'available')->count();
        View::share('headermsgs', $messages);

        //Draft and live projects
        $draftcount = Project::where('userid', '=', $id)->where('projectverified', '=', 0)->count();
        $pendingcount = Project::where('userid', '=', $id)->where('projectverified', '=', 1)->count();
        $livecount = Project::where('userid', '=', $id)->where('projectverified', '=', 2)->count();
        $suspendedcount = Project::where('userid', '=', $id)->where('projectverified', '=', 3)->count();
        View::share('projecttype', array('draftcount' => $draftcount, 'livecount' => $livecount, 'suspendedcount' => $suspendedcount, 'pendingcount' => $pendingcount));

        //Change Requests
        $requestrepo = new RequestRepo;
        $waitingrequests = $requestrepo->getwaitingrequests();
        View::share('waitingrequests', $waitingrequests);

        //profile image
        $headerpic = User::where('id', '=', $id)->pluck('image');
        View::share('headerpic', $headerpic);

        //Languages
        $languages = Language::where('status', '=', '1')->orderby('languagename', 'asc')->get();
        View::share('languages', $languages);

    //Categories
    $categoryrepo = new CategoryRepo;
    $categories = $categoryrepo->getallascending();
    View::share('categories', $categories);

        //Currencies
        $currencies = Currency::where('status', '=', 'active')->orderby('currencytype', 'asc')->get();
        View::share('currencies', $currencies);

        //Admin links
        $approvals = User::where('accountverified', '=', 1)->count();
        View::share('approvals', $approvals);

        $projectapprovals = Project::where('projectverified', '=', 1)->count();
        View::share('projectapprovals', $projectapprovals);

        $projectrepo = new ProjectRepo;
        $projs = $projectrepo->getallprojects();
        $i = 0;
        foreach ($projs as $proj) {
        if ($proj['selected'] == "yes") {
                $i++;
            }
        }
        View::share('transfers', $i);
        //Footer links
        App::singleton('pages', function() {
            $pages = Staticpage::where('status', '=', 'active')->where('footer', '=', 'on')->get();
            return $pages;
        });
        View::share('pages', app('pages'));

        //Header links
        App::singleton('headerlinks', function() {
            $headerlinks = Staticpage::where('status', '=', 'active')->where('header', '=', 'on')->where('parent', '=', 'null')->take(3)->get();
            return $headerlinks;
        });
        View::share('headerlinks', app('headerlinks'));

        App::singleton('submenu', function() {
            $submenu = Staticpage::where('status', '=', 'active')->where('header', '=', 'on')->where('parent', '!=', 'null')->take(3)->get();
            return $submenu;
        });
        View::share('submenu', app('submenu'));
    } else {
        return Redirect::to('install');
    }
});

App::before(function($request) {
    //
});

App::after(function($request, $response) {
    //
});

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

Route::filter('adminlogin', function($route, $request) {
    if (!Auth::user()->isAdmin()) {
        return App::abort(401, 'You are not authorized.');
    } else {
        return Redirect::to('admindashboard');
    }
});

Route::filter('auth', function() {
    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::guest('login');
        }
    }
});


Route::filter('auth.basic', function() {
    return Auth::basic();
});

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
    if (Auth::check())
        return Redirect::to('/');
});

/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
