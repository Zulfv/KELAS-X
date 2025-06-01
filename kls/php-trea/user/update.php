<?php
include '../dbcontroller.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = mysqli_prepare($conn, "UPDATE user SET nama=?, email=?, role=? WHERE id=? AND role != 'pelanggan'");
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $role, $id);
    mysqli_stmt_execute($stmt);

    header("Location: select.php");
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id=$id AND role != 'pelanggan'"));
?>

<h2>Edit User</h2>
<form method="post">
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
    <input type="email" name="email" value="<?= $data['email'] ?>" required><br>
    <select name="role" required>
        <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="kasir" <?= $data['role'] == 'kasir' ? 'selected' : '' ?>>Kasir</option>
        <option value="manager" <?= $data['role'] == 'manager' ? 'selected' : '' ?>>Manager</option>
    </select><br>
    <button type="submit">Simpan</button>
</form>
