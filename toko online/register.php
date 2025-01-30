<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Enkripsi password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Format data untuk disimpan dalam file (username:password)
    $data = $username . ":" . $hashed_password . "\n";

    // Tentukan lokasi file untuk menyimpan data pengguna
    $file = 'users.txt';

    // Simpan data pengguna ke file
    file_put_contents($file, $data, FILE_APPEND);

    echo "Pendaftaran berhasil! Kamu bisa login sekarang.";
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
</head>
<body>

    <h2>Form Pendaftaran</h2>
    <form action="proses_register.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Daftar">
    </form>

</body>
</html>
