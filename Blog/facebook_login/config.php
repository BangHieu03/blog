<?php
/*
 * Basic Site Settings and API Configuration
 */

  

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'tktw_duan1');
define('DB_USER_TBL', 'users');

// Facebook API configuration
define('FB_APP_ID', '745442504311289');
define('FB_APP_SECRET', '9ec9396424e2ded7ea9e2d704252cd17');
define('FB_REDIRECT_URL', 'http://blog.com/index.php?pages=facebook&action=index');

// Start session
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require 'fb/vendor/autoload.php';

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// Call Facebook API
$fb = new Facebook(array(
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => 'v3.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}