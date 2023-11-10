<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MYBOOK STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    include './includes/header.php';
    ?>
    <div id="layoutSidenav">
        <?php
        include './includes/nav.php';
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">BÌNH LUẬN </h1>
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-table me-1"></i>
                            DANH SÁCH BÌNH LUẬN
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-success table-striped">
                                <div style="text-align: right;">
                                    <!-- <a href="./index.php?act=comment&action=add" class="btn btn-outline-success m-lg-2"><i class="fas fa-plus" style="color: #24e3a2;"></i>ADD</a> -->
                                </div>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>SỐ LƯỢNG BÌNH LUẬN</th>
                                        <th>SỐ LƯỢNG XEM</th>
                                        <th>SẢN PHẨM</th>
                                        <th>THỜI GIAN</th>
                                        <th>CHỨC NĂNG</th>
                                    </tr>
                                </thead>
                                <?php
                                $comment = new comment();
                                $commentDetail = new commentDetail();
                                $user = new user();
                                $product = new products();
                                if (isset($_GET['id'])) {
                                    $comment->increaseViewCount($_GET['id']);
                                }
                                $allComment = $comment->getAllComments();
                                if (isset($_POST['submitComment'])) {
                                    // Lấy dữ liệu từ form
                                    $product_id = $_POST['id'];
                                    $user_id = $_POST['user_id'];
                                    $comment = $_POST['comment'];
                                    $create_at = date('Y-m-d H:i:s');

                                    // Thêm bình luận mới vào cơ sở dữ liệu
                                    $commentDetailObj->addCommentDetail($product_id, $user_id, $comment, $create_at);

                                    // Cập nhật số lượng bình luận cho sản phẩm này
                                    $commentCount = $commentDetailObj->getCommentCountByProduct($product_id);

                                    // Cập nhật số lượng bình luận trong bảng comments
                                    $db = new connect();
                                    $update = "UPDATE comments SET total_comments = '$commentCount' WHERE id = '$product_id'";
                                    $db->pdo_execute($update);
                                }

                                foreach ($allComment as $comment) {
                                    extract($comment);
                                    $delete = "index.php?act=comment&action=delete&id=" . $id;
                                    // Sử dụng id bình luận như là id sản phẩm cho hàm getAllCommentDetailsByKind()
                                    $detail = "index.php?act=detail_comment&action=list&id=" . $id;
                                    echo '<tr>';
                                    echo '<td>' . $id . '</td>';
                                    // Hiển thị số lượng bình luận cho sản phẩm này
                                    echo '<td>' . $commentDetail->getCommentCountByProduct($product_id) . '</td>';
                                    echo '<td>'  . $comment['views'];
                                    '</td>';
                                    // Hiển thị tên sản phẩm
                                    $product_info = $product->getByIdProducts($product_id);
                                    echo '<td>' . $product_info['name'] . '</td>';
                                    // Hiển thị thời gian tạo bình luận
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $date = date_create($create_at);
                                    echo '<td>' . date_format($date, 'Y-m-d H:i:s') . '</td>';
                                    echo '<td><a class="btn btn-outline-danger" data-bs-target="#modalDelete" href="' . $delete . '">XÓA</a>  <a class="btn btn-outline-success" data-bs-target="#modalDetail" href="' . $detail . '">CHI TIẾT</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>