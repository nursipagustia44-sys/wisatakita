<?php

include "koneksi.php";

@$cari = $_GET['cari'];
@$kategori = $_GET['kategori'];

$query = "SELECT * FROM destinasi WHERE 1";

if($cari){
    $query .= " AND nama_destinasi LIKE '%$cari%'";
}

if($kategori && $kategori != 'Semua'){
    $query .= " AND kategori='$kategori'";
}

$tampil = $konek->query($query);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Jelajahi Wisata</title>

    <?php include "boot.php"; ?>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="jelajahi-page">

    <div class="search-wrap">

    <form method="GET">

        <div class="search">

            <i class="bi bi-search"></i>

            <input 
                type="text"
                name="cari"
                placeholder="Cari destinasi..."
                value="<?php echo $cari; ?>"
            >

            <button type="submit" hidden></button>

        </div>

    </form>

</div>

 
<div class="filter-scroll">

    <a href="jelajahi.php?kategori=Semua"
       class="filter-btn <?php if($kategori=='Semua' || !$kategori){ echo 'active'; } ?>">
        Semua
    </a>

    <a href="jelajahi.php?kategori=Alam"
       class="filter-btn <?php if($kategori=='Alam'){ echo 'active'; } ?>">
        🌿 Alam
    </a>

    <a href="jelajahi.php?kategori=Budaya"
       class="filter-btn <?php if($kategori=='Budaya'){ echo 'active'; } ?>">
        🎭 Budaya
    </a>

    <a href="jelajahi.php?kategori=Adventure"
       class="filter-btn <?php if($kategori=='Adventure'){ echo 'active'; } ?>">
        ⛰️ Adventure
    </a>

    
</div>

<div class="destination-list">

<?php foreach($tampil as $data){ ?>

<div class="destination-card"
onclick="window.location.href='detail.php?id=<?php echo $data['id']; ?>'">

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
                Rp <?php echo number_format($data['harga']); ?>
                <span>/orang</span>
            </div>

            <div class="destination-review">
                Belum ada ulasan
            </div>

        </div>

    </div>

</div>

<?php } ?>

</div>


<?php include "bottom-nav.php"; ?>

</body>
</html>