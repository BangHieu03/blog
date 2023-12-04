<?php
include './includes/config.php';
if (isset($_GET['delpost'])) {

    $stmt = $db->prepare('DELETE FROM techno_blog WHERE articleId = :articleId');
    $stmt->execute(array(':articleId' => $_GET['delpost']));

    header('Location: ./index.php?act=products&action=list');
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
        function delpost(id, title) {
            if (confirm("ban có muốn xóa '" + title + "'")) {
                window.location.href = './index.php?act=products&action=list&delpost=' + id;
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
                            Bài Viết
                        </div>
                        <div class="card-body">
                            <div class="content">
                                <?php
                                //show message from add / edit page
                                if (isset($_GET['action'])) {
                                    echo '<h3>Post ' . $_GET['action'] . '.</h3>';
                                }
                                ?>

                                <table>
                                    <tr>
                                        <th>Article Title</th>
                                        <th>Posted Date</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                    try {

                                        $stmt = $db->query('SELECT articleId, articleTitle, articleDate FROM techno_blog ORDER BY articleId DESC');
                                        while ($row = $stmt->fetch()) {

                                            echo '<tr>';
                                            echo '<td>' . $row['articleTitle'] . '</td>';
                                            echo '<td>' . date('d-m-y h:m:s', strtotime($row['articleDate'])) . '</td>';

                                    ?>

                                            <td>
                                                <button class="editbtn"> <a href="./index.php?act=products&action=edit&id=<?php echo $row['articleId']; ?>">Edit </a> </button>

                                            </td>
                                            <td>
                                                <button class="delbtn"> <a href="javascript:delpost('<?php echo $row['articleId']; ?>','<?php echo $row['articleTitle']; ?>')">Delete </a> </button>
                                            </td>

                                    <?php
                                            echo '</tr>';
                                        }
                                    } catch (PDOException $e) {
                                        echo $e->getMessage();
                                    }
                                    ?>
                                </table>

                                <p> <button class="editbtn"><a href='./index.php?act=products&action=add'>Add New Article</a></button></p>
                                </p>
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