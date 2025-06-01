<?php
include '../dbcontroller.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $stmt = mysqli_prepare($conn, "UPDATE kategori SET nama=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "si", $nama, $id);
    mysqli_stmt_execute($stmt);
    header("Location: select.php");
}

$result = mysqli_query($conn, "SELECT * FROM kategori WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>
<form method="post">
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
    <button type="submit">Update</button>
</form>
