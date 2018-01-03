<?php

use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Admin\AdminRepository as AdminRepository;

class AdminsettingController extends BaseController {

    public function __construct(AdminsettingRepository $adminsettingrepository, AdminRepository $adminrepository) {
        $this->adminsetting = $adminsettingrepository;
        $this->admin = $adminrepository;
    }

    public function index() {
        $admins = $this->admin->all();
        $adminsettings = $this->adminsetting->all();
        return View::make('adminviews.admin.settings', compact('admins', 'adminsettings'));
    }

    public function smtpsettings() {
        $adminsettings = $this->adminsetting->all();
        return View::make('adminviews.admin.smtpsettings', compact('adminsettings'));
    }

    public function postsmtpsettings() {
        $input = Input::all();
        $this->adminsetting->savesmtpsetting($input);
		$this->filewrite();
        Session::flash('success', 'SMTP settings updated successfully');
        return Redirect::back();
    }

    public function postadminsettings() {
        $rules = array(
            'logo' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
            'favicon' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
            'watermark' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
            'footerlogo' => 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000',
        );

        $messages = array(
            'image' => 'File format is not supported. Allowed format are jpg,bmp,gif,png.'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $input = Input::all();
            $logo = Input::file('logo');
            $destinationPath = 'uploads/images';
            if ($logo != '') {
                $logomimetype = $logo->getClientOriginalExtension();
                $file = 'logo.' . $logomimetype;
                $logo->move($destinationPath, $file);
                $logolink = $destinationPath . '/' . $file;
                $input['logolink'] = $logolink;
            } else {
                $input['logolink'] = '';
            }
            $favicon = Input::file('favicon');
            if ($favicon != '') {
                $faviconmimetype = $favicon->getClientOriginalExtension();
                $faviconfile = 'favicon.' . $faviconmimetype;
                $favicon->move($destinationPath, $faviconfile);
                $faviconlink = $destinationPath . '/' . $faviconfile;
                $input['faviconlink'] = $faviconlink;
            } else {
                $input['faviconlink'] = '';
            }
            $watermark = Input::file('watermark');
            if ($watermark != '') {
                $watermarkmimetype = $watermark->getClientOriginalExtension();
                $watermarkfile = 'watermark.' . $watermarkmimetype;
                $watermark->move($destinationPath, $watermarkfile);
                $watermarklink = $destinationPath . '/' . $watermarkfile;
                $input['watermarklink'] = $watermarklink;
            } else {
                $input['watermarklink'] = '';
            }

            $footerlogo = Input::file('footerlogo');
            if ($footerlogo != '') {
                $footerlogomimetype = $footerlogo->getClientOriginalExtension();
                $footerlogofile = 'footerlogo.' . $footerlogomimetype;
                $footerlogo->move($destinationPath, $footerlogofile);
                $footerlogolink = $destinationPath . '/' . $footerlogofile;
                $input['footerlogolink'] = $footerlogolink;
            } else {
                $input['footerlogolink'] = '';
            }
            $adminid = Input::get('adminid');
            $adminname = Input::get('admin');
            $adminemail = Input::get('email');
            $this->admin->updateadmindetails($adminid, $adminname, $adminemail);
            $this->adminsetting->savesetting($input);
            $this->filewrite();
            Session::flash('success', 'Settings updated successfully');
            return Redirect::back();
        }
    }

    public function postsocialsettings() {
        $input = Input::all();
        $this->adminsetting->savesocialsetting($input);
        $this->filewrite();
        Session::flash('success', 'Social media settings updated successfully');
        return Redirect::back();
    }

    public function postseosettings() {
        $input = Input::all();
        $this->adminsetting->saveseosetting($input);
        $this->filewrite();
        Session::flash('success', 'Search engine settings updated successfully');
        return Redirect::back();
    }

    public function postlogin() {
        $input = Input::all();
        $password = $input['password'];
        $hashed = $this->admin->checklogin($input['email']);
        $result = Hash::check($password, $hashed);
        if ($result == 1) {
            $ipaddress = Request::getClientIp();
            $this->admin->updatelastlogin($input['email'], $ipaddress);
            Session::put('email', $input['email']);
            return Redirect::to('admindashboard');
        } else {
            Session::flash('failed', 'Invalid Username/Password');
            return Redirect::to('adminlogin');
        }
    }

public function filewrite() {
        $adminsettings = $this->adminsetting->all();
        $adminarrays = json_decode($adminsettings, true);
        foreach ($adminarrays As $adminarray) {
            $config = '<?php return array(' . "\n\n";
            foreach ($adminarray as $key => $val) {
                $temp = addslashes($val);
                $config .= "'$key' => '$temp',\n\n";
            }
            $config .= ' ); ?>';
            $file = ADMINCONFIG;
            file_put_contents($file, $config);
        }
    }

    public function commissionsettings() {
        $adminsettings = $this->adminsetting->all();
        return View::make('adminviews.admin.commissionsetting', compact('adminsettings'));
    }

    public function postcommissionsettings() {
        $input = Input::all();
        $this->adminsetting->updatecommission($input);
        $this->filewrite();
        Session::flash('success', 'Update successfully!');
        return Redirect::back();
    }

}
