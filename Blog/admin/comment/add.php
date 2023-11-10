<?php
//lấy dữ liệu từ input trong form thêm mới
if(isset($_SESSION['user_id'])) {
    // Nếu người dùng đã đăng nhập, hiển thị form bình luận
    if(isset($_POST['submitComment'])) {
        // Lấy dữ liệu từ form
        $product_id = $_POST['id']; // Sử dụng id sản phẩm từ form
        $total_comments = $_SESSION['total_comments'];
        $create_at = $_POST['create_at'];

        // Tạo một đối tượng mới của class comment
        $comment = new comment();

        // Thêm bình luận mới vào cơ sở dữ liệu
        $comment-> addComment($id ,$product_id, $create_at, $total_comments);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới người dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<!-- <div class="container bg-light rounded shadow-sm p-4">
    <h4 class="text-center">Add new comment</h4>
    <form method="post" class="row g-3 needs-validation was-validated container bg-light p-4 rounded">
        <div class="col-md-12">
            <label for="content" class="form-label">Content</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" name="content" required>
                <div class="invalid-feedback">
                    The content cannot be blank.
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label for="update_at" class="form-label">Update At</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
                <input type="date" class="form-control" name="update_at" required>
                <div class="invalid-feedback">
                    The update date cannot be blank.
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label for="user_id" class="form-label">User ID</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" name="user_id"  onkeypress="return isNumberKey(event)" required>
                <div class="invalid-feedback">
                    The user ID cannot be blank.
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label for="product_id" class="form-label">Product ID</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                <input type="text" class="form-control" name="product_id"  onkeypress="return isNumberKey(event)" required>
                <div class="invalid-feedback">
                    The product ID cannot be blank.
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <a href="/index.php?pages=comment&action=list" type="button" class="btn btn-outline-secondary">Cancel</a>
            <button class="btn btn-outline-success" name="addComment">Add</button>
        </div>
    </form>
</div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<script>function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}</script>

</html>

