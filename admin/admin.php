<?php
session_start();


if (!isset($_SESSION['username'])) {
    // Chuyển hướng người dùng đến trang đăng nhập
    echo '
    <script>
        alert("Bạn Phải Đăng Nhập Trước");
        window.location.href = "../logIn.php";
    </script>
    ';
    exit(); // Dừng kịch bản hiện tại

} else if ($_SESSION['username'] !== 'admin') {
    echo '
        <script>
            alert("Bạn Phải Dùng Quyền Admin Để Truy Cập");
            window.location.href = "../homepage.php";
        </script>';
    exit(); // Dừng kịch bản hiện tại
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.5.2-web/css/all.min.css">
</head>

<body>
    <div class="main">
        <div class="header">
            <div class="grid">
                <div class="headerbar">
                    <div class="header__logo" style="cursor: default; pointer-events: none;">
                        <a class="header__logo-link" href="#"><img class="header__logo-img" src="../assets/image/Bread_logo2.png" alt="store_logo"></a>
                    </div>


                    <div class="header__navigation">
                        <ul class="header__navigation-list">
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./viewProduct.php">Xem Sản Phẩm</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./addProduct.php">Thêm Sản Phẩm</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./updProduct.php">Cập Nhật Sản Phẩm</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./delProduct.php">Xoá Sản Phẩm</a></li>
                        </ul>
                    </div>


                    <div class="header__utility">
                        <div class="header__utility-connect">
                            <div class="header__utility-userIf">
                                <img src="../assets/image/2304226.png" alt="" class="header__utility-img">
                                <h4 class="header__utility-uname">
                                </h4>
                            </div>

                            <div class="header__utility-user-ability">
                                <div class="user__ability-list">
                                    <li class="user__ability-item">
                                        <a href="../config/logout.php" class="user__ability-link">Đăng Xuất</a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="index__container">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2">

                    </div>

                    <div class="grid__column-10">

                    </div>
                </div>
            </div>
        </div>

        <div class="footer"></div>
    </div>
</body>

<script>
    var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
    if (username !== '') {
        // Hiển thị username
        document.querySelector(".header__utility-uname").textContent = username;
        console.log("Đăng nhập thành công");
    }
</script>

</html>