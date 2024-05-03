<?php
session_start();
include '../config/db_connection.php';

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        //tên procedure
        $addUserInf = 'p_add_user_info';

        $email = $conn->real_escape_string($_POST['Email']);
        $fname = $conn->real_escape_string($_POST['fullname']);
        $add = $conn->real_escape_string($_POST['add']);

        $sql_query = $conn->prepare("CALL $addUserInf(?, ?, ?, ?)");
        $sql_query->bind_param("ssss", $uname, $email, $fname, $add);
        $sql_query->execute();

        echo "<script> 
        alert('NHẬP THÀNH CÔNG!!!');
        window.location.href = 'personalPage.php';
        </script>";
        $sql_query->close();
    }
}
