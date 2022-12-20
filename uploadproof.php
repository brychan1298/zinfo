<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/uploadproof.css">
</head>
<body>

    <?php include "navbar.php" ?>
    <?php 
        if(isset($_POST['listCartID'])){
            include "DBconn.php";
            session_start();
            $UserID = $_SESSION["id"];
            $query = "INSERT INTO `transaction`(`UserID`,`status`)
                    VALUES('$UserID','BELUM')";
            mysqli_query($conn,$query) or die(mysqli_error($conn));
            $query = mysqli_query($conn,"select * from transaction ORDER BY transactionID DESC LIMIT 1") or die(mysqli_error($conn));
            $querys = mysqli_fetch_assoc($query);
            $transactionID = $querys['transactionID'];
            
            foreach($_POST['listCartID'] as $cartID){
                $events = mysqli_query($conn, "SELECT * FROM cart c
                                                    JOIN event e ON e.EventID = c.EventID 
                                                    where id='$cartID'") or die(mysqli_error($conn));
                $event = mysqli_fetch_assoc($events);
                $eventID = $event['EventID'];
                $eventQTY = $event['qty'];
                $query = "INSERT INTO transactionDetail(`transactionID`,`eventID`,`qty`)
                    VALUES('$transactionID','$eventID',$eventQTY)";
                mysqli_query($conn,$query) or die(mysqli_error($conn));

                $query = "DELETE FROM cart WHERE id='$cartID'";
                mysqli_query($conn,$query) or die(mysqli_error($conn));
            }
        }
    ?>
    <div id="upload">
        <div id="upload-text">
            Upload Payment Evidence <br>
            For Transaction #<?=$transactionID?>

        </div>
        <div id="upload-icon">
            <div>
                <img src="Asset/icon-upload.png" alt="">
            </div>
            <div id="upload-icon-2">
                Upload your payment evidence here
            </div>
            <div id="upload-icon-3">
                <a href="">Browse</a>
            </div>
        </div>

        <div id="upload-button">
            <button>
                Send
            </button>
        </div>
    </div>

    <?php include "footer.php" ?>
</body>
</html>