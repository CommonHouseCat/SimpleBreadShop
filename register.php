<?php
session_start();
include './config/db_connection.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/register.css">
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
                                <li class="header__utility-item"><a class="header__utility-link" href="./logIn.php">ĐĂNG NHẬP</a></li>
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
                    <p class="registerForm__Title">Đăng Ký</p>
                    <input type="text" class="registerForm__input" name="username" placeholder="Tên tài khoản" required>
                    <input type="text" class="registerForm__input" name="phone" placeholder="Số Điện Thoại" pattern="[0-9]{10}" required>
                    <input type="password" class="registerForm__input" id="passwd" name="passwd" placeholder="Mật Khẩu" required>
                    <input type="password" class="registerForm__input" id="confirm_pass" name="confirm_pass" placeholder="Nhập Lại Mật Khẩu" required>
                    <span id="passError" style="color: red; display: none;">Mật khẩu không khớp!</span>
                    <input type="submit" class="registerForm__button" name="" value="Đăng Ký">
                    <p class="registerForm__redirect"> Bạn đã có tài khoản? <a class="registerForm__redirect-link" href="./logIn.php">Đăng Nhập</a></p>
                </form>
            </div>


        </div>

        <div class="footer"></div>
    </div>
</body>


</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    // Sử dụng prepared statement để tránh SQL injection
    $nameCheck = $conn->prepare("SELECT * FROM userinfo WHERE user_name = ?");
    $nameCheck->bind_param("s", $username);
    $nameCheck->execute();
    $checkRe = $nameCheck->get_result();
    if ($checkRe->num_rows > 0) {
        echo "
            <script>
            alert('Tài Khoản Đã Tồn Tại! Vui Lòng Thử Lại!!');
            window.location.href = 'register.php';
            </script>";
    } else {
        $register = 'p_register';

        $username = $conn->real_escape_string($_POST['username']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $userpasswd = $conn->real_escape_string($_POST['passwd']);
        $confirmPass = $conn->real_escape_string($_POST['confirm_pass']);

        if ($userpasswd == $confirmPass) {
            $sql_query = $conn->prepare("CALL $register(?, ?, ?)");
            $sql_query->bind_param("sss", $username, $userpasswd, $phone);
            $sql_query->execute();

            if ($sql_query->affected_rows > 0) {
                echo "
                <script>
                alert('Đăng ký tài khoản thành công!!!');
                window.location.href = 'logIn.php';
                </script>";
                exit();
            } else {
                echo "
                <script>
                alert('Đăng ký tài khoản không thành công!!!');
                window.location.href = 'register.php';
                </script>";
                exit();
            }
        } else {
            echo "
            <script>
            alert('Mật Khẩu Của Bạn Không Đúng!!!');
            window.location.href = 'register.php';
            </script>";
        }
    }
}

?>