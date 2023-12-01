<?php

require_once './vendor/autoload.php';

// Update the following variables
$facebook_oauth_app_id = '745442504311289';
$facebook_oauth_app_secret = '9ec9396424e2ded7ea9e2d704252cd17';
// Must be the direct URL to the facebook-oauth.php file
$facebook_oauth_redirect_uri = 'http://localhost/facebook_login';
$facebook_oauth_version = 'v18.0';

if (isset($_GET['code']) && !empty($_GET['code'])) {
    // Execute cURL request to retrieve the access token
    // ...

} else {
    // Define params and redirect to Facebook OAuth page
    $params = [
        'client_id' => $facebook_oauth_app_id,
        'client_secret' => $facebook_oauth_redirect_uri,
        'response_type' => 'code',
        'scope' => 'email'
    ];
    $redirect_url = 'https://www.facebook.com/dialog/oauth?' . http_build_query($params);
    header('Location: ' . $redirect_url);
    exit;
}

$params = [
    'client_id' => $facebook_oauth_app_id,
    'client_secret' => $facebook_oauth_app_secret,
    'redirect_uri' => $facebook_oauth_redirect_uri,
    'code' => $_GET['code']
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $facebook_oauth_version . '/oauth/access_token');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$response = json_decode($response, true);

// Make sure access token is valid
if (isset($response['access_token']) && !empty($response['access_token'])) {
    // Execute cURL request to retrieve the user info associated with the Facebook account
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $facebook_oauth_version . '/me?fields=name,email,picture');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $response['access_token']]);
    $response = curl_exec($ch);
    curl_close($ch);
    $profile = json_decode($response, true);

    // Make sure the profile data exists
    if (isset($profile['email'])) {
        // Authenticate the user
        session_regenerate_id();
        $_SESSION['facebook_loggedin'] = TRUE;
        $_SESSION['facebook_email'] = $profile['email'];
        $_SESSION['facebook_name'] = $profile['name'];
        $_SESSION['facebook_picture'] = $profile['picture']['data']['url'];
        // Redirect to profile page
        header('Location: ./index.php?pages=facebook&action=profile');
        exit;
    } else {
        exit('Could not retrieve profile information! Please try again later!');
    }
} else {
    exit('Invalid access token! Please try again later!');
}