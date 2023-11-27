<section class="el-container">
    <?php
    include './blogy-1.0.0/incudes/aside_edit.php';
    ?>
    <main class="el-main viblo-main ">
        <div class="container ">
            <div class="el-card card--form is-always-shadow ">
                <div class="el-card__body ">
                    <h1 class="card-title ">
                        Đổi mật khẩu
                    </h1>
                    <p class="card-subtitle ">
                        Thay đổi mật khẩu cho tài khoản của bạn. Bạn nên đặt mật khẩu mạnh để chặn những truy cập trái phép vào tài khoản của mình.
                    </p>
                    <section class="change-password mt-4" title="Password">
                        <form method="post">
                            <div class="el-form-item is-required el-form-item--medium">
                                <label for="current_password" class="el-form-item__label">Mật khẩu hiện tại</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="password" name="current_password" autocomplete="off" class="el-input__inner">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-required el-form-item--medium">
                                <label for="new_password" class="el-form-item__label">Mật khẩu mới</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="password" name="new_password" autocomplete="off" class="el-input__inner">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-required el-form-item--medium">
                                <label for="new_password_confirmation" class="el-form-item__label">Xác nhận mật khẩu mới</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="password" name="new_password_confirmation" autocomplete="off" class="el-input__inner">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end button-info">
                                <button type="button" class="el-button el-button--default el-button--medium is-plain">
                                    <a href="./index.php?pages=edit_profile&action=home">
                                        Hủy bỏ
                                    </a>
                                </button>
                                <input type="submit" name="confirm_change_password" class="el-button button-update el-button--primary el-button--medium is-plain" value="Xác nhận thay đổi mật khẩu">
                            </div>

                        </form>
                        <?php
                        if (isset($_POST['confirm_change_password'])) {
                            // Lấy giá trị từ yêu cầu POST
                            $current_password = $_POST['current_password'];
                            $new_password = $_POST['new_password'];
                            $new_password_confirmation = $_POST['new_password_confirmation'];

                            // Kiểm tra xem mật khẩu mới có khớp với xác nhận mật khẩu mới không
                            if ($new_password != $new_password_confirmation) {
                                echo "Mật khẩu mới không khớp với xác nhận mật khẩu mới.";
                                return;
                            }

                            // Kiểm tra xem mật khẩu hiện tại có đúng không
                            $user = new user();
                            $username = $_SESSION['user_info']['name']; // Đặt 'name' từ mảng $_SESSION
                            if (!$user->verifyPassword($username, $current_password)) {
                                echo "Mật khẩu hiện tại không đúng.";
                                return;
                            }

                            // Cập nhật mật khẩu
                            $user->updatePassword($username, $new_password);
                            echo "Đổi mật khẩu thành công!";
                        }
                        ?>
                    </section>
                </div>
            </div>
        </div>
    </main>
</section>
<script>
    // Lấy tất cả các trường input trong form
    var inputs = document.querySelectorAll('form input[type="password"]');

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
                errorDiv.textContent = 'Trường này là bắt buộc.';
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