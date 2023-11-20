<title>Đăng nhập</title>
<!-- Thêm Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
    .form-control {
        border-radius: 25px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn {
        border-radius: 25px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 25px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-12">
            <div class="form-container">
                <h2 class="text-center">Đăng nhập</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập:</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Đăng nhập" class="btn btn-primary btn-block">
                    </div>
                    <?php
                    // Bắt đầu đệm đầu ra
                    ob_start();

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        // Tạo một đối tượng user mới
                        $user = new user();

                        // Kiểm tra xem người dùng có tồn tại không
                        if ($user->checkUser($username, $password)) {
                            // Lấy thông tin người dùng
                            $user_id = $user->userId($username, $password);
                            $user_info = $user->getUserById($user_id);

                            // Lưu thông tin người dùng vào session
                            $_SESSION['user_info'] = $user_info;

                            // Chuyển hướng người dùng về trang chủ
                            header('Location: ./index.php?pages=index&action=home');
                        } else {
                            echo 'Tên đăng nhập hoặc mật khẩu không đúng.';
                        }
                    }

                    // Kết thúc đệm đầu ra và gửi đầu ra đến trình duyệt
                    ob_end_flush();
                    ?>
                </form>
                <a href="/forgot-password">Quên mật khẩu?</a><br>
                <a href="/register">Tạo tài khoản mới</a>

            </div>
        </div>
    </div>
</div>
<!-- Thêm Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>