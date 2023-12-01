<?php 
require_once'../vendor/autoload.php';


if(!isset($_SESSION["token"])){
    header('location: ./index.php?pages=google&action=home');
    exit;
}

$goo->setAccessToken($_SESSION["token"]);
if($goo->isAccessTokenExpired()){
    unset($_SESSION["token"]);
    header('location: ./index.php?pages=google&action=home');
}

$userObj = new user();
$googleUser = $userObj->getGoogleUser($goo);
echo "<h1>YOU ARE SIGNED IN!</h1>";
echo "<div>";
print_r($user);
echo "</div>";
?>
