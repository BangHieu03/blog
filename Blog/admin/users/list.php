<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="../BLOG/admin/img/Logo.png" />
    <title>Document</title>
</head>

<body class="sb-nav-fixed">
    <?php
<<<<<<< Updated upstream
    include '../includes/header.php';
    ?>
    <div id="layoutSidenav">
        <?php
        include '../includes/nav.php';
=======
    include '../admin/includes/header.php';
    ?>
    <div id="layoutSidenav">
        <?php
        include '../admin/includes/nav.php';
>>>>>>> Stashed changes
        ?>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">NGƯỜI DÙNG</h1>
                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <i class="fas fa-table me-1"></i>
                            DANH SÁCH NGƯỜI DÙNG
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover table-striped">
                                <div style="text-align: right;">
                                    <?php
                                    echo ' <a href="./index.php?act=users&action=add" class="btn btn-outline-success m-lg-2"><i class="fas fa-plus" style="color: #24e3a2;"></i>THÊM MỚI</a>';
                                    echo ' <a href="./index.php?act=users&action=table" class="btn btn-outline-dark m-lg-2"><i class="fas fa-plus" style="white: #24e3a2;"></i>THỐNG KÊ</a>'
                                    ?>
                                </div>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>MẬT KHẨU</th>
                                        <th>EMAIL</th>
<<<<<<< Updated upstream
                                        <th>AVATAR</th>
                                        <th>THÔNG TIN</th>
=======
                                        <th>SỐ ĐIỆN THOẠI</th>
                                        <th>AVATAR</th>
                                        <th>TÊN THẬT</th>
                                        <th>NGÀY SINH</th>
                                        <th>GIỚI TÍNH</th>
>>>>>>> Stashed changes
                                        <th>VAI TRÒ</th>
                                        <th>CHỨC NĂNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user = new user();
                                    $allUsers = $user->getAllUsers();
                                    $currentUserId = isset($_SESSION['currentUserId']) ? $_SESSION['currentUserId'] : null;

                                    $roleNames = array(
                                        1 => 'User',
                                        2 => 'Admin',
                                        // Thêm vào đây nếu bạn có thêm roles
                                    );
                                    $roleSex = array(
                                        1=> 'Nam',
                                        2=> 'Nữ',
                                    );
                                    foreach ($allUsers as $user) {

                                        extract($user);
                                        $delete = "index.php?act=users&action=delete&id=" . $user_id;
                                        $update = "index.php?act=users&action=edit&id=" . $user_id;
                                        echo '<tr>';
                                        echo '<td>' . $user_id . '</td>';
                                        echo '<td>' . $name . '</td>';
                                        echo '<td>' . $password . '</td>';
                                        echo '<td>' . $email . '</td>';
<<<<<<< Updated upstream
                                        echo '<td>' . $avatar . '</td>';
                                        echo '<td>' . $infor . '</td>';
=======
                                        echo '<td>' . $phone . '</td>';
                                        echo '<td><img src="../admin/img/'.$avatar.'" alt="Uploaded Image" width="70px"></td>';
                                        echo '<td>' . $name_real . '</td>';
                                        echo '<td>' . $date . '</td>';
                                        echo '<td>' . $roleSex[$sex] . '</td>';
>>>>>>> Stashed changes
                                        echo '<td>' . $roleNames[$role] . '</td>';
                                        echo '<td><a class="btn btn-outline-primary" data-bs-target="#modalEdit" href="' . $update . '"><i class="fas fa-edit" style="color: #0d6ef4;"></i>CẬP NHẬT </a>';

                                        // Chỉ hiển thị nút xóa nếu người dùng hiện tại không phải là người dùng này và người dùng này là quản trị viên
                                        if ($currentUserId != $user_id && $role == 1) {
                                            echo ' <a class="btn btn-outline-danger" data-bs-target="#modalDelete" href="' . $delete . '">XÓA</a>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
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