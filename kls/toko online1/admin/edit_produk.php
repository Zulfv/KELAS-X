<?php
include '../config.php';

$id = $_GET['id'];
$produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id = $id"));
$kategori = mysqli_query($conn, "SELECT * FROM categories");
?>

<h2>Edit Produk</h2>
<form method="POST" action="update_produk.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $produk['id']; ?>">
    Nama Produk: <input type="text" name="nama" value="<?= $produk['nama']; ?>" required><br>
    Harga: <input type="number" name="harga" value="<?= $produk['harga']; ?>" required><br>
    Deskripsi: <textarea name="deskripsi" required><?= $produk['deskripsi']; ?></textarea><br>
    Kategori:
    <select name="kategori_id" required>
        <?php while($row = mysqli_fetch_assoc($kategori)): ?>
            <option value="<?= $row['id']; ?>" <?= $row['id'] == $produk['kategori_id'] ? 'selected' : ''; ?>>
                <?= $row['name']; ?>
            </option>
        <?php endwhile; ?>
    </select><br>
    Gambar Saat Ini:<br><img src="../images/<?= $produk['gambar']; ?>" width="100"><br>
    Ganti Gambar (opsional): <input type="file" name="gambar"><br>
    <button type="submit">Simpan</button>
</form>
