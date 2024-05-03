<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
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
                        <a class="header__logo-link" href="./index.php"><img class="header__logo-img" src="./assets/image/Bread_logo2.png" alt="store_logo"></a>
                    </div>


                    <div class="header__navigation">
                        <ul class="header__navigation-list">
                            <li class="header__navigation-item"><a class="header__navigation-link js-base" href="">TRANG CHỦ</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./introduction.php">GIỚI THIỆU</a></li>
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./contact.php">LIÊN HỆ</a></li>
                        </ul>
                    </div>


                    <div class="header__utility">
                        <div class="header__utility-connect">
                            <ul class="header__utility-list">
                                <li class="header__utility-item"><a class="header__utility-link" href="./register.php">ĐĂNG KÝ</a> | <a class="header__utility-link" href="./logIn.php">ĐĂNG NHẬP</a></li>
                            </ul>

                            <div class="header__utility-userIf mr-50" style="display: none;">
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
                        <div class="header__utility-search-icon header__utility-search-icon--disable"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <div class="header__utility-cart"><a class="cart-link" href="./cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
                    </div>

                </div>
            </div>
        </div>


        <div class="container">
            <div class="container__box">
                <div class="container__contact">
                    <h2 class="container__contact-title">ĐỊA CHỈ:</h2>
                    <p class="container__contact-content">103A Hẻm 51, Huỳnh Cương, Phường An Cư, Quận Ninh Kiều, TP. Cần Thơ</p>

                    <h2 class="container__contact-title">EMAIL:</h2>
                    <p class="container__contact-content"><a href="https://mail.google.com" class="container__contact-content-link">info@BreadCanTho.com</a></p>
                </div>

                <div class="container__contact">
                    <h2 class="container__contact-title">SỐ ĐIỆN THOẠI:</h2>
                    <p class="container__contact-content">028 353 58888 (08h00 - 17h00);</p>
                    <p class="container__contact-content">028 353 58936 (07h00 - 22h00)</p>

                    <h2 class="container__contact-title">THEO DÕI CHÚNG TÔI:</h2>
                    <div class="container__contact-icon"><a href="https://www.facebook.com/" class="container__contact-link"><i class="fa-brands fa-facebook"></a></i></div>
                    <div class="container__contact-icon"><a href="https://twitter.com/" class="container__contact-link"><i class="fa-brands fa-twitter"></i></a></div>
                    <div class="container__contact-icon"><a href="https://www.youtube.com/" class="container__contact-link"><i class="fa-brands fa-youtube"></i></a></div>
                    <div class="container__contact-icon"><a href="https://www.instagram.com/" class="container__contact-link"><i class="fa-brands fa-instagram"></a></i></div>

                </div>
            </div>

            <div class="container__map">
                <p class="container__map-iframe"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1389.0152699253324!2d105.76667512934374!3d10.039251079684982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0899f2593a4f1%3A0x426c18e484c3bdef!2sN%C3%82U%20Coffee%20%26%20Tea!5e0!3m2!1sen!2s!4v1712748012828!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
            </div>
        </div>

        <div class="footer"></div>
    </div>
</body>

</html>

<script>
    var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
    const userIF = document.querySelector('.header__utility-userIf');
    const userList = document.querySelector('.header__utility-list');
    const userAb = document.querySelector('.header__utility-user-ability');
    const baseLink = document.querySelector('.js-base');
    const cartLink = document.querySelector('.cart-link');
    const logoLink = document.querySelector('.header__logo-link');

    if (username !== '') {
        // Hiển thị username
        userIF.style.display = "flex";
        userList.style.display = "none";
        document.querySelector(".header__utility-uname").textContent = username;
        console.log("Đăng nhập thành công");
        baseLink.href = "./homepage.php";
        cartLink.href = "./cart/cart.php";
        logoLink.href = "./homepage.php";
    } else {
        if (userAb) {
            userAb.style.display = "none";
        }
        if (baseLink) {
            baseLink.href = "./index.php";
            cartLink.href = "#";
            document.querySelector('.header__utility-cart').classList.add('header__utility-cart--disabled');
            logoLink = "./index.php"
        }
    }
</script>