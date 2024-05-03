<?php
include "../config/db_connection.php";
session_start();

if (isset($_SESSION['username'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $invID = intval($_POST['invId']);


        $delCart = 'p_del_cart';
        $sql_query = $conn->prepare("CALL $delCart(?)");
        $sql_query->bind_param("i", $invID);
        $result = $sql_query->execute();

        if ($result) {
            echo "
            <script>
                window.location.href = 'cart.php'
                alert ('Đã Xoá Sản Phẩm Khỏi Đơn Hàng');
            </script>     
            ";
        }
    }
}
