<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password baru dan konfirmasi password sama
    if ($new_password !== $confirm_password) {
        $error = "Password baru dan konfirmasi password tidak sama!";
    } else {
        // Cek kredensial admin (ganti dengan logika yang sesuai)
        // Misalnya, jika password admin disimpan dalam database
        $admin_username = 'admin'; // Ganti dengan username admin Anda
        $query = "SELECT * FROM admins WHERE username = '$admin_username'";
        $result = mysqli_query($conn, $query);
        $admin = mysqli_fetch_assoc($result);

        // Cek apakah password saat ini benar
        if ($admin && password_verify($current_password, $admin['password'])) {
            // Hash password baru
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            // Update password di database
            $update_query = "UPDATE admins SET password = '$hashed_new_password' WHERE username = '$admin_username'";
            if (mysqli_query($conn, $update_query)) {
                $success = "Password berhasil diubah!";
            } else {
                $error = "Gagal mengubah password: " . mysqli_error($conn);
            }
        } else {
            $error = "Password saat ini salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Ganti Password</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="current_password" class="form-label">Password Saat Ini</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Ganti Password</button>
        </form>
    </div>
</body>
</html>