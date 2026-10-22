<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Warga RW 09</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { display: inline-block; padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 15px; margin-right: 5px; }
        .btn-print { background: #17a2b8; }
        .btn-excel { background: #ffc107; color: #333; font-weight: bold; }
        .btn-hapus { background: #dc3545; padding: 5px 10px; font-size: 12px; }
        
        /* Pengaturan saat halaman dicetak */
        @media print {
            .btn, .no-print, .aksi-col { display: none; }
            body { background: white; margin: 0; }
            table { width: 100%; border: 1px solid black; }
            th, td { border: 1px solid black; }
        }
    </style>
</head>
<body>

    <h2>Data Penduduk RW 09 (RT 01 - RT 15)</h2>
    
    <!-- Tombol Aksi -->
    <div class="no-print">
        <a href="tambah.php" class="btn">+ Tambah Warga Baru</a>
        <a href="#" onclick="window.print()" class="btn btn-print">🖨️ Cetak / Print</a>
        <a href="export_excel.php" class="btn btn-excel">📊 Export ke Excel</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>JK</th>
                <th>No. KK</th>
                <th>RT</th>
                <th>Status dalam Keluarga</th>
                <th class="aksi-col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT w.*, k.nomor_kk, r.nomor_rt 
                      FROM warga w 
                      JOIN kartu_keluarga k ON w.nomor_kk = k.nomor_kk 
                      JOIN rt r ON k.rt_id = r.id 
                      ORDER BY r.nomor_rt ASC, w.nama_lengkap ASC";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nik'] . "</td>";
                    echo "<td>" . $row['nama_lengkap'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['nomor_kk'] . "</td>";
                    echo "<td>RT " . $row['nomor_rt'] . "</td>";
                    echo "<td>" . $row['status_dalam_keluarga'] . "</td>";
                    echo "<td class='aksi-col'>
                            <a href='hapus.php?nik=" . $row['nik'] . "' class='btn btn-hapus' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data warga ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data warga.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>