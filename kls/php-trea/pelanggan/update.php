<?php
include '../dbcontroller.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $stmt = mysqli_prepare($conn, "UPDATE user SET nama=?, email=? WHERE id=? AND role='pelanggan'");
    mysqli_stmt_bind_param($stmt, "ssi", $nama, $email, $id);
    mysqli_stmt_execute($stmt);

    header("Location: select.php");
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id=$id AND role='pelanggan'"));
?>

<h2>Edit Pelanggan</h2>
<form method="post">
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
    <input type="email" name="email" value="<?= $data['email'] ?>" required><br>
    <button type="submit">Simpan</button>
</form>
