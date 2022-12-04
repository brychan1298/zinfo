<?php
    include 'DBconn.php';
    session_start();
    $UserID = $_SESSION["id"];
    $EventID = $_POST["eventID"];
    $qty = $_POST["qty"];
    $check_exist = mysqli_query($conn, "SELECT * FROM cart WHERE UserID = '$UserID' AND EventID = '$EventID'")or die(mysqli_error($conn));
    if(mysqli_num_rows($check_exist) == 0):
        mysqli_query($conn, "INSERT INTO cart(`UserID`, `EventID`, `qty`) VALUES($UserID, '$EventID', '$qty')") or die(mysqli_error($conn));
        $query = mysqli_query($conn, "SELECT * FROM cart WHERE UserID = '$UserID'");
        $total_cart = mysqli_num_rows($query);
        echo $total_cart;
else:
    echo 'same';
    endif;
?>