<?php
require_once('./includes/config.php');




if (isset($_GET['delpost'])) {

    $stmt = $db->prepare('DELETE FROM discussion WHERE id = :id');
    $stmt->execute(array(':id' => $_GET['delpost']));

    header('Location: blog-comments.php?action=deleted');
    exit;
}

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
                                        <!-- <th>ID</th>
                                        <th>SỐ LƯỢNG BÌNH LUẬN</th>
                                        <th>SỐ LƯỢNG XEM</th>
                                        <th>SẢN PHẨM</th>
                                        <th>THỜI GIAN</th>
                                        <th>CHỨC NĂNG</th> -->
                                    </tr>
                                </thead>
                                <?php
                                //show message from add / edit page
                                if (isset($_GET['action'])) {
                                    echo '<h3>Post ' . $_GET['action'] . '.</h3>';
                                }
                                ?>

                                <table>
                                    <tr>
                                        <th>Id</th>
                                        <th>Comments</th>
                                        <th>username</th>
                                        <th>post</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                    try {

                                        $stmt = $db->query('SELECT id,parent_comment,student,post,date FROM discussion ORDER BY id DESC');
                                        while ($row = $stmt->fetch()) {

                                            echo '<tr>';
                                            echo '<td>' . $row['id'] . '</td>';
                                            echo '<td>' . $row['parent_comment'] . '</td>';
                                            echo '<td>' . $row['student'] . '</td>';
                                            echo '<td>' . $row['post'] . '</td>';

                                    ?>

                                            <td>
                                                <button class="editbtn"> <a href="edit-blog-page.php?pageId=<?php echo $row['id']; ?>">Edit</a> </button>
                                            </td>
                                            <td>
                                                <button class="delbtn"> <a href="javascript:delpost('<?php echo $row['id']; ?>','<?php echo $row['pageTitle']; ?>')">Delete</a></button>
                                            </td>

                                    <?php
                                            echo '</tr>';
                                        }
                                    } catch (PDOException $e) {
                                        echo $e->getMessage();
                                    }
                                    ?>
                                </table>
                                <p><button class="editbtn"><a href='./index.php?act=comment&action=add'>Add New comment</a></button></p>
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