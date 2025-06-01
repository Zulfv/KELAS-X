<?php
include '../dbcontroller.php';

$result = mysqli_query($conn, "
    SELECT menu.*, kategori.nama AS kategori_nama
    FROM menu
    JOIN kategori ON menu.kategori_id = kategori.id
");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<p><strong>{$row['nama']}</strong> ({$row['kategori_nama']})<br>";
    echo "Rp{$row['harga']}<br>";
    echo "<img src='../uploads/{$row['gambar']}' width='100'><br>";
    echo "<a href='update.php?id={$row['id']}'>Edit</a> | ";
    echo "<a href='delete.php?id={$row['id']}'>Hapus</a></p>";
}
?>
