<?php
include '../config.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id");
$kategori = mysqli_fetch_assoc($data);
?>

<h2>Edit Kategori</h2>
<form method="POST" action="update_kategori.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $kategori['id']; ?>">
    Nama Kategori: <input type="text" name="name" value="<?= $kategori['name']; ?>" required><br>
    Gambar Saat Ini: <br><img src="../images/<?= $kategori['image']; ?>" width="100"><br>
    Ganti Gambar (opsional): <input type="file" name="image"><br>
    <button type="submit">Simpan</button>
</form>
