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
                    <h1 class="mt-4">BÌNH LUẬN CHI TIẾT</h1>
                    <h1 class="mt-4"> </h1>
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-table me-1"></i>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-success table-striped">
                                <div style="text-align: right;">
                                    <a href="./index.php?act=comment&action=list" class="btn btn-success m-lg-2"><img src="" alt="">TRỞ VỀ</a>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">TÊN NGƯỜI DÙNG</th>
                                        <th scope="col">SẢN PHẨM</th>
                                        <th scope="col">NỘI DUNG</th>
                                        <th scope="col">THỜI GIAN</th>
                                        <th scope="col">CHỨC NĂNG</th>
                                    </tr>
                                </thead>
                                <?php
                                $commentDetailObj = new commentDetail();
                                $user = new user();
                                $product = new products();
                                // Kiểm tra xem 'id' có tồn tại trong $_GET hay không
                                if (isset($_GET['id'])) {
                                    $predefined_product_id = $_GET['id'];
                                    $allCommentDetails = $commentDetailObj->getAllCommentDetailsByKind($predefined_product_id);
                                foreach ($allCommentDetails as $commentDetail) {
                                    extract($commentDetail);
                                    $delete = "index.php?act=detail_comment&action=delete&id=" . $id;
                                    echo '<tr>';
                                    echo '<td>' . $id . '</td>';
                                    // Hiển thị tên người dùng
                                    echo '<td>' . $user->getUserNameById($user_id) . '</td>';
                                    // Hiển thị tên sản phẩm
                                    echo '<td>' . $product->getProductNameById($product_id) . '</td>';
                                    // Hiển thị nội dung bình luận
                                    echo '<td>' . $content . '</td>';
                                    // Hiển thị thời gian tạo bình luận
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $date = date_create($create_at);
                                    echo '<td>' . date_format($date, 'Y-m-d H:i:s') . '</td>';

                                    echo '<td><a class="btn btn-outline-danger" data-bs-target="#modalDelete" href="' . $delete . '">XÓA</a></td>';
                                    echo '</tr>';
                                }
                            }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

</html>