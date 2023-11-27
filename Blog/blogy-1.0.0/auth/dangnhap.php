<title>Đăng nhập</title>
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
                    <div class="d-flex justify-content-between my-2 ">
                        <a href="./index.php?pages=login&action=fogot">Quên mật khẩu?</a><br>
                        <a href="./index.php?pages=register&action=home">Tạo tài khoản mới</a>
                    </div>
                    <?php
                    // Bắt đầu đệm đầu ra
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $user = new user();
                        if ($user->checkUser($username)) {
                            // Kiểm tra mật khẩu
                            if ($user->verifyPassword($username, $password)) {
                                // Lấy thông tin người dùng
                                $user_id = $user->userId($username);
                                $user_info = $user->getUserById($user_id);
                                // Lưu thông tin người dùng vào session
                                $_SESSION['user_info'] = $user_info;
                                header('Location: ./index.php?pages=index&action=home');
                            } else {
                                echo 'Tài khoản hoặc mật khẩu không đúng.';
                            }
                        } else {
                            echo 'Tên đăng nhập không tồn tại.';
                        }
                    }
                    // Kết thúc đệm đầu ra và gửi đầu ra đến trình duyệt
                    ?>
                    <div class="d-flex align-items-center justify-content-between my-4 default_cursor_cs">
                        <hr class="flex-fill m-0"> <span class="mx-3">
                            Đăng nhập bằng
                        </span>
                        <hr class="flex-fill m-0 default_cursor_cs">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-social btn-google">
                            <i class="fab fa-google" style="color: #ffffff;"></i> <a href="./index.php?pages=google&action=home">Đăng nhập với Google</a>
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

<!-- Thêm Bootstrap JS -->
<script>
    // Lấy tất cả các trường input trong form
    var inputs = document.querySelectorAll('form input[type="text"], form input[type="password"]');

    // Thêm sự kiện 'blur' (khi người dùng nhấp ra khỏi trường input) cho mỗi trường input
    inputs.forEach(function(input) {
        input.addEventListener('blur', function() {
            // Kiểm tra xem trường input có được điền hay không
            if (input.value.trim() === '') {
                // Nếu không, thêm class 'is-invalid' để hiển thị cảnh báo
                input.classList.add('is-invalid');
                // Kiểm tra xem đã có thông báo lỗi chưa, nếu chưa thì thêm vào
                var errorDiv = input.parentNode.querySelector('.invalid-feedback');
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    input.parentNode.appendChild(errorDiv);
                }
                errorDiv.textContent = 'Không được để trống.';
            } else {
                // Nếu có, xóa class 'is-invalid' và thông báo lỗi
                input.classList.remove('is-invalid');
                var errorDiv = input.parentNode.querySelector('.invalid-feedback');
                if (errorDiv) {
                    input.parentNode.removeChild(errorDiv);
                }
            }
        });
    });

    // Kiểm tra xem tất cả các trường input có hợp lệ không khi người dùng nhấp vào nút đăng nhập
    document.querySelector('form input[type="submit"]').addEventListener('click', function(event) {
        var allValid = true;
        inputs.forEach(function(input) {
            if (input.classList.contains('is-invalid')) {
                allValid = false;
            }
        });
        if (!allValid) {
            event.preventDefault();
            alert('Vui lòng hoàn thành form đúng như đã quy định.');
        }
    });
</script>