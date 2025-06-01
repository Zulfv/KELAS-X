<?php
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'online_store';
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>