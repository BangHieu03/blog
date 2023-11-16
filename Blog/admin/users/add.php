<?php

if (isset($_POST['addUser'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $avatar = $_POST['avatar'];
    $name_real = $_POST['name_real'];
    $date = $_POST['date'];
    $sex = $_POST['sex'];
    $role = $_POST['role'];
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $create_at = date('Y-m-d H:i:s'); 

    $avatar = $_FILES['avatar']['name'];
    $name_dif = ["jpg", "png", "svg"];
    $namefile = $_FILES['avatar']["name"];
    echo $name;
    if (
        !empty($name) &&   !empty($email) &&   !empty($password) &&
        !empty($phone) &&   !empty($avatar) &&   !empty($name_real) &&   !empty($date) &&   !empty($date) &&   !empty($role)
    ) {
        $tmp_name_file = $_FILES["avatar"]["tmp_name"];
        $file_size = $_FILES["avatar"]["size"];
        $generated_file_name = time() . "-" . $namefile;

        $contains_img = "../admin/img/$namefile";
        $file_extension = explode('.', $namefile);
        $file_extension = strtolower(end($file_extension));
        echo $tmp_name_file . "and " . $file_size . "and" . $contains_img . "and" . $file_extension;


        if (in_array($file_extension, $name_dif)) {
            if ($file_size < 1000000) {
                move_uploaded_file($tmp_name_file, $contains_img);
            }
        }
    }
    $result = new user();
    $result->addUser($name, $email, $password, $phone, $avatar, $name_real, $date, $sex, $role, $create_at);

    if ($_SESSION['sex'] == 1) {
        $sex = 'Nam';
    } else if ($_SESSION['sex'] == 2) {
        $sex = 'Nữ';
    }

    if ($_SESSION['role'] == 1) {
        $role = 'Admin';
    } else if ($_SESSION['role'] == 2) {
        $role = 'User';
    }
    header("Location: ./index.php?act=users&action=list");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container bg-light rounded shadow-sm p-4">
        <h4 class="text-center">Thêm mới người dùng</h4>
        <form method="POST" action="#" enctype="multipart/form-data" class="row g-3 needs-validation was-validated container bg-light p-4 rounded">
            <div class="col-md-6">
                <label for="name" class="form-label">Tài khoản</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="name" required>
                    <div class="invalid-feedback">
                        Tài khoản không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" name="password" required>
                    <div class="invalid-feedback">
                        Mật khẩu không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control" name="email" required>
                    <div class="invalid-feedback">
                        Email không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Số điện thoại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="text" class="form-control" name="phone" onkeypress="return isNumberKey(event)" required>
                    <div class="invalid-feedback">
                        Số điện thoại không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="avatar" class="form-label">Avatar</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="file" class="form-control" name="avatar" required>
                    <div class="invalid-feedback">
                        Avatar không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="name_real" class="form-label">Tên thật</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="name_real" required>
                    <div class="invalid-feedback">
                        Tên thật không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="date" class="form-label">Ngày sinh</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="date" class="form-control" name="date" required>
                    <div class="invalid-feedback">
                        Ngày sinh không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="sex" class="form-label">Giới tính</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <select class="form-select" name="sex" required aria-label=".form-select-sm example">
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Vai trò</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <select class="form-select" name="role" required aria-label=".form-select-sm example">
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="./index.php?act=users&action=list" type="button" class="btn btn-outline-secondary">HỦY</a>
                <input type="submit" name="addUser" class="btn btn-outline-success" value="THÊM"></input>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

</html>