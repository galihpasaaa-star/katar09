<?php
$host = "sqlXXX.infinityfree.com"; // Sesuaikan dengan MySQL Hostname dari cPanel Anda
$user = "if0_xxxxxxxxx";        // Sesuaikan dengan Username database Anda
$pass = "PasswordHostingAnda";   // Sesuaikan dengan Password akun hosting/database Anda
$db   = "if0_xxxxxxxxx_db_warga_rw09"; // Sesuaikan dengan Nama database lengkap Anda

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>