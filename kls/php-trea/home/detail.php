<?php
session_start();
require_once '../dbcontroller.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM menu WHERE id = '$id'");
$menu = mysqli_fetch_assoc($query);

if (!$menu) {
    echo "Menu tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Menu</title>
</head>
<body>
    <h2><?= htmlspecialchars($menu['nama']) ?></h2>
    <p><?= htmlspecialchars($menu['deskripsi']) ?></p>
    <strong>Harga: Rp <?= number_format($menu['harga']) ?></strong><br><br>

    <form method="post" action="beli.php">
        <input type="hidden" name="id" value="<?= $menu['id'] ?>">
        <label>Jumlah:</label>
        <input type="number" name="jumlah" min="1" required>
        <button type="submit" name="beli">Beli</button>
    </form>
    <br>
    <a href="produk.php">Kembali ke Menu</a>
</body>
</html>
