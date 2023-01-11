<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="css/history.css">
</head>

<body>
    <?php include "navbar.php" ?>
    <?php 
        $UserID = $_SESSION["id"];
        $query = "SELECT * FROM transactiondetail td JOIN transaction t ON t.transactionID = td.transactionID
                JOIN event e ON e.EventID = td.eventID
                JOIN kategori k ON k.KategoriID = e.KategoriID where t.userID = $UserID";
        $historys = mysqli_query($conn, $query);
        $querys = "SELECT * FROM transaction where userID = $UserID";
        $transactions = mysqli_query($conn, $querys);

    ?>
    <div class="History">
        <img src="Asset\Vector.png" alt="">HISTORY
    </div>

    <?php foreach($transactions as $transaction): ?>
        <?php
            $transactionID = $transaction['transactionID'];
            $query = "SELECT * FROM transactiondetail td JOIN transaction t ON t.transactionID = td.transactionID
            JOIN event e ON e.EventID = td.eventID
            JOIN kategori k ON k.KategoriID = e.KategoriID where td.transactionID = $transactionID";
            $historys = mysqli_query($conn, $query);
            $totalHarga = 0;
        ?>

        <?php 
            foreach($historys as $history): 
            $totalHarga += $history["Harga"] * $history["qty"];

        ?>
        <div class="list">
            <img src="Asset\poster\<?= $history['GambarPoster'] ?>" alt="">
            
            <div class="event">
                <div class="category">
                    <?= $history['Kategori'] ?>
                </div>
        
                <h2>
                    <?= $history['Nama'] ?>
                </h2>

                <div class="tanggal_event">
                    <img src="Asset\calendar.png" alt="">
                    <?php
                        $orgDate = $history["Tanggal"];
                        // echo $orgDate;
                        $date=date_create($orgDate);
                        echo date_format($date,"d F Y");
                    ?>
                </div>

                <div class="status">
                    <p class="st">Status :</p>
                    <?php
                        date_default_timezone_set('Asia/Indonesia');
                        if($history["Tanggal"]<=date("Y-m-d")):
                    ?>
                        <p class="isi-st4">Event Finished</p>
                    <?php
                        endif;
                    ?>
                </div>
            </div>            
        </div>
        <?php endforeach; ?>
        <div class="price">
            <div class="price_status">
                <p class="st">Status :</p>
                <?php
                    if($history["status"]=="BELUM"):
                ?>
                    <p class="isi-st">Waiting for Payment</p>
                <?php else: ?>
                    <p class="isi-st3">Confirmed</p>
                <?php endif; ?>
            </div>
            <div class="price_feedback">
                
                <h2 class="total">
                    <?php
                        $hasil = "Rp " . number_format($totalHarga,2,',','.');
                        echo $hasil;
                    ?>    
                </h2>
                <?php
                    if($history["status"]=="BELUM"):
                ?>
                <form method="POST" action="uploadproof.php">
                    <input type="hidden" value="<?=$transaction['transactionID']?>" name="transactionID" >
                    <button class="feedback">Bayar Sekarang</button>
                </form>
                <?php else: ?>
                    <button class="feedback">Feedback</button>
                <?php endif; ?>
                
            </div>
        </div>
        
    <?php endforeach; ?>
    

    <!--  -->
    <?php include "footer.php" ?>
</body>
</html>