<?php
require '../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi = $_POST['kompetensi_keahlian'];

    $query = "INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES ('$nama_kelas', '$kompetensi')";
    mysqli_query($koneksi, $query);
    header("Location: kelas.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
</head>
<body>
    <h2>Tambah Data Kelas</h2>
    <form method="POST">
        <label>Nama Kelas:</label>
        <input type="text" name="nama_kelas" required><br>

        <label>Kompetensi Keahlian:</label>
        <input type="text" name="kompetensi_keahlian" required><br>

        <button type="submit" name="tambah">Tambah</button>
    </form>
    <br>
    <a href="kelas.php">Kembali</a>
</body>
</html>
