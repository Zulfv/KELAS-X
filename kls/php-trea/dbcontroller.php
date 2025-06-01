<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "resto-67"; // Ini yang perlu Anda ubah
$port = 8111;

$koneksi = mysqli_connect($host, $user, $password, $database, $port);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
