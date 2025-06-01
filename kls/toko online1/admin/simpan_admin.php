<?php
include '../config.php';

$email    = $_POST['email'];
$password = md5($_POST['password']);
$role     = $_POST['role'];

// Cek apakah email sudah digunakan
$cek = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar. <a href='register.php'>Kembali</a>";
    exit;
}

// Simpan data baru
$query = "INSERT INTO admin (email, password, role) VALUES ('$email', '$password', '$role')";
if (mysqli_query($conn, $query)) {
    echo "Registrasi berhasil. <a href='login.php'>Login sekarang</a>";
} else {
    echo "Gagal mendaftar: " . mysqli_error($conn);
}
?>
