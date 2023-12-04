<?php
// Khởi động session
session_start();

// Hủy tất cả các biến session
$_SESSION = array();

// Nếu bạn muốn hủy một phiên, hãy xóa cookie phiên bằng cách đặt thời gian hết hạn trong quá khứ
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Cuối cùng, hủy session
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập
header("Location: ./index.php?pages=index&action=home");
exit;
?>