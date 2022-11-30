<?php
    include 'DBconn.php';
    $lokasi = isset($_POST['lokasi'])?$_POST['lokasi']:'';
    $date = isset($_POST['date'])?$_POST['date']:'';
    $typePert = isset($_POST['typePert'])?$_POST['typePert']:'';
    $kategori = $_POST['kategori'];
    
    $events = mysqli_query($conn,"SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID WHERE Kategori = '$kategori' AND Lokasi LIKE '%$lokasi%' AND Tanggal LIKE '%$date%' AND JenisPert LIKE '$typePert%'") or die(mysqli_error($conn));
?>


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