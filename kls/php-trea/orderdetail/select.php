<?php
include '../dbcontroller.php';

if (!isset($_GET['order_id'])) {
    echo "ID pesanan tidak ditemukan.";
    exit;
}

$order_id = $_GET['order_id'];

$query = "
    SELECT od.*, m.nama AS nama_menu, m.harga
    FROM order_detail od
    JOIN menu m ON od.menu_id = m.id
    WHERE od.pesanan_id = $order_id
";

$result = mysqli_query($conn, $query);

echo "<h2>Detail Pesanan #$order_id</h2>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Menu</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr>";

$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $subtotal = $row['harga'] * $row['jumlah'];
    $total += $subtotal;
    echo "<tr>";
    echo "<td>{$row['nama_menu']}</td>";
    echo "<td>Rp" . number_format($row['harga'], 0, ',', '.') . "</td>";
    echo "<td>{$row['jumlah']}</td>";
    echo "<td>Rp" . number_format($subtotal, 0, ',', '.') . "</td>";
    echo "</tr>";
}

echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>Rp" . number_format($total, 0, ',', '.') . "</strong></td></tr>";
echo "</table>";
echo "<br><a href='../order/select.php'>Kembali ke daftar pesanan</a>";
?>
