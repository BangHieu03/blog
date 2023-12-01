<section class="el-container">
    <?php
    include './blogy-1.0.0/includes/aside_edit.php';
    ?>
    <main class="el-main">
        <div class="container py-4 ">
            <div class="el-card is-never-shadow "><!---->
                <div class="el-card__body ">
                    <h1 class="card-title ">
                        Thông Tin Cá Nhân
                    </h1>
                    <p class="card-subtitle ">
                        Quản lý thông tin cá nhân của bạn.
                    </p>
                    <form method="post" action="#" enctype="multipart/form-data" class="el-form mt-4 el-form--label-top"><!---->
                        <div class="d-flex justify-content-center mt-2 ">
                            <div>
                                <div title="Nhấp chuột để tải lên ảnh đại diện của bạn." class="btn-change-avatar">
                                    <img src="/images/<?php echo $_SESSION['user_info']['avatar']; ?>" alt="Avatar" title="Ảnh đại diện của <?php echo $_SESSION['user_info']['name']; ?>" style="border-radius: 50%; width: 128px; height: 128px" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="change-avt">
                                        Thay đổi
                                    </div>
                                </div>
                                <div class="el-dialog__wrapper profile-picture-dialog default_cursor_cs" style="z-index: 2001;">
                                    <div role="dialog" aria-modal="true" aria-label="dialog" class="el-dialog" style="margin-top: 15vh;">
                                        <div class="el-dialog__header">
                                            <div>
                                                Thay đổi hình ảnh đại diện
                                            </div>
                                            <button type="button" aria-label="Close" class="el-dialog__headerbtn">
                                                <i class="el-dialog__close el-icon el-icon-close"></i>
                                            </button>
                                        </div>
                                        <div class="el-dialog__body default_cursor_cs">
                                            <div class="picture-picker text-center default_cursor_cs">
                                                <div class="croppa-container">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" id="avatarUpload" name="avatar">
                                                    <!-- <input type="submit" value="Upload Image" name="submit"> -->
                                                </div>
                                            </div>
                                            <p class="text-center mt-1 title-tip">
                                                <small>Mẹo: Sử dụng con lăn để thu phóng, kéo để di chuyển ảnh.</small>
                                            </p>
                                            <div class="picture-toolbox text-center mt-4">
                                                <div class="el-button-group">
                                                    <button type="button" class="el-button el-button--default is-disabled" title="Rotate the image 90 degrees to the left" disabled="disabled">
                                                        <i class="fa fa-reply fa-rotate-270"></i>
                                                    </button>
                                                    <button type="button" class="el-button el-button--default is-disabled" title="Rotate the image 90 degrees to the right" disabled="disabled">
                                                        <i class="fa fa-share fa-rotate-90"></i>
                                                    </button>
                                                    <button type="button" class="el-button el-button--default is-disabled" title="Flip vertical" disabled="disabled">
                                                        <i class="fa fa-redo-alt fa-rotate-90"></i>
                                                    </button>
                                                    <input type="submit" name="submit" value="Lưu" class="el-button el-button--primary is-disabled" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row flex-wrap mt-4 ">
                            <div class="el-form-item flex-grow-1 px-1 el-form-item--medium "><label for="name" class="el-form-item__label">Tên tài khoản</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium is-disabled"><input type="text" id="name" name="name" disabled="disabled" autocomplete="off" class="el-input__inner" value="<?php echo $_SESSION['user_info']['name']; ?>"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row flex-wrap">
                            <div class="el-form-item flex-grow-1 px-1 is-required el-form-item--medium "><label for="name_real" class="el-form-item__label">Tên thật</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium"><input type="text" id="name_real" name="name_real" autocomplete="off" class="el-input__inner" value="<?php echo $_SESSION['user_info']['name_real']; ?>"></div>
                                </div>
                            </div>
                            <div class="el-form-item flex-grow-1 px-1 is-required el-form-item--medium"><label for="phone" class="el-form-item__label">Số điện thoại</label>
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--medium"><!----><input type="text" id="phone" name="phone" autocomplete="off" placeholder="Số điện thoại" class="el-input__inner" value="<?php echo $_SESSION['user_info']['phone']; ?>"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row flex-wrap">
                            <div class="el-form-item flex-grow-1 px-1 is-required el-form-item--medium">
                                <label for="birthday" class="el-form-item__label">Ngày sinh</label>
                                <div class="el-form-item__content">
                                    <div class="el-date-editor w-100 el-input el-input--medium el-input--prefix el-input--suffix el-date-editor--date">
                                        <input type="date" id="date" name="date" placeholder="Ngày sinh" class="el-input__inner" value="<?php echo isset($_SESSION['user_info']['date']) ? $_SESSION['user_info']['date'] : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item flex-grow-1 px-1 is-required el-form-item--medium">
                                <label for="gender" class="el-form-item__label">Giới tính</label>
                                <div class="el-form-item__content">
                                    <div class="el-select w-100 el-select--medium el-select--suffix">
                                        <select id="sex" name="sex" class="el-input__inner default_pointer_cs">
                                            <option value="Nam" <?php echo $_SESSION['user_info']['sex'] == 1 ? 'selected' : ''; ?>>Nam</option>
                                            <option value="Nữ" <?php echo $_SESSION['user_info']['sex'] == 2 ? 'selected' : ''; ?>>Nữ</option>
                                            <img src="../img/person_4.jpg" alt="">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end button-info">
                            <button type="button" class="el-button el-button--default el-button--medium is-plain default_pointer_cs">
                                <span><a href="./index.php?pages=edit_profile&action=home">Hủy bỏ</a></span>
                            </button>
                            <input type="submit" name="update" value="Cập nhật" class="el-button button-update el-button--primary el-button--medium is-plain default_pointer_cs">
                        </div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Khởi tạo đối tượng user
                            $user = new user();
                            // Lấy giá trị từ form
                            $user_id = $_SESSION['user_info']['user_id'];
                            $name = isset($_POST['name']) ? $_POST['name'] : $_SESSION['user_info']['name'];
                            $password = isset($_POST['password']) ? $_POST['password'] : $_SESSION['user_info']['password'];
                            $email = isset($_POST['email']) ? $_POST['email'] : $_SESSION['user_info']['email'];
                            $phone = isset($_POST['phone']) ? $_POST['phone'] : $_SESSION['user_info']['phone'];
                            $avatar = isset($_POST['avatar']) ? $_POST['avatar'] : $_SESSION['user_info']['avatar'];
                            $name_real = isset($_POST['name_real']) ? $_POST['name_real'] : $_SESSION['user_info']['name_real'];
                            $date = isset($_POST['date']) ? $_POST['date'] : $_SESSION['user_info']['date'];
                            $sex = isset($_POST['sex']) ? ($_POST['sex'] == 'Nam' ? 1 : 2) : $_SESSION['user_info']['sex'];
                            $role = isset($_POST['role']) ? ($_POST['role'] == 'User' ? 1 : 2) : 1;
                            $update_at = date('Y-m-d H:i:s'); // Sử dụng thời gian hiện tại

                            // Kiểm tra xem dữ liệu có thay đổi không
                            if ($name != $_SESSION['user_info']['name'] ||  $password != $_SESSION['user_info']['password'] || $email != $_SESSION['user_info']['email'] || $phone != $_SESSION['user_info']['phone'] || $avatar != $_SESSION['user_info']['avatar'] || $name_real != $_SESSION['user_info']['name_real'] || $date != $_SESSION['user_info']['date'] || $sex != $_SESSION['user_info']['sex'] || $role != $_SESSION['user_info']['role']) {
                                // Nếu dữ liệu thay đổi và 'date' hợp lệ, thực hiện cập nhật
                                if ($date != '' && DateTime::createFromFormat('Y-m-d', $date) !== FALSE) {
                                    // Gọi hàm cập nhật
                                    $user->editUser($user_id, $name, $email, $password, $phone, $avatar, $name_real, $date, $sex, $role, $update_at);
                                } else {
                                    echo "Giá trị 'date' không hợp lệ.";
                                }
                            }

                            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                                // Xác định thư mục mà bạn muốn tệp được tải lên
                                $upload_dir = '';

                                // Sử dụng tên tệp gốc
                                $filename = basename($_FILES['avatar']['name']);

                                // Di chuyển tệp đã tải lên đến thư mục được chỉ định
                                // Cập nhật cơ sở dữ liệu với đường dẫn mới của ảnh đại diện
                                $user->updateAvatar($user_id, $upload_dir . $filename);
                                echo "Ảnh đại diện đã được cập nhật thành công.";
                            } else {
                                echo "Không có tệp nào được tải lên hoặc đã xảy ra lỗi khi tải lên tệp.";
                            }

                            // Cập nhật thông tin trong session
                            $_SESSION['user_info'] = $user->getUserById($user_id);

                            header('location:./index.php?pages=edit_profile&action=home');
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
</section>