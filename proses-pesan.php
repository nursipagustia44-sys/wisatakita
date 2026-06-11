<?php

session_start();

include "koneksi.php";

$user = $_SESSION['user'];

$id_destinasi = $_POST['id_destinasi'];

$tanggal = $_POST['tanggal'];

$jumlah_tiket = $_POST['jumlah_tiket'];

/* AMBIL DATA DESTINASI */
$query = mysqli_query($konek, "
    SELECT * FROM destinasi
    WHERE id = '$id_destinasi'
");

$data = mysqli_fetch_assoc($query);

/* HARGA */
$harga = $data['harga'];

$total_harga = $harga * $jumlah_tiket;

/* STATUS */
$status = "Aktif";

/* INSERT TIKET */
mysqli_query($konek, "

    INSERT INTO tiket
    (nama_destinasi, tanggal, jumlah_tiket, total_harga, status, user)

    VALUES(

        '$data[nama_destinasi]',

        '$tanggal',

        '$jumlah_tiket',

        '$total_harga',

        '$status',

        '$user'

    )

");

header("Location: tiket.php");

exit;

?>