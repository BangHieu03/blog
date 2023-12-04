<?php

//database details
define('DBHOST', 'localhost');
define('DBNAME', 'polyblog');
define('DBUSER', 'root');
define('DBPASS', 'mysql');


$db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (!$db) {
    die("Fatal Error: khog the ket noi!");
}

//set timezone- Asia Kolkata 
date_default_timezone_set('Asia/Ho_Chi_Minh');

// $user = new User($db);

// $user = new user($db);
include("functions.php");
