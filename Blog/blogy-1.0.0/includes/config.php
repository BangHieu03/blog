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

//load classes as needed
function __autoload($class)
{

    $class = strtolower($class);

    //if call from within assets adjust the path
    $classpath = 'classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    //if call from within admin adjust the path
    $classpath = '../classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    //if call from within admin adjust the path
    $classpath = '../../classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }
}

$user = new user($db);
include("functions.php");
