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
