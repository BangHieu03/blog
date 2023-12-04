<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="./trangchinh/img/LOGO - Copy.png" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-dark text-white">
                                    <h3 class="text-center font-weight-light my-4">Đăng nhập quản trị</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" role="form">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            $name = $_POST['name'];
                                            $password = $_POST['password'];

                                            // Kiểm tra xem người dùng có muốn ghi nhớ mật khẩu không
                                            if (isset($_POST['remember'])) {
                                                // Đặt cookie để ghi nhớ tên đăng nhập và mật khẩu
                                                setcookie("name", $name, time() + (86400 * 30), "/"); // 86400 = 1 day
                                                setcookie("password", $password, time() + (86400 * 30), "/");
                                            }

                                            // Các đoạn mã khác để xử lý đăng nhập...
                                        }
                                        // Lấy tên đăng nhập và mật khẩu từ cookie nếu có
                                        $name = $_COOKIE['name'] ?? "";
                                        $password = $_COOKIE['password'] ?? "";
                                        ?>

                                        <?php if (isset($_SESSION['messages'])) : ?>
                                            <div class="alert alert-danger">
                                                <?= $_SESSION['messages'] ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-floating mb-3">
                                            <input name="name" value="<?= $name ?>" class="form-control" placeholder="account" />
                                            <label>Tài khoản</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="password" type="password" value="<?= $password ?>" class="form-control" placeholder="Password" />
                                            <label>Mật khẩu</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input name="remember" class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Nhớ mật khẩu</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small text-success" href="index.php?act=fogot&action=password">Quên mật khẩu?</a>
                                            <button name="login" class="btn btn-success  w-100 my-4 mb-2">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
<?php


$name = $_POST['name'] ?? "";
$password = $_POST['password'] ?? "";
$user = new user();

if ($name == "" || $password == "") {
    $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
    session_write_close();
} else {
    if ($user->checkUser($name, $password)) {
        // Lấy thông tin người dùng
        $userInfo = $user->getUserById($user->userId($name, $password));
        // Kiểm tra xem người dùng có phải là 'admin' không
        if ($userInfo['role'] == '2') {
            // Đăng nhập thành công, thiết lập session
            $_SESSION['admin'] = $name;
            header("Location: ./index.php?act=layout&action=home"); // Chuyển hướng người dùng
            exit();
        } else {
            // Nếu người dùng không phải là 'admin', hiển thị thông báo lỗi
            $_SESSION['messages'] = "Chỉ quản trị viên mới có thể đăng nhập.";
            session_write_close();
        }
    } else {
        // Thêm thông báo lỗi khi thông tin đăng nhập không hợp lệ
        $_SESSION['messages'] = "Sai tài khoản hoặc mật khẩu!";
        session_write_close();
    }
}
?>