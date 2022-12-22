<?php
    session_start();
    require_once "DBconn.php";
    $UserID = $_SESSION["id"];

    $json = array();
    $result = mysqli_query($conn, "SELECT DISTINCT Nama,Tanggal FROM reminder r 
                            JOIN `event` e ON e.EventID = r.EventID
                            where UserID='$UserID'");

    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = array(
            'title' => $row['Nama'],
            'date' => $row['Tanggal']
        );
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    echo json_encode($json);
?>