<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/introduction.css">
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
                                        <a href="#" class="user__ability-link">Đơn Mua</a>
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
            <div class="introText">
                <p class="container__pageTitle">TIỆM BÁNH MÌ UY TÍN TẠI CẦN THƠ</p>
                <p class="container__subTitle">Về chúng tôi - Về sản phẩm - Về sứ mệnh</p>
            </div>

            <div class="container__separateLine"></div>

            <div class="container__contentBox">
                <div class="container__imageBox">
                    <img src="./assets/image/aboutUs.jpg" alt="A pair of hand kneading bread" class="container__image">
                </div>

                <div class="container__textBox">
                    <h3 class="container__title">Về Chúng Tôi</h3>
                    <p class="container__description">Chào mừng bạn đến với tiệm bánh mì nhỏ tại Cần Thơ! Chúng tôi là một đội ngũ đam mê nấu ăn
                        và yêu thích nghệ thuật làm bánh. Với sứ mệnh mang đến những món bánh tươi ngon và độc đáo cho cộng đồng, chúng tôi luôn đặt sự
                        chăm sóc và sáng tạo lên hàng đầu. Với niềm đam mê và kinh nghiệm trong ngành nghề, tiệm bánh mì của chúng tôi mang đến không chỉ
                        những chiếc bánh tươi ngon mỗi ngày, mà còn là một trải nghiệm ẩm thực đặc biệt.</p> <br>
                    <p class="container__description">Chúng tôi cam kết đảm bảo chất lượng và an toàn thực phẩm, đem đến cho khách hàng sự hài lòng và tin
                        tưởng. Với đội ngũ làm nghề được đào tạo chuyên sâu, chúng tôi luôn luôn nỗ lực để mang đến những sản phẩm tốt nhất cho khách hàng.
                        Vì chúng tôi hiểu rằng, bánh mì không chỉ là một món ăn, mà là một cảm nhận về hương vị và chất lượng.
                    </p>
                </div>
            </div>

            <div class="container__separator"></div>

            <div class="container__contentBox">
                <div class="container__textBox">
                    <h3 class="container__title">Về Sản Phẩm</h3>
                    <p class="container__description">Tại tiệm bánh của chúng tôi, bạn sẽ tìm thấy những chiếc bánh mì và bánh ngọt được làm
                        thủ công, tỉ mỉ từ những nguyên liệu tốt nhất. Chúng tôi cam kết sử dụng các thành phần chất lượng cao và đảm bảo an toàn
                        thực phẩm để mang đến cho bạn những trải nghiệm thưởng thức bánh độc đáo và ngon miệng.</p> <br>
                    <p class="container__description">Chúng tôi tự hào về sự sáng tạo và hiểu biết sâu sắc về khẩu vị người Việt. Mỗi chiếc bánh
                        được chăm chút tỉ mỉ, từng viên một, mang đậm hương vị đặc trưng của miền đất sông nước. Chúng tôi không ngừng nghiên cứu và
                        đổi mới để mang đến những trải nghiệm mới lạ và hấp dẫn cho thực khách.
                    </p>
                </div>
                <div class="container__imageBox">
                    <img src="./assets/image/aboutProduct.jpg" alt="A basket of bread" class="container__image">
                </div>
            </div>

            <div class="container__separator"></div>

            <div class="container__contentBox">
                <div class="container__imageBox">
                    <img src="./assets/image/aboutMission.png" alt="Some abstract image" class="container__image">
                </div>
                <div class="container__textBox">
                    <h3 class="container__title">Về Sứ Mệnh</h3>
                    <p class="container__description">Sứ mệnh của chúng tôi không chỉ đơn thuần là làm bánh mà còn là tạo ra những khoảnh khắc đặc biệt qua từng miếng
                        bánh. Chúng tôi mong muốn góp phần làm cho mỗi buổi sáng và mỗi dịp đặc biệt của bạn trở nên đặc biệt hơn bằng những hương vị tuyệt vời của bánh
                        mì và bánh ngọt từ tiệm của chúng tôi.</p> <br>
                    <p class="container__description">Chúng tôi luôn nỗ lực để đổi mới và mang đến những ý tưởng mới lạ trong nghệ thuật làm bánh. Từ những món bánh
                        truyền thống đến những sáng tạo độc đáo, chúng tôi không ngừng khám phá và tìm kiếm để tạo ra những sản phẩm đáp ứng được sở thích và mong đợi
                        của mọi khách hàng.</p>
                </div>
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