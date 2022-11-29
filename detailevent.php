<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/detailevent.css">
</head>
<body>
    <?php
        include "DBconn.php";
        $EventID = $_GET["eventID"];
        
        $eventdetail = mysqli_query($conn, "SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID  WHERE EventID = $EventID");
        $detailed = mysqli_fetch_assoc($eventdetail);
    ?>
    <nav id="nav">
        <div>
            <ul id="ul">
                <li>
                    <a href="Beranda.html">
                        <img src="Asset/Logo Zinfo 2.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="">About Us</a>
                </li>
                <li>
                    <a href="event.php">Event</a>
                </li>
                <li>
                    <a href="twibbon.php">Twibbon</a>
                </li>
            </ul>
        </div>
        

        <!-- RESPONSIVE MENU -->
        <div id="toggle">open</div>
        <div id="menu" class="menu-responsive">
            <i class="fas fa-bars menu"></i>
        </div>
        
        <div>
            <ul id="ul2">
                <li id="login">
                    <button>Log In</button>
                </li>
                <li>
                    <a href="">
                        <img src="Asset/cart.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="Asset/profil.png" alt="">
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>

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
                        <div>
                            <?= $newDateMonth ?>
                        </div>
                        <div>
                            <?= $newDateDate ?>
                        </div>
                        <div>
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
                            <button>+</button>
                        </div>
                        <div>
                            2
                        </div>
                        <div>
                            <button>-</button>
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