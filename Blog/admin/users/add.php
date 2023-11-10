<?php

if (isset($_POST['addUser'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];


    $result = new user();
    $result->addUser($name, $email, $password, $phone, $role);
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
            <div class="col-md-12">
                <label for="name" class="form-label">Tài khoản</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="name" required>
                    <div class="invalid-feedback">
                        Tài khoản không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" name="password" required>
                    <div class="invalid-feedback">
                        Mật khẩu không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control" name="email" required>
                    <div class="invalid-feedback">
                        Email không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="phone" class="form-label">Số điện thoại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="text" class="form-control" name="phone" onkeypress="return isNumberKey(event)" required>
                    <div class="invalid-feedback">
                       Số điện thoại không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
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