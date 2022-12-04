<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/event.css">
</head>
<body>
    <?php
        include "DBconn.php";
        $perPage = 6;
        $total = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM event"))[0];
        $totalPage = ceil($total/$perPage);
        if(isset($_GET["page"])){
            $currentPage = $_GET["page"];
        }else{
            $currentPage = 1;
        }
        
        $firstDataofPage = ($perPage * $currentPage)-$perPage;

        $events = mysqli_query($conn, "SELECT * FROM event limit $firstDataofPage,$perPage") or die(mysqli_error($conn));
    ?>
    <!-- NAVBAR -->
    <?php include "navbar.php" ?>

    <!-- BANNER -->
    <div id="banner">
        <div>
            <img src="Asset/banner-event-1.png" alt="" class="banner-img">
        </div>
        <div class="caroul-circle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- CATEGORY -->
    <div id="category">
        <h2>Event Category</h2>
        <div id="category-section">
            <div class="category-list" onclick="locateCategory('Concert')">
                <div class="category-list-box">
                    <img src="Asset/icon-concert.png" alt="">
                </div>
                <p>Concert</p>
            </div>
            <div class="category-list" onclick="locateCategory('Seminar')">
                <div class="category-list-box">
                    <img src="Asset/icon-seminar.png" alt="">
                </div>
                <p>Seminar</p>
            </div>
            <div class="category-list" onclick="locateCategory('Competition')">
                <div class="category-list-box">
                    <img src="Asset/icon-competition.png" alt="">
                </div>
                <p>Competition</p>
            </div>
            <div class="category-list" onclick="locateCategory('Volunteer')">
                <div class="category-list-box">
                    <img src="Asset/icon-volunteer.png" alt="">
                </div>
                <p>Volunteer</p>
            </div>
        </div>
    </div>

    <!-- ALL EVENT -->
    <div id="event">
        <h2>
            All Event
        </h2>
        <div id="event-section">
            <?php 
                foreach($events as $event):
            ?>

                <div class="event-list">
                    <a href="detailevent.php?eventID=<?= $event["EventID"] ?>">
                        <div class="event-list-img">
                            <img src="Asset/poster/<?= $event["GambarPoster"] ?>" alt="">
                        </div>
                        <div class="event-list-desc">
                            <h2><?= $event["Nama"] ?></h2>
                            <div class="event-list-location">
                                <div class="event-list-location-icon">
                                    <img src="Asset/icon-location.png" alt="">
                                </div>
                                <div>
                                    <p>
                                    <?= $event["Lokasi"] ?>
                                    </p>
                                </div>
                            </div>

                            <div class="event-list-date">
                                <div class="event-list-date-icon">
                                    <img src="Asset/icon-event-date.png" alt="">
                                </div>
                                <div>
                                    <p>
                                        <?= $event["Tanggal"] ?>
                                    </p>
                                </div>
                            </div>

                            <div class="event-list-price">
                                <div class="event-list-price-p">
                                    <p>
                                        <?php 
                                            $hasil = "Rp " . number_format($event["Harga"],2,',','.');
                                            echo $hasil;
                                        ?>
                                    </p>
                                </div>
                                <div class="event-list-price-ticket">
                                    <p>
                                        <?= $event["sisaTicket"] ?> Tiket Tersisa
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php 
                endforeach
            ?>
            
        </div>
    </div>

    <!-- PAGINATION -->
    <div id="pagination">
        <div>
            <a href="">
                <<
            </a>
        </div>
        <?php for($i = 1; $i <= $totalPage; $i++): ?>  
            <?php if($i == $currentPage): ?>
                <div class="pagination-number active">
                    <a href="?page=<?= $i ?>" class="active">
                        <?= $i ?>
                    </a>
                </div>
            <?php else :?>
                <div class="pagination-number">
                    <a href="?page=<?= $i ?>" class="">
                        <?= $i ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endfor ?>
        <div>
            <a href="">
                >>
            </a>
        </div>
    </div>


    <!-- FOOTER -->
    <?php include "footer.php" ?>
    <script src="js/event.js"></script>
</body>
</html>