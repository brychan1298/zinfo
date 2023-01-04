<?php
// koneksi ke database

$conn = mysqli_connect("localhost", "root", "", "zinfo");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows = $row;
    }
    return $rows;
}

function signup($data) {
    global $conn;

    $username = stripslashes($data["username"]);
    $phone = $data["phone-number"];
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    echo "<script>
                alert('email sudah terdaftar!')
              </script>";

    // cek email udh ada atau belom
    $result = mysqli_query($conn, "SELECT Email FROM user 
        WHERE Email = '$email'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('email sudah terdaftar!')
              </script>";
        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user(`Nama`, `Email`, `Password`, `TanggalLahir`, `JenisKelamin`, `NoTelp`) VALUES
        ('$username', '$email', '$password', '1970-11-02', '', '$phone')");

    return mysqli_affected_rows($conn);
}

?>