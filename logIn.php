<?php
session_start();
include './config/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/logIn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CT214H/assets/font/fontawesome-free-6.5.2-web/css/all.min.css">
</head>

<body>
    <div class="main">
        <div class="header">
            <div class="grid">
                <div class="headerbar">
                    <div class="header__logo">
                        <a class="header__logo-link" href="./index.php"><img class="header__logo-img" src="./assets/image/Bread_logo2.png" alt="store_logo"></a>
                    </div>


                    <div class="header__navigation">
                        <ul class="header__navigation-list">
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./index.php">TRANG CHỦ</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./introduction.php">GIỚI THIỆU</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./contact.php">LIÊN HỆ</a></li>
                        </ul>
                    </div>


                    <div class="header__utility">
                        <div class="header__utility-connect">
                            <ul class="header__utility-list">
                                <li class="header__utility-item"><a class="header__utility-link" href="./register.php">ĐĂNG KÝ</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Body -->
        <div class="container">

            <div class="container__registerForm">
                <form class="registerForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <p class="registerForm__Title">Đăng Nhập</p>
                    <input type="text" class="registerForm__input" name="username" placeholder="Tên tài khoản" required>
                    <input type="password" class="registerForm__input" name="passwd" placeholder="Mật Khẩu" required>
                    <input type="submit" class="registerForm__button" name="" value="Đăng Nhập">
                    <p class="registerForm__redirect"> Bạn chưa có tài khoản? <a class="registerForm__redirect-link" href="./register.php">Đăng Ký</a></p>
                </form>
            </div>


        </div>

        <div class="footer"></div>
    </div>
</body>

</html>

<?php
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['passwd'];

    // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
    $sql_query = "SELECT * FROM userInfo WHERE user_name = '$username' AND user_passwd = '$password'";
    $result = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result); // Lấy dữ liệu từ kết quả truy vấn
        $userRole = $row['user_role']; // Lấy vai trò của người dùng

        if ($username == "admin" && $userRole == 1) {
            $_SESSION['username'] = $username;
            echo "<script>
                alert ('Đăng Nhập Thành Công');     
                window.location.href = './admin/admin.php';    
            </script>";
            exit(); // Kết thúc kịch bản để ngăn chặn mã tiếp tục chạy
        } else {
            $_SESSION['username'] = $username;
            echo "<script>
                alert ('Đăng Nhập Thành Công');     
                window.location.href = 'homepage.php';    
            </script>";
            exit(); // Kết thúc kịch bản
        }
    } else {
        echo "<script>
                alert('Invalid username or password.');        
            </script>";
    }
}
?>