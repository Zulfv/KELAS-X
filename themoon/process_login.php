<?php
// Mulai session
session_start();

// Hubungkan ke database
include('includes/db.php');

// Periksa apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Cek apakah username ada di database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password dengan hashing
        if (password_verify($password, $user['password'])) {
            // Simpan informasi login ke session
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect ke halaman utama setelah login berhasil
            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href = 'login.php';</script>";
    }
} else {
    echo "Metode tidak diperbolehkan!";
}
?>
