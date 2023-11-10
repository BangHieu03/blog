<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Tạo một đối tượng mới từ class products
$product = new products();

// Lấy ID sản phẩm từ URL
$id = $_GET['id'];

$currentProduct = $product->getByIdProducts($id);

// Lưu giá trị ban đầu trước khi chỉnh sửa
$_SESSION['original_values'] = array(
    'name' => $currentProduct['name'],
    'price' => $currentProduct['price'],
    'description' => $currentProduct['description'],
    'img' => $currentProduct['img'],
    'category_id' => $currentProduct['category_id'],
    'author' =>  $currentProduct['author'],
    'publishing' =>  $currentProduct['publishing'],
    'pages' =>   $currentProduct['pages'],
    'date' =>  $currentProduct['date']
);

if (isset($_POST['updateProduct'])) {
    // Lấy dữ liệu từ form
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';
    $category_id = $_POST['category_id'] ?? '';
    $author = $_POST['author'] ?? '';
    $publishing = $_POST['publishing'] ?? '';
    $pages = $_POST['pages'] ?? '';
    $date = $_POST['date'] ?? '';

    // Nếu không có dữ liệu mới từ form, sử dụng dữ liệu hiện tại
    $name = !empty($name) ? $name : $currentProduct['name'];
    $price = !empty($price) ? $price : $currentProduct['price'];
    $description = !empty($description) ? $description : $currentProduct['description'];
    $img = !empty($_FILES['img']['name']) ? $_FILES['img']['name'] : $currentProduct['img'];
    $category_id = !empty($category_id) ? $category_id : $currentProduct['category_id'];
    $author = !empty($author) ? $author : $currentProduct['author'];
    $publishing = !empty($publishing) ? $publishing : $currentProduct['publishing'];
    $pages = !empty($pages) ? $pages : $currentProduct['pages'];
    $date = !empty($date) ? $date : $currentProduct['date'];

    // Cập nhật sản phẩm
    $product->editProducts($id, $name, $price, $description, $img, $category_id, $author, $publishing, $pages, $date);

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    header('Location: ./index.php?act=products&action=list');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT SẢN PHẨM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container  bg-light rounded shadow-sm p-4">
        <h4 class="text-center">Cập nhật sản phẩm</h4>
        <form method="POST" action="#" enctype="multipart/form-data" class="row g-3 needs-validation was-validated container bg-light p-4 rounded">
            <div class="col-md-6">
                <label for="name" class="form-label">Tên</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['name'] : ''; ?>" required>
                    <div class="invalid-feedback">
                        Tên sản phẩm không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Giá tiền</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="price" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['price'] : ''; ?>" onkeypress="return isNumberKey(event)" required>
                    <div class="invalid-feedback">
                        Giá tiền không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Trạng thái</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" name="description" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['description'] : ''; ?>" required>
                    <div class="invalid-feedback">
                        Trạng thái không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="img" class="form-label">Ảnh</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="file" class="form-control" name="img" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['img'] : ''; ?>" required>
                    <div class="invalid-feedback">
                        Hình ảnh sản phẩm không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="category_id" class="form-label">Thể loại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <select class="form-select" name="category_id" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['category_id'] : ''; ?>" required aria-label=".form-select-sm example">
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
                    <input type="text" class="form-control" name="author" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['author'] : ''; ?>" required>
                    <div class="invalid-feedback">
                        Tác giả không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="publishing" class="form-label">Nhà xuất bản</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-book-fill"></i></span>
                    <input type="text" class="form-control" name="publishing" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['publishing'] : ''; ?>" required>
                    <div class="invalid-feedback">
                        Nhà xuất bản không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="pages" class="form-label">Số trang</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-book-half"></i></span>
                    <input type="number" min="1" step="1" class="form-control" name="pages" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['pages'] : ''; ?>" required>
                    <div class="invalid-feedback">
                        Số trang không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="date" class="form-label">Ngày phát hành</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
                    <input type="date" class="form-control" name="date" value="<?php echo isset($_SESSION['original_values']) ? $_SESSION['original_values']['date'] : ''; ?>" required>
                    <div class="invalid-feedback">
                        Ngày phát hành không được để trống.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a href="./index.php?act=products&action=list" class="btn btn-secondary">Hủy</a>
                <button class="btn btn-success" name="updateProduct">Cập nhật</button>
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