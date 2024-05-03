<?php
session_start();
include '../config/db_connection.php';

if (isset($_SESSION['username'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $invIDs = explode(',', $_POST['invIDs']);
        foreach ($invIDs as $invID) {
            // Update status of each order to 'đã thanh toán'
            $sql_update = "UPDATE invoice SET status = 'đã thanh toán' WHERE invoice_ID = $invID";
            $updated = mysqli_query($conn, $sql_update);
            if (!$updated) {
                // Handle error if update fails
                echo "Error updating status for order with ID: $invID";
                exit();
            }
        }
        // Redirect back to cart page after successful payment
        echo "<script>
            alert('Bạn đã thanh toán thành công');
            window.location.href = 'cart.php';
        </script>";
    }
}
