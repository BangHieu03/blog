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
define('GOOGLE_REDIRECT_URL', 'http://localhost/Google_login');

// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

