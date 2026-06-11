<?php
include "koneksi.php";
include "boot.php";
$query = mysqli_query($konek,"
SELECT * FROM tiket
ORDER BY id DESC
");

$total = mysqli_num_rows($query);

$aktif = mysqli_num_rows(mysqli_query($konek,"
SELECT * FROM tiket
WHERE status='Aktif'
"));

$selesai = mysqli_num_rows(mysqli_query($konek,"
SELECT * FROM tiket
WHERE status='Selesai'
"));

$dibatalkan = mysqli_num_rows(mysqli_query($konek,"
SELECT * FROM tiket
WHERE status='Dibatalkan'
"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Rekap Pemesanan</title>

<link rel="stylesheet" href="style.css">

<style>

body{
    font-family:'Poppins',sans-serif;
    background:#dbe4ee;
    margin:0;
    padding:20px;
}

.container{
    max-width:900px;
    margin:auto;
}

.header{
    background:#059669;
    color:white;
    padding:25px;
    border-radius:20px;
    margin-bottom:20px;
}

.header h2{
    margin:0;
}

.summary{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:15px;
    margin-bottom:20px;
}

.card{
    background:white;
    border-radius:18px;
    padding:20px;
    text-align:center;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.card h3{
    margin:0;
    font-size:30px;
    color:#059669;
}

.card p{
    margin-top:8px;
    color:#64748b;
}

.table-box{
    background:transparent;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
    
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#059669;
    color:white;
    padding:14px;
}

td{
    padding:12px;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f8fafc;
}

.badge{
    padding:6px 12px;
    border-radius:20px;
    color:white;
    font-size:12px;
}

.aktif{
    background:#10b981;
}

.selesai{
    background:#3b82f6;
}

.dibatalkan{
    background:#ef4444;
}
.btn-kembali{
    display:inline-block;
    margin-bottom:15px;
    padding:10px 18px;
    background:white;
    color:#059669;
    text-decoration:none;
    border-radius:12px;
    font-weight:600;
}

.btn-kembali:hover{
    background:#f8fafc;
}
.rekap-card{
    background:white;
    border-radius:20px;
    padding:20px;
    margin-top:20px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
    overflow:hidden;
}
</style>

</head>

<body>

<div class="container">

    <div class="header">
         <a href="profil.php" class="btn-kembali">
         <i class="bi bi-arrow-left">Kembali</i>
    </a>
        <h2>📊 Rekap Pemesanan Tiket</h2>
        <p>Data seluruh pemesanan tiket wisata</p>
    </div>
<div class="rekap-card">
    <div class="summary">

        <div class="card">
            <h3><?= $total ?></h3>
            <p>Total Pemesanan</p>
        </div>

        <div class="card">
            <h3><?= $aktif ?></h3>
            <p>Tiket Aktif</p>
        </div>

        <div class="card">
            <h3><?= $selesai ?></h3>
            <p>Tiket Selesai</p>
        </div>

        <div class="card">
            <h3><?= $dibatalkan ?></h3>
            <p>Tiket Dibatalkan</p>
        </div>

    </div>

    <div class="table-box">

        <table>

            <tr>
                <th>No</th>
                <th>Destinasi</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </tr>

            <?php
            $no = 1;

            $data = mysqli_query($konek,"
            SELECT * FROM tiket
            ORDER BY id DESC
            ");

            while($row = mysqli_fetch_assoc($data)){
            ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= $row['nama_destinasi'] ?></td>

                <td><?= $row['tanggal'] ?></td>

                <td><?= $row['jumlah_tiket'] ?></td>

                <td>
                    Rp <?= number_format($row['total_harga'],0,',','.') ?>
                </td>
                <td><?= $row['status'] ?></td>
                <td>

                    <?php
                    if($row['status']=="Aktif"){
                        echo "<span class='badge aktif'>Aktif</span>";
                    }
                    elseif($row['status']=="Selesai"){
                        echo "<span class='badge selesai'>Selesai</span>";
                    }
                    else{
                        echo "<span class='badge dibatalkan'>Dibatalkan</span>";
                    }
                    ?>

                </td>

            </tr>

            <?php } ?>

        </table>
</div>
    </div>
<?php include "bottom-nav.php"; ?>
</div>

</body>
</html>