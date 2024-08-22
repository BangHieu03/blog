<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav shadow ">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="./index.php?pages=index&action=home" class="logo m-0 float-start">PolyBlog<span class="text-primary">.</span></a>
                    </div>
                    <div class="col-4 text-center">
                        <form action="#" class="search-form d-inline-block d-lg-none mr-1">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="active"><a href="./index.php?pages=index&action=home">Trang chủ</a></li>
                            <li><a href="./index.php?pages=blog&action=home">Bài viết</a></li>
                            <li><a href="./index.php?pages=search&action=home">Hỏi đáp</a></li>
                            <li><a href="./index.php?pages=contact&action=home">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-2 text-end m-3">
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <form action="#" class="search-form d-none d-lg-inline-block">
                            <input type="text" class="form-control" placeholder="Tìm Kiếm...">
                            <span class="bi-search"></span>
                        </form>
                    </div>
                    <div class=" col-3 text-start d-flex justify-content-evenly site-menu">
                        <div><i class="fas fa-bell" style="color: #757575;"></i></div>
                        <div><a href="./index.php?pages=post&action=home"><i class="fas fa-pen" style="color: #757575;"></a></i></div>
                        <div class="dropdown">
                            <?php if (isset($_SESSION['user_info'])) : ?>
                                <img src="/images/<?php echo $_SESSION['user_info']['avatar']; ?>?t=<?php echo time(); ?>" alt="Avatar" style="border-radius: 50%; width: 30px; height: 30px" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <div class="d-flex align-items-center m-lg-2">
                                        <div class="user-menu__top d-flex justify-content-between">
                                            <img src="/images/<?php echo $_SESSION['user_info']['avatar']; ?>?t=<?php echo time(); ?>" alt="Avatar" style="border-radius: 50%; width: 60px; height: 60px">
                                            <div class="ml-3">
                                                <?php if (isset($_SESSION['user_info']) && is_array($_SESSION['user_info'])) : ?>
                                                    <div class="dropdown-item">@<?php echo $_SESSION['user_info']['name_real']; ?></div>
                                                <?php endif; ?>
                                                <a class="dropdown-item" href="./index.php?pages=edit_profile&action=home">Sửa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./index.php?pages=page_person&action=home">Trang cá nhân</a>
                                    <?php if (isset($_SESSION['user_info']) && is_array($_SESSION['user_info']) && $_SESSION['user_info']['role'] == 2) : ?>
                                        <a class="dropdown-item" href="./admin/index.php?act=layout&action=home">Quản trị</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="#">Quản lý nội dung</a>
                                    <a class="dropdown-item" href="#">Lịch sử hoạt động</a>
                                    <hr>
                                    <a class="dropdown-item" href="./index.php?pages=logout&action=home">Đăng xuất</a>
                                </div>
                                <?php if (isset($_SESSION['user_info']) && is_array($_SESSION['user_info'])) : ?>
                                    <span class="text-light"><?php echo $_SESSION['user_info']['name']; ?></span>
                                <?php endif; ?>
                            <?php elseif (isset($_SESSION['google_user_info'])) : ?>
                                <img src="<?php echo $_SESSION['google_user_info']['picture']; ?>" alt="Avatar" style="border-radius: 50%; width: 30px; height: 30px" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <div class="d-flex align-items-center m-lg-2">
                                        <div class="user-menu__top d-flex justify-content-between">
                                            <img src="<?php echo $_SESSION['google_user_info']['picture']; ?>" alt="Avatar" style="border-radius: 50%; width: 60px; height: 60px">
                                            <div class="ml-3">
                                                <div class="dropdown-item">@<?php echo $_SESSION['google_user_info']['name']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./index.php?pages=page_person&action=home">Trang cá nhân</a>
                                    <hr>
                                    <a class="dropdown-item" href="./index.php?pages=logout&action=home">Đăng xuất</a>
                                </div>
                                <span class="text-light"><?php echo $_SESSION['google_user_info']['name']; ?></span>
                            <?php else : ?>
                                <a href="./index.php?pages=login&action=home" style="color:white">Đăng nhập</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>