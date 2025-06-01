<?php
$host = 'localhost';
$db = 'toko_online1';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db, 8111);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>