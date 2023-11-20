<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="../blogy-1.0.0/favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/css/tiny-slider.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/glightbox.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/flatpickr.min.css">
    <link rel="stylesheet" href="/css/down-menu.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <title>MyBlog &mdash; Kết nối mọi người</title>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include './blogy-1.0.0/pdo/pdo.php';
    include './admin/users/user.php';
    include './blogy-1.0.0/incudes/header.php';

    if (isset($_GET['pages'])) {
        switch ($_GET['pages']) {

            case 'index':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/product/index.php';
                        break;
                }
                break;
            case 'login':
                switch ($_GET['action']) {
                    case 'home';
                        include './blogy-1.0.0/login/dangnhap.php';
                        break;
                }
                break;
            case 'logout':
                switch ($_GET['action']) {
                    case 'home';
                        include './blogy-1.0.0/logout/logout.php';
                        break;
                }
                break;
            case 'single':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/product/single.php';
                        break;
                }
                break;
            case 'category':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/product/category.php';
                        break;
                }
                break;
            case 'blog':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/product/blog.php';
                        break;
                }
                break;
            case 'search':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/product/search-result.php';
                        break;
                }
                break;
            case 'contact':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/product/contact.php';
                        break;
                }
                break;
            case 'about':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/product/about.php';
                        break;
                }
                break;
            case 'post':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/post/write_post.php';
                        break;
                }
                break;
            case 'auth':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/incudes/header.php';
                        break;
                }
                break;
            case 'google':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/login/google.php';
                        break;
                }
                break;
        }
    }
    include './blogy-1.0.0/incudes/footer.php';
    ob_end_flush();
    ?>
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</body>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/tiny-slider.js"></script>
<script src="/js/flatpickr.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/glightbox.min.js"></script>
<script src="/js/navbar.js"></script>
<script src="/js/counter.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/active.js"></script>
<script src="/js/form.js"></script>
<script src="/js/down-menu.js"></script>

</html>