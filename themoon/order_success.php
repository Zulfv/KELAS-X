<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil</title>
</head>
<body>
    <h1>Pesanan Anda Berhasil Dibuat!</h1>
    <p>Terima kasih telah berbelanja di toko kami.</p>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
