<?php
require 'functions.php';

if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE Email = '$email'");

    // cek email
    if(mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row["Password"])) {
            header("Location: home.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- NAVBAR -->
    <?php include "navbar.php" ?>

    <!-- Sign In -->
    <div class="container-wrapper">
        <div class="left-wrapper">
            <div>
                <h1>Welcome Back !</h1>
                <div>
                    <p>Please Sign In into your account with the given details to continue</p>
                </div>
                <p>New here? create a new account</p>
                <a href="signup.php">Sign Up</a>
            </div>
        </div>

        <div class="right-wrapper">
            <div>
                <h1>Sign In to your account</h1>
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
                <p>or Sign In with your email id</p>

                <div class="form-inner">
                    <form action="" method="POST" id="formSignUp">
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

                        <?php if(isset($error)) : ?>
                            <p style = "color:red; font-style:italic;">email / password salah</p>
                        <?php endif; ?>
                        
                        <p>Forgot password?</p>
                        <button type="submit" name="login" id="btnSubmit">Sign In</button>
                    </form>
                </div>
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
    <script src="js/login.js"></script>
</body>
</html>