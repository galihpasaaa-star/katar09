<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor_kk              = $_POST['nomor_kk'];
    $kepala_keluarga       = $_POST['kepala_keluarga'];
    $rt_id                 = $_POST['rt_id'];
    $nik                   = $_POST['nik'];
    $nama_lengkap          = $_POST['nama_lengkap'];
    $jenis_kelamin         = $_POST['jenis_kelamin'];
    $status_dalam_keluarga = $_POST['status_dalam_keluarga'];

    // 1. Simpan/Cek data Kartu Keluarga terlebih dahulu
    $query_kk = "INSERT INTO kartu_keluarga (nomor_kk, kepala_keluarga, rt_id) 
                 VALUES ('$nomor_kk', '$kepala_keluarga', '$rt_id')
                 ON DUPLICATE KEY UPDATE kepala_keluarga='$kepala_keluarga', rt_id='$rt_id'";
    
    if (mysqli_query($koneksi, $query_kk)) {
        // 2. Simpan data Warga
        $query_warga = "INSERT INTO warga (nik, nomor_kk, nama_lengkap, jenis_kelamin, status_dalam_keluarga) 
                        VALUES ('$nik', '$nomor_kk', '$nama_lengkap', '$jenis_kelamin', '$status_dalam_keluarga')";
        
        if (mysqli_query($koneksi, $query_warga)) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
        } else {
            echo "Gagal menambahkan warga: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal menambahkan Kartu Keluarga: " . mysqli_error($koneksi);
    }
}
?>