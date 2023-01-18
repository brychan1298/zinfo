<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/twibbon.css">
</head>
<body>
    <?php
        include "DBconn.php";
        session_start();
        $UserID = $_SESSION["id"];
        $query = "SELECT * FROM transaction t JOIN transactiondetail td ON t.transactionID = td.transactionID
                    JOIN event e ON e.EventID = td.eventID where userID = $UserID AND kategoriID IN (1,3)
                    GROUP BY e.EventID";
        // $twibbons = mysqli_query($conn, "SELECT * FROM event WHERE `logo` IS NOT NULL AND `twibbon` IS NOT NULL") or die(mysqli_error($conn));
        $twibbons = mysqli_query($conn, $query) or die(mysqli_error($conn));
    ?>
    <!-- NAVBAR -->
    <?php include "navbar.php" ?>

    <!-- BANNER -->
    <div id="banner">
        <div>
            <img src="Asset/banner-event-2.png" alt="" class="banner-img">
        </div>
        <div class="caroul-circle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>


     <!-- TWIBBON -->
    <div id="twibbon">
        <div class="twibbon-upper">
            Your Activity
        </div>
        
        <div id="twibbon-section">
            <?php
                if(mysqli_num_rows($twibbons) == 0):
            ?>
            <div>
                <h1>
                    Belum ada twibbon yang dapat digunakan.
                </h1>
            </div>
            <?php
                else:
            ?>
            <?php
                foreach($twibbons as $twibbon):
            ?>
                <div class="twibbon-list">
                    <a href="uploadtwibbon.php?eventID=<?= $twibbon["EventID"]?>">
                        <div class="twibbon-list-img">
                            <img src="Asset/<?= $twibbon["Twibbon"] ?>" alt="">
                        </div>
                        <div class="twibbon-list-desc">
                            <h2><?= $twibbon["Nama"] ?></h2>
                            <div class="twibbon-list-logo">
                                <div class="twibbon-list-logo-icon">
                                    <img src="Asset/<?= $twibbon["logo"] ?>" alt="">
                                </div>
                                <div>
                                    <p>
                                        <?= $twibbon["NamaOrganizer"] ?>
                                    </p>
                                </div>
                            </div>

                            <!-- <div class="twibbon-list-time">
                                <div class="twibbon-list-time-icon">
                                    <img src="Asset/time-icon.png" alt="">
                                </div>
                                <div>
                                    <p>
                                        a year ago
                                    </p>
                                </div>
                            </div>

                            <div class="twibbon-list-user">
                                <div class="twibbon-list-user-icon">
                                    <img src="Asset/user-icon.png" alt="">
                                </div>
                                <div class="twibbon-list-user-count">
                                    <p>
                                        60M user
                                    </p>
                                </div>
                            </div> -->
                        </div>
                    </a>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include "footer.php" ?>
</body>
</html>