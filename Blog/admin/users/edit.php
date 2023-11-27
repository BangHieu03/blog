<?php
// Khởi tạo biến với giá trị mặc định
$user_id = '';
$name = '';
$password = '';
$email = '';
$phone = '';
$avatar = '';
$name_real = '';
$date = '';
$sex = '';
$role = '';
$update_at = '';


if (isset($_POST['update'])) {
    // Nếu form đã được gửi đi, lấy giá trị từ yêu cầu POST
    $user_id = $_POST['user_id']; // Sửa lại ở đây
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $avatar = $_POST['avatar'];
    $name_real = $_POST['name_real'];
    $date = $_POST['date'];
    $sex = $_POST['sex'];
    $role = $_POST['role'];
    $update_at = $_POST['update_at'];

    // Cập nhật thông tin người dùng
    $user = new user();
    $user->editUser($user_id, $name, $email, $password, $phone, $avatar, $name_real, $date, $sex, $role, $update_at);
    // Chuyển hướng người dùng về trang danh sách người dùng sau khi cập nhật
    header('Location: ./index.php?act=users&action=list');
} else if (isset($_GET['user_id'])) {
    // Nếu có id trong yêu cầu GET, lấy thông tin người dùng từ cơ sở dữ liệu
    $user = new user();
    $userInfo = $user->getUserById($_GET['user_id']);
    $name = $userInfo['name'];
    $password = $userInfo['password'];
    $email = $userInfo['email'];
    $phone = $userInfo['phone'];
    $avatar = $userInfo['avatar'];
    $name_real = $userInfo['name_real'];
    $date = $userInfo['date'];
    $sex = $userInfo['sex'];
    $role = $userInfo['role'];
    $create_at = $userInfo['create_at'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container  bg-light rounded shadow-sm p-4">
        <h4 class="text-center">Cập nhật người dùng</h4>
        <form method="POST" action="#" class="row g-3 needs-validation was-validated container bg-light p-4 rounded">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <div class="col-md-6">
                <label for="name" class="form-label">Tài khoản</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
                    <div class="invalid-feedback">
                        Tài khoản không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="password" id="password" class="form-control" name="password" value="<?php echo $password ?>" required>
                    <div class="invalid-feedback">
                        Mật khẩu không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="email" id="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                    <div class="invalid-feedback">
                        Email không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Số điện thoại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input id="phone" name="phone" class="form-control" value="<?php echo $phone ?>" onkeypress="return isNumberKey(event)" required>
                    <div class="invalid-feedback">
                        Số điện thoại không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="avatar" class="form-label">Avatar</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="file" id="avatar" name="avatar" class="form-control"  value="<?php echo $avatar ?>" required>
                    <div class="invalid-feedback">
                        Avatar không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="name_real" class="form-label">Tên thật</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="name_real" name="name_real" value="<?php echo $name_real ?>" required>
                    <div class="invalid-feedback">
                        Tên thật không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="date" class="form-label">Ngày sinh</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>" required>
                    <div class="invalid-feedback">
                        Ngày sinh không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="sex" class="form-label">Giới tính</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <select class="form-control" id="sex" name="sex">
                        <option value="1" <?php echo $sex  == 1 ? 'selected' : ''; ?>>Nam</option>
                        <option value="2" <?php echo $sex  == 2 ? 'selected' : ''; ?>>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="role" class="form-label">Vai trò</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <select class="form-control" id="role" name="role">
                        <option value="1" <?php echo $role  == 1 ? 'selected' : ''; ?>>User</option>
                        <option value="2" <?php echo $role  == 2 ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="index.php?act=users&action=list" class="btn btn-secondary">Hủy</a>
                <input type="submit" name="update" class="btn btn-success" value="Cập nhật">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
</body>

</html>