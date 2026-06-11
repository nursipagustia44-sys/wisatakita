<?php
session_start();

include "koneksi.php";
include "boot.php";

if(isset($_POST['login'])){

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $cari = $konek->query("SELECT * FROM login 
                           WHERE user='$user' 
                           AND pass='$pass'");

    if($cari->num_rows > 0){

        $data = $cari->fetch_assoc();

        $_SESSION['user'] = $data['user'];

        header("Location: dashboard.php");
        exit;

    } else {
        echo "<script>
            alert('Username atau password salah!');
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
  <title>Login WisataKita</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
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
      box-shadow:0 10px 30px rgba(0,0,0,0.1);
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
      background:rgba(255,255,255,0.06);
      border-radius:50%;
      top:-90px;
      right:-60px;
    }

    .hero::after{
      content:'';
      position:absolute;
      width:160px;
      height:160px;
      background:rgba(255,255,255,0.05);
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
      background:rgba(255,255,255,0.15);
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:32px;
      backdrop-filter:blur(10px);
      position:relative;
      z-index:2;
    }

    .hero h1{
      color:white;
      font-size:24px;
      font-weight:700;
      position:relative;
      z-index:2;
    }

    .hero p{
      color:rgba(255,255,255,0.8);
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
      font-size:16px;
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
      transition:0.2s;
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
      transition:0.2s;
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
    .logo img{
    width:100px;
    height:100px;
    object-fit:cover;
}
  </style>
  <div class="app">

    <div class="hero">

     <div class="logo">
    <img src="images/wisatakita.png" alt="Logo WisataKita">
</div>
      <h1>WisataKita</h1>

      <p>Jelajahi Wisata Lokal, Bandung Barat</p>

    </div>

    <div class="content">

      <h2 class="title">Selamat Datang!</h2>

      <p class="subtitle">
        Masuk untuk mulai memesan tiket wisata
      </p>

      <form action="" method="post">

        <div class="form-group">

          <label class="form-label">Username</label>

          <div class="input-wrap">
            <span class="icon"><i class="bi bi-envelope-fill"></i></span>

            <input 
              type="text"
              class="form-control"
              placeholder="nama"
             name="user">
          </div>

        </div>

        <div class="form-group">

          <label class="form-label">Password</label>

          <div class="input-wrap">
            <span class="icon"><i class="bi bi-lock-fill"></i></span>

            <input 
              type="password"
              class="form-control"
              placeholder="Password"
            name="pass">
          </div>

        </div>

        <button class="btn" name="login">
    Masuk
</button>

      </form>

      <div class="footer">
        Belum punya akun?
        <a href="register.php">Daftar Sekarang</a>
      </div>

    </div>

  </div>

</body>
</html>