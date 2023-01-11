<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Certificate</title>
    <link rel="stylesheet" href="css/certificate.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>
    <!-- NAVBAR -->
    <?php include "navbar.php" ?>
    <div class="title">
        <img src="Asset/icon-certificate(2).png" alt="">
        <h1>E-CERTIFICATE</h1>
    </div>

    <div id = "certificate">
        <div id = "certificate-section">
            <img src="Asset/logo-bca.png" alt="">
            <div class="certificate-section-name">
                    <p> PPTI/PPBP BCA 2024</p>
            </div>
            <div class="certificate-section-template">
                <img src="Asset/certificate.png" alt="">
                <div class="certificate-name">
                    <p> <?=$profiles["Nama"]?> </p>
                </div>
            </div>
            <div class="certificate-section-button">
                <a href="#" id="button-certificate">DOWNLOAD</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include "footer.php" ?>
    <script src="js/certificate.js"></script>
</body>
</html>