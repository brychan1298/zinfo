<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/kategori.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
    <!-- NAVBAR -->
    <?php
        include "DBconn.php";
        $kategori = $_GET['kategori'];

        $perPage = 6;
        $total = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori' "))[0];
        $totalPage = ceil($total/$perPage);
        if(isset($_GET["page"])){
            $currentPage = $_GET["page"];
        }else{
            $currentPage = 1;
        }
        
        $firstDataofPage = ($perPage * $currentPage)-$perPage;

        $events = mysqli_query($conn,"SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori' limit $firstDataofPage,$perPage") or die(mysqli_error($conn));
        if(isset($_POST['search'])){
            $nama = $_POST['search'];
            $kategori = $_POST['kategori'];
            $events = mysqli_query($conn,"SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori' AND e.nama LIKE '%$nama%'") or die(mysqli_error($conn));
            $total = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori' AND e.nama LIKE '%$nama%'"))[0];
        }else if(isset($_POST['kategori'])){
            $kategori = $_POST['kategori'];
            $events = mysqli_query($conn,"SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori'") or die(mysqli_error($conn));
            $total = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori'"))[0];
        }
        $listLokasi = mysqli_query($conn, "SELECT DISTINCT lokasi FROM `event` WHERE lokasi != 'Zoom' ORDER BY lokasi ") or die(mysqli_error($conn));
    ?>
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

    <!-- SEARCH BAR -->
    <form action="kategori.php" method="POST">
        <div id="search">
            <div id="search-bar">
                <input type="hidden" id="kategoriHidden" value="<?= $kategori ?>" name="kategori">
                <div class="search-bar-input">
                    <input type="text" placeholder="Cari <?= $kategori ?>" name="search">
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
                <select name="location" class="filter-select" id="location">
                    <option value="">
                        Location
                    </option>
                    <?php foreach($listLokasi as $lokasi): ?>
                        <option value="<?= $lokasi['lokasi'] ?>"><?= $lokasi['lokasi'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div id="filter-date">
                <img src="Asset/icon-filter-date.png" alt="">
                <input type="date" id="date" class="filter-select" name="date">
                
            </div>

            <div id="filter-type">
                <img src="Asset/icon-filter-type.png" alt="">
                <select name="typePert" id="typePert" class="filter-select">
                    <option value="">
                        Type
                    </option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                </select>
            </div>

            <div id="filter-button">
                <button id="buttonSearch">
                    Filter
                </button>
            </div>
        </div>
    </div>

     <!-- EVENT -->
     <div id="event">
        <div id="event-section">
            
            <?php 
                if($total != 0):    
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
                                        <?= $event["sisaTicket"] ?> Tiket Tersisa
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>       
            <?php
                endforeach;
                else:
            ?>
            <h1>TIDAK ADA EVENT</h1>
            <?php endif; ?>
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
                    <a href="?page=<?= $i ?>&kategori=<?= $kategori ?>" class="active">
                        <?= $i ?>
                    </a>
                </div>
            <?php else :?>
                <div class="pagination-number">
                    <a href="?page=<?= $i ?>&kategori=<?= $kategori ?>" class="">
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
    <script src="js/kategori.js"></script>
</body>
</html>