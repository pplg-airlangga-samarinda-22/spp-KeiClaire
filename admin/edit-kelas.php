<?php
require '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas=$id"));
}

if (isset($_POST['edit'])) {
    $id = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi = $_POST['kompetensi_keahlian'];

    mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi' WHERE id_kelas=$id");
    header("Location: kelas.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
</head>
<body>
    <h2>Edit Data Kelas</h2>
    <form method="POST">
        <input type="hidden" name="id_kelas" value="<?= $data['id_kelas']; ?>">

        <label>Nama Kelas:</label>
        <input type="text" name="nama_kelas" value="<?= $data['nama_kelas']; ?>" required><br>

        <label>Kompetensi Keahlian:</label>
        <input type="text" name="kompetensi_keahlian" value="<?= $data['kompetensi_keahlian']; ?>" required><br>

        <button type="submit" name="edit">Simpan</button>
    </form>
    <br>
    <a href="kelas.php">Kembali</a>
</body>
</html>
