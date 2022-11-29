<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/kategori.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/kategori.js"></script>
</head>
<body>
    <!-- NAVBAR -->
    <?php
        include "DBconn.php";
        $kategori = $_GET['kategori'];

        $events = mysqli_query($conn,"SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori'") or die(mysqli_error($conn));
        if(isset($_POST['search'])){
            $nama = $_POST['search'];
            $kategori = $_POST['kategori'];
            $events = mysqli_query($conn,"SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori' AND e.nama LIKE '%$nama%'") or die(mysqli_error($conn));
        }else if(isset($_POST['kategori'])){
            $kategori = $_POST['kategori'];
            $events = mysqli_query($conn,"SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori'") or die(mysqli_error($conn));
        }
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

    <!-- SEARCH BAR -->
    <form action="kategori.php" method="POST">
        <div id="search">
            <div id="search-bar">
                <input type="hidden" value="<?= $kategori ?>" name="kategori">
                <div class="search-bar-input">
                    <input type="text" placeholder="Cari Konser" name="search">
                </div>
                <div class="search-bar-icon" onClick="document.forms[0].submit()">
                    <img src="Asset/icon-search.png" alt="">
                </div>
            </div>
        </div>
    </form>

    <?php
        
        
    ?>

    <!-- CONCERT -->
    <div id="concert">
        <h2><?= $kategori ?></h2>
    </div>

    <!-- FILTER -->
    <div id="filter">
        <div id="filter-icon-text">
            <span id="filter-icon-img">
                <img src="Asset/icon-filter.png" alt="">
            </span>
            <span id="filter-icon-word">
                <h4>FILTER</h4>
            </span>
        </div>

        <div id="filter-section">
            <div id="filter-location">
                <img src="Asset/icon-filter-location.png" alt="">
                <select name="" class="filter-select">
                    <option value="">
                        Location
                    </option>
                    <option value="">Location</option>
                    <option value="">Location</option>
                </select>
            </div>

            <div id="filter-date">
                <img src="Asset/icon-filter-date.png" alt="">
                <select name="" class="filter-select">
                    <option value="">
                        Date
                    </option>
                    <option value="">Location</option>
                    <option value="">Location</option>
                </select>
            </div>

            <div id="filter-type">
                <img src="Asset/icon-filter-type.png" alt="">
                <select name="" class="filter-select">
                    <option value="">
                        Type
                    </option>
                    <option value="">Location</option>
                    <option value="">Location</option>
                </select>
            </div>

            <div id="filter-button">
                <button>
                    Filter
                </button>
            </div>
        </div>
    </div>

     <!-- EVENT -->
     <div id="event">
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
                                    <p>Rp <?= $event["Harga"] ?>,00</p>
                                </div>
                                <div class="event-list-price-ticket">
                                    <p>
                                        10 Tiket Tersisa
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
        <div class="pagination-number active">
            <a href="" class="active">
                1
            </a>
        </div>
        <div class="pagination-number">
            <a href="">
                2
            </a>
        </div>
        <div class="pagination-number">
            <a href="">
                3
            </a>
        </div>
        <div class="pagination-number">
            <a href="">
                4
            </a>
        </div>
        <div>
            <a href="">
                >>
            </a>
        </div>
    </div>

    <!-- FOOTER -->
    <div id="footer-wrapper">
        <div id="footer">
            <div class="footer-box1 a">
                <img src="Asset/Logo ZInfo 2.png" alt="">
            </div>
            <div class="footer-box2 a">
                <h2>ZInfo</h2>
    
                <p>About Us</p>
                <p>Event</p>
                <p>Twibbon</p>
            </div>
            <div class="footer-box3 a">
                <h2>Copyright</h2>
    
                <p>Privacy Policy</p>
                <p>Terms & Condition</p>
            </div>
            <div class="footer-box4 a">
                <h2>Follow Us</h2>
    
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-ig.png" alt="">
                    </div>
                    <div>
                        Instagram
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-fb.png" alt="">
                    </div>
                    <div>
                        Facebook
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-twitter.png" alt="">
                    </div>
                    <div>
                        Twitter
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-tiktok.png" alt="">
                    </div>
                    <div>
                        Tik Tok
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-youtube.png" alt="">
                    </div>
                    <div>
                        Youtube
                    </div>
                </div>
            </div>
            <div class="footer-box5 a">
                <h2>Contact Us</h2>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-wa.png" alt="">
                    </div>
                    <div>
                        (+1) 415 1234567
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-email.png" alt="">
                    </div>
                    <div>
                        info@zinfo.co
                    </div>
                </div>
            </div>
        </div>

        <h4>© 2022 ZInfo. All rights reserved.</h4>
    </div>
</body>
</html>