<?php
include '../dbcontroller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];

    $stmt = mysqli_prepare($conn, "INSERT INTO kategori (nama) VALUES (?)");
    mysqli_stmt_bind_param($stmt, "s", $nama);
    mysqli_stmt_execute($stmt);

    header("Location: select.php");
}
?>
<form method="post">
    <input type="text" name="nama" placeholder="Nama Kategori" required>
    <button type="submit">Simpan</button>
</form>
