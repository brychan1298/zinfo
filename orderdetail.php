<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/orderdetail.css">
</head>
<body>

    <?php include "navbar.php" ?>

    <div id="detail">
        <h2>
            Order Detail
        </h2>

        <div id="column">
            <div id="desc">
                Description
            </div>
            <div id="qty">
                Qty
            </div>
            <div id="price">
                Price
            </div>
            <div id="total">
                Total
            </div>
        </div>

        <div class="column">
            <div class="desc">
                <div>
                    Stray Kids 2nd World Tour Ticket
                </div>
                <div class="desc-tanggal">
                    <img src="Asset/icon-dot.png" alt=""> 13 November 2022  17.00-21.00
                </div>
                
            </div>
            <div class="qty">
                2
            </div>
            <div class="price">
                Rp. 199.000,00
            </div>
            <div class="total">
                Rp. 398.000,00
            </div>
        </div>

        <div id="payment">
            <div>
                <div>Payment Method : Bank Transfer</div>
            </div>
            <div id="payment-button">
                <button>
                    Continue Payment
                </button>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>
</body>
</html>