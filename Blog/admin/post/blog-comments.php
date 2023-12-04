<?php
//include connection file 
require_once('../includes/config.php');




if (isset($_GET['delpost'])) {

    $stmt = $db->prepare('DELETE FROM discussion WHERE id = :id');
    $stmt->execute(array(':id' => $_GET['delpost']));

    header('Location: ./index.php?act=comment&action=list');
    exit;
}


?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MYBOOK STORE</title>
    <script language="JavaScript" type="text/javascript">
        function delpost(id, title) {
            if (confirm("Are you sure you want to delete '" + title + "'")) {
                window.location.href = './index.php?act=comment&action=list&delpost=' + pageId;
            }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/min-css.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

</script>
<?php include("header.php");  ?>

<div class="content">
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
<?php include("sidebar.php");  ?>
<?php include("footer.php");  ?>