<?php
session_start();

include "koneksi.php";
include "boot.php";

$user = $_SESSION['user'];


$ambil = mysqli_query($konek,
"SELECT * FROM login WHERE user='$user'");

$data = mysqli_fetch_assoc($ambil);


$total = mysqli_num_rows(mysqli_query($konek,
"SELECT * FROM tiket WHERE user='$user'"
));


$aktif = mysqli_num_rows(mysqli_query($konek,
"SELECT * FROM tiket 
WHERE user='$user'
AND status='Aktif'"
));


$selesai = mysqli_num_rows(mysqli_query($konek,
"SELECT * FROM tiket 
WHERE user='$user'
AND status='Selesai'"
));

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WisataKita</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-profil.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="profile-page">

   
    <div class="profile-header">

        
        <div class="profile-photo">
            <?= strtoupper(substr($data['user'],0,1)); ?>
        </div>

        
        <h2><?= $data['user']; ?></h2>

        <p><?= $data['user']; ?></p>

        
        <div class="profile-stats">

           <div class="stat-box">
    <a href="rekap.php?status=semua" class="stat-link">
        <h3><?= $total; ?></h3>
        <span>Total Tiket</span>
    </a>
</div>

<div class="stat-box">
    <a href="rekap.php?status=Aktif" class="stat-link">
        <h3><?= $aktif; ?></h3>
        <span>Aktif</span>
    </a>
</div>

<div class="stat-box">
    <a href="rekap.php?status=Selesai" class="stat-link">
        <h3><?= $selesai; ?></h3>
        <span>Selesai</span>
    </a>
</div>

        </div>

    </div>

    
    <div class="profile-menu">

       
        <a href="update.php" class="menu-link">

            <div class="menu-item">

                <div class="menu-left">

                    <div class="menu-icon">
                        <i class="fa-solid fa-pen"></i>
                    </div>

                    <div>
                        <h4>Edit profil dan password</h4>
                        <p>Ubah nama, password, dan info akun</p>
                    </div>

                </div>

                <span>›</span>

            </div>

        </a>

        
        <a href="tiket.php" class="menu-link">

            <div class="menu-item">

                <div class="menu-left">

                    <div class="menu-icon green">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </div>

                    <div>
                        <h4>Riwayat pesanan</h4>
                        <p>Lihat semua transaksi kamu</p>
                    </div>

                </div>

                <span>›</span>

            </div>

        </a>

    </div>

   
    <a href="logout.php" class="logout-link">

        <button class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
            Keluar
        </button>

    </a>

   
    <p class="join-date">
        made by threetill
    </p>

</div>

<?php include "bottom-nav.php"; ?>
<style>
.stat-link{
    text-decoration:none;
    color:white;
    display:block;
    width:100%;
    height:100%;
}
</style>
</body>
</html>