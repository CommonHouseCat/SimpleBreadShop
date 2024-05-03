<?php
session_start();
include '../config/db_connection.php';

if (!isset($_SESSION['username'])) {
    // Chuyển hướng người dùng đến trang đăng nhập
    header("Location: login.php");
    exit(); // Dừng kịch bản hiện tại
    if ($_SESSION['username'] != 'admin') {
        header("Location: homepage.php");
        exit(); // Dừng kịch bản hiện tại
    }
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
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./admin.php">Trờ Lại</a></li>
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
                        <nav class="category">
                            <h3 class="category__title"> <i class="category__title-icon fa-solid fa-list"></i> Chức Năng</h3>
                            <ul class="category__list">
                                <li class="category__item category__item-active">
                                    <a href="#" class="category__item-link">Xoá Sản Phẩm</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-10">
                        <table class="breadTable">
                            <tr>
                                <th class="bread-type">Loại Bánh</th>
                                <th class="bread-name">Tên Bánh</th>
                                <th class="bread-price">Đơn Giá</th>
                                <th class="bread-amount">Số Lượng</th>
                                <th class="bread-del">Xoá Bánh</th>

                            </tr>

                            <?php
                            $sql_query = "SELECT breadtype.type_name, bread.bread_id, bread.bread_name, bread.bread_price, bread.bread_amount 
                                            FROM bread 
                                            JOIN breadtype ON bread.type_id = breadtype.type_id";
                            $result = mysqli_query($conn, $sql_query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                // Duyệt qua các dòng kết quả và hiển thị
                                while ($row = $result->fetch_assoc()) {
                                    $bID = $row['bread_id'];
                                    $bTName = $row['type_name'];
                                    $bName = $row['bread_name'];
                                    $bPrice = $row['bread_price'];
                                    $bAmount = $row['bread_amount'];
                                    $formattedPrice = number_format($bPrice, 0, ',', '.');

                                    echo '
                                                <tr>
                                                    <td class="bread-type">' . $bTName . '</td>
                                                    <td class="bread-name">' . $bName . '</td>
                                                    <td class="bread-price">' . $formattedPrice . '</td>
                                                    <td class="bread-amount">' . $bAmount . '</td>
                                                    <td  class="bread-del">
                                                    <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                                                        <input type="hidden" name="bID" value="' . $bID . '">
                                                        <button type="submit" class="btn-del">Xoá <i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                ';
                                }
                            }


                            ?>
                        </table>
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bID'])) {
        $bID = $_POST['bID'];

        $sql_query = "DELETE FROM bread WHERE bread_id = $bID";
        $result = mysqli_query($conn, $sql_query);

        if ($result) {
            echo "
            <script>
                window.location.href = 'delProduct.php'
                alert ('Đã Xoá Sản Phẩm Thành Công');
            </script>     
            ";
        }
    }
}
?>