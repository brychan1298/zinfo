<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/detailevent.css">
    <script src="js/detailevent.js"></script>
</head>
<body>
    <?php
        include "DBconn.php";
        $EventID = $_GET["eventID"];
        
        $eventdetail = mysqli_query($conn, "SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID  WHERE EventID = $EventID");
        $detailed = mysqli_fetch_assoc($eventdetail);
    ?>
    <?php include "navbar.php" ?>

    <div id="detail-event">
        <div id="detail-event-left">
            <div>
                <img src="Asset/poster/<?= $detailed['GambarPoster'] ?>" alt="">
            </div>
            <h2 id="event-category"><?= $detailed['Kategori'] ?></h2>
            <h1 id="event-name"><?= $detailed['Nama'] ?></h1>
            <div>
                <p id="event-type">
                    <?= $detailed['JenisPert'] ?>
                </p>
            </div>

            <div id="event-organizer">
                <div>
                    <img src="Asset/event-logo.png" alt="">
                </div>
                <div>
                    <div id="organizer-name">
                        <?= $detailed['NamaOrganizer'] ?>
                    </div>
                    <div id="more-event">
                        <a href="">See More Events</a>
                    </div>
                </div>
            </div>

            <div id="event-location">
                <div>
                    <img src="Asset/location-blue.png" alt="">
                </div>
                <div>
                    <div id="event-location-1">
                        <?= $detailed['Lokasi'] ?>
                    </div>
                    <div id="event-location-2">
                        <?= $detailed['Alamat'] ?>
                    </div>
                    <div>
                        <a href="">View Map</a>
                    </div>
                </div>
            </div>

            <div id="about-event">
                <h2>About This Event</h2>
                <div>
                    <?= $detailed['Deskripsi'] ?>
                </div>
            </div>

            <div id="share-event">
                <div>
                    Share with friends
                </div>
                <div id="share-event-logo">
                    <div>
                        <img src="Asset/black-ig.png" alt="">
                    </div>
                    <div>
                        <img src="Asset/black-twitter.png" alt="">
                    </div>
                    <div>
                        <img src="Asset/black-fb.png" alt="">
                    </div>
                    <div>
                        <img src="Asset/black-tele.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="detail-event-right">
            <div id="detail-event-right-child">
                <div id="detail-event-right-1">
                    <div id="event-start">
                        <div>Start</div>
                        <div>17:00 WIB</div>
                    </div>

                    <?php  
                        $orgDate = $detailed["Tanggal"];  
                        $newDateMonth = date("M", strtotime($orgDate));
                        $newDateDay = date("D", strtotime($orgDate));
                        $newDateDate = date("d", strtotime($orgDate));
                    ?>  

                    <div id="event-date">
                        <div id="eventMonth">
                            <?= $newDateMonth ?>
                        </div>
                        <div id="eventDate">
                            <?= $newDateDate ?>
                        </div>
                        <div id="eventDay">
                            <?= $newDateDay ?>
                        </div>
                    </div>
    
                    <div id="event-finish">
                        <div>
                            Finish
                        </div>
                        <div>
                            21:00 WIB
                        </div>
                    </div>
                </div>
    
                <div id="detail-event-right-2">
                    <h2>
                        Rp <?= $detailed['Harga'] ?>,00
                    </h2>
                    <div id="event-count">
                        <div>
                            <button id="minButton" onclick="reduceAmount()">-</button>
                        </div>
                        <div id="amount">
                            <input type="text" value="0" id="textAmount">
                        </div>
                        <div>
                            <button id="addButton" onclick="addAmount()">+</button>
                        </div>
                    </div>
                </div>
    
                <div id="detail-event-right-3">
                    <div id="detail-event-right-3-1">
                        <img src="Asset/bell-blue.png" alt="">
                    </div>
                    <div id="detail-event-right-3-2">
                        <button>
                            Add to Cart
                        </button>
                    </div>
                    <div id="detail-event-right-3-3">
                        <button>
                            Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>