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
                            <li class="header__navigation-item"><a class="header__navigation-link" href="./admin.php">Trở Lại</a></li>
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
                        <nav class="category">
                            <h3 class="category__title"> <i class="category__title-icon fa-solid fa-list"></i> Chức Năng</h3>
                            <ul class="category__list">
                                <li class="category__item category__item-active">
                                    <a href="#" class="category__item-link">Thêm Bánh Theo Loại</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-10">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-add-product__container">
                            <table class="value__table">
                                <tr>
                                    <th class="value__table-heading">Nhập Tên Bánh</th>
                                    <td class="value__table-data"><input type="text" name="b_name" id="" class="value__table-input"></td>
                                </tr>

                                <tr>
                                    <th class="value__table-heading">Chọn Loại Bánh</th>
                                    <td class="value__table-data">
                                        <select name="type-name" id="type-name" class="value__table-select">
                                            <option value="" selected disabled>Chọn Loại Bánh</option>
                                            <?php
                                            // Truy vấn cơ sở dữ liệu để lấy danh sách các loại bánh
                                            $query = "SELECT * FROM breadtype";
                                            $result = mysqli_query($conn, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $typeID = $row['type_id'];
                                                    $typeName = $row['type_name'];
                                                    echo "<option value='$typeID'>$typeName</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="value__table-heading">Nhập Giá Bánh</th>
                                    <td class="value__table-data"><input type="text" name="b_price" id="" class="value__table-input"></td>
                                </tr>

                                <tr>
                                    <th class="value__table-heading">Nhập Số Lượng</th>
                                    <td class="value__table-data"><input type="number" name="b_amount" id="" class="value__table-input"></td>
                                </tr>

                                <tr>
                                    <th class="value__table-heading">Nhập Hình Ảnh Cho Bánh</th>
                                    <td class="value__table-data"><input type="text" name="b_url" id="" class="value__table-input"></td>
                                </tr>
                            </table>
                            <button type="submit" class="submit-btn">Xác Nhận</button>
                        </form>
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
    $addBread = 'p_add_bread';
    // Lấy dữ liệu từ người dùng
    // Quy định người dùng nhập vào là chuỗi và không có KTĐB
    $br_name = $conn->real_escape_string($_POST['b_name']);
    // Kiểm tra xem dữ liệu đã tồn tại trong cơ sở dữ liệu hay không
    $nameCheck = $conn->prepare("SELECT * FROM bread WHERE bread_name = ?");
    $nameCheck->bind_param("s", $br_name);
    $nameCheck->execute();
    $result = $nameCheck->get_result();

    // Nếu có ít nhất một dòng trả về, tức là dữ liệu đã tồn tại
    if ($result && $result->num_rows > 0) {
        echo "<script> alert('BÁNH NÀY ĐÃ TỒN TẠI!!!') </script>";
    } else {
        $typeID = $conn->real_escape_string($_POST['type-name']);
        // Quy định kiểu dữ liệu của người dùng là số nguyên
        $b_price = intval($_POST['b_price']);
        $b_amount = intval($_POST['b_amount']);
        $URL = $conn->real_escape_string($_POST['b_url']);

        // Gọi thủ tục
        $sql_query = $conn->prepare("CALL $addBread(?, ?, ?, ?, ?)");
        $sql_query->bind_param("ssiis", $br_name, $typeID, $b_price, $b_amount, $URL);
        // dùng bind_param () để ráng giá trị tham số vào câu lệnh 
        $sql_query->execute();
        echo "<script> alert('NHẬP THÀNH CÔNG!!!') </script>";
        $sql_query->close();
    }
}
?>