<?php
require 'functions.php';

if(isset($_POST["signup"]) ) {
    // ada user baru
    if(signup($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <!-- NAVBAR -->
    <nav id="nav">
        <div>
            <ul id="ul">
                <li>
                    <a href="Beranda.html">
                        <img src="Asset/Logo Zinfo 2.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="Tentang.html">Home</a>
                </li>
                <li>
                    <a href="Materi.html">About Us</a>
                </li>
                <li>
                    <a href="Mengajar.html">Event</a>
                </li>
                <li>
                    <a href="Daftar.html">Twibbon</a>
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
                    <a href="">
                        <img src="Asset/profil.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sign In -->
    <div class="container-wrapper">
        <div class="left-wrapper">
            <div>
                <h1>Register a new account</h1>
                <div>
                    <ul>
                        <li>
                            <a href="">
                                <img src="Asset/icon-Google.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="Asset/icon-Facebook.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="Asset/icon-Line.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <p>or Register with your email id</p>

                <div class="form-inner">
                    <form action="" method="POST" id="formSignUp">
                        <div id = 'user-form'>
                            <img src="Asset/icon-person.png" alt="">
                            <input type="text" name="username" id = "username" placeholder="Full Name" required>
                        </div>
                        <div id = 'phone-form'>
                            <img src="Asset/icon-phone.png" alt="">
                            <input type="tel" name="phone-number" id = "phone-number" pattern="[0-9]{12}" placeholder="Phone number" required>
                        </div>
                        <div id = 'email-form'>
                            <img src="Asset/icon-email2.png" alt="">
                            <input type="text" name="email" id = "email" placeholder="Email address" required>
                        </div>
                        <div id = "pass-form">
                            <img id = "lock" src="Asset/icon-lock.png" alt="">
                            <img id = "eye" src="Asset/icon-eye-hide.png" alt="">
                            <img id = "eye2" src="Asset/icon-eye.png" alt="" hidden>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="cbox">
                            <input type="checkbox" name="tnc" id="tnc" required>
                            <label for="tnc">I've read and agreed with the terms and condition*</label>
                        </div>

                        <button name = "signup" id="btnSubmit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="right-wrapper">
            <div>
                <h1>Hello Friend !</h1>
                <div>
                    <p>Please provide the information to register your account</p>
                </div>
                <p>Already have an account? Sign In</p>
                <a href="login.php">Sign In</a>
            </div>
        </div>
    </div>
    
    <!-- FOOTER -->
    <div id="footer-wrapper">
        <div id="footer">
            <div class="footer-box1 a">
                <img src="Asset/Logo ZInfo 2.png" alt="">
            </div>
            <div class="footer-box2 a">
                <h2>ZInfo</h2>
    
                <p>About Us</p>
                <p>Event</p>
                <p>Twibbon</p>
            </div>
            <div class="footer-box3 a">
                <h2>Copyright</h2>
    
                <p>Privacy Policy</p>
                <p>Terms & Condition</p>
            </div>
            <div class="footer-box4 a">
                <h2>Follow Us</h2>
    
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-ig.png" alt="">
                    </div>
                    <div>
                        Instagram
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-fb.png" alt="">
                    </div>
                    <div>
                        Facebook
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-twitter.png" alt="">
                    </div>
                    <div>
                        Twitter
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-tiktok.png" alt="">
                    </div>
                    <div>
                        Tik Tok
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-youtube.png" alt="">
                    </div>
                    <div>
                        Youtube
                    </div>
                </div>
            </div>
            <div class="footer-box5 a">
                <h2>Contact Us</h2>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-wa.png" alt="">
                    </div>
                    <div>
                        (+1) 415 1234567
                    </div>
                </div>
                <div class="footer-follow-us">
                    <div>
                        <img src="Asset/icon-email.png" alt="">
                    </div>
                    <div>
                        info@zinfo.co
                    </div>
                </div>
            </div>
        </div>

        <h4>© 2022 ZInfo. All rights reserved.</h4>
    </div>
    <script src="js/signup.js"></script>
</body>
</html>