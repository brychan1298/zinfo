<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/detailevent.css">
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
    <?php
        include "DBconn.php";
        $EventID = $_GET["eventID"];
        
        $eventdetail = mysqli_query($conn, "SELECT * FROM `event` e JOIN kategori k ON e.KategoriID = k.KategoriID  WHERE EventID = $EventID");
        $detailed = mysqli_fetch_assoc($eventdetail);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
    ?>
    <?php include "navbar.php" ?>

    <?php
        
        if(isset($_POST['comment'])){
            $UserID = $_SESSION["id"];
            $comment = $_POST['comment'];
            $date = date("Y-m-d");

            $query = "INSERT INTO comment(`EventID`,`UserID`,`comment`,`date`)
                    VALUES('$EventID','$UserID','$comment','$date')";
            mysqli_query($conn,$query) or die(mysqli_error($conn));
        }
        $query = "SELECT * FROM comment c JOIN event e ON e.EventID = c.EventID
                JOIN user u ON u.UserID = c.UserID where e.EventID = '$EventID' ORDER BY CommentID DESC";
        $comments = mysqli_query($conn, $query) or die(mysqli_error($conn));

        
    ?>

    <div id="detail-event">
        <div id="detail-event-left">
            <div>
                <img src="Asset/poster/<?= $detailed['GambarPoster'] ?>" alt="">
                <!-- <iframe width="420" height="315"
                    src="https://www.youtube.com/embed/PwWHL3RyQgk">
                </iframe> -->
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
                    <!-- <div id="event-start">
                        <div>Start</div>
                        <div>17:00 WIB</div>
                    </div> -->

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
    
                    <!-- <div id="event-finish">
                        <div>
                            Finish
                        </div>
                        <div>
                            21:00 WIB
                        </div>
                    </div> -->
                </div>
                <form action="payment.php" method="POST" id="formOrder">
                <div id="detail-event-right-2">
                    <h2>
                        <?php 
                            if($detailed["Harga"]!=0):
                                $hasil = "Rp " . number_format($detailed["Harga"],2,',','.');
                                echo $hasil;
                            else:
                        ?>
                            Free
                        <?php endif; ?> 
                    </h2>
                    <div id="event-count">
                        <div>
                            <div id="minButton" onclick="reduceAmount()">-</div>
                        </div>
                        <div id="amount">
                            <input type="hidden" id="eventID" name="eventID" value="<?= $EventID ?>">
                            <input type="text" value="0" id="textAmount" name="qty">
                        </div>
                        <div>
                            <div id="addButton" onclick="addAmount()">+</div>
                        </div>
                    </div>
                </div>
    
                <div id="detail-event-right-3">
                    <div id="detail-event-right-3-1">
                        <?php if(!isset($_SESSION['login'])) : ?>
                            <img src="Asset/bell-blue.png" alt="" onclick="alert('Tolong login terlebih dahulu')">
                        <?php else: ?>
                            <?php
                                $UserID = $_SESSION["id"];
                                $query = mysqli_query($conn,"SELECT * FROM reminder 
                                                            WHERE EventID='$EventID'
                                                            AND UserID='$UserID'");
                                if(mysqli_num_rows($query)==0):
                            ?>
                                <img src="Asset/bell-blue.png" alt="" class="remind">
                                <input type="hidden" class="remindID" value="<?=$EventID?>">
                            <?php else :?>
                                <img src="Asset/reminded-bell.png" alt="" class="delremind">
                                <input type="hidden" class="delremindID" value="<?=$EventID?>">
                            <?php endif?>
                        <?php endif; ?>
                    </div>
                    <div id="detail-event-right-3-2">
                        <?php if(isset($_SESSION['login'])) : ?>
                        <div id="addtocart">
                            Add to Cart
                        </div>
                        <?php else : ?>
                        <div onclick="location.href='login.php'">
                            Add to Cart
                        </div>
                        <?php endif ?>
                    </div>
                    <div id="detail-event-right-3-3">
                    <?php if(isset($_SESSION['login'])) : ?>
                        <button id="directOrder" type="submit">
                            Order
                        </button>
                        <?php else : ?>
                        <div onclick="location.href='login.php'">
                            Order
                        </div>
                    <?php endif ?>
                    </div>
                </div>
                </form>
            </div>
            <div id="detail-event-right-child-2">
                <p>
                    503 Comments
                </p>
                <form action="detailevent.php?eventID=<?=$EventID?>" method="POST">
                    <div class="current-comment">
                        <?php
                            if(isset($_SESSION["login"])):
                                $UserID = $_SESSION["id"];
                                $profile = mysqli_query($conn, "SELECT * FROM `user` WHERE UserID = '$UserID'");
                                $profiles = mysqli_fetch_assoc($profile);
                                
                        ?>
                            <p>
                                <?=$profiles['Nama']?>
                            </p>
                            <div class="input-comment">
                                <input type="text" name="comment" placeholder="Add a comment..." id="comment" onkeyup="sending()">
                                <button id="send">
                                    Send
                                </button>
                            </div>
                        <?php
                            else:
                        ?>
                            <p>
                                <a href="login.php">
                                    Login to comment
                                </a>
                            </p>
                        <?php
                            endif;
                        ?>
                    </div>
                </form>
                
                <?php
                    foreach($comments as $comment):
                ?>
                    <div class="comment-list">
                        <div class="name-date">
                            <p class="comment-name">
                                <?= $comment['Nama'] ?>
                            </p>
                            <p class="comment-date">
                                <?php
                                    $date = date("Y-m-d");
                                    $diff = abs(strtotime($date) - strtotime($comment['date']));

                                    // $years = floor($diff / (365*60*60*24));
                                    // $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                    // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                                    echo ($diff)/60/60/24;
                                ?>
                                days ago
                            </p>
                        </div>
                        <p>
                            <?= $comment['comment'] ?>
                        </p>
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
        
    </div>
    <?php include "footer.php" ?>
    <script src="js/detailevent.js"></script>
</body>
</html>