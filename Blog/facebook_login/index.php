<?php


$fb = new Facebook\Facebook([
    'app_id' => '745442504311289',
    'app_secret' => '9ec9396424e2ded7ea9e2d704252cd17',
    'default_graph_version' => 'v18.0',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Requesting permission to access the user's email

$loginUrl = $helper->getLoginUrl('http://localhost/facebook_login/callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>