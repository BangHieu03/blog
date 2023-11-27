<?php
require_once('./vendor/autoload.php');
// Database configuration


$goo = new Google\Client();
$goo->setClientId("891212156778-pe9o09r10pfqq0pqb66kv9f3d54t10sm.apps.googleusercontent.com");
$goo->setClientSecret("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");
$goo->setRedirectUri("http://localhost/duan1/index.php?pages=google&action=home");
$goo->addScope("email");
$goo->addScope("profile");