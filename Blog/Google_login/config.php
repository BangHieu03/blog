<?php



// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'tktw_duan1');
define('DB_USER_TBL', 'users');

// Google API configuration
define('GOOGLE_CLIENT_ID', '891212156778-pe9o09r10pfqq0pqb66kv9f3d54t10sm.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'http://blog.com/index.php?pages=index&action=home');

// Start session
if(!session_id()){
    session_start();
}

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Poly Blog');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gsClient);


//Include Google Client Library for PHP autoload file

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('891212156778-pe9o09r10pfqq0pqb66kv9f3d54t10sm.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://blog.com/index.php?pages=index&action=home');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>