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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
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
                                <li class="header__utility-item"><a class="header__utility-link" href="./register.php">ĐĂNG KÝ</a> | <a class="header__utility-link" href="./logIn.php">ĐĂNG NHẬP</a></li>
                            </ul>
                        </div>

                        <div class="header__utility-cart"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <div class="header__utility-search"><i class="fa-solid fa-cart-shopping"></i></div>
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
                                <li class="category__item category__item-active">
                                    <a href="#" class="category__item-link">Buns</a>
                                </li>
                                <li class="category__item">
                                    <a href="#" class="category__item-link">Toasts</a>
                                </li>
                                <li class="category__item">
                                    <a href="#" class="category__item-link">Sandwiches</a>    
                                </li>
                                <li class="category__item">
                                    <a href="#" class="category__item-link">Cakes</a>
                                </li>
                                <li class="category__item">
                                    <a href="#" class="category__item-link">Cake Slices</a>
                                </li>
                                <li class="category__item">
                                    <a href="#" class="category__item-link">Dry Cakes</a>
                                </li>
                                <li class="category__item">
                                    <a href="#" class="category__item-link">Pudding</a>
                                </li>
                                <li class="category__item">
                                    <a href="#" class="category__item-link">Cookies</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    
                    <div class="grid__column-10">
                        <div class="home__filter">
                            <span class="home__filter-label">Sắp xếp theo</span>
                            <button class="btn home__filter-btn btn__primary">Mới Nhất</button>
                            <button class="btn home__filter-btn">Cũ Nhất</button>
                            <button class="btn home__filter-btn">Bán Chạy Nhất</button>
                            <div class="select__input">
                                <span class="select__input-label">Giá</span>
                                <i class="select__input-icon fas fa-angle-down"></i>
                                <!-- Dropdown options -->
                                <ul class="select__input-list">
                                    <li class="select__input-item">
                                        <a href="" class="select__input-link">Giá: Thấp đến Cao</a>                                        
                                    </li>
                                    <li class="select__input-item">                                      
                                        <a href="" class="select__input-link">Giá: Cao đến Thấp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="home__product">
                            <div class="grid__row product__row">
                                <div class="grid__column-2 ">
                                    <div class="home__product-item">
                                        <div class="home__product-item-img" style="background-image: url(./assets/image/BaconCheeseOnion.png);"></div>
                                        <h4 class="home__product-item-name">Bacon Cheese Onion</h4>
                                        <div class="home__product-item-price">32.000đ</div>
                                        <div class="btn home__product-item-addToCartBtn">Thêm vào vỏ hàng</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer"></div>
    </div>
</body>

</html>