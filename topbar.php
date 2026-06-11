

<div class="topbar">

    <div>

        <div class="topbar-greeting">

            <?php

date_default_timezone_set('Asia/Jakarta');

$jam = date("H");

if($jam >= 5 && $jam < 12){

    echo "Selamat Pagi,";

}elseif($jam >= 12 && $jam < 15){

    echo "Selamat Siang,";

}elseif($jam >= 15 && $jam < 18){

    echo "Selamat Sore,";

}else{

    echo "Selamat Malam,";

}
?>

        </div>

        <div class="topbar-name">

            <?php echo $_SESSION['user'] ?? 'Guest'; ?> 👋

        </div>

    </div>

    <div class="topbar-right">

        <div class="notif">

            <i class="bi bi-bell-fill"></i>

        </div>

       <a href="profil.php" class="avatar">
    <?php
        $nama = $_SESSION['user'] ?? 'G';
        echo strtoupper(substr($nama,0,1));
    ?>
</a>

    </div>

</div>