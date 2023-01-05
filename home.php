<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php
        include "DBconn.php";
        $trending = mysqli_query($conn, "SELECT * FROM event limit 4") or die(mysqli_error($conn));
    ?>
    <!-- NAVBAR -->
    <?php include "navbar.php" ?>
    <!-- BANNER -->

    <div class="banner">
        <span id="button-left" class="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </span>
        <!-- <img src="Asset/banner.png" alt=""> -->
        <div id="carousel-container">
            <img class="carousel-image active" src="Asset/banner.png" alt="">
            <img class="carousel-image" src="Asset/banner-event-1.png" alt="">
            <img class="carousel-image" src="Asset/banner-event-2.png" alt="">
        </div>
        <!-- <div class="caroul-circle">
            <span></span>
            <span></span>
            <span></span>
        </div> -->
        <span id="button-right" class="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
        </span>
    </div>
    

    <!-- FITUR -->
    <div class="fitur">
        <h3>
            Explore Zinfo
        </h3>
        <div class="flexed-fitur">
            <div class="icon-fitur">
                <div class="icon-fitur-box">
                    <a href="calendar.php">
                        <img src="Asset/icon-calendar.png" alt="">
                    </a>
                </div>
                <p>Calendar</p>
            </div>
            <div class="icon-fitur">
                <div class="icon-fitur-box">
                    <a href="twibbon.php">
                        <img src="Asset/icon-twibbon.png" alt="">
                    </a>
                </div>
                <p>Twibbon</p>
            </div>
            <div class="icon-fitur">
                <div class="icon-fitur-box">
                    <a href="event.php">
                        <img src="Asset/icon-event.png" alt="">
                    </a>
                </div>
                <p>Event</p>
            </div>
            <div class="icon-fitur">
                <div class="icon-fitur-box">
                    <a href="">
                        <img src="Asset/icon-chat.png" alt="">
                    </a>
                </div>
                <p>Chat Bot</p>
            </div>
            <div class="icon-fitur">
                <div class="icon-fitur-box">
                    <a href="certificate.php">
                        <img src="Asset/icon-certificate.png" alt="">
                    </a>
                </div>
                <p>E-Certificate</p>
            </div>
        </div>
    </div>

    <!-- TRENDING -->
    <div class="trending">
        <h2>Trending</h2>
        <div class="trending-box">
            <?php 
                foreach($trending as $trend):
            ?>
                <div class="trending-box-child">
                    <!-- <div class="trending-tanggal">
                        <img src="Asset/icon-tanggal.png" alt="">
                    </div> -->
                    <img src="Asset/poster/<?= $trend["GambarPoster"] ?>" alt="" class="trending-img">
                    <div class="trending-detail">
                        <button class="detail-button">
                            <img src="Asset/icon-date.png" alt="">DETAIL
                        </button>
                    </div>
                    <div class="trending-blurred">
                        <h1><?= $trend["Nama"] ?></h1>
                        <div class="trending-blurred-child1">
                            <div>
                                <img src="Asset/location-blue.png" alt="">
                            </div>
                            <div>
                                <b><?= $trend["Lokasi"] ?></b>
                            </div>
                        </div>
                        <div class="trending-blurred-child2">
                            <div>
                                <img src="Asset/date-blue.png" alt="">
                            </div>
                            <div>
                                <b>
                                <?php 
                                    $orgDate = $trend["Tanggal"];  
                                    $newDateMonth = date("M", strtotime($orgDate));
                                    $newDateDay = date("D", strtotime($orgDate));
                                    $newDateDate = date("d", strtotime($orgDate));
                                    $newDateYear = date("Y", strtotime($orgDate));
                                    echo $newDateDay.", ". $newDateDate." ". $newDateMonth." ".$newDateYear;
                                ?>
                                </b>
                            </div>
                        </div>
                    </div>

                    <div class="trending-blurred-bell">
                        <?php if(!isset($_SESSION['login'])) : ?>
                            <img src="Asset/bell-blue.png" alt="" onclick="alert('Tolong login terlebih dahulu')">
                        <?php else : ?>
                        <?php
                            $UserID = $_SESSION["id"];
                            $EventID = $trend['EventID'];
                            $query = mysqli_query($conn,"SELECT * FROM reminder 
                                                        WHERE EventID='$EventID'
                                                        AND UserID='$UserID'");
                            if(mysqli_num_rows($query)==0):
                        ?>
                            <img src="Asset/bell-blue.png" alt="" class="remind">
                            <input type="hidden" class="remindID" value="<?=$trend['EventID']?>">
                        <?php else :?>
                            <img src="Asset/reminded-bell.png" alt="" class="delremind">
                            <input type="hidden" class="delremindID" value="<?=$trend['EventID']?>">
                        <?php endif?>
                        <?php endif?>
                    </div>
                </div>
            <?php 
                endforeach
            ?>
        </div>
    </div>

    <?php include "footer.php" ?>

    <script src="js/home.js"></script>
</body>
</html>