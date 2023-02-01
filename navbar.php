<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <?php
        // error_reporting(E_ERROR | E_WARNING | E_PARSE);
        include 'DBconn.php';
        session_start();
        $total_cart = 0;
        if(isset($_SESSION["login"])):
            $UserID = $_SESSION["id"];
            $query = mysqli_query($conn, "SELECT * FROM cart WHERE UserID = '$UserID'");
            $profile = mysqli_query($conn, "SELECT * FROM `user` WHERE UserID = '$UserID'");
            $total_cart = mysqli_num_rows($query);
            $profiles = mysqli_fetch_assoc($profile);
        endif
    ?>
    <nav id="nav">
        <div>
            <ul id="ul">
                <li class="hideLogo">
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
                <?php if(isset($_SESSION['login'])) : ?>
                <li>
                    <a href="twibbon.php">Twibbon</a>
                </li>
                <?php else : ?>
                <li>
                    <a href="login.php">Twibbon</a>
                </li>
                <?php endif; ?>
                <?php if(!isset($_SESSION["login"])): ?>
                    <li id="loginS" onclick="location.href = 'login.php'">
                        <button>Log In</button>
                    </li>
                <?php else: ?>
                    <li class="hideLogo" id="liabsoluteS" onclick="location.href='cart.php'">
                        <a href="cart.php">
                            <img src="Asset/cart.png" alt="">
                        </a>
                        <div class="qty">
                            <?= $total_cart ?>
                        </div>
                    </li>
                    <li id="loginS">
                        <button onclick="toggleMenu()">
                            <?php 
                                // $Nama = '<pre>' . print_r($_SESSION["user"], TRUE) . '</pre>';
                                $nama = $profiles['Nama'];
                                echo $nama; 
                            ?>
                        </button>
                    </li>
                    
                    <!-- <li class="hideLogo">
                        <img src="Asset/profil.png" alt="" onclick="toggleMenu()">
                    </li> -->
                <?php endif ?>
            </ul>
        </div>
        

        <!-- RESPONSIVE MENU -->
        <div id="toggle">open</div>
        <div id="menu" class="menu-responsive">
            <i class="fa fa-bars menu" onclick="myFunction(this)">
                <!-- <img src="Asset/hamburger-icon.png">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div> -->
            </i>
        </div>
        
        <div>
            <ul id="ul2">
                <?php if(!isset($_SESSION["login"])): ?>
                    <li id="login" onclick="location.href = 'login.php'">
                        <button>Log In</button>
                    </li>
                <?php else: ?>
                    <li id="login">
                        <button onclick="toggleMenu()">
                            <?php 
                                // $Nama = '<pre>' . print_r($_SESSION["user"], TRUE) . '</pre>';
                                $nama = $profiles['Nama'];
                                echo $nama; 
                            ?>
                        </button>
                    </li>
                    <li class="hideLogo" id="liabsolute" onclick="location.href='cart.php'">
                        <a href="cart.php">
                            <img src="Asset/cart.png" alt="">
                        </a>
                        <div class="qty">
                            <?= $total_cart ?>
                        </div>
                    </li>
                    <!-- <li class="hideLogo">
                        <img src="Asset/profil.png" alt="" onclick="toggleMenu()">
                    </li> -->
                <?php endif ?>
            </ul>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                <?php if(isset($_SESSION["login"])): ?>
                    <a href="profile.php" class="sub-menu-link">
                        <p>Profile</p>
                        <span>></span>
                    </a>
                    <a href="history.php" class="sub-menu-link">
                        <p>History</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <p>Log Out</p>
                        <span>></span>
                    </a>
                <?php else: ?>
                    <a href="login.php" class="sub-menu-link">
                        <p>
                            Login
                        </p>
                    </a>
                <?php endif ?>
                </div>
            </div>
        </div>
        
    </nav>
    <script src="js/navbar.js"></script>
</body>
</html>
