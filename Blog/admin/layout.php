<?php
class Statistics
{
    public function getUserStats()
    {
        $user = new user();
        $allUsers = $user->getAllUsers();
        $adminCount = 0;
        $userCount = 0;
        foreach ($allUsers as $u) {
            if ($u['role'] == '2') {
                $adminCount++;
            } else {
                $userCount++;
            }
        }
        return array('totalUsers' => count($allUsers), 'admins' => $adminCount, 'users' => $userCount);
    }

    public function getProductStats()
    {
        $product = new products();
        $allProducts = $product->getAllProducts();
        return count($allProducts);
    }

    public function getCommentStats()
    {
        $comment = new comment();
        $allComments = $comment->getAllComments();
        return count($allComments);
    }
}
$stats = new Statistics();
$userStats = $stats->getUserStats();
$productStats = $stats->getProductStats();
$commentStats = $stats->getCommentStats();


?>
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
                    <h1 class="mt-4">TRANG CHỦ</h1>
                    <div class="card mb-4">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-dark bg-primary mb-3">
                                        <div class="card-header">Tổng người dùng</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $userStats['totalUsers']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-success mb-3">
                                        <div class="card-header">Admin</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $userStats['admins']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-info mb-3">
                                        <div class="card-header">Người dùng thông thường</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $userStats['users']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-warning mb-3">
                                        <div class="card-header">Tổng sản phấm</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $productStats; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-danger mb-3">
                                        <div class="card-header">Tổng bình luận</div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $commentStats; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
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