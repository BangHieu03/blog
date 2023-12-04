<title>Đăng ký</title>
<!-- Thêm Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        background-color: white;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        margin-bottom: 20px;
        text-align: center;
    }

    .form-container .form-group {
        margin-bottom: 20px;
    }

    .form-container .form-check-label {
        font-size: 14px;
    }

    .form-container .btn-social {
        margin-bottom: 10px;
        color: white;
        padding: 10px;
    }

    .form-container .btn-google {
        background-color: #dd4b39;
    }

    .form-container .btn-facebook {
        background-color: #3b5998;
    }

    .form-container .btn-github {
        background-color: #333;
    }

    .form-container .btn-social .fa {
        margin-right: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-12">
            <div class="form-container">
                <h2 class="text-center">Đăng ký</h2>
                <p class="card-subtitle mt-2">Chào mừng bạn đến Nền tảng <strong>Poly!</strong> Tham gia cùng chúng tôi để tìm kiếm thông tin hữu ích cần thiết để cải thiện kỹ năng IT của bạn.
                    Vui lòng điền thông tin của bạn vào biểu mẫu bên dưới để tiếp tục.</p>
                <?php ?>
                <form method="post" id="registrationForm">
                    <div class="form-group">
                        <label for="name">Tên tài khoản:</label>
                        <input type="text" id="name" name="name" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" placeholder="Tên tài khoản..." required>
                        <div class="invalid-feedback"><?php echo $errors['name'] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="username">Địa chỉ email của bạn:</label>
                        <input type="text" id="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" placeholder="Email..." required>
                        <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" id="password" name="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" placeholder="Mật khẩu" required>
                        <div class="invalid-feedback"><?php echo $errors['password'] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Xác nhận mật khẩu:</label>
                        <input type="password" id="confirm" name="confirm" class="form-control<?php echo isset($errors['confirm']) ? 'is-invalid' : ''; ?>" placeholder="Xác nhận mật khẩu" required>
                        <div class="invalid-feedback"><?php echo $errors['confirm'] ?? ''; ?></div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">Tôi đồng ý với <a href="./index.php?pages=rules&action=home">điều khoản PolyBlog</a></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Đăng ký" class="btn btn-primary btn-block" id="submitButton">
                    </div>
                    <?php
                    ob_start();
                    $errors = array();
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirm = $_POST['confirm'];
                        $date = date('Y-m-d');
                        $sex = 1; // hoặc $sex = 1;
                        $role = 1; // hoặc $role = 1;

                        if (empty($name)) {
                            $errors['name'] = 'Tên đăng ký không được để trống.';
                        }
                        if (empty($email)) {
                            $errors['email'] = 'Địa chỉ email không được để trống.';
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors['email'] = 'Địa chỉ email không hợp lệ.';
                        }
                        if (empty($password)) {
                            $errors['password'] = 'Mật khẩu không được để trống.';
                        }
                        if ($password !== $confirm) {
                            $errors['confirm'] = 'Mật khẩu xác nhận không khớp với mật khẩu.';
                        }

                        if (empty($errors)) {
                            // Kiểm tra xem tên người dùng hoặc email đã tồn tại chưa
                            $user = new user();
                            if ($user->getUserByName($name) || $user->getUserByEmail($email)) {
                                echo "Tên người dùng hoặc email đã tồn tại!";
                                return;
                            }

                            // Mã hóa mật khẩu
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                            // Thêm người dùng mới
                            $user->addUser($name, $email, $hashed_password, '', '', '', $date, $sex, $role, '', date('Y-m-d H:i:s'));
                            echo "Đăng ký thành công!";
                            $_SESSION['user_info'] = $user->getUserByName($name);
                            header('Location: index.php?pages=information&action=home');
                            exit;
                        }
                    }
                    ob_end_flush();
                    ?>
                    <a href="./index.php?pages=login&action=home">Nếu bạn đã có tài khoản nhấp vào đây</a>
                    <div class="d-flex align-items-center justify-content-between my-4 default_cursor_cs">
                        <hr class="flex-fill m-0"> <span class="mx-3">
                            Đăng nhập với
                        </span>
                        <hr class="flex-fill m-0 default_cursor_cs">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-social btn-google">
                            <i class="fab fa-google" style="color: #ffffff;"></i> Đăng nhập với Google
                        </button>
                        <button class="btn btn-block btn-social btn-facebook">
                            <i class="fab fa-facebook-f" style="color: #ffffff;"></i> Đăng nhập với Facebook
                        </button>
                        <button class="btn btn-block btn-social btn-github">
                            <i class="fab fa-github" style="color: #ffffff;"></i> Đăng nhập với GitHub
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Lấy tất cả các trường input trong form
    var inputs = document.querySelectorAll('#registrationForm input');
    var submitButton = document.getElementById('submitButton');

    // Thêm sự kiện 'input' (khi người dùng nhập vào trường input) cho mỗi trường input
    inputs.forEach(function(input) {
        input.addEventListener('input', function() {
            // Kiểm tra xem trường input có được điền hay không
            if (input.value.trim() === '') {
                // Nếu không, thêm class 'is-invalid' để hiển thị cảnh báo
                input.classList.add('is-invalid');
                input.nextElementSibling.textContent = 'Tên đăng ký không dược để trống.';
            } else {
                // Nếu có, xóa class 'is-invalid'
                input.classList.remove('is-invalid');
                input.nextElementSibling.textContent = '';
            }
        });
    });

    // Kiểm tra định dạng email khi người dùng nhập vào trường email
    document.getElementById('email').addEventListener('input', function() {
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value)) {
            this.classList.add('is-invalid');
            this.nextElementSibling.textContent = 'Địa chỉ email không hợp lệ.';
        } else {
            this.classList.remove('is-invalid');
            this.nextElementSibling.textContent = '';
        }
    });

    // Kiểm tra mật khẩu và xác nhận mật khẩu khi người dùng nhập vào trường xác nhận mật khẩu
    document.getElementById('confirm').addEventListener('input', function() {
        if (this.value !== document.getElementById('password').value) {
            this.classList.add('is-invalid');
            this.nextElementSibling.textContent = 'Mật khẩu xác nhận không khớp với mật khẩu.';
        } else {
            this.classList.remove('is-invalid');
            this.nextElementSibling.textContent = '';
        }
    });

    // Kiểm tra độ dài mật khẩu khi người dùng nhập vào trường mật khẩu
    document.getElementById('password').addEventListener('input', function() {
        if (this.value.length < 8) {
            this.classList.add('is-invalid');
            this.nextElementSibling.textContent = 'Mật khẩu phải có ít nhất 8 ký tự.';
        } else {
            this.classList.remove('is-invalid');
            this.nextElementSibling.textContent = '';
        }
    });

    // Kiểm tra xem tất cả các trường input có hợp lệ không khi người dùng nhấp vào nút đăng ký
    submitButton.addEventListener('click', function(event) {
        var allValid = true;
        inputs.forEach(function(input) {
            if (input.classList.contains('is-invalid')) {
                allValid = false;
            }
        });
        if (!allValid) {
            event.preventDefault();
            alert('Vui lòng hoàn thành bảng đăng ký đúng như đã quy định.');
        }
    });
</script>