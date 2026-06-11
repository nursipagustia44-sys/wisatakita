<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="bottom-nav">

    <a href="dashboard.php" class="nav-item <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
        <div class="nav-icon">
            <i class="bi bi-house-fill"></i>
        </div>
        <span>Beranda</span>
    </a>

    <a href="jelajahi.php" class="nav-item <?php echo ($current_page == 'jelajahi.php') ? 'active' : ''; ?>">
        <div class="nav-icon">
            <i class="bi bi-search"></i>
        </div>
        <span>Jelajahi</span>
    </a>

    <a href="tiket.php" class="nav-item <?php echo ($current_page == 'tiket.php') ? 'active' : ''; ?>">
        <div class="nav-icon">
            <i class="bi bi-clock-history"></i>
        </div>
        <span>Tiket</span>
    </a>

    <a href="profil.php" class="nav-item <?php echo ($current_page == 'profil.php') ? 'active' : ''; ?>">
        <div class="nav-icon">
            <i class="bi bi-person-fill"></i>
        </div>
        <span>Profil</span>
    </a>

</div>