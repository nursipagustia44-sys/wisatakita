<?php
include "koneksi.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT * FROM destinasi WHERE id = '$id'";
$ambil = $konek->query($query);
$data  = $ambil->fetch_assoc();

if (!$data) {
    echo "Destinasi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail - <?php echo $data['nama_destinasi']; ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="style-detail.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="app-detail">

        <!-- Tombol Kembali -->
        <div class="detail-back-nav">
            <a href="dashboard.php" class="btn-back-circle">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>

        <!-- Grid: Gambar Kiri + Konten Kanan -->
        <div class="detail-grid">

            <!-- KIRI: Gambar -->
            <div class="detail-image-box">
                <img src="images/<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama_destinasi']; ?>">
            </div>

            <!-- KANAN: Informasi -->
            <div class="detail-content">

                <div class="title-section">
                    <h2 class="detail-title"><?php echo $data['nama_destinasi']; ?></h2>
                    <span class="badge-kategori">Wisata</span>
                </div>

                <p class="detail-location">
                    <i class="bi bi-geo-alt-fill"></i> <?php echo $data['lokasi']; ?>
                </p>

                <div class="price-card">
                    <div class="price-left">
                        <span class="price-label">Harga Tiket</span>
                        <h3 class="price-value">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?><span class="price-per">/orang</span></h3>
                    </div>
                    <div class="price-right">
                        <span class="review-status">Belum ada ulasan</span>
                    </div>
                </div>

                <div class="detail-tabs">
                    <div class="tab-item active">Deskripsi</div>
                    <div class="tab-item">Ulasan (0)</div>
                </div>

                <div class="detail-description">
                    <p>Nikmati pesona keindahan tersembunyi yang asri dan sejuk di <?php echo $data['nama_destinasi']; ?>. Destinasi pilihan terbaik di kawasan Bandung Barat yang menyajikan panorama memukau, cocok untuk menghabiskan waktu bersama keluarga atau teman dekat.</p>
                </div>

                <h4 class="sub-title">Fasilitas</h4>
                <div class="facilities-grid">
                    <?php 
                    if(!empty($data['fasilitas'])) {
                        $list_fasilitas = explode(',', $data['fasilitas']);
                        foreach($list_fasilitas as $fsl) {
                            echo '<div class="facility"><i class="bi bi-check2"></i> ' . trim($fsl) . '</div>';
                        }
                    } else {
                        echo '<div class="facility" style="grid-column: span 2; color: #94a3b8;">Fasilitas belum tersedia.</div>';
                    }
                    ?>
                </div>

                <a href="pesan.php?id=<?php echo $id; ?>" class="btn-pesan">
    <i class="bi bi-ticket-perforated"></i> Pesan Tiket Sekarang
</a>
            </div>
            <!-- akhir .detail-content -->

        </div>
        <!-- akhir .detail-grid -->

    </div>

</body>
</html>