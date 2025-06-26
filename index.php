<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $makanan = array(
        "kode" => $_POST['kode'],
        "nama" => $_POST['nama'],
        "harga" => $_POST['harga'],
        "foto" => $_POST['foto']
    );
    if (!isset($_SESSION['menu'])) {
        $_SESSION['menu'] = array(); 
    }
    $_SESSION['menu'][] = $makanan; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Makanan</title>
</head>
<body>
    <h2>Form Input Makanan</h2>
    <form method="post">
        <label>Kode Makanan:</label><br>
        <input type="text" name="kode"><br><br>

        <label>Nama Makanan:</label><br>
        <input type="text" name="nama"><br><br>

        <label>Harga Makanan:</label><br>
        <input type="text" name="harga"><br><br>

        <label>URL Gambar Makanan:</label><br>
        <input type="url" name="foto"><br><br>

        <button type="submit">Submit</button>
    </form>

    <br><a href="order.php">Lihat Daftar Makanan</a>
</body>
</html>
