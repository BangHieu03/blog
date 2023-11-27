<style>
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        background-color: white;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="form-container">
                <div class="col-md-12">
                    <h1 class="text-center">Quên mật khẩu</h1>
                    <form action="#" method="post">
                        <div class="form-group">
                            <?php
                            if (isset($_POST['submit'])) {
                                if (isset($_POST['email']) && $_POST['email'] != '') {
                                    $email = $_POST['email'];
                                    $user = new User();
                                    $result = $user->getUserByEmail($email);
                                    if ($result) {
                                        $token = $user->createPasswordReset($email);
                                        $mail = new Mailer();
                                        $title = "Quên mật khẩu";
                                        $url = "http://duan1/index.php?pages=login&action=reset&token=$token";
                                        $content = "
                                        <html>
                                        <head>
                                        <style>
                                        body {font-family: Arial, sans-serif;}
                                        .container {background-color: #f8f9fa; padding: 20px; margin: 0 auto; width: 80%;}
                                        .header {background-color: lightblue; color: white; padding: 10px; text-align: center;}
                                        .content {margin-top: 20px;}
                                        .button {background-color: lightblue; color: white; padding: 10px 20px; text-decoration: none; display: inline-block; border-radius: 5px;}
                                        </style>
                                        </head>
                                        <body>
                                        <div class='container'>
                                            <div class='header'>
                                                <h2>Đặt lại mật khẩu</h2>
                                            </div>
                                            <div class='content'>
                                                <p>Xin chào,</p>
                                                <p>Chúng tôi từ PolyBlog đã nhận được yêu cầu đặt lại mật khẩu của bạn. Nhấp vào nút bên dưới để tiếp tục:</p>
                                                <a href='$url' class='button'>Đặt lại mật khẩu</a>
                                                <p>Nếu bạn không yêu cầu đặt lại mật khẩu, hãy bỏ qua email này.</p>
                                            </div>
                                        </div>
                                        </body>
                                        </html>";
                                        $mail->sendMail($title, $content, $email);
                                        echo "<div id='alert' class='alert alert-success alert-dismissible fade show' role='alert' style='display: none;'>
                                        <strong>Thành công!</strong> Đã gửi email đặt lại mật khẩu.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    } else {
                                        echo "<h4 style='color:red;'> Email không tồn tại </h4> <br>";
                                    }
                                } else {
                                    echo "<h4 style='color:red;'> Không được để trống email </h4> <br>";
                                }
                            }
                            ?>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
                            <span style="color: red;"><?php if (isset($error['email'])) echo $error['email'] ?></span>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Gửi email của bạn</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>