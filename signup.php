<?php
require 'functions.php';

if(isset($_POST["signup"]) ) {
    // ada user baru
    if(signup($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
              </script>";
    } else {
        echo "<script>
                alert('tidak terdaftar!');
              </script>";
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
    <?php include "navbar.php" ?>

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
                            <input type="tel" name="phone-number" id = "phone-number" placeholder="Phone number" required>
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
                        <div id = "login">
                            <p>Already have an account?</p>
                            <a href="login.php">LOGIN</a>
                        </div>
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
    <?php include "footer.php" ?>

    <script src="js/signup.js"></script>
</body>
</html>