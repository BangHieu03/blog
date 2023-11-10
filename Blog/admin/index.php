<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login</title>
  <link href="./css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/png" href="./trangchinh/img/LOGO - Copy.png" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="bg-primary">
  <?php
  // session_start(); 
  include "./includes/pdo.php";
  include "./users/user.php";
  include "./products/product.php";
  include "./categories/category.php";
  include "./comment/comment.php";
  include "./comment/comment_detail/detail.php";



  $action = 'user';
  if (isset($_GET['act']))
    $action = $_GET['act'];
  if (!isset($_SESSION['admin'])) {
    $action = "login";
  }
  switch ($action) {
    case "login":
      include "./includes/login.php";
      break;
    case "user":
      include "./users/list.php";
      break;
    case "logout":
      unset($_SESSION['admin']);
      include './includes/login.php';
      break;
  }
  if (isset($_GET['act'])) {
    switch ($_GET['act']) {
      case 'login':
        include './includes/login.php';
        break;
      case 'users':
        switch ($_GET['action']) {
          case 'list':
            include './users/list.php';
            break;
          case 'add':
            include './users/add.php';
            break;
          case 'edit':
            include './users/edit.php';
            break;
          case 'delete':
            include './users/delete.php';
            break;
          case 'table':
            include './users/thongke.php';
            break;
        }
        break;
      case 'fogot':
        switch ($_GET['action']) {
          case 'password':
            include './includes/fogot.php';
            break;
        }
        break;
      case 'products':
        switch ($_GET['action']) {

          case 'list':
            include './products/list.php';
            break;
          case 'add':
            include './products/add.php';
            break;
          case 'edit':
            include './products/edit.php';
            break;
          case 'delete':
            include './products/delete.php';
            break;
          case 'table':
            include './products/thongke.php';
            break;
        }
        break;
      case 'categories':
        switch ($_GET['action']) {
          case 'list':
            include './categories/list.php';
            break;
          case 'add':
            include './categories/add.php';
            break;
          case 'edit':
            include './categories/edit.php';
            break;
          case 'delete':
            include './categories/delete.php';
            break;
        }
        break;
      case 'comment':
        switch ($_GET['action']) {
          case 'list':
            include './comment/list.php';
            break;
          case 'add':
            include './comment/add.php';
            break;
          case 'edit':
            include './comment/edit.php';
            break;
          case 'delete':
            include './comment/delete.php';
            break;
        }
        break;
      case 'detail_comment':
        switch ($_GET['action']) {
          case 'list':
            include './comment/comment_detail/detail_comment.php';
            break;
          case 'delete':
            include './comment/comment_detail/delete.php';
            break;
        }
      case 'layout':
        switch ($_GET['action']) {
          case 'home':
            include './layout.php';
            break;
        }
        break;
    }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>


</html>
<?php
ob_end_flush();
?>