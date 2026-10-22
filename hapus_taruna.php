<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM karang_taruna WHERE id = '$id'");
    echo "<script>alert('Anggota berhasil dihapus!'); window.location='karang_taruna.php';</script>";
} else {
    header("Location: karang_taruna.php");
}
?>