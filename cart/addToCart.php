<?php
session_start();
include "../config/db_connection.php";


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['brID']) && isset($_POST['br_amount'])) {
            $breadID = intval($_POST['brID']);
            $brQuantity = intval($_POST['br_amount']);

            $add_to_cart = 'p_add_to_cart';
            $sql_query = $conn->prepare("CALL $add_to_cart(?, ?, ?)");
            $sql_query->bind_param("sii", $username, $breadID, $brQuantity);
            $result = $sql_query->execute();

            if ($result) {
                echo "<script> 
                        window.location.href = '../homepage.php';
                        alert('NHẬP THÀNH CÔNG!!!');
                    </script>";
                exit();
            } else {
                echo 'alert ("Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.");';
            }
        }
    }
} else {
    echo '
    <script>
        alert("Bạn Phải Đăng Nhập Trước");
        window.location.href = "../logIn.php";
    </script>
    ';
}
