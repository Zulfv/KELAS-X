<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once '../dbcontroller.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Selamat datang, <?= htmlspecialchars($_SESSION['admin']['username']) ?></h2>
    <a href="menu.php">Kelola Menu</a> |
    <a href="kategori.php">Kelola Kategori</a> |
    <a href="pelanggan.php">Data Pelanggan</a> |
    <a href="order.php">Pesanan</a> |
    <a href="logout.php">Logout</a>
</body>
</html>
