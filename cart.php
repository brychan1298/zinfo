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
    <?php include "navbar.php" ?>
    <div class="myCart">
        <img src="Asset/blackcart.png" alt="">
        My Cart
    </div>

    <div class="checkAllBox">
        <input type="checkbox" name="" id="checkAll"> Check All
    </div>

    <div id="cart">
        <div class="cart-list">
            <div class="cart-event">
                <div class="cart-check">
                    <input type="checkbox" name="" id="">
                </div>

                <img src="Asset/poster/10.jpeg" alt=""  class="cart-poster">

                <div class="flexColumn">
                    <div class="event-type">
                        <div>
                            Concert
                        </div>  
                    </div>
                    <h2>
                        Stray Kids 2nd World Tour “Maniac” in Jakarta
                    </h2>
                    <div class="event-list-location">
                        <div class="event-list-location-icon">
                            <img src="Asset/icon-location.png" alt="">
                        </div>
                        <div>
                            <p>
                                Beach City International Stadium
                            </p>
                        </div>
                    </div>

                    <div class="event-list-date">
                        <div class="event-list-date-icon">
                            <img src="Asset/icon-event-date.png" alt="">
                        </div>
                        <div>
                            <p>
                                November 12th 2022
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="qty">
                <h1 class="qtys">Quantity</h1>
                <div class="event-count">
                    <div>
                        <button class="minButton" onclick="reduceAmount()">-</button>
                    </div>
                    <div class="amount">
                        <input type="text" value="0" class="textAmount">
                    </div>
                    <div>
                        <button class="addButton" onclick="addAmount()">+</button>
                    </div>
                </div>
            </div>
            

            <div class="pojok-kanan">
                <img src="Asset/deletecart.png" alt="">
                <h2>
                    Rp 398.000,00
                </h2>
            </div>
        </div>
    </div>

    <div class="subTotal">
        <div id="subTotal1">
            <p>Subtotal</p>
            <h3>Rp 0,00</h3>
        </div>
    </div>
    <div class="subTotal">
        <h4>Please recheck your ticket before the ticket is checked out</h4>
    </div>
    <div class="subTotal">
        <button>
            Payment
        </button>
    </div>
</body>
</html>