<?php

/* ----------Installation Routes----------- */
Route::get('install', 'InstallationController@index');
Route::post('postinstall', 'InstallationController@postinstall');

/* ----------Installation Routes----------- */

/* -----------Admin Routes------------ */
Route::group(array('before' => 'mainheader'), function() {  //filter for checking databaseconfig file


/* -----------Admin Routes------------ */

Route::get('adminlogin', 'AdminController@index');
Route::post('postadminlogin', 'AdminController@postlogin');
Route::get('forgotpassword', 'AdminController@forgotpassword');
Route::post('adminsendpassword', 'AdminController@sendpassword');
Route::get('adminresetforgotpassword', 'AdminController@resetforgotpassword');
Route::post('postresetforgotpassword', 'AdminController@postresetforgotpassword');

Route::group(array('before' => 'role'), function() {
    Route::get('admindashboard', 'AdminController@dashboard');
    Route::get('adminuser', 'AdminController@adminuser');
    Route::get('changepassword', 'AdminController@changepassword');
    Route::get('paymentgateway', 'AdminController@paymentgateway');
    Route::get('editpaymentgateway', 'AdminController@editpaymentgateway');
    Route::post('posteditpaymentgateway', 'AdminController@posteditpaymentgateway');
    Route::get('contactlist', 'AdminController@contactus');
    Route::get('viewcontact', 'AdminController@viewcontactus');
    Route::get('deletecontact', 'AdminController@deletecontact');

    Route::get('adminlogout', 'AdminController@adminlogout');
    Route::post('postchangepassword', 'AdminController@postchangepassword');
    Route::get('transferfund', 'AdminController@transferfund');
    Route::get('paymentgatewaystatus/{id}/{status}', 'AdminController@paymentgatewaystatus');

    Route::get('adminsettings', 'AdminsettingController@index');
    Route::post('postadminsettings', 'AdminsettingController@postadminsettings');
    Route::post('postsocialsettings', 'AdminsettingController@postsocialsettings');
    Route::post('postseosettings', 'AdminsettingController@postseosettings');
    Route::get('smtpsettings', 'AdminsettingController@smtpsettings');
    Route::post('postsmtpsettings', 'AdminsettingController@postsmtpsettings');
    Route::get('commissionsettings', 'AdminsettingController@commissionsettings');
    Route::post('postcommissionsettings', 'AdminsettingController@postcommissionsettings');

    Route::get('subadminlist', 'SubadminController@index');
    Route::get('addsubadmin', 'SubadminController@addsubadmin');
    Route::post('postsubadmin', 'SubadminController@postsubadmin');
    Route::get('editsubadmin', 'SubadminController@editsubadmin');
    Route::get('viewsubadmin', 'SubadminController@viewsubadmin');
    Route::post('posteditsubadmin', 'SubadminController@posteditsubadmin');
    Route::get('deletesubadmin', 'SubadminController@deletesubadmin');
    Route::get('subadminstatus/{id}/{status}', 'SubadminController@subadminstatus');

    Route::get('user', 'UserController@index');
    Route::get('adduser', 'UserController@adduser');
    Route::post('postuser', 'UserController@postuser');
    Route::get('edituser', 'UserController@edituser');
    Route::get('viewuser', 'UserController@viewuser');
    Route::post('posteditbasic', 'UserController@posteditbasic');
    Route::post('posteditsocial', 'UserController@posteditsocial');
    Route::post('posteditadditional', 'UserController@posteditadditional');
    Route::get('userlist', 'UserController@userlist');
    Route::get('deleteuser', 'UserController@deleteuser');
    Route::get('referral', 'UserController@referral');
    Route::get('viewreferral', 'UserController@viewreferral');
    Route::get('userstatus/{id}/{status}', 'UserController@userstatus');
    Route::get('useremailstatus/{id}/{status}', 'UserController@useremailstatus');
    Route::post('postverification', 'UserController@postverification');
    Route::post('postnonverification', 'UserController@postnonverification');
    Route::get('exportusers', 'UserController@exportusers');


    Route::get('project', 'ProjectController@index');
    Route::get('addproject', 'ProjectController@addproject');
    Route::post('postaddproject', 'ProjectController@postaddproject');
    Route::get('addprojectdetails', 'ProjectController@addprojectdetails');
    Route::get('projectlist', 'ProjectController@projectlist');
    Route::get('viewproject', 'ProjectController@viewproject');
    Route::get('featureprojectlist', 'ProjectController@featureprojects');
    Route::post('postprojectdetails', 'ProjectController@postprojectdetails');
    Route::post('postprojectstory', 'ProjectController@postprojectstory');
    Route::post('postreward', 'ProjectController@postreward');
    Route::get('deletereward', 'ProjectController@deletereward');
    Route::get('deleteproject', 'ProjectController@deleteproject');
    Route::get('editreward', 'ProjectController@editreward');
    Route::post('posteditreward', 'ProjectController@posteditreward');
    Route::get('fundedprojectlist', 'ProjectController@fundedprojectlist');
    Route::get('verifyaccount', 'ProjectController@verifyaccount');
    Route::get('viewverifyaccount', 'ProjectController@viewverifyaccount');
    Route::post('senduseremailverification', 'ProjectController@sendverification');
    Route::post('postprojectseo', 'ProjectController@postprojectseo');
    Route::get('deleteverification', 'ProjectController@deleteverification');
    Route::get('updatefeatured', 'ProjectController@updatefeatured');
    Route::post('approveproject', 'ProjectController@approveproject');
    Route::get('exportprojects', 'ProjectController@exportprojects');
    Route::post('addremarks', 'ProjectController@addremarks');

    Route::get('backproject', 'BackingController@index');
    Route::get('backinglist', 'BackingController@backinglist');
    Route::get('projectpreview', 'BackingController@projectpreview');
    Route::get('backthisproject', 'BackingController@backthisproject');
    Route::post('postbacking', 'BackingController@postbacking');
    Route::get('paymentdetails', 'BackingController@paymentdetails');
    Route::post('postpayment', 'BackingController@postpayment');
    Route::get('deletebacking', 'BackingController@deletebacking');
    Route::get('backingbyprojectid', 'BackingController@backingbyprojectid');
    Route::get('exportbackers', 'BackingController@exportbackers');
    Route::post('backingmultipledelete', 'BackingController@deletemultiple');

    Route::get('getpaymentdetails', 'StripeController@adminpaymentdetails');
    
    Route::get('viewaddcomments', 'CommentController@index');
    Route::get('commentlist','CommentController@commentlist');
    Route::get('addcomment','CommentController@addcomment');
    Route::post('adminpostcomment','CommentController@adminpostcomment');
    Route::get('viewcomment','CommentController@viewcomment');
    Route::get('editcomment','CommentController@editcomment');
    Route::get('deletecomment','CommentController@deletecomment');
    Route::post('posteditcomment','CommentController@posteditcomment');

    Route::get('categorylist', 'CategoryController@index');
    Route::get('subcategorylist', 'CategoryController@subcategorylist');
    Route::get('addcategory', 'CategoryController@addcategory');
    Route::post('postaddcategory', 'CategoryController@postaddcategory');
    Route::get('editcategory', 'CategoryController@editcategory');
    Route::post('posteditcategory', 'CategoryController@posteditcategory');
    Route::get('deletecategory', 'CategoryController@deletecategory');
    Route::get('addsubcategory', 'CategoryController@addsubcategory');
    Route::post('postaddsubcategory', 'CategoryController@postaddsubcategory');
    Route::get('editsubcategory', 'CategoryController@editsubcategory');
    Route::post('posteditsubcategory', 'CategoryController@posteditsubcategory');
    Route::get('deletesubcategory', 'CategoryController@deletesubcategory');
    Route::get('categorystatus/{id}/{status}', 'CategoryController@categorystatus');
    Route::get('subcategorystatus/{id}/{status}', 'CategoryController@subcategorystatus');

    Route::get('subscriptionlist', 'NewsletterController@index');
    Route::get('editsubscription', 'NewsletterController@editsubscription');
    Route::post('posteditsubscription', 'NewsletterController@posteditsubscription');
    Route::get('deletesubscription', 'NewsletterController@deletesubscription');
    Route::get('templatelist', 'NewsletterController@templatelist');
    Route::get('addtemplate', 'NewsletterController@addtemplate');
    Route::post('postaddtemplate', 'NewsletterController@postaddtemplate');
    Route::get('edittemplate', 'NewsletterController@edittemplate');
    Route::get('deletetemplate', 'NewsletterController@deletetemplate');
    Route::post('postedittemplate', 'NewsletterController@postedittemplate');
    Route::get('viewtemplate', 'NewsletterController@viewtemplate');
    Route::get('massemail', 'NewsletterController@massemail');
    Route::post('postmassemail', 'NewsletterController@postmassemail');
    Route::post('sendnewsletter', 'NewsletterController@sendnewsletter');
    Route::get('subscriptionstatus/{id}/{status}', 'NewsletterController@subscriptionstatus');

    Route::get('countrylist', 'CountryController@index');
    Route::get('editcountry', 'CountryController@editcountry');
    Route::post('posteditcountry', 'CountryController@posteditcountry');
    Route::get('viewcountry', 'CountryController@viewcountry');
    Route::get('deletecountry', 'CountryController@deletecountry');
    Route::get('addcountry', 'CountryController@addcountry');
    Route::post('postaddcountry', 'CountryController@postaddcountry');
    Route::get('addstate', 'CountryController@addstate');
    Route::post('postaddstate', 'CountryController@postaddstate');
    Route::get('editstate', 'CountryController@editstate');
    Route::post('posteditstate', 'CountryController@posteditstate');
    Route::get('deletestate', 'CountryController@deletestate');
    Route::get('statelist', 'CountryController@statelist');
    Route::get('countrystatus/{id}/{status}', 'CountryController@countrystatus');
    Route::get('statestatus/{id}/{status}', 'CountryController@statestatus');

    Route::get('languagelist', 'LanguageController@index');
    Route::get('addlanguage', 'LanguageController@addlanguage');
    Route::post('postaddlanguage', 'LanguageController@postaddlanguage');
    Route::get('editlanguage', 'LanguageController@editlanguage');
    Route::post('posteditlanguage', 'LanguageController@posteditlanguage');
    Route::get('deletelanguage', 'LanguageController@deletelanguage');
    Route::get('languagestatus/{id}/{status}', 'LanguageController@languagestatus');

    Route::get('pagelist', 'StaticpageController@index');
    Route::get('addmainpage', 'StaticpageController@addmainpage');
    Route::post('postmainpage', 'StaticpageController@postmainpage');
    Route::get('editmainpage', 'StaticpageController@editmainpage');
    Route::post('posteditmainpage', 'StaticpageController@posteditmainpage');
    Route::get('viewmainpage', 'StaticpageController@viewmainpage');
    Route::get('deletepage', 'StaticpageController@deletepage');
    Route::get('addsubpage', 'StaticpageController@addsubpage');
    Route::post('postaddsubpage', 'StaticpageController@postaddsubpage');
    Route::get('staticpagestatus/{id}/{status}', 'StaticpageController@staticpagestatus');

    Route::get('sliderlist', 'SliderController@index');
    Route::get('addslider', 'SliderController@addslider');
    Route::post('postaddslider', 'SliderController@postaddslider');
    Route::get('editslider', 'SliderController@editslider');
    Route::post('posteditslider', 'SliderController@posteditslider');
    Route::get('deleteslider', 'SliderController@deleteslider');
    Route::get('sliderstatus/{id}/{status}', 'SliderController@sliderstatus');

    Route::get('membershiplist', 'MembershipController@index');
    Route::post('postaddmembership', 'MembershipController@postaddmembership');
    Route::get('addmembership', 'MembershipController@addmembership');
    Route::get('editmembership', 'MembershipController@editmembership');
    Route::post('posteditmembership', 'MembershipController@posteditmembership');
    Route::get('deletemembership', 'MembershipController@deletemembership');
    Route::get('membershipstatus/{id}/{status}', 'MembershipController@membershipstatus');

    Route::get('prefooterlist', 'PrefooterController@index');
    Route::post('postaddprefooter', 'PrefooterController@postaddprefooter');
    Route::get('addprefooter', 'PrefooterController@addprefooter');
    Route::get('editprefooter', 'PrefooterController@editprefooter');
    Route::post('posteditprefooter', 'PrefooterController@posteditprefooter');
    Route::get('deleteprefooter', 'PrefooterController@deleteprefooter');
    Route::get('prefooterstatus/{id}/{status}', 'PrefooterController@prefooterstatus');

    Route::get('currencylist', 'CurrencyController@index');
    Route::post('postcurrency', 'CurrencyController@postcurrency');
    Route::get('addcurrency', 'CurrencyController@addcurrency');
    Route::get('editcurrency', 'CurrencyController@editcurrency');
    Route::post('posteditcurrency', 'CurrencyController@posteditcurrency');
    Route::get('deletecurrency', 'CurrencyController@deletecurrency');
    Route::get('currencystatus/{id}/{status}', 'CurrencyController@currencystatus');

    Route::get('requestlist', 'RequestController@index');
    Route::get('viewrequest', 'RequestController@viewrequest');
    Route::get('requeststatus', 'RequestController@requeststatus');
    Route::get('changerequeststatus', 'RequestController@changerequeststatus');
    Route::get('deleterequest', 'RequestController@deleterequest');

    Route::get('stripecharge/{projectid}', 'TransactionController@stripecharge');
	
});

Route::get('edittheme', 'ThemeController@edittheme');

/* -----------Admin Routes End------------ */

/* -----------Main Routes------------ */


$lang = Session::get('locale');

App::setLocale($lang);

Route::get('/', 'HomeController@index');
Route::get('align/goal', 'HomeController@goal');
Route::get('support/project', 'HomeController@support');
Route::get('discover', 'HomeController@discover');
Route::get('search', 'HomeController@postsearch');
Route::get('search/category/{id}/{sort}/{term}/{countryid}', 'HomeController@searchbycategory');
Route::get('discover/category/{id}/{sort}', 'HomeController@discoverbycategory');
Route::get('project/detail/{id}', 'HomeController@projectdetail');
Route::get('userlogout', 'HomeController@userlogout');
Route::get('starredprojects', 'HomeController@starredprojects');
Route::post('project/postcomment', 'HomeController@postcomment');
Route::get('project/detail/deletecomment/{id}', 'HomeController@deletecomment');
Route::post('poststarred', 'HomeController@poststarred');
Route::get('project/country/{id}', 'HomeController@searchbycountry');
Route::post('setsession', 'HomeController@setsession');
Route::post('setcurrencysession', 'HomeController@setcurrencysession');
Route::post('postfundstarter', 'HomeController@postfundstarter');
Route::get('likeproject/{email}/{projectid}', 'HomeController@likeproject');
Route::get('followproject/{email}/{projectid}', 'HomeController@followproject');
Route::get('followcreator/{followerid}/{followingid}', 'HomeController@followcreator');

Route::get('signup', 'SignupController@index');
Route::post('postsignup', 'SignupController@postsignup');
Route::get('login', 'SignupController@login');
Route::post('dologin', 'SignupController@dologin');
Route::get('confirmsubscription', 'SignupController@confirmsubscription');
Route::get('user/forgotpassword', 'SignupController@forgotpassword');
Route::post('postforgotpwd', 'SignupController@postforgotpwd');
Route::get('user/forgotpassword/reset/{id}', 'SignupController@resetforgotpwd');
Route::post('postresetforgotpwd', 'SignupController@postresetforgotpwd');
Route::post('postsecurity', 'SignupController@postsecurity');
Route::get('security', 'SignupController@security');
//Route::get('fblogin', 'SignupController@fblogin');
Route::get('fblogin/{catid}', 'SignupController@loginWithFacebook');
Route::get('googlelogin', 'SignupController@loginWithGoogle');

Route::get('loginfbcallback', 'SignupController@fblogincallback');
Route::get('fblogin/createpassword', 'SignupController@createfbpassword');
Route::post('postcreatefbpassword', 'SignupController@postcreatefbpassword');
Route::get('fblogin/checkpassword', 'SignupController@checkfbpassword');
Route::post('postcheckfbpassword', 'SignupController@postcheckfbpassword');
Route::get('twitter/login/{catid}', 'SignupController@loginWithTwitter');

Route::get('instagram/login/{catid}', 'SignupController@loginWithInstagram');
/*Route::get('twitter/callback', array(
    'as' => 'twitter.callback',
    'uses' => 'SignupController@twitterlogincallback',
));
Route::get('twitter/createlogin', 'SignupController@twittercreatelogin');
Route::post('posttwittercreatelogin', 'SignupController@posttwittercreatelogin');
Route::get('twitter/checklogin', 'SignupController@twitterchecklogin');
Route::post('posttwitterchecklogin', 'SignupController@posttwitterchecklogin');
Route::get('twitter/error', 'SignupController@twittererror');
Route::get('twitter/logout', 'SignupController@twitterlogout');
*/
Route::post('postsubscription', 'SignupController@postsubscription');

Route::get('messages', 'ProfileController@messages');
Route::get('viewmessages/{senderid}', 'ProfileController@viewmessages');
Route::post('postmessage', 'ProfileController@postmessage');
Route::get('messages/inbox/delete/{id}', 'ProfileController@deleteinboxmessage');
Route::get('messages/sent/delete/{id}', 'ProfileController@deletesentmessage');
Route::get('messages/view/{id}', 'ProfileController@viewinboxmessage');
Route::get('profile', 'ProfileController@profile');
Route::get('created', 'ProfileController@created');
Route::get('comments', 'ProfileController@comments');
Route::get('profile/{username}', 'ProfileController@userprofile');
Route::get('created/{username}', 'ProfileController@usercreated');
Route::get('comments/{username}', 'ProfileController@usercomments');
Route::get('activity', 'ProfileController@activity');
Route::get('backedprojects', 'ProfileController@backedprojects');
Route::get('createdprojects', 'ProfileController@createdprojects');


Route::get('myaccount', 'SettingsController@myaccount');
Route::post('myaccount/loadmore', 'SettingsController@loadmore');
Route::post('postaccount', 'SettingsController@postaccount');
Route::get('editprofile', 'SettingsController@editprofile');
Route::post('posteditprofile', 'SettingsController@posteditprofile');
Route::get('findfriends', 'SettingsController@findfriends');
Route::get('notifications', 'SettingsController@notifications');
Route::get('privacysettings', 'SettingsController@privacysettings');
Route::post('postnotifications', 'SettingsController@postnotifications');
Route::post('postprivacy', 'SettingsController@postprivacy');
Route::get('stripesettings', 'SettingsController@stripesettings');
Route::get('stripeconnect', 'SettingsController@stripeconnect');
Route::get('gettoken', 'SettingsController@gettoken');
Route::get('account/delete', 'SettingsController@deleteaccount');
Route::post('account/postdelete', 'SettingsController@postdeleteaccount');
Route::get('unsubscribeemails', 'SettingsController@unsubscribeemails');

Route::get('project/start', 'CreateController@index');
Route::post('poststart', 'CreateController@poststart');
Route::get('project/basic/{id}', 'CreateController@basic');
Route::get('project/financial/{id}', 'CreateController@financial');
Route::post('postbasic', 'CreateController@postbasic');
Route::post('postfinancial', 'CreateController@postfinancial');
Route::get('project/reward/{id}', 'CreateController@reward');
Route::post('project/postreward', 'CreateController@postreward');
Route::get('project/reward/delete/{id}', 'CreateController@deletereward');
Route::get('project/reward/edit/{id}', 'CreateController@editreward');
Route::post('project/posteditreward', 'CreateController@posteditreward');
Route::get('project/story/{id}', 'CreateController@story');
Route::post('project/story/deletevideo', 'CreateController@deletevideo');
Route::post('project/poststory', 'CreateController@postprojectstory');
Route::get('project/about/{id}', 'CreateController@about');
Route::post('project/postabout', 'CreateController@postabout');
Route::get('project/account/{id}', 'CreateController@account');
Route::post('project/sendverification', 'CreateController@sendverification');
Route::get('project/sendverification/confirm/{id}/{code}', 'CreateController@confirmsendverification');
Route::get('project/preview/{id}', 'CreateController@preview');
Route::get('project/updates/{id}', 'CreateController@updates');
Route::post('project/postupdate', 'CreateController@postupdate');
Route::get('project/updates/delete/{id}', 'CreateController@deleteupdate');
Route::get('project/updates/edit/{id}', 'CreateController@editupdate');
Route::post('project/posteditupdate', 'CreateController@posteditupdate');
Route::get('project/faq/{id}', 'CreateController@faq');
Route::post('project/postfaq', 'CreateController@postfaq');
Route::get('project/faq/delete/{id}', 'CreateController@deletefaq');
Route::get('project/faq/edit/{id}', 'CreateController@editfaq');
Route::post('project/posteditfaq', 'CreateController@posteditfaq');
Route::get('project/delete/{id}', 'CreateController@deleteproject');
Route::post('project/postdelete', 'CreateController@postdeleteproject');
Route::post('project/postidentity', 'CreateController@postidentity');
Route::post('project/postproof', 'CreateController@postproof');
Route::get('project/backers/{id}', 'CreateController@backers');
Route::post('project/postrewardstatus', 'CreateController@postrewardstatus');
Route::post('project/savemobile', 'CreateController@savemobile');
Route::post('postrequest', 'CreateController@postrequest');
Route::get('project/reward/loadshippinglist/{id}/{selected}', 'CreateController@loadshippinglist');
Route::get('projectviews', 'CreateController@projectviews');
Route::post('publishproject', 'CreateController@publishproject');
Route::post('getcurrencysymbol', 'CreateController@getcurrencysymbol');
Route::get('disconnectstripe', 'CreateController@disconnectstripe');

Route::get('back/reward/{id}', 'BackController@index');
Route::get('back/reward/{id}/{rewardid}/{pledge}', 'BackController@backreward');
Route::post('postback', 'OmnipayController@postback');

Route::post('postback', 'StripeController@postback');
Route::get('paymentoptions', 'StripeController@paymentoption');
Route::get('back/paymentdetails', 'StripeController@paymentdetails');
Route::post('poststripepayment', 'StripeController@poststripepayment');
Route::post('postcreditpayment','StripeController@postcreditpayment');

Route::post('back/paymentdetails/{id}', 'OmnipayController@payment');
Route::get('back_success', 'OmnipayController@getSuccessBacking');
Route::get('pages/{seourl}', 'CmsController@index');

Route::post('payment', 'PaypalController@postpayment');
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));
Route::get('executepayment/{projectid}', 'PaypalController@executepayment');
Route::get('paymentdetails/{backingid}', 'PaypalController@paymentdetails');
Route::get('refund', 'PaypalController@refund');
Route::get('paydetails', 'PaypalController@paydetails');

Route::post('pay_via_paypal', 'OmnipayController@postPayment');
Route::get('payment_success', 'OmnipayController@getSuccessPayment');
Route::post('member_paypal', 'OmnipayController@postMembership');
Route::get('member_success', 'OmnipayController@getSuccessMembership');

Route::get('stripepayment', 'StripeController@stripepayment');

Route::post('project/detail/postprojectviews', 'HomeController@postprojectviews');


});

/* -----------Main Routes End------------ */



/* -----------Sample Routes------------ */

App::missing(function($exception) {
    return Response::view('mainviews.staticpages.404', array(), 404);
});

//App::error(function(Exception $exception) {
//    return Response::view('mainviews.staticpages.error', array(), 404);
//});


Route::get('template', function() {
    return View::make('emails.forgotpassword');
});
Route::get('filewrite', 'AdminsettingController@filewrite');
Route::get('arraytest', 'ProjectController@arraytest');
Route::get('sample', 'AdminController@sample');
Route::post('postsample', 'AdminController@postsample');
Route::post('deletesample', 'AdminController@deletesample');
Route::get('testbacking', 'BackController@testbacking');
Route::get('project/storytest/{id}', 'CreateController@storytest');

Route::get('conversion/{from}/{id}', 'HomeController@conversion');
Route::get('wallet', 'ProfileController@wallet');

Route::get('test', 'TestController@index');
Route::get('omnirefund', 'TransactionController@refund');

Route::get('updatetable', 'TestController@updatetable');
Route::get('testbacking', 'TestController@testbacking');
/*
Route::get('updatetable', function() {
    Artisan ::call('db:seed', ['--quiet' => true, '--force' => true]);
});
*/


//Truncate all tables in database
//Route::get('truncate', 'TestController@truncate');




/* -----------Sample Routes End------------ */



/*

Route::get('export', function() {
    $table = Project::all();
    $top = "<table>
				<thead>
				
				    <tr>
				        <th>S.No</th>
				        <th>Project Name</th>
				        <th>Category</th>
						<th>Creator Name</th> 
						<th>Funding Goal Name</th> 
						<th>Total Packages</th> 
						<th>Pledge Amount </th> 
						<th>Expires In</th> 
						<th>Is Funded In</th> 
				    </tr>
				</thead>
				<tbody>";
    $bottom = "</tbody></table>";
    
    $i = 1;
    foreach ($table as $value) {
        //echo "<pre>";print_r($value);"</pre>";exit;
        //}
        $body.= "
				    <tr>
				        <td>$i</td>
				        <td>$value->title</td>
				        <td>$value->categoryid</td>
						<td>$value->categoryid</td>
						<td>$value->fundinggoal</td>
						<td>$value->totalbacking</td>
						<td>$value->totalpledgeamount</td>
						<td>$value->fundingduration</td>
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
        'Content-Disposition' => 'attachment; filename=projectlist.xls',
        'Content-Transfer-Encoding' => ' binary');
    return Response::make($output, 200, $headers);
});
*/