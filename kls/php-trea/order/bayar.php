<?php
include '../dbcontroller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "UPDATE pesanan SET status='diproses' WHERE id=$id");
    echo "Pesanan #$id telah dibayar dan sedang diproses.";
    echo "<br><a href='select.php'>Kembali ke daftar pesanan</a>";
} else {
    echo "ID pesanan tidak ditemukan.";
}
?>
