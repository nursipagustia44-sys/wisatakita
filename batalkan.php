<?php

include "koneksi.php";

$id = $_GET['id'];

mysqli_query($konek, "
    UPDATE tiket
    SET status='Dibatalkan'
    WHERE id='$id'
");

header("Location: tiket.php");
exit;