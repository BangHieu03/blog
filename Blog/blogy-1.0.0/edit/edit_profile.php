<section class="el-container">
    <?php
    include './blogy-1.0.0/includes/aside_edit.php';
    ?>
    <main class="el-main viblo-main default_cursor_cs">
        <div class="dashboard-page default_cursor_cs">
            <div class="container default_cursor_cs">
                <div class="row py-4 default_cursor_cs">
                    <div class="col-12 default_cursor_cs">
                        <div class="d-flex justify-content-center default_cursor_cs">
                            <div>

                                <!-- Button trigger modal -->
                                <div class="btn-change-avatar btn-change-avatar--trigger-hover " data-toggle="modal" data-target="#exampleModal">
                                    <img src="/images/<?php echo $_SESSION['user_info']['avatar']; ?>?t=<?php echo time(); ?>" alt="Avatar" style="border-radius: 50%; width: 220px; height: 220px">
                                </div>
                                <div id="updateSuccess" style="display: none; position: fixed; top: 70px; left: 50%; transform: translateX(-50%); width: 100%; z-index: 9999;">
                                    <div style="margin: 0 auto; max-width: 960px; padding: 20px;">
                                        <div style="background-color: #4CAF50; color: white; padding: 15px; transition: transform 1s, opacity 1s;">
                                            Cập nhật thành công!
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                        </div>
                        <div class="text-center mt-4 default_cursor_cs">
                            <h1 class="greeting-title default_cursor_cs">
                                Chào mừng, <?php echo $_SESSION['user_info']['name_real']; ?>
                            </h1>
                            <p class="greeting-sub-title default_cursor_cs">
                                Quản lý thông tin cá nhân của bạn và bảo mật với Poly Accounts
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row py-4 default_cursor_cs">
                    <div class="mb-2 col-sm-6 col-md-4"><a href="./index.php?pages=information&action=home" class="menu-item">
                            <div class="el-card card-item text-center is-hover-shadow"><!---->
                                <div class="el-card__body "><img src="/images/man.4e868c8.svg" alt="homePage.myProfile" class="image" style="height: 80px">
                                    <h2 class="card-title mt-4">
                                        <a href="./index.php?pages=information&action=home">Thông tin của tôi</a>
                                    </h2>
                                </div>
                            </div>
                        </a></div>
                    <div class="mb-2 col-sm-6 col-md-4 default_cursor_cs"><a href="./index.php?pages=security&action=home" class="menu-item">
                            <div class="el-card card-item text-center is-hover-shadow "><!---->
                                <div class="el-card__body "><img src="/images/password.cfa021e.svg" alt="homePage.passWord" class="image" style="height: 80px">
                                    <h2 class="card-title mt-4 ">
                                        Mật khẩu
                                    </h2>
                                </div>
                            </div>
                        </a></div>
                    <div class="mb-2 col-sm-6 col-md-4 default_cursor_cs"><a href="./index.php?pages=security&action=linked" class="menu-item">
                            <div class="el-card card-item text-center is-hover-shadow "><!---->
                                <div class="el-card__body "><img src="/images/social-network.0bd6844.svg" alt="homePage.connectedAccounts" class="image" style="height: 80px">
                                    <h2 class="card-title mt-4 ">
                                        Tài khoản được liên kết
                                    </h2>
                                </div>
                            </div>
                        </a></div>
                </div>
            </div>
        </div>
    </main>
</section>