<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <nav id="nav">
        <div>
            <ul id="ul">
                <li>
                    <a href="home.php">
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
                    <img src="Asset/profil.png" alt="" onclick="toggleMenu()">
                </li>
                
            </ul>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <a href="" class="sub-menu-link">
                        <p>Profile</p>
                        <span>></span>
                    </a>
                    <a href="" class="sub-menu-link">
                        <p>History</p>
                        <span>></span>
                    </a>
                    <a href="" class="sub-menu-link">
                        <p>Log Out</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </div>
        
    </nav>
    <script src="js/navbar.js"></script>
</body>
</html>
