<section class="el-container">
    <?php
    include './blogy-1.0.0/incudes/aside_edit.php';
    ?>
    <main class="el-main">
        <div class="container ">
            <div class="el-card card--form is-never-shadow">
                <div class="el-card__body ">
                    <h1 class="card-title ">
                        Emails
                    </h1>
                    <p class="card-subtitle ">
                        Email dự phòng của bạn cũng sẽ nhận được những thông báo liên quan đến bảo mật tài khoản và cũng được sử dụng để đặt lại mật khẩu.
                    </p>
                    <section class="mt-4">
                        <div class="el-card box-card mt-3 is-never-shadow">
                            <div class="el-card__body ">
                                <?php echo $_SESSION['user_info']['email']; ?>
                                <span class="el-tag el-tag--success el-tag--small el-tag--dark">
                                    Email Chính
                                </span>
                                <span class="el-tag el-tag--success el-tag--small el-tag--Plain">
                                    Đã xác minh
                                </span>
                            </div>
                        </div>
                    </section>
                    <div class="mt-4">
                        <form class="el-form mt-4" method="post">
                            <div class="el-form-item is-required el-form-item--medium">
                                <label for="email" class="el-form-item__label">Thêm địa chỉ email mới</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="text" autocomplete="off" name="email" placeholder="Địa chỉ email của bạn" class="el-input__inner">
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-success el-form-item--medium">
                                <label for="current_password" class="el-form-item__label">Mật khẩu hiện tại</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium">
                                        <input type="password" autocomplete="off" name="password" class="el-input__inner">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end button-info">
                                <button type="button" class="el-button el-button--default el-button--medium is-plain">
                                    <a href="./index.php?pages=edit_profile&action=home">
                                        Hủy bỏ
                                    </a>
                                </button>
                                <button type="submit" name="submit" class="el-button button-update el-button--primary el-button--medium is-plain">
                                    <span>
                                        Thêm
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>