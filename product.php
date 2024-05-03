<?php

include './config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['breadname'])) {
    $searchName = $_POST['breadname'];
    $query = "SELECT * FROM bread
    WHERE bread.bread_name LIKE '%$searchName%'";
} else {
    if (isset($_GET['category'])) {
        // Lấy giá trị của tham số danh mục từ URL
        $category = $_GET['category'];
        switch ($category) {
            case 'Buns':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'BN'";
                break;
            case 'Cakes':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'CK'";
                break;
            case 'Cookies':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'CKE'";
                break;
            case 'CakeSlices':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'CS'";
                break;
            case 'DryCakes':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'DK'";
                break;
            case 'Pudding':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'PUD'";
                break;
            case 'Sandwiches':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'SW'";
                break;
            case 'Toasts':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id  WHERE breadtype.type_id = 'TT'";
                break;

            case 'all':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id";
                break;

            case 'small_to_large':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id ORDER BY bread.bread_price ASC";
                break;

            case 'large_to_small':
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id ORDER BY bread.bread_price DESC";
                break;

            default:
                $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id";
                break;
        }
    } else {
        $query = "SELECT * FROM bread JOIN breadtype ON bread.type_id = breadtype.type_id";
    }
}
$product = mysqli_query($conn, $query);

if (mysqli_num_rows($product) > 0) {
    while ($row = mysqli_fetch_assoc($product)) {
        $br_ID = $row['bread_id'];
        $img = $row['bread_url'];
        $breadname = $row['bread_name'];
        $price = $row['bread_price'];
        $formattedPrice = number_format($price, 0, ',', '.');
        $amount = $row['bread_amount'];

        echo '
        <div class="grid__column-2 ">
            <div class="home__product-item">
                <div class="home__product-item-img" style="background-image: url(' . $img . ');"></div>
                <h4 class="home__product-item-name">' . $breadname . '</h4>
                <div class="home__product-item-price">' . $formattedPrice . 'đ</div>
                <form action="./cart/addToCart.php" method="post">
                        <input type="hidden" name="br_amount" value="1">
                        <input type="hidden" name="brID" value="' . $br_ID . '">
                        <button type = "submit" class="btn home__product-item-addToCartBtn">
                            <i class="fa-solid fa-cart-shopping home__product-item-icon"></i> Thêm giỏ hàng
                        </button>
                </form>
            </div>
        </div>
        ';
    }
}
