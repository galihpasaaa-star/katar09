<?php
include 'koneksi.php';

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Query untuk menghapus data warga berdasarkan NIK
    $query = "DELETE FROM warga WHERE nik = '$nik'";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data warga berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
}
?>