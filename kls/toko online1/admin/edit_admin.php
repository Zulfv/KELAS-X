<?php
include '../config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "Akses ditolak!";
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
$admin = mysqli_fetch_assoc($data);

if (!$admin) {
    echo "Admin tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin</title>
</head>
<body>
    <h2>Edit Admin</h2>
    <form method="post" action="update_admin.php">
        <input type="hidden" name="id" value="<?= $admin['id']; ?>">
        Email: <input type="email" name="email" value="<?= $admin['email']; ?>" required><br><br>
        Role: 
        <select name="role" required>
            <option value="admin" <?= $admin['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="kasir" <?= $admin['role'] === 'kasir' ? 'selected' : '' ?>>Kasir</option>
            <option value="manager" <?= $admin['role'] === 'manager' ? 'selected' : '' ?>>Manager</option>
        </select><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
