<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <?php
        include 'DBconn.php';
        session_start();
        $UserID = $_SESSION["id"];
        if(isset($_POST["updateProfile"])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $notelp = $_POST['notelp'];
            // $nama = $_POST['nama'];

            mysqli_query($conn, "UPDATE `user` SET Nama='$nama', Email='$email', NoTelp='$notelp'
                                WHERE UserID='$UserID'")or die(mysqli_error($conn));

            
        }
        $query = mysqli_query($conn, "SELECT * FROM `user` WHERE UserID = '$UserID'");
        $userDetail = mysqli_fetch_assoc($query);  
    ?>

    <?php include "navbar.php" ?>
    <div id="profile">
        <div id="left-profile">
            <div>
                <img src="Asset/poster/12.jpeg" alt="">
                <h3>Brychan Artanto</h3>
                <div class="profile-menu active">
                    <img src="Asset/white-profile.png" alt="">
                    <p>Profile</p>
                </div>
                <div class="profile-menu">
                    <img src="Asset/history.png" alt="">
                    <p>History</p>
                </div>
                <div class="profile-menu">
                    <img src="Asset/logout.png" alt="">
                    <p>Log Out</p>
                </div>
            </div>
        </div>

        <div id="right-profile">
            <form action="profile.php" id="myForm" method="POST">
                <div>
                    <p>
                        Account Detail
                    </p>
                    <label for="">First Name</label>
                    <div class="input-control">
                        <input type="text" name="nama" value="<?= $userDetail['Nama']?>">
                        <img src="Asset/edit.png" alt="">
                    </div>
                    <label for="">Email Address</label>
                    <div class="input-control">
                        <input type="text" name="email" value="<?= $userDetail['Email']?>">
                        <img src="Asset/edit.png" alt="">
                    </div>
                    <label for="">Mobile Number</label>
                    <div class="input-control">
                        <input type="text" name="notelp" value="<?= $userDetail['NoTelp']?>">
                        <img src="Asset/edit.png" alt="">
                    </div>
                    <!-- <label for="">Password</label>
                    <div class="input-control">
                        <input type="password" name="password" value="">
                        <img src="Asset/edit.png" alt="">
                    </div> -->
                    <div id="button">
                        <button id="saveButton" name="updateProfile" onclick="updates()">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include "footer.php" ?>
    <script src="js/profile.js"></script>
</body>
</html>