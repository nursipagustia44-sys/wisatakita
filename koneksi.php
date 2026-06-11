<?php

$konek = new mysqli("localhost", "root", "", "wisata_kita");

if($konek->connect_error){
    die("Koneksi gagal: " . $konek->connect_error);
}

?>