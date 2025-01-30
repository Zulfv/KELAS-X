<?php
// Koneksi ke database
$host = 'localhost';  // Server MySQL
$user = 'root';       // Username MySQL
$pass = '';           // Password MySQL
$dbname = 'myshop';   // Nama database

// Membuat koneksi menggunakan MySQLi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek jika koneksi gagal
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 
   

