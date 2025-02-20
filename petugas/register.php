<?php
require '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $cek = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        $query = "INSERT INTO petugas (username, password, nama_petugas, level) 
                  VALUES ('$username', '$password', '$nama_petugas', '$level')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Petugas</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Form Registrasi Petugas</h2>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <label>Nama Petugas:</label>
        <input type="text" name="nama_petugas" required>
        <br>
        <label>Level:</label>
        <select name="level" required>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
