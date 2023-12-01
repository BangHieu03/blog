<?php

//Include Google Client Library for PHP autoload file
require_once './vendor/composer/autoload_real.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('891212156778-pe9o09r10pfqq0pqb66kv9f3d54t10sm.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Google_login/');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page


?>