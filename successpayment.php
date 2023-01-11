<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/successpayment.css">
</head>
<body>

    <?php include "navbar.php" ?>
    <?php
        $profile = mysqli_query($conn, "SELECT * FROM `user` WHERE UserID = '$UserID'");
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM transactiondetail td JOIN event e ON e.EventID = td.eventID
                                    JOIN kategori k ON k.KategoriID = e.KategoriID WHERE transactiondetailID = '$id'");
        $data = mysqli_fetch_assoc($query);
    ?>
    <div id="success">
        <h2>Pembayaran Berhasil!</h2>
        <img src="Asset/QR.png" alt="">
        <h3>Tunjukkan QR di atas sebagai tiket event</h3>
        <p>Detail Transaksi</p>

        <div id="success-2">
            <div>
                Nama : 
                <label>
                    <?php
                        $nama = $profiles['Nama'];
                        echo $nama; 
                    ?>
                </label>
            </div>
            <div>
                No Transaksi : 
                <!-- SKWF/08/2022/017 -->
                <label>
                    <?php
                        $kategori = $data['Kategori'];
                        $transactionID = $data['transactionID'];
                        $date=date_create($data["Tanggal"]);
                        $year = date_format($date,"Y");
                        
                        echo substr(strtoupper($kategori),0 ,4)."/".$transactionID."/".$year."/".$id;
                    ?>
                </label>
            </div>
            <div>
                Kode Booking : 
                <label>
                    <?php
                        echo $data['kodeBooking'];
                    ?>
                </label>
            </div>
            <div>
                Nama Event : 
                <label>
                    <?php
                        echo $data['Nama'];
                        
                    ?>
                </label>
            </div>
            <div>
                Tanggal Event : 
                <label>
                    <?php  
                        $orgDate = $data["Tanggal"];
                        // echo $orgDate;
                        $date=date_create($orgDate);
                        echo date_format($date,"d F Y");
                    ?>
                </label>
            </div>
            <!-- <div>
                Waktu Event : <label>17.00 - 21.00 WIB</label>
            </div> -->
            <div>
                Lokasi Event : 
                <label>
                    <?php  
                        echo $data['Alamat']
                    ?>  
                </label>
            </div>
            <div>
                Harga Tiket : 
                <label>
                    <?php 
                        if($data["Harga"]!=0):
                            $hasil = "Rp " . number_format($data["Harga"],2,',','.');
                            echo $hasil;
                        else:
                    ?>
                        Free
                    <?php endif; ?>  
                </label>
            </div>
            <div>
                Jumlah Tiket : 
                <label>
                    <?php  
                        echo $data['qty'];
                    ?>  
                </label>
            </div>
            <div>
                Total Harga : 
                <label>
                    <?php 
                        if($data["Harga"]!=0):
                            $hasil = "Rp " . number_format($data['qty']*$data["Harga"],2,',','.');
                            echo $hasil;
                        else:
                    ?>
                        Free
                    <?php endif; ?>  
                </label>
            </div>
        </div>

        <div id="success-3">
            <button>Cari Event Lain</button>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>