<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Chuyển hướng người dùng đến trang đăng nhập
    header("Location: login.php");
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
    <link rel="stylesheet" href="../assets/css/personal.css">
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
                    <div class="header__logo">
                        <a class="header__logo-link" href="../homepage.php"><img class="header__logo-img" src="../assets/image/Bread_logo2.png" alt="store_logo"></a>
                    </div>


                    <div class="header__navigation">
                        <ul class="header__navigation-list">
                            <li class="header__navigation-item"><a class="header__navigation-link" href="../homepage.php">TRANG CHỦ</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="../introduction.php">GIỚI THIỆU</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="../contact.php">LIÊN HỆ</a></li>
                        </ul>
                    </div>


                    <div class="header__utility">
                        <div class="header__utility-connect mr-50">
                            <div class="header__utility-userIf">
                                <img src="../assets/image/images.png" alt="" class="header__utility-img">
                                <h4 class="header__utility-uname">
                                </h4>
                            </div>

                            <div class="header__utility-user-ability">
                                <div class="user__ability-list">
                                    <li class="user__ability-item">
                                        <a href="../cart/cart.php" class="user__ability-link">Đơn Mua</a>
                                    </li>
                                    <li class="user__ability-item">
                                        <a href="../config/logout.php" class="user__ability-link">Đăng Xuất</a>
                                    </li>
                                </div>
                            </div>
                        </div>

                        <div class="header__utility-search-icon header__utility-search-icon--disable"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <div class="header__utility-cart"><a class="cart-link" href="../cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="index__container">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__title"> <i class="category__title-icon fa-solid fa-list"></i> Chức Năng Người Dùng</h3>
                            <ul class="category__list">
                                <li class="category__item">
                                    <a href="#user-info__viewing" class="category__item-link">Hồ Sơ Của Tôi</a>
                                </li>
                                <li class="category__item">
                                    <a href="./afterPayment.php" class="category__item-link">Lịch Sử Mua Hàng</a>
                                </li>

                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-10">
                        <div class="home__product">
                            <div id="user-info__adding">
                                <div class="user-info__header">
                                    <h1 class="user-info__heading">Thêm Thông Tin Hồ Sơ</h1>
                                    <p class="user-info__title">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                                </div>
                                <div class="user-info__form-container">
                                    <form action="./addInfoUser.php" method="post" class="user-info__form">
                                        <table>
                                            <tr>
                                                <td><label for="">Email</label></td>
                                                <td>
                                                    <div class="input__data">
                                                        <input type="email" name="Email" id="" placeholder="example@gmail.com" class="input__data-email">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><label for="">Họ và Tên</label></td>
                                                <td>
                                                    <div class="input__data">
                                                        <input type="text" name="fullname" id="" placeholder="Nhập Họ Tên Của Bạn" class="input__data-fullname">
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><label for="">Địa chỉ</label></td>
                                                <td>
                                                    <div class="input__data">
                                                        <input type="text" name="add" id="" placeholder="Nhập địa chỉ của bạn" class="input__data-address">
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- <tr>
                                                <td><label for="">Số Điện Thoại</label></td>
                                                <td>
                                                    <div class="input__data">
                                                        <input type="tel" name="phone" id="" placeholder="Nhập số điện thoại của bạn" class="input__data-phone">
                                                    </div>
                                                </td>
                                            </tr> -->


                                        </table>
                                        <button type="submit" class="user-add__submit">Xác Nhận</button>
                                    </form>
                                </div>

                                <div id="user-info__viewing">
                                    <div class="user-info__header">
                                        <h1 class="user-info__heading">Xem Thông tin Hồ Sơ</h1>
                                        <p class="user-info__title">Những thông tin chi tiết về hồ sơ của bạn</p>
                                    </div>
                                    <?php
                                    include './viewUserIF.php';
                                    ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
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