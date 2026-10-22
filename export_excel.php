<?php
// Masukkan file koneksi database
include 'koneksi.php';

// Header agar browser mendownload file sebagai Excel (.xls)
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Warga_RW09.xls");
?>

<h3>Data Penduduk RW 09 (RT 01 - RT 15)</h3>
<table border="1">
    <thead>
        <tr style="background-color: #007bff; color: white;">
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>JK</th>
            <th>No. KK</th>
            <th>RT</th>
            <th>Status dalam Keluarga</th>
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

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>'" . $row['nik'] . "</td>"; // Tanda petik satu agar NIK tidak terpotong nol-nya di Excel
            echo "<td>" . $row['nama_lengkap'] . "</td>";
            echo "<td>" . $row['jenis_kelamin'] . "</td>";
            echo "<td>'" . $row['nomor_kk'] . "</td>";
            echo "<td>RT " . $row['nomor_rt'] . "</td>";
            echo "<td>" . $row['status_dalam_keluarga'] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>