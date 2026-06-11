<?php
include "koneksi.php";

if(isset($_POST['daftar'])){

    $email = $_POST['email'];
    $user  = $_POST['user'];
    $pass  = $_POST['pass'];

    $cek = mysqli_query($konek,"
        SELECT * FROM login
        WHERE user='$user'
    ");

    if(mysqli_num_rows($cek) > 0){

        echo "<script>
                alert('Username sudah digunakan!');
              </script>";

    }else{

        mysqli_query($konek,"
            INSERT INTO login(email,user,pass)
            VALUES('$email','$user','$pass')
        ");

        echo "<script>
                alert('Registrasi berhasil!');
                window.location='login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registrasi WisataKita</title>

<?php include "boot.php"; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    background:#dbe4ee;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.app{
    width:100%;
    max-width:430px;
    background:#fff;
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.hero{
    background:linear-gradient(160deg,#059669 0%,#047857 60%,#065f46 100%);
    padding:55px 30px 45px;
    text-align:center;
    position:relative;
    overflow:hidden;
}

.hero::before{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:rgba(255,255,255,.06);
    border-radius:50%;
    top:-90px;
    right:-60px;
}

.hero::after{
    content:'';
    position:absolute;
    width:160px;
    height:160px;
    background:rgba(255,255,255,.05);
    border-radius:50%;
    bottom:-50px;
    left:-40px;
}

.logo{
    width:70px;
    height:70px;
    margin:auto;
    margin-bottom:18px;
    border-radius:20px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    backdrop-filter:blur(10px);
    position:relative;
    z-index:2;
}

.logo img{
    width:100px;
    height:100px;
    object-fit:cover;
}

.hero h1{
    color:white;
    font-size:24px;
    font-weight:700;
    position:relative;
    z-index:2;
}

.hero p{
    color:rgba(255,255,255,.8);
    font-size:13px;
    margin-top:6px;
    position:relative;
    z-index:2;
}

.content{
    padding:32px 24px 36px;
}

.title{
    font-size:22px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:5px;
}

.subtitle{
    font-size:13px;
    color:#64748b;
    margin-bottom:28px;
}

.form-group{
    margin-bottom:18px;
}

.form-label{
    display:block;
    margin-bottom:8px;
    font-size:13px;
    font-weight:600;
    color:#1e293b;
}

.input-wrap{
    position:relative;
}

.icon{
    position:absolute;
    left:14px;
    top:50%;
    transform:translateY(-50%);
    color:#94a3b8;
}

.form-control{
    width:100%;
    padding:14px 16px 14px 44px;
    border:none;
    outline:none;
    background:#f1f5f9;
    border-radius:12px;
    font-size:14px;
}

.form-control:focus{
    background:#fff;
    border:2px solid #059669;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    background:#059669;
    color:white;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    margin-top:10px;
}

.btn:hover{
    background:#047857;
}

.footer{
    text-align:center;
    margin-top:24px;
    font-size:13px;
    color:#64748b;
}

.footer a{
    color:#059669;
    text-decoration:none;
    font-weight:600;
}

</style>

</head>
<body>

<div class="app">

    <div class="hero">

        <div class="logo">
            <img src="images/wisatakita.png" alt="Logo">
        </div>

        <h1>WisataKita</h1>

        <p>Jelajahi Wisata Lokal, Bandung Barat</p>

    </div>

    <div class="content">

        <h2 class="title">Buat Akun Baru</h2>

        <p class="subtitle">
            Daftar dan mulai pesan tiket wisata impianmu
        </p>

        <form method="post">

            <div class="form-group">

                <label class="form-label">Email</label>

                <div class="input-wrap">
                    <span class="icon">
                        <i class="bi bi-envelope-fill"></i>
                    </span>

                    <input
                        type="email"
                        class="form-control"
                        placeholder="nama@email.com"
                        name="email"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label class="form-label">Username</label>

                <div class="input-wrap">
                    <span class="icon">
                        <i class="bi bi-person-fill"></i>
                    </span>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Masukkan Username"
                        name="user"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label class="form-label">Password</label>

                <div class="input-wrap">
                    <span class="icon">
                        <i class="bi bi-lock-fill"></i>
                    </span>

                    <input
                        type="password"
                        class="form-control"
                        placeholder="Masukkan Password"
                        name="pass"
                        required>
                </div>

            </div>

            <button class="btn" name="daftar">
                Daftar Sekarang
            </button>

        </form>

        <div class="footer">
            Sudah punya akun?
            <a href="login.php">Masuk</a>
        </div>

    </div>

</div>

</body>
</html>