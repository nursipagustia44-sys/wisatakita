<?php
include "koneksi.php";

@$cari = $_GET['cari'];

if($cari){
    $tampil = $konek->query("
        SELECT * FROM destinasi
        WHERE nama_destinasi LIKE '%$cari%'
    ");
}else{
    $tampil = $konek->query("
        SELECT * FROM destinasi
    ");
}
?>
<?php
session_start();

include "boot.php";

if(!isset($_SESSION['user'])) {
    $_SESSION['user'] = "Pengunjung";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WisataKita</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="app">

    <?php include "topbar.php"; ?>
    
    <div class="search-wrap">
        <form method="GET">
            <div class="search">
                <i class="bi bi-search"></i>
                <input 
                    type="text"
                    name="cari"
                    placeholder="Cari destinasi wisata..."
                    value="<?php echo @$cari; ?>"
                >
            </div>
        </form>
    </div>

    <div class="banner">
        <h2>
            Jelajahi Lokal,<br>
            Bandung Barat
        </h2>
        <p>
            Temukan keindahan alam tersembunyi di antara pegunungan yang asri & sejuk
        </p>
       <div class="banner-icon">
    <img src="images/wisatakita.png"
         style="width:200px;height:200px;object-fit:contain;">
</div>
    </div>

  <div class="section">

    <div class="section-header">
        <h3>Kategori Wisata</h3>
    </div>

    <div class="categories">

        
        <div class="category"
        onclick="window.location.href='jelajahi.php?kategori=Alam'">

            <div class="category-icon bg1">🌿</div>
            <span>Alam</span>

        </div>

       
        <div class="category"
        onclick="window.location.href='jelajahi.php?kategori=Budaya'">

            <div class="category-icon bg2">🎭</div>
            <span>Budaya</span>

        </div>

       
        <div class="category"
        onclick="window.location.href='jelajahi.php?kategori=Adventure'">

            <div class="category-icon bg3">⛰️</div>
            <span>Adventure</span>

        </div>

        
        
    </div>

</div>
    <div class="section">
        <div class="section-header">
            <h3>Destinasi Populer</h3>
        </div>
        <div class="cards">

            <?php
           
            $populer = $konek->query("SELECT * FROM destinasi LIMIT 4");
            while($row_populer = $populer->fetch_assoc()) {
            ?>
                <a href="detail.php?id=<?php echo $row_populer['id']; ?>" class="card" style="text-decoration: none; color: inherit; display: block;">
                    <div class="card-image">
                        <img src="images/<?php echo $row_populer['gambar']; ?>" alt="<?php echo $row_populer['nama_destinasi']; ?>">
                        <div class="badge">
                            Alam
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <?php echo $row_populer['nama_destinasi']; ?>
                        </div>
                        <div class="card-location">
                            📍 <?php echo $row_populer['lokasi']; ?>
                        </div>
                        <div class="card-price">
                            Rp <?php echo number_format($row_populer['harga'], 0, ',', '.'); ?>
                        </div>
                    </div>
                </a>
            <?php } ?>

        </div>
    </div>
        
    <div class="section">
        <div class="section-header">
            <h3>Semua Destinasi</h3>
            <a href="#">Lihat Semua</a>
        </div>

        <div class="destination-list">
            <?php foreach($tampil as $data){ ?>
                
                <a href="detail.php?id=<?php echo $data['id']; ?>" class="destination-card" style="text-decoration: none; color: inherit; display: flex;">
                    <div class="destination-image">
                        <img src="images/<?php echo $data['gambar']; ?>" alt="">
                    </div>
                    <div class="destination-content">
                        <div class="destination-title">
                            <?php echo $data['nama_destinasi']; ?>
                        </div>
                        <div class="destination-location">
                            📍 <?php echo $data['lokasi']; ?>
                        </div>
                        <div class="destination-bottom">
                            <div class="destination-price">
                                Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?>
                                <span>/orang</span>
                            </div>
                            <div class="destination-review">
                                Belum ada ulasan
                            </div>
                        </div>
                    </div>
                </a>

            <?php } ?>
        </div>
    </div>

    <?php include "bottom-nav.php"; ?>

</div>

</body>
</html>