<?php
include '../dbcontroller.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori_id = $_POST['kategori_id'];
    $gambar = $_FILES['gambar']['name'];

    if ($gambar != "") {
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "../uploads/$gambar");
        $sql = "UPDATE menu SET nama=?, deskripsi=?, harga=?, gambar=?, kategori_id=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssisii", $nama, $deskripsi, $harga, $gambar, $kategori_id, $id);
    } else {
        $sql = "UPDATE menu SET nama=?, deskripsi=?, harga=?, kategori_id=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssiii", $nama, $deskripsi, $harga, $kategori_id, $id);
    }

    mysqli_stmt_execute($stmt);
    header("Location: select.php");
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id=$id"));
?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
    <textarea name="deskripsi"><?= $data['deskripsi'] ?></textarea><br>
    <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br>
    <input type="file" name="gambar"><br>
    <select name="kategori_id">
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
        while ($k = mysqli_fetch_assoc($kategori)) {
            $selected = ($k['id'] == $data['kategori_id']) ? 'selected' : '';
            echo "<option value='{$k['id']}' $selected>{$k['nama']}</option>";
        }
        ?>
    </select><br>
    <button type="submit">Update</button>
</form>
