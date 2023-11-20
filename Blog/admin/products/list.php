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
                    <h1 class="mt-4">SẢN PHẨM</h1>
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-table me-1"></i>
                           DANH SÁCH SẨN PHẨM
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-success table-striped">
                                <div style="text-align: right;">
                                <?php 
                                    echo' <a href="./index.php?act=products&action=add" class="btn btn-outline-success m-lg-2"><i class="fas fa-plus" style="color: #24e3a2;"></i>THÊM MỚI</a>';
                                    echo' <a href="./index.php?act=products&action=table" class="btn btn-outline-dark m-lg-2"><i class="fas fa-plus" style="white: #24e3a2;"></i>THỐNG KÊ</a>'
                                ?>
                                </div>
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th>
                                        <th>TÊN</th>
                                        <th>GIÁ TIỀN</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>ẢNH</th>
                                        <th>THỂ LOẠI</th>
                                        <th>TÁC GIẢ</th>
                                        <th>NXB</th>
                                        <th>SỐ TRANG</th>
                                        <th>NGÀY PHÁT HÀNH</th>
                                        <th>CHỨC NĂNG</th> -->
                                    </tr>
                                </thead>
                                <?php
                                $product = new products();
                                $category = new category(); // Khởi tạo đối tượng category
                                $AllProduct = $product->getAllProducts();
                                foreach ($AllProduct as $product) {
                                    extract($product);
                                    $delete="index.php?act=products&action=delete&id=".$id;
                                    $update="index.php?act=products&action=edit&id=".$id;
                                    echo '<tr>';
                                    echo '<td>' . $id . '</td>';
                                    echo '<td>' . $name . '</td>';
                                    echo '<td>' . $price . '</td>';
                                    echo '<td>' . $description . '</td>';
                                    echo '<td><img src="../img/'.$img.'" alt="Uploaded Image" width="70px"></td>';
                                    // Lấy thông tin danh mục từ id và hiển thị tên danh mục
                                    $categoryInfo = $category->getByIdCategory($category_id);
                                    echo '<td>' . $categoryInfo['name'] . '</td>'; // Giả sử 'name' là trường chứa tên danh mục
                                    echo '<td>' . $author . '</td>';
                                    echo '<td>' . $publishing . '</td>';
                                    echo '<td>' . $pages . '</td>';
                                    echo '<td>' . $date . '</td>';
                                    echo '<td><a class="btn btn-outline-primary" data-bs-target="#modalEdit" href="'.$update.'"><i class="fas fa-edit" style="color: #0d6ef4;"></i>CẬP NHẬT </a> <a class="btn btn-outline-danger" data-bs-target="#modalDelete" href="'.$delete.'">XÓA</a></td>';
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