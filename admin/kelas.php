<?php
require '../koneksi.php';

// Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas=$id");
    header("Location: kelas.php");
}

// Ambil Data untuk Tabel
$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
</head>
<body>
    <h2>Data Kelas</h2>
    <a href="tambah-kelas.php">+ Tambah Kelas</a>
    <br><br>

    <table border="1">
        <tr>
            <th>No</th> <!-- Tambah kolom nomor -->
            <th>Nama Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($kelas)) : ?>
        <tr>
            <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
            <td><?= $row['nama_kelas']; ?></td>
            <td><?= $row['kompetensi_keahlian']; ?></td>
            <td>
                <a href="edit-kelas.php?id=<?= $row['id_kelas']; ?>">Edit</a>
                <a href="kelas.php?hapus=<?= $row['id_kelas']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
