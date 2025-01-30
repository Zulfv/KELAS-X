<?php
// Hubungkan ke database
include('includes/db.php');

// Mulai sesi
session_start();

// Cek apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Cek apakah email sudah terdaftar
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        // Jika email sudah ada
        echo "<script>alert('Email sudah terdaftar! Silakan gunakan email lain.'); window.location.href = 'register.php';</script>";
    } else {
        // Insert data ke database
        $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $insert_query)) {
            // Jika berhasil, arahkan ke halaman login
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = 'login.php';</script>";
        } else {
            // Jika gagal
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "Metode tidak diperbolehkan!";
}
?>
