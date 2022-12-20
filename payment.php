<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>

    <?php include "navbar.php" ?>
    <?php
        session_start();
        include "DBconn.php";
    ?>
    <div id="payment">
        <div id="payment-1">
            <h2>Payment</h2>
            <p id="payment-child1">Make a Payment of:</p>
            <p class="payment-child2">
                <?php
                    if(isset($_POST['totalPayment'])){
                        $hasil = "Rp " . number_format($_POST['totalPayment'],2,',','.'); 
                        echo $hasil;
                    }else if(isset($_POST['eventID'])){
                        $eventID = $_POST['eventID'];
                        $events = mysqli_query($conn, "SELECT * FROM `event`
                                                    where EventID='$eventID'") or die(mysqli_error($conn));
                        $event = mysqli_fetch_assoc($events);
                        echo "Rp " . number_format($_POST['qty']*$event['Harga'],2,',','.');
                    }
                ?>
            </p>
            <?php
                if(isset($_POST['checkCart'])):
                    foreach ($_POST['checkCart'] as $cart):
                        $events = mysqli_query($conn, "SELECT * FROM cart c
                                                    JOIN event e ON e.EventID = c.EventID 
                                                    where id='$cart'") or die(mysqli_error($conn));
                        $event = mysqli_fetch_assoc($events);
            ?>
                        <div class="payment-child3">(<?=$event['qty']?>X <?=$event['Nama']?> - <b><?="Rp " . number_format(($event['qty']*$event['Harga']),2,',','.')?></b>)</div>
            <?php
                    endforeach;
                endif;
            ?>

            <?php
                if(isset($_POST['eventID'])):
                    
            ?>
                    <div class="payment-child3">(<?=$_POST['qty']?>X <?=$event['Nama']?> - <b><?="Rp " . number_format(($_POST['qty']*$event['Harga']),2,',','.')?></b>)</div>
            <?php
                    
                endif;
            ?>
        </div>

        <div id="payment-2">
            <p id="payment-2-2">To</p>
            <img src="Asset/bca-logo.png" alt="" id="payment-2-3">
            <div id="account-info">
                <div id="account-info-1">Account No : </div>
                <div id="account-info-2">5204130212</div>
                <div id="account-info-3">
                    <img src="Asset/icon-copy.png" alt="">
                </div>
                <div id="account-info-4">
                    copy
                </div>
            </div>
        </div>

        <div id="payment-3">
            <div>
                Payment Instruction
            </div>
            <div>
                >
            </div>
        </div>

        <div id="payment-4">
            Note : Please keep your payment evidence
        </div>

        <div id="payment-5">
            <button>
                Confirm
            </button>
        </div>
    </div>

    <?php include "footer.php" ?>
</body>
</html>