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
    <link rel="stylesheet" href="../assets/css/cart.css">
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
                                        <a href="../personal/personalPage.php" class="user__ability-link">Hồ Sơ Của Tôi</a>
                                    </li>
                                    <li class="user__ability-item">
                                        <a href="#" class="user__ability-link">Đơn Mua</a>
                                    </li>
                                    <li class="user__ability-item">
                                        <a href="../config/logout.php" class="user__ability-link">Đăng Xuất</a>
                                    </li>
                                </div>
                            </div>
                        </div>

                        <div class="header__utiliti-search">
                            <div class="header__utility-search-icon header__utility-search-icon--disable"><i class="fa-solid fa-magnifying-glass"></i></div>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="search__form-container">
                                <div class="header__search">
                                    <div class="header__search-input-wrap">
                                        <input type="text" name="breadname" id="header__search-input" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm" onkeyup="bread_search(); showResultSearch();">

                                        <!-- history search -->
                                        <div class="header__search-result">
                                            <h3 class="header__search-result-heading">Kết quả tìm kiếm</h3>
                                            <ul class="header__search-result-list" id="header__search-list">
                                                <!-- <li class="header__search-result-item">
                                                    <a href="www.facebook.com">Sách giáo khoa</a>
                                                </li> -->

                                            </ul>
                                        </div>
                                    </div>
                                    <button class="header__search-btn" type="submit">
                                        <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>

                        </div>
                        <div class="header__utility-cart header__utility-cart--disabled"><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="index__container">
            <div class="grid">
                <div class="grid__row cart__container">
                    <div class="cart__container-header">
                        <i class="cart__container-icon fa-solid fa-bag-shopping"></i>
                        <h1 class="cart__container-heading">Giỏ Hàng Của Bạn</h1>
                    </div>

                    <div class="cart__container-products">
                        <table>
                            <tr>
                                <th class="product-num">STT</th>
                                <th class="product-name">Tên Sản Phẩm</th>
                                <th class="product-img">Ảnh Sản Phẩm</th>
                                <th class="product-price">Đơn Giá</th>
                                <th class="product-quantity">Số Lượng</th>
                                <th class="product-total">Thành Tiền</th>
                                <th class="product-del">Xoá</th>
                            </tr>

                            <?php include "./viewCart.php"; ?>
                        </table>
                    </div>
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