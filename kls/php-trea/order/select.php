<?php
include '../dbcontroller.php';

$query = "
    SELECT p.id, u.nama, p.tanggal, p.total, p.status
    FROM pesanan p
    JOIN user u ON p.user_id = u.id
    ORDER BY p.tanggal DESC
";

$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>";
    echo "ID: {$row['id']}<br>";
    echo "Pelanggan: {$row['nama']}<br>";
    echo "Tanggal: {$row['tanggal']}<br>";
    echo "Total: Rp" . number_format($row['total'], 0, ',', '.') . "<br>";
    echo "Status: {$row['status']}<br>";
    echo "<a href='../orderdetail/select.php?order_id={$row['id']}'>Lihat Detail</a><br>";
    echo "</p><hr>";
}
?>
