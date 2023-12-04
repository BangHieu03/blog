<?php

require_once './vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '745442504311289',
    'app_secret' => '9ec9396424e2ded7ea9e2d704252cd17',
    'default_graph_version' => 'v18.0',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}


if (!isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

// Logged in
$response = $fb->get('/me?fields=id,name,email', $accessToken);
$user = $response->getGraphUser();

$_SESSION['facebook_user'] = [
    'id' => $user->getId(),
    'name' => $user->getName(),
    'email' => $user->getEmail(),
    'access_token' => $accessToken->getValue(),
];

// Redirect to your profile page or any other page
header('Location:./index.php?pages=facebook&action=profile');
?>