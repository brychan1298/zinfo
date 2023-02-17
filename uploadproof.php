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
        include "DBconn.php";
        if(isset($_FILES['proof']['name'])){
            $errors=false;
            $transactionID = $_POST['transactionID'];
            $transID = $transactionID;
            $fileName = $_FILES['proof']['name'];
            $tmpfile = $_FILES['proof']['tmp_name'];
            $extension = strtolower(end(explode('.',$_FILES['proof']['name'])));
            $extensions = array("jpeg","jpg","png");

            if(in_array($extension,$extensions)=== false){
                $errors = true;
            }
            
            // $location = "Asset/Proof/";
            // $location .= $_FILES['proof']['name'];
            // if(!is_dir($location)){
            //     echo "No Location";
            // }

            $newFilename = 'bukti'.$transID.'.'.$extension;

            if(!$errors) {
                move_uploaded_file($tmpfile,'Asset/Proof/'.$newFilename);
                mysqli_query($conn, "UPDATE `transaction` SET `buktiPembayaran`='$newFilename',
                                    `status`='SUDAH' WHERE transactionID = '$transactionID'");
                $query = mysqli_query($conn,"SELECT * from `transactionDetail`
                                            WHERE transactionID = '$transactionID'");
                $UserID = $_SESSION["id"];
                foreach($query as $eventids){
                    $eventid = $eventids['eventID'];
                    mysqli_query($conn,"INSERT INTO reminder(`UserID`,`EventID`)
                                        VALUES('$UserID','$eventid')");
                }
                echo "<script>window.location.href='pending.php'</script>";
            }else{
                echo "extension not allowed, please choose a JPEG or PNG file.";
            }
        }
    ?>
    <?php
        if(isset($_POST['transactionIDs'])){
            $transactionID = $_POST['transactionIDs'];
        }
    ?>
    <?php 
        if(isset($_POST['listCartID'])){
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
                $randomNumber = rand(100000,999999);
                $query = "INSERT INTO transactionDetail(`transactionID`,`eventID`,`qty`,`kodeBooking`)
                    VALUES('$transactionID','$eventID',$eventQTY,$randomNumber)";
                mysqli_query($conn,$query) or die(mysqli_error($conn));

                $query = "DELETE FROM cart WHERE id='$cartID'";
                mysqli_query($conn,$query) or die(mysqli_error($conn));
            }
        }else if(isset($_POST['eventID'])){
            
            $UserID = $_SESSION["id"];
            $query = "INSERT INTO `transaction`(`UserID`,`status`)
                    VALUES('$UserID','BELUM')";
            mysqli_query($conn,$query) or die(mysqli_error($conn));
            
            $query = mysqli_query($conn,"select * from transaction ORDER BY transactionID DESC LIMIT 1") or die(mysqli_error($conn));
            $querys = mysqli_fetch_assoc($query);
            
            $transactionID = $querys['transactionID'];
            
            $eventID = $_POST['eventID'];
            $eventQTY = $_POST['qty'];
            $randomNumber = rand(100000,999999);
            
            $query = "INSERT INTO transactionDetail(`transactionID`,`eventID`,`qty`,`kodeBooking`)
                VALUES('$transactionID','$eventID',$eventQTY,$randomNumber)";
            mysqli_query($conn,$query) or die(mysqli_error($conn));
            // echo "<script>alert('kegantenganvincent')</script>";
            // $query = "DELETE FROM cart WHERE id='$cartID'";
            // mysqli_query($conn,$query) or die(mysqli_error($conn));
        }
    ?>
    <div id="upload">
        <div id="upload-text">
            Upload Payment Evidence <br>
            For Transaction #<?=$transactionID?>

        </div>
        <div id="upload-icon">
            <div>
                <img src="Asset/icon-upload.png" id="imgProof" alt="" onclick="tes()" style="cursor:pointer">
            </div>
            
            <div id="upload-icon-2">
                Upload your payment evidence here
            </div>
            
            <div id="upload-icon-3">
                <a onclick="tes()" style="cursor:pointer">
                    Browse
                </a>
                <p id="proofName">
                    
                </p>
            </div>
        </div>
        <form action="uploadproof.php" method="POST" enctype="multipart/form-data">
            <input type="file" style="opacity:0;" id="tes" name="proof">
            <input type="hidden" name="transactionID" value="<?= $transactionID ?>">
            <div id="upload-button">
                <button type="submit" name="submit">
                    Send
                </button>
            </div>
        </form>
    </div>

    <?php include "footer.php" ?>
    <script src="js/uploadproof.js"></script>
</body>
</html>