<?php
session_start(); // Mulai sesi
include 'config.php'; // Hubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah email terdaftar
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil, set sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username']; // Simpan username di sesi
            header("Location: index.php"); // Redirect ke halaman utama
            exit();
        } else {
            echo "Password salah. Silakan coba lagi.";
        }
    } else {
        echo "Email tidak terdaftar. Silakan daftar terlebih dahulu.";
    }
}

$conn->close();
?>