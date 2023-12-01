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
    <link rel="stylesheet" href="/css/flatpickr.min.css">
    <link rel="stylesheet" href="/css/down-menu.css">
    <link rel="stylesheet" href="/css/aside.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/validate.css">
    <link rel="stylesheet" href="/css/faceboo.css">
    <link rel="stylesheet" href="/css/page_person.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


    <title>PolyBlog &mdash; Kết nối mọi người</title>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    ob_start();
    include './blogy-1.0.0/pdo/pdo.php';
    include './admin/users/user.php';
    include './blogy-1.0.0/includes/header.php';
    include './PHPMailer-master/index.php';
    require_once './vendor/composer/autoload_real.php';

    $mail = new Mailer();



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
                        include './blogy-1.0.0/auth/dangnhap.php';
                        break;
                    case 'fogot';
                        include './blogy-1.0.0/auth/fogot.php';
                        break;
                    case 'reset';
                        include './blogy-1.0.0/auth/reset_code.php.';
                        break;
                }
                break;
            case 'register':
                switch ($_GET['action']) {
                    case 'home';
                        include './blogy-1.0.0/auth/dangky.php';
                        break;
                    case 'activated_code';
                        include './blogy-1.0.0/auth/kichhoat.php';
                        break;
                }
                break;
            case 'edit_profile':
                switch ($_GET['action']) {
                    case 'home';
                        include './blogy-1.0.0/edit/edit_profile.php';
                        break;
                }
                break;
            case 'page_person':
                switch ($_GET['action']) {
                    case 'home';
                        include './blogy-1.0.0/edit/pages/page_person.php';
                        break;
                    case 'contact';
                        include './blogy-1.0.0/edit/pages/contact.php';
                        break;
                }
                break;
            case 'information':
                switch ($_GET['action']) {
                    case 'home';
                        include './blogy-1.0.0/edit/information/person.php';
                        break;
                    case 'email';
                        include './blogy-1.0.0/edit/information/verify_email.php';
                        break;
                }
                break;
            case 'security':
                switch ($_GET['action']) {
                    case 'home';
                        include './blogy-1.0.0/edit/security/password.php';
                        break;
                    case 'linked';
                        include './blogy-1.0.0/edit/security/linked_account.php';
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
            case 'rules':
                switch ($_GET['action']) {
                    case 'home':
                        include './blogy-1.0.0/rules/dieukhoan.php';
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
                        include './Google_login/index.php';
                        break;
                    case 'login':
                        include './Google_login/login.php';
                        break;
                    case 'logout':
                        include './Google_login/logout.php';
                        break;
                    case 'dashboarh':
                        include './Google_login/dashboarh.php';
                        break;
                }
                break;
            case 'facebook':
                switch ($_GET['action']) {
                    case 'login':
                        include './facebook_login/login.php';
                        break;
                    case 'oauth':
                        include './facebook_login/facebook-oauth.php';
                        break;
                }
                break;
        }
    }
    ob_end_flush();
    include './blogy-1.0.0/includes/footer.php';
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
<script src="/js/ckeditor.js"></script>
<script src="/js/down-menu.js"></script>
<script src="/js/aside.js"></script>
<script src="/js/popover.js"></script>
<script src="/js/rules.js"></script>
<script src="/js/person.js"></script>
<script src="/js/fogot.js"></script>
<script src="/js/facebook.js"></script>
<script src="/js/pages_person.js"></script>


</html>