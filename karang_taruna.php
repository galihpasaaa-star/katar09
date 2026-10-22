<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Karang Taruna RW 09</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #ffc107; color: #333; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { display: inline-block; padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 15px; margin-right: 5px; }
        .btn-menu { background: #007bff; }
        .btn-hapus { background: #dc3545; padding: 5px 10px; font-size: 12px; color: white; text-decoration: none; border-radius: 3px; }
    </style>
</head>
<body>

    <h2>Data Anggota Karang Taruna RW 09</h2>
    
    <div>
        <a href="tambah_taruna.php" class="btn">+ Tambah Anggota Karang Taruna</a>
        <a href="index.php" class="btn btn-menu">← Kembali ke Data Warga</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>RT</th>
                <th>Jabatan</th>
                <th>No. HP / WhatsApp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT kt.*, r.nomor_rt 
                      FROM karang_taruna kt 
                      JOIN rt r ON kt.rt_id = r.id 
                      ORDER BY r.nomor_rt ASC, kt.nama_lengkap ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['nik'] . "</td>";
                    echo "<td>" . $row['nama_lengkap'] . "</td>";
                    echo "<td>RT " . $row['nomor_rt'] . "</td>";
                    echo "<td>" . $row['jabatan'] . "</td>";
                    echo "<td>" . $row['no_hp'] . "</td>";
                    echo "<td><a href='hapus_taruna.php?id=" . $row['id'] . "' class='btn-hapus' onclick='return confirm(\"Hapus anggota ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data anggota Karang Taruna.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>