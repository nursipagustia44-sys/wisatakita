<?php
include "koneksi.php";

$filter = isset($_GET['status']) ? $_GET['status'] : 'semua';

$where = "";
if ($filter === 'aktif')          $where = "WHERE status = 'Aktif'";
elseif ($filter === 'selesai')    $where = "WHERE status = 'Selesai'";
elseif ($filter === 'dibatalkan') $where = "WHERE status = 'Dibatalkan'";

$query = mysqli_query($konek, "SELECT * FROM tiket $where ORDER BY id DESC");
$jumlah = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Saya</title>
       <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-tiket.css">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="ticket-app">

    <div class="ticket-header">
        <h2 class="ticket-title">Tiket Saya</h2>

        <div class="ticket-filter">
            <a href="?status=semua"      class="filter-btn <?= $filter === 'semua'      ? 'active' : '' ?>">Semua</a>
            <a href="?status=aktif"      class="filter-btn <?= $filter === 'aktif'      ? 'active' : '' ?>">Aktif</a>
            <a href="?status=selesai"    class="filter-btn <?= $filter === 'selesai'    ? 'active' : '' ?>">Selesai</a>
            <a href="?status=dibatalkan" class="filter-btn <?= $filter === 'dibatalkan' ? 'active' : '' ?>">Dibatalkan</a>
        </div>
    </div>
<div class="ticket-grid">
    <?php if ($jumlah === 0) { ?>

        <div class="empty-ticket">
            <i class="bi bi-ticket-perforated empty-icon"></i>
            <h2>Belum Ada Tiket</h2>
            <p>Kamu belum memesan tiket wisata.</p>
            <a href="jelajahi.php" class="btn-pesan">Pesan Sekarang</a>
        </div>

    <?php } else { 
        while ($tiket = mysqli_fetch_assoc($query)) {
            $status = $tiket['status'];

            if ($status === 'Aktif')          $badge = 'badge-aktif';
            elseif ($status === 'Selesai')    $badge = 'badge-selesai';
            elseif ($status === 'Dibatalkan') $badge = 'badge-dibatalkan';
            else                              $badge = 'badge-aktif';

            $nomor = str_pad($tiket['id'], 3, '0', STR_PAD_LEFT);
    ?>

        <div class="ticket-card">

            <div class="ticket-top">
                <div>
                    <h2><?= htmlspecialchars($tiket['nama_destinasi']) ?></h2>
                    <span class="ticket-id">#TIKET<?= $nomor ?></span>
                </div>
                <span class="badge <?= $badge ?>"><?= $status ?></span>
            </div>

            <hr>

            <div class="ticket-detail">
                <div class="detail-item">
                    <p>Tanggal</p>
                    <h4><?= $tiket['tanggal'] ?></h4>
                </div>
                <div class="detail-item">
                    <p>Jumlah Tiket</p>
                    <h4><?= $tiket['jumlah_tiket'] ?> Orang</h4>
                </div>
                <div class="detail-item">
                    <p>Total Bayar</p>
                    <h4>Rp <?= number_format($tiket['total_harga'], 0, ',', '.') ?></h4>
                </div>
            </div>

            <hr>

            <div class="ticket-action">
                <a href="detail-tiket.php?id=<?= $tiket['id'] ?>" class="btn-detail">
                    Lihat Detail
                </a>
            </div>

        </div>

    <?php } } ?>

</div>
</div>

<?php include "bottom-nav.php"; ?>

</body>
</html>