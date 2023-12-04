<?php


$id = $_GET['id'];

// Tạo một đối tượng mới từ class category
$db = new category();

// Lấy thông tin hiện tại của category
$currentCategory = $db->getByIdCategory($id);
// Nếu người dùng nhấn nút Update, cập nhật thông tin category
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $db->editCategory($id, $name);
    header('Location: ./index.php?act=categories&action=list');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT THỂ LOẠI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container  bg-light rounded shadow-sm p-4">
        <h4 class="text-center">CẬP NHẬT THỂ LOẠI</h4>
        <form action="#" method="POST" class="row g-3 needs-validation was-validated container bg-light p-4 rounded">
            <div class="col-md-12">
                <label for="name" class="form-label">Tên thể loại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $currentCategory['name']; ?>" required>
                    <div class="invalid-feedback">
                        Tên thể loại không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a href="index.php?act=categories&action=list" class="btn btn-secondary">HỦY</a>
                <input type="submit" class="btn btn-success" name="update" value="CẬP NHẬT"></button>
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