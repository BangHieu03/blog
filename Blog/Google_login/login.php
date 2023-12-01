<?php
require_once './vendor/autoload.php';

// Cài đặt thông tin OAuth 2.0
$client = new Google_Client();
$client->setClientId('891212156778-pe9o09r10pfqq0pqb66kv9f3d54t10sm.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Google_login');
$client->addScope('email');
$client->addScope('profile');

// Xác thực
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $accessToken = $client->getAccessToken();
    // Lưu $accessToken vào cơ sở dữ liệu hoặc sử dụng nó để lấy thông tin người dùng
} else {
    // Chuyển hướng người dùng đến trang đăng nhập Google
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit;
}
?>
