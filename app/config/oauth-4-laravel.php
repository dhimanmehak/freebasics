<?php


return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
		'Facebook' => array(
		    'client_id'     => Config::get('adminconfig.facebookappid'),
		    'client_secret' => Config::get('adminconfig.facebooksecretkey'),
            'scope'         => array('email'),
		),
          
'Google' => array(
    'client_id'     => Config::get('adminconfig.googleclientid'),
    'client_secret' => Config::get('adminconfig.googleclientsecret'),
    'scope'         => array('userinfo_email', 'userinfo_profile'),
),			  
'Twitter' => array(
    'client_id'     => Config::get('adminconfig.consumerkey'),
    'client_secret' => Config::get('adminconfig.consumersecret'),
    'scope' =>array(),
),

'Instagram' => array(
    'client_id'     => '3aacca2a90ca4168b6b5767d85fe7ff0',
    'client_secret' => 'a137023d881745eba1e4a99a1b711056',
    'scope' =>array('basic', 'comments', 'relationships', 'likes'),
),
	)

);
