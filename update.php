<?php
session_start();
include "koneksi.php";

$user_session = $_SESSION['user'];

$ambil = mysqli_query($konek,
"SELECT * FROM login WHERE user='$user_session'");

$data = mysqli_fetch_assoc($ambil);

if(isset($_POST['update'])){

    $email = $_POST['email'];
    $user  = $_POST['user'];
    $pass  = $_POST['pass'];

    mysqli_query($konek, "UPDATE login
                          SET email='$email',
                              user='$user',
                              pass='$pass'
                          WHERE user='$user_session'");

    $_SESSION['user'] = $user;

    header("Location: profil.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profil</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:sans-serif;
    background:#dbe4ee;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.card{
    width:100%;
    max-width:420px;
    background:white;
    border-radius:20px;
    overflow:hidden;
}

.header{
    background:#059669;
    padding:40px 20px;
    text-align:center;
    color:white;
}

.foto{
    width:90px;
    height:90px;
    border-radius:50%;
    background:#ef4444;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:38px;
    font-weight:bold;
}

.header h2{
    margin-top:15px;
}

.form{
    padding:24px;
}

.input{
    width:100%;
    padding:14px;
    border:none;
    background:#f1f5f9;
    border-radius:12px;
    margin-top:8px;
    margin-bottom:18px;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    background:#059669;
    color:white;
    font-size:15px;
    font-weight:bold;
    cursor:pointer;
}

.btn:hover{
    background:#047857;
}

label{
    font-size:14px;
    font-weight:bold;
}

</style>
</head>

<body>

<div class="card">

    <div class="header">

        <div class="foto">
            <?= strtoupper(substr($data['user'],0,1)); ?>
        </div>

        <h2><?= $data['user']; ?></h2>

    </div>

    <div class="form">

        <form method="post">

            <label>Email</label>

            <input
                type="email"
                name="email"
                class="input"
                value="<?= $data['email']; ?>"
            >

            <label>Username</label>

            <input
                type="text"
                name="user"
                class="input"
                value="<?= $data['user']; ?>"
            >

            <label>Password</label>

            <input
                type="password"
                name="pass"
                class="input"
                value="<?= $data['pass']; ?>"
            >

            <button type="submit" name="update" class="btn">
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

</body>
</html>