<?php
include 'koneksi.php';

// Ambil daftar RT untuk pilihan dropdown
$query_rt = "SELECT * FROM rt ORDER BY nomor_rt ASC";
$result_rt = mysqli_query($koneksi, $query_rt);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Warga</title>
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
    <h2>Tambah Data Warga</h2>
    <form action="proses_tambah.php" method="POST">
        <div class="form-group">
            <label>Nomor KK:</label>
            <input type="text" name="nomor_kk" maxlength="16" required placeholder="Masukkan 16 digit KK">
        </div>

        <div class="form-group">
            <label>Nama Kepala Keluarga:</label>
            <input type="text" name="kepala_keluarga" required placeholder="Nama Kepala Keluarga">
        </div>

        <div class="form-group">
            <label>RT:</label>
            <select name="rt_id" required>
                <option value="">-- Pilih RT --</option>
                <?php while($row = mysqli_fetch_assoc($result_rt)): ?>
                    <option value="<?= $row['id']; ?>">RT <?= $row['nomor_rt']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label>NIK Warga:</label>
            <input type="text" name="nik" maxlength="16" required placeholder="Masukkan 16 digit NIK">
        </div>

        <div class="form-group">
            <label>Nama Lengkap Warga:</label>
            <input type="text" name="nama_lengkap" required placeholder="Nama Lengkap Warga">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status Dalam Keluarga:</label>
            <input type="text" name="status_dalam_keluarga" required placeholder="Contoh: Kepala Keluarga / Istri / Anak">
        </div>

        <button type="submit" class="btn">Simpan Data</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>
</div>

</body>
</html>