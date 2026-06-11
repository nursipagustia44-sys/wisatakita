<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($konek, "SELECT * FROM destinasi WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "Data tidak ditemukan";
    exit;
}

$harga = $data['harga'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesan Tiket</title>

    <link rel="stylesheet" href="style-pesan.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="pesan-app">

    <!-- HEADER -->
    <div class="pesan-header">

        <a href="detail.php?id=<?php echo $id; ?>" class="btn-back">
            <i class="bi bi-arrow-left"></i>
        </a>

        <h2 class="pesan-title">
            Pesan Tiket
        </h2>

    </div>

    <!-- CARD DESTINASI -->
    <div class="destinasi-card">

        <div class="destinasi-img-wrap">

            <img src="images/<?php echo $data['gambar']; ?>">

        </div>

        <div class="destinasi-info">

            <h2 class="destinasi-name">
                <?php echo $data['nama_destinasi']; ?>
            </h2>

            <p class="destinasi-loc">

                <i class="bi bi-geo-alt-fill"></i>

                <?php echo $data['lokasi']; ?>

            </p>

            <div class="destinasi-meta">

                <span class="badge-kategori">
                    Wisata
                </span>

                <span class="destinasi-harga">

                    Rp <?php echo number_format($harga,0,',','.'); ?>/orang

                </span>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <form action="proses-pesan.php" method="POST">

        <input type="hidden" name="id_destinasi" value="<?php echo $id; ?>">

        <div class="form-section">

            <h3 class="section-title">
                Detail Pemesanan
            </h3>

            <!-- TANGGAL -->
            <div class="form-group">

                <label class="form-label">
                    Tanggal Kunjungan
                </label>

                <div class="input-icon-wrap">

                    <i class="bi bi-calendar3"></i>

                    <input 
                        type="date"
                        name="tanggal"
                        class="input-date"
                        min="<?php echo date('Y-m-d'); ?>"
                        value="<?php echo date('Y-m-d'); ?>"
                        required
                    >

                </div>

            </div>

            <!-- JUMLAH -->
            <div class="form-group">

                <label class="form-label">
                    Jumlah Tiket
                </label>

                <div class="qty-wrap">

                    <div class="qty-control">

                        <button type="button" class="qty-btn" id="btn-minus">
                            -
                        </button>

                        <span class="qty-value" id="qty-display">
                            1
                        </span>

                        <button type="button" class="qty-btn" id="btn-plus">
                            +
                        </button>

                    </div>

                    <span class="qty-info">
                        Maks. 10 tiket
                    </span>

                </div>

                <input 
                    type="hidden"
                    name="jumlah_tiket"
                    id="jumlah_tiket"
                    value="1"
                >

            </div>

        </div>

        <!-- FOOTER -->
        <div class="pesan-footer">

            <div class="total-wrap">

                <span class="total-label">
                    Total Pembayaran
                </span>

                <span class="total-value" id="total-harga">

                    Rp <?php echo number_format($harga,0,',','.'); ?>

                </span>

            </div>

            <button type="submit" class="btn-bayar">
                Bayar Sekarang
            </button>

        </div>

    </form>

</div>

<script>

let harga = <?php echo $harga; ?>;

let jumlah = 1;

let qtyDisplay = document.getElementById('qty-display');

let jumlahInput = document.getElementById('jumlah_tiket');

let totalHarga = document.getElementById('total-harga');

let btnPlus = document.getElementById('btn-plus');

let btnMinus = document.getElementById('btn-minus');

function updateTotal(){

    qtyDisplay.innerHTML = jumlah;

    jumlahInput.value = jumlah;

    let total = harga * jumlah;

    totalHarga.innerHTML = 'Rp ' + total.toLocaleString('id-ID');

}

btnPlus.onclick = function(){

    if(jumlah < 10){

        jumlah++;

        updateTotal();

    }

}

btnMinus.onclick = function(){

    if(jumlah > 1){

        jumlah--;

        updateTotal();

    }

}

updateTotal();

</script>

</body>
</html>