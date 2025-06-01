<?php
include 'config.php'; // Hubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Cek apakah email sudah ada
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_sql);

    if ($result->num_rows > 0) {
        echo "Email sudah digunakan. Silakan gunakan email lain.";
    } else {
        // Cek apakah username sudah ada
        $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
        $result_username = $conn->query($check_username_sql);

        if ($result_username->num_rows > 0) {
            echo "Username sudah digunakan. Silakan pilih username lain.";
        } else {
            // Query untuk menambahkan pengguna
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                // Arahkan ke halaman sukses
                header("Location: registration_success.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close(); 
?>