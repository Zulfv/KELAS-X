<?php
include '../config.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$kategori_id = $_POST['kategori_id'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp, "../imges/".$gambar);

mysqli_query($conn, "INSERT INTO produk (nama, harga, deskripsi, kategori_id, gambar)
    VALUES ('$nama', '$harga', '$deskripsi', '$kategori_id', '$gambar')");
header('Location: produk.php');
