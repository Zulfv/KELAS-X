<?php
include '../config.php';

$id = $_GET['id'];

// Ambil nama file gambar
$data = mysqli_query($conn, "SELECT gambar FROM produk WHERE id=$id");
$row = mysqli_fetch_assoc($data);
$gambar = $row['gambar'];

// Hapus dari database
mysqli_query($conn, "DELETE FROM produk WHERE id=$id");

// Hapus gambar dari folder
if (file_exists("../uploads/$gambar")) {
    unlink("../uploads/$gambar");
}

header('Location: produk.php');
