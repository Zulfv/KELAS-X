<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produk_id = intval($_POST['produk_id']);
    $nama = trim($_POST['nama']);
    $rating = intval($_POST['rating']);
    $komentar = trim($_POST['komentar']);

    if ($produk_id && $nama && $rating && $komentar) {
        $sql = "INSERT INTO ulasan (produk_id, nama, rating, komentar) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isis", $produk_id, $nama, $rating, $komentar);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: detail_produk.php?id=" . $produk_id);
    exit();
} else {
    header("Location: index.php");
    exit();
}
