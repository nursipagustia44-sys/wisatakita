<?php
include "koneksi.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = mysqli_query($konek, "SELECT * FROM tiket WHERE id = $id LIMIT 1");
$tiket = mysqli_fetch_assoc($query);

if (!$tiket) {
    header("Location: tiket-saya.php");
    exit;
}

$bulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
$ts = strtotime($tiket['tanggal']);
$tanggal = date('j', $ts) . ' ' . $bulan[(int)date('n', $ts)] . ' ' . date('Y', $ts);

$harga_satuan = $tiket['total_harga'] / $tiket['jumlah_tiket'];
$nomor = str_pad($tiket['id'], 3, '0', STR_PAD_LEFT);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>
    <link rel="stylesheet" href="style-detail-tiket.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="detail-wrap">

    <div class="detail-nav">
        <a href="tiket.php"><i class="bi bi-arrow-left"></i></a>
        <h1>Detail Tiket</h1>
        <span></span>
    </div>

    <div class="detail-body">

        <div class="kode-box">
            <p>Kode Pemesanan</p>
            <h2>TIKET<?= $nomor ?></h2>
            <small>Tunjukkan kode ini di lokasi wisata</small>
        </div>

        <div class="info-box">
            <h3><?= htmlspecialchars($tiket['nama_destinasi']) ?></h3>
        </div>

        <div class="info-box">
            <p class="box-title">DETAIL PEMESANAN</p>
            <div class="row-item">
                <span>Tanggal Kunjungan</span>
                <strong><?= $tanggal ?></strong>
            </div>
            <div class="row-item">
                <span>Jumlah Tiket</span>
                <strong><?= $tiket['jumlah_tiket'] ?> Orang</strong>
            </div>
            <div class="row-item">
                <span>Harga per Tiket</span>
                <strong>Rp <?= number_format($harga_satuan, 0, ',', '.') ?></strong>
            </div>
            <hr>
            <div class="row-item total">
                <span>Total Dibayar</span>
                <strong>Rp <?= number_format($tiket['total_harga'], 0, ',', '.') ?></strong>
            </div>
        </div>
<?php if($tiket['status'] == 'Aktif'){ ?>

<div class="action-area">
    <a href="batalkan.php?id=<?php echo $tiket['id']; ?>"
       class="btn-batal"
       onclick="return confirm('Yakin ingin membatalkan tiket ini?')">
       Batalkan
    </a>
</div>

<?php } ?>
    </div>

</div>

</body>
</html>