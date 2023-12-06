<<<<<<< HEAD
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

=======
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
    <title>forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

</head>

<!-- Modal -->
<script src="./comment/main.js"></script>
<div id="ReplyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply Question</h4>
            </div>
            <div class="modal-body">
                <form name="frm1" method="post">
                    <input type="hidden" id="commentid" name="Rcommentid">
                    <div class="form-group">
                        <label for="usr">Write your name:</label>
                        <input type="text" class="form-control" name="Rname" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Write your reply:</label>
                        <textarea class="form-control editor" rows="5" name="Rmsg" required></textarea>
                    </div>
                    <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
                </form>
            </div>
        </div>

    </div>
</div>



<div class="container">

    <div class="panel panel-default" style="margin-top:50px">
        <div class="panel-body">
            <h3>Community forum</h3>
            <hr>
            <form name="frm" method="post">
                <input type="hidden" id="commentid" name="Pcommentid" value="0">
                <div class="form-group">
                    <label for="usr">Write your name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="comment">Write your question:</label>
                    <textarea class="form-control editor" rows="5" name="msg" required></textarea>
                </div>
                <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
            </form>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Recent questions</h4>
            <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
                <tbody id="record">

                </tbody>
            </table>
        </div>
    </div>

</div>


</body>

</html>
>>>>>>> 14f18fc ([TASK]-GHÉP CODE[POST...] ĐI ĐƯỜNG DẪN)
