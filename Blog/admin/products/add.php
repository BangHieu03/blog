<?php
//lấy dữ liệu từ input trong form thêm mới
if (isset($_POST['addProduct'])) {
    // Tạo một đối tượng mới từ class products
    $product = new products();
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $price = str_replace(',', '', $_POST['price']);
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $publishing = $_POST['publishing'];
    $pages = $_POST['pages'];
    $infor = $_POST['infor'];
    $date = $_POST['date'];
 

    // Xử lý file ảnh
    $img = $_FILES['img']['name'];
    $name_dif = ["jpg", "png", "svg"];
    $namefile = $_FILES['img']["name"];
    echo $name;
    if (
        !empty($name) &&   !empty($price) &&   !empty($description) &&
        !empty($category_id) &&   !empty($img) &&   !empty($author) &&   !empty($publishing) &&   !empty($pages) &&   !empty($date)
    ) {
        $tmp_name_file = $_FILES["img"]["tmp_name"];
        $file_size = $_FILES["img"]["size"];
        $generated_file_name = time() . "-" . $namefile;

        $contains_img = "../img/$namefile";
        $file_extension = explode('.', $namefile);
        $file_extension = strtolower(end($file_extension));
        echo $tmp_name_file . "and " . $file_size . "and" . $contains_img . "and" . $file_extension;


        if (in_array($file_extension, $name_dif)) {
            if ($file_size < 1000000) {
                move_uploaded_file($tmp_name_file, $contains_img);
            }
        }
    }
    // Thêm sản phẩm mới
    $product->addUProducts($name, $price, $description, $img, $category_id, $author, $publishing, $pages, $date, $infor); // Thêm biến infor vào đây
    // Chuyển hướng người dùng về trang danh sách sản phẩm
    header('Location: ./index.php?act=products&action=list');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM MỚI SẢN PHẨM</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-light rounded shadow-sm p-4">
        <h4 class="text-center">Thêm mới sản phẩm</h4>
        <form method="post" action="#" enctype="multipart/form-data" class="row g-3 needs-validation was-validated container bg-light p-4 rounded">
            <div class="col-md-6">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="name" required>
                    <div class="invalid-feedback">
                        Tên sản phẩm không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Giá tiền</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="text" class="form-control" name="price" onkeypress="return isNumberKey(event)" required>
                    <div class="invalid-feedback">
                        Giá tiền không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Trạng thái</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="text" class="form-control" name="description" required>
                    <div class="invalid-feedback">
                        Trạng thái không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="img" class="form-label">Ảnh</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="file" class="form-control" name="img" required>
                    <div class="invalid-feedback">
                        Ảnh không được để trống.
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="category_id" class="form-label">Thể loại</label>
                <div class="input-group">
                    <select class="form-select" name="category_id" required aria-label=".form-select-sm example">
                        <?php
                        // Tạo một đối tượng mới từ class Category
                        $category = new Category();

                        // Lấy tất cả các danh mục
                        $allCategories = $category->getAllCategory();

                        // Duyệt qua từng danh mục và tạo ra một tùy chọn cho nó
                        foreach ($allCategories as $category) {
                            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="author" class="form-label">Tác giả</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="author" required>
                    <div class="invalid-feedback">
                        Tác giả không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="publishing" class="form-label">Nhà xuất bản</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="publishing" required>
                    <div class="invalid-feedback">
                        Nhà xuất bản không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="pages" class="form-label">Số trang</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="text" class="form-control" name="pages" onkeypress="return isNumberKey(event)" required>
                    <div class="invalid-feedback">
                        Số trang không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="date" class="form-label">Ngày phát hành </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="date" class="form-control" name="date" required>
                    <div class="invalid-feedback">
                        Ngày phát hành không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="./index.php?act=products&action=list" type="button" class="btn btn-outline-secondary">HỦY</a>
                <button class="btn btn-outline-success" name="addProduct" value="addProduct">THÊM</button>
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