<?php

//lấy dữ liệu từ input trong form thêm mới sản phẩm
if (isset($_POST['addCategory'])) {
    $name = $_POST['name'];
    $result = new category();
    $result->addCategory($name);

    header('location: ./index.php?act=categories&action=list');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thể loại</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-light rounded shadow-sm p-4">
        <h4 class="text-center">Thêm mới thể loại</h4>
        <form method="POST" action="#" class="row g-3 needs-validation was-validated">
            <div class="col-md-12">
                <label for="name" class="form-label">Tên thể loại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="name" required>
                    <div class="invalid-feedback">
                       Tên thể loại không được trống.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a href="./index.php?act=categories&action=list" type="button" class="btn btn-secondary">HỦY</a>
                <button class="btn btn-success" name="addCategory">THÊM</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>