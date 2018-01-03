<?php

namespace fundstarter\storage\Adminsetting;

//use fundstarter\storage\Adminsettings\AdminsettingRepository as AdminsettingsettingRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Adminsetting;

class AdminsettingRepository implements IAdminsettingRepository {

    public function all() {
        $adminsetting = new Adminsetting;
        return $adminsetting->all();
    }

    public function create(array $input) {
        $adminsetting = new Adminsetting;
        $adminsetting->id = $input['id'];
        $adminsetting->dropboxemail = $input['dropboxemail'];
        $adminsetting->dropboxpassword = $input['dropboxpassword'];
        $adminsetting->contactmail = $input['contactmail'];
        $adminsetting->contactnumber = $input['contactnumber'];
        $adminsetting->emailtitle = $input['emailtitle'];
        $adminsetting->googleverification = $input['googleverification'];
        $adminsetting->googeverificationcode = $input['googeverificationcode'];
        $adminsetting->facebooklink = $input['facebooklink'];
        $adminsetting->twitterlink = $input['twitterlink'];
        $adminsetting->pinterestlink = $input['pinterestlink'];
        $adminsetting->googlepluslink = $input['googlepluslink'];
        $adminsetting->linkedinlink = $input['linkedinlink'];
        $adminsetting->rsslink = $input['rsslink'];
        $adminsetting->youtubelink = $input['youtubelink'];
        $adminsetting->footercontent = $input['footercontent'];
        $adminsetting->logo = $input['logo'];
        $adminsetting->metatitle = $input['metatitle'];
        $adminsetting->metakeyword = $input['metakeyword'];
        $adminsetting->metadescription = $input['metadescription'];
        $adminsetting->favicon = $input['favicon'];
        $adminsetting->watermark = $input['watermark'];
        $adminsetting->facebookapi = $input['facebookapi'];
        $adminsetting->facebooksecretkey = $input['facebooksecretkey'];
        $adminsetting->paypalapiname = $input['paypalapiname'];
        $adminsetting->paypalapipwd = $input['paypalapipwd'];
        $adminsetting->paypalapikey = $input['paypalapikey'];
        $adminsetting->paypalid = $input['paypalid'];
        $adminsetting->paypallive = $input['paypallive'];
        $adminsetting->smtpport = $input['smtpport'];
        $adminsetting->smtpusername = $input['smtpusername'];
        $adminsetting->smtppassword = $input['smtppassword'];
        $adminsetting->consumerkey = $input['consumerkey'];
        $adminsetting->consumersecret = $input['consumersecret'];
        $adminsetting->googleclientsecret = $input['googleclientsecret'];
        $adminsetting->googleclientid = $input['googleclientid'];
        $adminsetting->googleredirecturl = $input['googleredirecturl'];
        $adminsetting->googledeveloperkey = $input['googledeveloperkey'];
        $adminsetting->facebookappid = $input['facebookappid'];
        $adminsetting->facebookappsecret = $input['facebookappsecret'];
        $adminsetting->liketext = $input['liketext'];
        $adminsetting->unliketext = $input['unliketext'];
        $adminsetting->bannertext = $input['bannertext'];
        $adminsetting->twilioaccountid = $input['twilioaccountid'];
        $adminsetting->twilioaccounttoken = $input['twilioaccounttoken'];
        $adminsetting->twiliophonenumber = $input['twiliophonenumber'];
        $adminsetting->googlemapapi = $input['googlemapapi'];
        $adminsetting->hometitle1 = $input['hometitle1'];
        $adminsetting->hometitle2 = $input['hometitle2'];
        $adminsetting->save();
        return 1;
    }

    public function savesetting(array $input) {
        $adminsetting = new Adminsetting;
        $id = $input['adminsettingsid'];
        $data = $adminsetting->find($id);
        $data->adminname = $input['admin'];
        $data->adminemail = $input['email'];
        $data->contactmail = $input['contactemail'];
        $data->contactnumber = $input['contactnumber'];
        $data->sitetitle = $input['sitename'];
        $data->footercontent = $input['footercontent'];
        if ($input['logolink'] != '') {
            $data->logo = $input['logolink'];
        }
        if ($input['faviconlink'] != '') {
            $data->favicon = $input['faviconlink'];
        }
        if ($input['watermarklink'] != '') {
            $data->watermark = $input['watermarklink'];
        }
        if ($input['footerlogolink'] != '') {
            $data->footerlogo = $input['footerlogolink'];
        }
        $data->hometitle1 = $input['hometitle1'];
        $data->language = $input['language'];
        $data->currency = $input['currency'];
        $data->listingfee = $input['listingfee'];
        $data->paypalapiname = $input['paypalapiname'];
        $data->paypalapipwd = $input['paypalapipwd'];
        $data->paypalapikey = $input['paypalapikey'];
        $data->paypalid = $input['paypalid'];
        $data->paypalmode = $input['paypalmode'];
        $data->paypalclientid = $input['paypalclientid'];
        $data->paypalsecret = $input['paypalsecret'];
        $data->twilioaccountid = $input['twilioaccountid'];
        $data->twilioaccounttoken = $input['twilioauth'];
        $data->twiliophonenumber = $input['twiliophone'];
        $data->googlemapapi = $input['googlemapapi'];
        $data->paginationlimit = 10;
        $data->save();
    }

    public function savesocialsetting(array $input) {
        $adminsetting = new Adminsetting;
        $id = $input['id'];
        $data = $adminsetting->find($id);
        $data->googleclientsecret = $input['googleclientsecret'];
        $data->googleclientid = $input['googleclientid'];
        $data->googleredirecturl = $input['googleredirecturl'];
        $data->googledeveloperkey = $input['googledeveloperkey'];
        $data->facebookappid = $input['facebookappid'];
        $data->facebooksecretkey = $input['facebookappsecret'];
        $data->facebooklink = $input['facebooklink'];
        $data->consumerkey = $input['consumerkey'];
        $data->consumersecret = $input['consumersecret'];
        $data->accesstoken = $input['accesstoken'];
        $data->facebookaccesstoken = $input['facebookaccesstoken'];
        $data->accesstokensecret = $input['accesstokensecret'];
        $data->twitterlink = $input['twitterlink'];
        $data->pinterestlink = $input['pinterestlink'];
        $data->googlepluslink = $input['googlepluslink'];
        $data->youtubelink = $input['youtubelink'];
        $data->bannertext = $input['banner'];
        $data->save();
    }

    public function saveseosetting($input) {
        $adminsetting = new Adminsetting;
        $id = $input['id'];
        $data = $adminsetting->find($id);
        $data->metatitle = $input['metatitle'];
        $data->metakeyword = $input['metakeyword'];
        $data->metadescription = $input['metadescription'];
        $data->googleanalyticscode = addslashes($input['googleanalytics']);
        $data->googleverification = $input['googleverification'];
        $data->save();
    }

    public function savesmtpsetting(array $input) {
        $adminsetting = new Adminsetting;
        $id = $input['id'];
        $data = $adminsetting->find($id);
        $data->smtphost = $input['smtphost'];
        $data->smtpport = $input['smtpport'];
        $data->smtpusername = $input['smtpusername'];
        $data->smtppassword = $input['smtppassword'];
        $data->save();
    }

    public function updatecommission($input) {
        $adminsetting = new Adminsetting;
        $id = $input['adminsettingsid'];
        $data = $adminsetting->find($id);
        $data->admincommission = $input['admincommission'];
        $data->affcommissiontype = $input['affiliatetype'];
        $data->affiliatecommission = $input['affiliatecommission'];
        $data->save();
    }

    public function getadmincommission() {
        $adminsetting = new Adminsetting;
        return $adminsetting->first();
    }

    public function update(array $input) {

        $email = Session::get('email');
        $id = $this->getid($email);
        $adminsetting = $this->find($id)->first();
        $adminsetting->id = $input['id'];
        $adminsetting->dropboxemail = $input['dropboxemail'];
        $adminsetting->dropboxpassword = $input['dropboxpassword'];
        $adminsetting->contactmail = $input['contactmail'];
        $adminsetting->contactnumber = $input['contactnumber'];
        $adminsetting->emailtitle = $input['emailtitle'];
        $adminsetting->googleverification = $input['googleverification'];
        $adminsetting->googeverificationcode = $input['googeverificationcode'];
        $adminsetting->facebooklink = $input['facebooklink'];
        $adminsetting->twitterlink = $input['twitterlink'];
        $adminsetting->pinterestlink = $input['pinterestlink'];
        $adminsetting->googlepluslink = $input['googlepluslink'];
        $adminsetting->linkedinlink = $input['linkedinlink'];
        $adminsetting->rsslink = $input['rsslink'];
        $adminsetting->youtubelink = $input['youtubelink'];
        $adminsetting->footercontent = $input['footercontent'];
        $adminsetting->logo = $input['logo'];
        $adminsetting->metatitle = $input['metatitle'];
        $adminsetting->metakeyword = $input['metakeyword'];
        $adminsetting->metadescription = $input['metadescription'];
        $adminsetting->favicon = $input['favicon'];
        $adminsetting->watermark = $input['watermark'];
        $adminsetting->facebookapi = $input['facebookapi'];
        $adminsetting->facebooksecretkey = $input['facebooksecretkey'];
        $adminsetting->paypalapiname = $input['paypalapiname'];
        $adminsetting->paypalapipwd = $input['paypalapipwd'];
        $adminsetting->paypalapikey = $input['paypalapikey'];
        $adminsetting->paypalid = $input['paypalid'];
        $adminsetting->paypallive = $input['paypallive'];
        $adminsetting->smtpport = $input['smtpport'];
        $adminsetting->smtpusername = $input['smtpusername'];
        $adminsetting->smtppassword = $input['smtppassword'];
        $adminsetting->consumerkey = $input['consumerkey'];
        $adminsetting->consumersecret = $input['consumersecret'];
        $adminsetting->googleclientsecret = $input['googleclientsecret'];
        $adminsetting->googleclientid = $input['googleclientid'];
        $adminsetting->googleredirecturl = $input['googleredirecturl'];
        $adminsetting->googledeveloperkey = $input['googledeveloperkey'];
        $adminsetting->facebookappid = $input['facebookappid'];
        $adminsetting->facebookappsecret = $input['facebookappsecret'];
        $adminsetting->liketext = $input['liketext'];
        $adminsetting->unliketext = $input['unliketext'];
        $adminsetting->bannertext = $input['bannertext'];
        $adminsetting->twilioaccountid = $input['twilioaccountid'];
        $adminsetting->twilioaccounttoken = $input['twilioaccounttoken'];
        $adminsetting->twiliophonenumber = $input['twiliophonenumber'];
        $adminsetting->googlemapapi = $input['googlemapapi'];
        $adminsetting->hometitle1 = $input['hometitle1'];
        $adminsetting->hometitle2 = $input['hometitle2'];
        $adminsetting->save();
    }

    public function getbyid($id) {
        $adminsetting = new Adminsetting;
        return $adminsetting->where('id', '=', $id)->get();
    }

    public function getfirst() {
        $adminsetting = new Adminsetting;
        return $adminsetting->first();
    }

}
