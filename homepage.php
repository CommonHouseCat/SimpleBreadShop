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
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.5.2-web/css/all.min.css">
</head>

<body>
    <div class="main">
        <div class="header">
            <div class="grid">
                <div class="headerbar">
                    <div class="header__logo">
                        <a class="header__logo-link" href="./homepage.php"><img class="header__logo-img" src="./assets/image/Bread_logo2.png" alt="store_logo"></a>
                    </div>


                    <div class="header__navigation">
                        <ul class="header__navigation-list">
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./homepage.php">TRANG CHỦ</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./introduction.php">GIỚI THIỆU</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./contact.php">LIÊN HỆ</a></li>
                        </ul>
                    </div>


                    <div class="header__utility">
                        <div class="header__utility-connect mr-50">
                            <div class="header__utility-userIf">
                                <img src="./assets/image/images.png" alt="" class="header__utility-img">
                                <h4 class="header__utility-uname">
                                </h4>
                            </div>

                            <div class="header__utility-user-ability">
                                <div class="user__ability-list">
                                    <li class="user__ability-item">
                                        <a href="./personal/personalPage.php" class="user__ability-link">Hồ Sơ Của Tôi</a>
                                    </li>
                                    <li class="user__ability-item">
                                        <a href="./cart/cart.php" class="user__ability-link">Đơn Mua</a>
                                    </li>
                                    <li class="user__ability-item">
                                        <a href="./config/logout.php" class="user__ability-link">Đăng Xuất</a>
                                    </li>
                                </div>
                            </div>
                        </div>

                        <div class="header__utiliti-search">
                            <div class="header__utility-search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
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
                        <div class="header__utility-cart"><a href="./cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="index__container">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__title"> <i class="category__title-icon fa-solid fa-list"></i> Danh Mục</h3>
                            <ul class="category__list">
                                <!-- category__item-active -->
                                <li class="category__item">
                                    <a href="homepage.php?category=all" class="category__item-link">Tất Cả</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=Buns" class="category__item-link">Buns</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=Toasts" class="category__item-link">Toasts</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=Sandwiches" class="category__item-link">Sandwiches</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=Cakes" class="category__item-link">Cakes</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=CakeSlices" class="category__item-link">Cake Slices</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=DryCakes" class="category__item-link">Dry Cakes</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=Pudding" class="category__item-link">Pudding</a>
                                </li>
                                <li class="category__item">
                                    <a href="homepage.php?category=Cookies" class="category__item-link">Cookies</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-10">
                        <div class="home__filter">
                            <span class="home__filter-label">Sắp xếp theo</span>
                            <!-- <button class="btn home__filter-btn btn__primary">Mới Nhất</button>
                            <button class="btn home__filter-btn">Cũ Nhất</button>
                            <button class="btn home__filter-btn">Bán Chạy Nhất</button> -->
                            <div class="select__input">
                                <span class="select__input-label">Giá</span>
                                <i class="select__input-icon fas fa-angle-down"></i>
                                <!-- Dropdown options -->
                                <ul class="select__input-list">
                                    <li class="select__input-item">
                                        <a href="homepage.php?category=small_to_large" class="select__input-link">Giá: Thấp đến Cao</a>
                                    </li>
                                    <li class="select__input-item">
                                        <a href="homepage.php?category=large_to_small" class="select__input-link">Giá: Cao đến Thấp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="home__product">
                            <div class="grid__row product__row">
                                <?php include './product.php'; ?>
                            </div>

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

    const search = document.querySelector('.header__search');
    document.querySelector('.header__utility-search-icon').addEventListener('click', function() {
        search.style.display = 'block';
    });

    const index = document.querySelector('.index__container');
    index.addEventListener('click', function() {
        search.style.display = 'none';
    });
</script>

<script src="./search.js"></script>

</html>