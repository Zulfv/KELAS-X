<?php
session_start();
require_once '../dbcontroller.php';

if (!isset($_SESSION['pelanggan'])) {
    header("Location: login.php");
    exit;
}

$id_pelanggan = $_SESSION['pelanggan']['id'];

// Ambil semua pesanan selesai
$orders = mysqli_query($conn, "
    SELECT * FROM orders 
    WHERE id_pelanggan = $id_pelanggan AND status = 'selesai' 
    ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pesanan</title>
</head>
<body>
    <h2>Riwayat Pesanan</h2>
    <a href="produk.php">Kembali ke Menu</a><br><br>

    <?php if (mysqli_num_rows($orders) === 0) : ?>
        <p>Tidak ada riwayat pesanan.</p>
    <?php else: ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
            <?php while ($order = mysqli_fetch_assoc($orders)) :
                $id_order = $order['id'];
                $total_query = mysqli_query($conn, "
                    SELECT SUM(m.harga * od.jumlah) AS total
                    FROM orderdetail od
                    JOIN menu m ON od.id_menu = m.id
                    WHERE od.id_order = $id_order
                ");
                $total = mysqli_fetch_assoc($total_query)['total'];
            ?>
            <tr>
                <td><?= $order['tanggal'] ?></td>
                <td>Rp <?= number_format($total) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</body>
</html>
