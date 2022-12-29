<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="css/uploadtwibbon.css">
</head>
<body>
    <?php
        include "DBConn.php";
        $EventID = $_GET["eventID"];

        $twibbons = mysqli_query($conn, "SELECT * FROM `event` WHERE EventID = $EventID") or die(mysqli_error($conn));
        $twibbonDetail = mysqli_fetch_assoc($twibbons);
    ?>
    <!-- NAVBAR -->
    <?php include "navbar.php" ?>

    <!-- Twibbon -->
    <div id = "twibbon">
        <div id = "twibbon-section">
            <img src="Asset/<?=$twibbonDetail["logo"]?>" alt="">
            <div class="twibbon-section-logo-p">
                <p> <?=$twibbonDetail["NamaOrganizer"]?> </p>
            </div>
            <div class="twibbon-desc">
                <div class = twibbon-desc-item>
                    <img src="Asset/time-icon.png">
                    <p> a year ago </p>
                </div>
                <div class = twibbon-desc-item>
                    <img src="Asset/user-icon.png">
                    <p> 60M user </p>
                </div>
            </div>
            <div class="twibbon-section-name">
                    <p> <?=$twibbonDetail["Nama"]?></p>
            </div>
            <div class="twibbon-section-upload">
                    <p> UPLOAD YOUR PHOTO </p>
            </div>
            <div class="file-input">
                <input type="file" id="photoimg" class="file">
            </div>
            
            <div class = "canvas">
                <div class="twibbon-section-template">
                    <img src="" id = "photo" alt="">
                    <img src="Asset/<?=$twibbonDetail["Twibbon"]?>" id = "twibbon-template" alt="">
                </div>
            </div>

            <div class="twibbon-set">
                <div class="row">
                    <div class="width">
                        <div class="label">
                            Width
                        </div>
                        <input class="input-set" type="text" id = "width" value="100%">
                    </div>
                    <div class="height">
                        <div class="label">
                            Height
                        </div>
                        <input  type="text" id = "height" value="100%">
                    </div>
                </div>

                <div class="row">
                    <div class="top">
                        <div class="label">
                            Top
                        </div>
                        <input class="input-set" type="text" id = "top" value="0px">
                    </div>
                    <div class="left">
                        <div class="label">
                            Left
                        </div>
                        <input class="input-set" type="text" id = "left" value="0px">
                    </div>
                </div>
            </div>
            <a href="#" id="download">Download</a>
        </div>
    </div>
    
    <!-- FOOTER -->
    <?php include "footer.php" ?>
    <script src="js/twibbon.js"></script>
</body>
</html>