<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./clients/assets/css/loginclient.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Welcome!</title>
</head>

<body>

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Form đăng nhập -->
                <form action="?act=login" method="POST" class="sign-in-form">
                    <?php
                    // session_start();

                    // Hiển thị thông báo lỗi nếu có
                    if (isset($_SESSION['error'])) {
                        echo "<p style='color: red; text-align: center;'>" . $_SESSION['error'] . "</p>";
                        unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị
                    }

                    // Hiển thị thông báo thành công nếu có
                    if (isset($_SESSION['success'])) {
                        echo "<p style='color: green; text-align: center;'>" . $_SESSION['success'] . "</p>";
                        unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
                    }
                    ?>
                    <h2 class="title">Đăng Nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <input type="submit" value="Đăng nhập" class="btn solid">
              
                    
                </form>

            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Bạn chưa có tài khoản ?</h3>
                    <p>Vui lòng đăng ký tại đây.</p>
                    <button class="btn transparent" id="sign-up-btn">
                        <a href="<?= '?act=register' ?>">Đăng ký</a>
                    </button>
                </div>
            </div>
          
        </div>
    </div>
    
</body>

</html>