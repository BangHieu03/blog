<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $user = new user();

    // Kiểm tra xem tên đăng nhập và email có khớp không
    $userInfo = $user->getUserByName($name);
    if ($userInfo && $userInfo['email'] === $email) {
        // Kiểm tra xem người dùng có phải là admin không
        if ($userInfo['role'] == '2') {
            // Tạo mật khẩu mới
            $newPassword = substr(md5(uniqid(rand(), true)), 0, 10);  // Mật khẩu ngẫu nhiên 10 ký tự
            // Mã hóa mật khẩu mới
            $hashedPassword = md5($newPassword);
            // Cập nhật mật khẩu mới vào cơ sở dữ liệu
            $user->editUser($userInfo['id'], $userInfo['name'], $userInfo['email'], $hashedPassword, $userInfo['phone'], $userInfo['role']);

            // Hiển thị mật khẩu mới trên trang web
            $_SESSION['messages'] = "Mật khẩu mới của bạn là: " . $hashedPassword;
        } else {
            $_SESSION['messages'] = "Chỉ quản trị viên mới có thể lấy lại mật khẩu.";
        }
        session_write_close();
    } else {
        $_SESSION['messages'] = "Tên đăng nhập hoặc email không chính xác.";
        session_write_close();
    }
}
?>
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header bg-dark text-white">
                <h3 class="text-center font-weight-light my-4">Quên mật khẩu</h3>
            </div>
            <div class="card-body">
                <form method="POST" role="form">
                    <?php if (isset($_SESSION['messages'])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['messages'] ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-floating mb-3">
                        <input name="name" class="form-control" placeholder="account" />
                        <label>Tài khoản</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email" />
                        <label>Email</label>
                    </div>
                    <button class="btn btn-success w-100 my-4 mb-2">Lấy lại mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
</div>