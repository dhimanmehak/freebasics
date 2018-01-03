<?php

/* -----------Mobile Routes------------ */

Route::group(array('prefix' => 'api/v1/'), function() {

    Route::get('alluser', 'MobileuserController@index');
    Route::post('signup', 'MobileuserController@postsignup');
    Route::post('signin', 'MobileuserController@postsignin');
    Route::get('confirmverification/{id}/{code}','MobileuserController@confirmsendverification');
    Route::post('forgotpassword','MobileuserController@forgotpassword');
    
    Route::get('projects', 'MobileprojectController@index');
    Route::get('project/detail', 'MobileprojectController@projectdetail');
    
    Route::get('categories', 'MobileprojectController@allcategories');
    Route::get('subcategories', 'MobileprojectController@subcategories');
    
    Route::get('countries', 'MobileprojectController@allcountries');
    Route::get('project/rewards','MobileprojectController@rewards');
    Route::get('project/search','MobileprojectController@searchprojects');
    
});
