<?php
include 'koneksi.php';

$query_rt = "SELECT * FROM rt ORDER BY nomor_rt ASC";
$result_rt = mysqli_query($koneksi, $query_rt);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik          = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $rt_id        = $_POST['rt_id'];
    $jabatan      = $_POST['jabatan'];
    $no_hp        = $_POST['no_hp'];

    $query = "INSERT INTO karang_taruna (nik, nama_lengkap, rt_id, jabatan, no_hp) 
              VALUES ('$nik', '$nama_lengkap', '$rt_id', '$jabatan', '$no_hp')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Anggota Karang Taruna berhasil ditambahkan!'); window.location='karang_taruna.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Karang Taruna</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        .form-container { background: #fff; padding: 20px; border-radius: 5px; width: 400px; margin: 0 auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px; }
        .btn-kembali { background: #6c757d; text-decoration: none; display: inline-block; padding: 10px 15px; color: white; border-radius: 4px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Pendaftaran Karang Taruna</h2>
    <form method="POST">
        <div class="form-group">
            <label>NIK:</label>
            <input type="text" name="nik" maxlength="16" required placeholder="Nomor Induk Kependudukan">
        </div>

        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" required placeholder="Nama Lengkap">
        </div>

        <div class="form-group">
            <label>Asal RT:</label>
            <select name="rt_id" required>
                <option value="">-- Pilih RT --</option>
                <?php while($row = mysqli_fetch_assoc($result_rt)): ?>
                    <option value="<?= $row['id']; ?>">RT <?= $row['nomor_rt']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Jabatan:</label>
            <select name="jabatan" required>
                <option value="Anggota">Anggota</option>
                <option value="Ketua RT">Ketua Karang Taruna RT</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Seksi Olahraga">Seksi Olahraga</option>
                <option value="Seksi Humas">Seksi Humas</option>
            </select>
        </div>

        <div class="form-group">
            <label>No. HP / WhatsApp:</label>
            <input type="text" name="no_hp" placeholder="Contoh: 081234567890">
        </div>

        <button type="submit" class="btn">Simpan Anggota</button>
        <a href="karang_taruna.php" class="btn-kembali">Kembali</a>
    </form>
</div>

</body>
</html>