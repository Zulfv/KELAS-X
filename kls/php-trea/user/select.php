<?php
include '../dbcontroller.php';

$result = mysqli_query($conn, "SELECT * FROM user WHERE role != 'pelanggan'");

echo "<h2>Daftar User (Admin / Kasir / Manager)</h2>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>";
    echo "ID: {$row['id']}<br>";
    echo "Nama: {$row['nama']}<br>";
    echo "Email: {$row['email']}<br>";
    echo "Role: {$row['role']}<br>";
    echo "<a href='update.php?id={$row['id']}'>Edit</a> | ";
    echo "<a href='delete.php?id={$row['id']}'>Hapus</a>";
    echo "</p><hr>";
}
?>
