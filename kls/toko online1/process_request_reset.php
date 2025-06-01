<?php
include 'config.php'; // Pastikan Anda menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Cek apakah email ada di database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50)); // Buat token acak
        $sql = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
        $conn->query($sql);

        // Kirim email dengan link reset password
        $reset_link = "http://localhost/tokoh_online/reset_password.php?token=$token";
        mail($email, "Reset Password", "Klik link ini untuk mereset password Anda: $reset_link");

        echo "Link reset password telah dikirim ke email Anda.";
    } else {
        echo "Email tidak ditemukan.";
    }
}

$conn->close();
?>