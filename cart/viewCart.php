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
    $sql_query2 = "SELECT userinfo.user_ID, SUM(cost) AS totalCost
    FROM invoicedetail 
    JOIN invoice ON invoice.invoice_ID = invoicedetail.invoice_ID
    JOIN userinfo ON invoice.user_ID = userinfo.user_ID
    WHERE user_name = '$uname' and invoice.status = 'chưa thanh toán'
    GROUP BY userinfo.user_ID";

    $formatTotal = 0;
    $resultCart = mysqli_query($conn, $sql_query);
    $totalResult = mysqli_query($conn, $sql_query2);
    if (mysqli_num_rows($totalResult) > 0) {
        $total = mysqli_fetch_assoc($totalResult);
        $formatTotal = number_format($total['totalCost'], 0, ',', '.');
    }


    $invIDs = [];

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

            if ($status === 'chưa thanh toán') {
                echo '
                <tr>
                <td class="product-num">' . $num . '</td>
                <td class="product-name">' . $bname . '</td> 
                <td class="product-img"><img src="' . $img . '" alt=""></td> 
                <td class="product-price">' . $formatprice . '</td>
                <td class="product-quantity">' . $amount . '</td>
                <td class="product-total">' . $formatCost . '</td>
                <form action="./delCart.php" method="post">
                    <td class="product-del">
                        <input type="hidden" name="invId" value="' . $invID . '">
                        <button type="submit" class = "product-del-button" onclick="return confirmDelete();">
                        Xoá <i class="fa-solid fa-trash product-del-icon"></i>
                        </button>
                    </td>
                </form>
                </tr>';
                $invIDs[] = $invID;
                $num++;
            }
        }
        // Total row
        echo '
        <tr>
            <th class="product-num"></th>
            <th class="product-name">Tổng Tiền</th>
            <th class="product-img"></th>
            <th class="product-price"></th>
            <th class="product-quantity"></th>
            <th class="product-total">' . $formatTotal . '</th>
            <th class="product-del"></th>
        </tr>';

        echo '
                <form action="./paymentCart.php" method="post" class = "form-payment">
                                    <input type="hidden" name="invIDs" value="' . implode(',', $invIDs) . '">
                                    <button type="submit" class="cart__container-payment">Thanh Toán <i class="cart__container-payment-icon fa-solid fa-money-bill"></i></i></button>
                                </form>
                ';
    }
}
