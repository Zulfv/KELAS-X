<?php
include '../dbcontroller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori_id = $_POST['kategori_id'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/$gambar");

    $stmt = mysqli_prepare($conn, "INSERT INTO menu (nama, deskripsi, harga, gambar, kategori_id) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssisi", $nama, $deskripsi, $harga, $gambar, $kategori_id);
    mysqli_stmt_execute($stmt);

    header("Location: select.php");
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama Menu" required><br>
    <textarea name="deskripsi" placeholder="Deskripsi" required></textarea><br>
    <input type="number" name="harga" placeholder="Harga" required><br>
    <input type="file" name="gambar" required><br>
    <select name="kategori_id">
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
        while ($k = mysqli_fetch_assoc($kategori)) {
            echo "<option value='{$k['id']}'>{$k['nama']}</option>";
        }
        ?>
    </select><br>
    <button type="submit">Simpan</button>
</form>
