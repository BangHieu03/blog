<?php 
// Database configuration 


define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', 'mysql'); 
define('DB_NAME', 'tktw_duan1'); 
define('DB_USER_TBL', 'users_git'); 
 
// GitHub API configuration 
define('CLIENT_ID', '50f38088acd22c1a8a23'); 
define('CLIENT_SECRET', 'a19ebfc6da7444cc467fc80362c20c5e0748cb45'); 
define('REDIRECT_URL', 'http://localhost/Github_login/index.php?pages=github'); 
 
// Start session 
if(!session_id()){ 
    session_start(); 
} 
 
// Include Github client library 
require_once '../Github_login/src/Github_OAuth_Client.php'; 
 
// Initialize Github OAuth client class 
$gitClient = new Github_OAuth_Client(array( 
    'client_id' => CLIENT_ID, 
    'client_secret' => CLIENT_SECRET, 
    'redirect_uri' => REDIRECT_URL 
)); 
 
// Try to get the access token 
if(isset($_SESSION['access_token'])){ 
    $accessToken = $_SESSION['access_token']; 
}