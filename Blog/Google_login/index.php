<?php

$google_client = new Google_Client();

$google_client->setClientId('891212156778-pe9o09r10pfqq0pqb66kv9f3d54t10sm.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://blog.com/index.php?pages=google&action=index');
$google_client->addScope('email');
$google_client->addScope('profile');

$google_client->setHttpClient(
    new \GuzzleHttp\Client([
        'verify' => false, // Tắt xác minh chứng chỉ SSL (lưu ý: không an toàn)
    ])
);


if (isset($_GET["code"])) {
    try {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        if (!isset($token["error"])) {  // nếu lỗi trong quá trình lấy token sẽ có một mảng lỗi
            $google_client->setAccessToken($token['access_token']);  // set token cho $google_client để sử dụng

            $google_service = new Google_Service_Oauth2($google_client);

            $data = $google_service->userinfo->get();  // lấy thông tin người dùng
            $name = $data['name'];
            $email = $data['email'];
            $thumbnail = $data['picture'];

            // Lưu ảnh vào thư mục source
            $imageContent = file_get_contents($thumbnail);
            $imageFileName = './uploaded/user/' . $email . '_thumbnail.jpg';
            $imageSaveData = $email . '_thumbnail.jpg';
            file_put_contents($imageFileName, $imageContent);


            // kiểm tra tài khoảng theo email người dùng đã có chưa
            $users = new user();
            $info_user = $users->getUserByEmail($email);

            if ($info_user) {
                $_SESSION['user_info'] = $info_user;
                header("Location: http://blog.com/index.php?pages=index&action=home");
            } else {
                $users->addUser($name, $email, null, null, $imageSaveData, $name, null, null, null, null, null);
                $info_user = $users->getUserByEmail($email);
                $_SESSION['user_info'] = $info_user;
                header("Location: http://blog.com/index.php?pages=index&action=home");
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}

?>

<a href="<?= $google_client->createAuthUrl() ?>" class="btn-google m-b-20">
    <img src="" alt="GOOGLE">
    Google
</a>