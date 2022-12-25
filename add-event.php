<?php
include "DBconn.php";

session_start();
$eventID = isset($_POST['eventID']) ? $_POST['eventID'] : "";
$UserID = $_SESSION["id"];
$query = "INSERT INTO reminder(UserID,EventID) VALUES($UserID,$eventID)";
mysqli_query($conn, $query) or die(mysqli_error($conn));

?>