<?php
include 'config.php'; // Pastikan Anda menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Update password berdasarkan token
    $sql = "UPDATE users SET password = '$password', reset_token = NULL WHERE reset_token = '$token'";
    if ($conn->query($sql) === TRUE) {
        echo "Password berhasil direset. Silakan <a href='login.php'>masuk</a>.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>