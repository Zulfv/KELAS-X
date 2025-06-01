<?php
include '../config.php';

$id = $_GET['id'];

// Ambil nama file gambar untuk dihapus dari folder
$data = mysqli_query($conn, "SELECT image FROM categories WHERE id=$id");
$row = mysqli_fetch_assoc($data);
$gambar = $row['image'];

// Hapus dari database
mysqli_query($conn, "DELETE FROM categories WHERE id=$id");

// Hapus file gambar dari folder
if (file_exists("../uploads/$gambar")) {
    unlink("../uploads/$gambar");
}

header('Location: kategori.php');
