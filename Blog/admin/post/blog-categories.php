<?php
//include config
require_once('./includes/config.php');

//show message from add / edit page
if (isset($_GET['delcat'])) {

    $stmt = $db->prepare('DELETE FROM techno_category WHERE categoryId = :categoryId');
    $stmt->execute(array(':categoryId' => $_GET['delcat']));

    header('Location: ./index.php?act=products&action=blog-categories');
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
    <script language="JavaScript" type="text/javascript">
        function delcat(id, title) {
            if (confirm("Bạn có chắc muốn xóa '" + title + "'")) {
                window.location.href = './index.php?act=products&action=blog-categories&delcat=' + id;
            }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/min-css.css" rel="stylesheet" />
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
                    <h1 class="mt-4">Bài Viết</h1>
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-table me-1"></i>
                            Thể loại
                        </div>
                        <div class="card-body">
                            <div class="content">
                                <?php
                                //show message from add / edit page
                                if (isset($_GET['action'])) {
                                    echo '<h3>Category ' . $_GET['action'] . '.</h3>';
                                }
                                ?>

                                <table>
                                    <tr>
                                        <th>Title</th>
                                        <th>Operation</th>
                                    </tr>
                                    <?php
                                    try {

                                        $stmt = $db->query('SELECT categoryId, categoryName, categorySlug FROM techno_category ORDER BY categoryName DESC');
                                        while ($row = $stmt->fetch()) {

                                            echo '<tr>';
                                            echo '<td>' . $row['categoryName'] . '</td>';
                                    ?>

                                            <td>
                                                <button class="editbtn"> <a href="./index.php?act=products&action=edit-blog-categories&id=<?php echo $row['categoryId']; ?>">Edit</a> </button>
                                                <button class="delbtn"> <a href="javascript:delcat('<?php echo $row['categoryId']; ?>','<?php echo $row['categorySlug']; ?>')">Delete</a></button>
                                            </td>

                                    <?php
                                            echo '</tr>';
                                        }
                                    } catch (PDOException $e) {
                                        echo $e->getMessage();
                                    }
                                    ?>
                                </table>

                                <p><button class="editbtn"><a href='./index.php?act=products&action=add-blog-categories'>Add New Category</a></button></p>
                            </div>
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