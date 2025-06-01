<?php
include 'config.php';

if (!isset($_GET['search']) || empty($_GET['search'])) {
    header("Location: index.php");
    exit();
}

$search = $conn->real_escape_string($_GET['search']);

// Ambil produk pertama yang cocok
$sql = "SELECT id FROM produk WHERE nama_produk LIKE '%$search%' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $product = $result->fetch_assoc();
    header("Location: detail_produk.php?id=" . $product['id']);
    exit();
} else {
    echo "<script>alert('Produk tidak ditemukan!'); window.location.href='index.php';</script>";
    exit();
}
?>
