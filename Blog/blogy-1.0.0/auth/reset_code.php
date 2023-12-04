<div class="container mt-4">
    <div class="row m-lg-5">
        <div class="mx-sm-auto col-sm-12 col-md-10 col-lg-8">
            <div class="el-card is-always-shadow">
                <div class="el-card__body">
                    <h1 class="card-title">
                        Đỗi mật khẩu
                    </h1>
                    <p class="card-subtitle">
                        Gần xong rồi, đổi mật khẩu là xong. Bạn nên giữ mật khẩu mạnh để ngăn chặn việc truy cập trái phép vào tài khoản của mình.
                    </p>
                    <section class="reset-password mt-4">
                        <form class="el-form" method="post">
                            <div class="el-form-item is-error is-required el-form-item--medium">
                                <label for="email" class="el-form-item__label">Địa chỉ email</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="text" name="email" autocomplete="off" class="el-input__inner">
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-success is-required el-form-item--medium">
                                <label for="password" class="el-form-item__label">Mật khẩu mới</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="password" name="password" autocomplete="off" class="el-input__inner">
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-required el-form-item--medium">
                                <label for="password_confirmation" class="el-form-item__label">Xác nhận mật khẩu mới</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="password" name="password_confirmation" autocomplete="off" class="el-input__inner">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="submit" class="el-button el-button--primary el-button--medium">
                                    <span>Đổi mật khẩu</span>
                                </button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            if (isset($_POST['email']) && $_POST['email'] != '') {
                                $email = $_POST['email'];
                                $newPassword = $_POST['password'];
                                $confirmPassword = $_POST['password_confirmation'];
                                $user = new user();
                                $result = $user->getUserByEmail($email);
                                if ($result) {
                                    if ($newPassword === $confirmPassword) {
                                        $user->updatePassword($result['email'], $newPassword);
                                        echo "<div class='alert alert-success'>Đã đổi mật khẩu thành công.</div>";
                                        header('Location: ./index.php?pages=login&action=home');
                                    } else {
                                        echo "<div class='alert alert-danger'>Mật khẩu mới và mật khẩu xác nhận không khớp.</div>";
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Email không tồn tại.</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger'>Không được để trống email.</div>";
                            }
                        }
                        ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>