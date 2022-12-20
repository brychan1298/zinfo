<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <?php
        include 'DBconn.php';
        session_start();
        $total_cart = 0;
        $UserID = $_SESSION["id"];
        $carts = mysqli_query($conn, "SELECT * FROM cart c 
        JOIN `event` e ON c.EventID = e.EventID 
        JOIN kategori k ON k.KategoriID = e.KategoriID
        WHERE UserID = '$UserID'") or die(mysqli_error($conn));
        
        if(isset($_GET['cartID'])){
            $cartID = $_GET['cartID'];
            mysqli_query($conn, "DELETE FROM cart WHERE id = '$cartID'")or die(mysqli_error($conn));
            header('location:cart.php');
        }

        if(isset($_GET['deleteCartID'])){
            $cartID = $_GET['deleteCartID'];
            mysqli_query($conn, "UPDATE cart SET qty = qty - 1 WHERE id = '$cartID'")or die(mysqli_error($conn));
            header('location:cart.php');
        }

        if(isset($_GET['addCartID'])){
            $cartID = $_GET['addCartID'];
            mysqli_query($conn, "UPDATE cart SET qty = qty + 1 WHERE id = '$cartID'")or die(mysqli_error($conn));
            header('location:cart.php');
        }
    ?>
   
    <?php include "navbar.php" ?>
    <div class="myCart">
        <img src="Asset/blackcart.png" alt="">
        My Cart
    </div>

    <div class="checkAllBox">
        <input type="checkbox" name="" onclick="checkAll(this)" id="checkAll"> Check All
    </div>
    
    <form method="POST" action="payment.php">
        <div id="cart">
            <?php foreach($carts as $cart): ?>
            <div class="cart-list">
                <div class="cart-event">
                    <div class="cart-check">
                        <input type="checkbox" value="<?= $cart['id'] ?>" name="checkCart[]" id="" class="checkCart" onchange="addCheck(<?= $cart['Harga'] ?>)">
                    </div>

                    <img src="Asset/poster/<?= $cart["GambarPoster"] ?>" alt=""  class="cart-poster">

                    <div class="flexColumn">
                        <div class="event-type">
                            <div>
                                <?php echo $cart["Kategori"]; ?>
                            </div>  
                        </div>
                        <h2>
                            <?= $cart["Nama"] ?>
                        </h2>
                        <div class="event-list-location">
                            <div class="event-list-location-icon">
                                <img src="Asset/icon-location.png" alt="">
                            </div>
                            <div>
                                <p>
                                    <?= $cart["Alamat"] ?>
                                </p>
                            </div>
                        </div>

                        <div class="event-list-date">
                            <div class="event-list-date-icon">
                                <img src="Asset/icon-event-date.png" alt="">
                            </div>
                            <div>
                                <p>
                                    <?= $cart['Tanggal'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="qty">
                    <h1 class="qtys">Quantity</h1>
                    <div class="event-count">
                        <div>
                            <div class="minButton" onclick="reduceAmount(<?= $cart['id'] ?>,<?= $cart['qty'] ?>)">-</div>
                        </div>
                        <div class="amount">
                            <input type="text" value="<?= $cart['qty'] ?>" class="textAmount">
                        </div>
                        <div>
                            <div class="addButton" onclick="addAmount(<?= $cart['id'] ?>,<?= $cart['qty'] ?>)">+</div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="hargaEvent" value="<?=$cart['Harga'] * $cart['qty']?>">

                <div class="pojok-kanan">
                    <img src="Asset/deletecart.png" alt="" class="" onclick="deleteCart(<?= $cart['id'] ?>)">
                    <h2>
                        <?php 
                            $hasil = "Rp " . number_format($cart['Harga'] * $cart['qty'],2,',','.');
                            echo $hasil;
                        ?>
                    </h2>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="subTotal">
            <div id="subTotal1">
                <p>Subtotal</p>
                <h3 id="totalPayment">0</h3>
                <input type="hidden" name="totalPayment" id="totalPaymentHidden" value="0">
            </div>
        </div>
        <!-- <div class="subTotal">
            <h4>Please recheck your ticket before the ticket is checked out</h4>
        </div> -->
        <div class="subTotal">
            <button>
                Payment
            </button>
        </div>
    </form>
    <?php include "footer.php" ?>
    <script src="js/cart.js"></script>
</body>
</html>