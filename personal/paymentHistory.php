<?php
include "../config/db_connection.php";

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];

    // First query to get cart contents
    $sql_query = "SELECT * from invoice i
    join invoicedetail id on i.invoice_ID = id.invoice_ID
    join bread b on id.bread_id = b.bread_id
    join userinfo u ON i.user_ID = u.user_ID
    WHERE u.user_name = '$uname'";

    // Second query to get total cost
    $resultCart = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($resultCart) > 0) {
        $num = 1;
        while ($row = mysqli_fetch_assoc($resultCart)) {
            $invID = $row['invoice_ID'];
            $bname = $row['bread_name'];
            $img = $row['bread_url'];
            $bprices = $row['bread_price'];
            $amount = $row['quantity'];
            $cost = $row['cost'];
            $status = $row['status'];
            $formatCost = number_format($cost, 0, ',', '.');
            $formatprice = number_format($bprices, 0, ',', '.');

            if ($status === 'đã thanh toán') {
                echo '
                <tr>
                <td class="product-num">' . $num . '</td>
                <td class="product-name">' . $bname . '</td> 
                <td class="product-img"><img src="' . $img . '" alt=""></td> 
                <td class="product-price">' . $formatprice . '</td>
                <td class="product-quantity">' . $amount . '</td>
                <td class="product-total">' . $formatCost . '</td>
                <td class="product-del">' . $status . '</td>
                </tr>';
                $num++;
            }
        }
    }
}
