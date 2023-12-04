<?php 
// callback.php


$client = new Google_Client();
$client->setClientId('891212156778-pe9o09r10pfqq0pqb66kv9f3d54t10sm.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Google_login/callback.php');
$client->addScope('email');

if (isset($_GET['code'])) {
    // Xác thực mã code và lấy thông tin token từ Google
    $client->authenticate($_GET['code']);
    $token = $client->getAccessToken();

    // Lưu token vào session hoặc cơ sở dữ liệu
    $_SESSION['google_token'] = $token;

    // Lấy thông tin người dùng từ Google
    $google_user = $client->verifyIdToken();

    // Xử lý thông tin người dùng, kiểm tra xem đã có trong cơ sở dữ liệu chưa
    // ...

    // Chuyển hướng người dùng đến trang chính
    header('Location: http://localhost/Google_login');
    exit;
}
