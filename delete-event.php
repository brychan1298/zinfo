<?php
include "DBconn.php";

session_start();
$eventID = isset($_POST['deleventID']) ? $_POST['deleventID'] : "";
$UserID = $_SESSION["id"];
echo "<script>alert('goblok')</script>";
$query = "DELETE FROM reminder WHERE UserID='$UserID' AND EventID='$eventID'";

mysqli_query($conn, $query) or die(mysqli_error($conn));
?>