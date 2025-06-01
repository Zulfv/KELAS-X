<?php
session_start();
require_once '../dbcontroller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $meja = $_POST['meja'];
    $total = 0;

    foreach ($_SESSION['cart'] as $item) {
        $total += $item['harga'] * $item['qty'];
    }

    // Simpan ke tabel `order`
    $queryOrder = "INSERT INTO `order` (id_pelanggan, tanggal_order, total_bayar, status_order)
                   VALUES (0, NOW(), '$total', 'Pending')";
    mysqli_query($koneksi, $queryOrder) or die("Gagal simpan order: " . mysqli_error($koneksi));
    $id_order = mysqli_insert_id($koneksi);

    // Simpan ke order_items dan kurangi stok
    foreach ($_SESSION['cart'] as $id_menu => $item) {
        $qty = $item['qty'];
        $harga = $item['harga'];
        $subtotal = $harga * $qty;

        // Simpan ke order_items
        $queryItem = "INSERT INTO order_items (id_order, id_menu, harga, qty, subtotal)
                      VALUES ('$id_order', '$id_menu', '$harga', '$qty', '$subtotal')";
        mysqli_query($koneksi, $queryItem) or die("Gagal simpan item: " . mysqli_error($koneksi));

        // Update stok
        mysqli_query($koneksi, "UPDATE menu SET stok = stok - $qty WHERE id = '$id_menu'");
    }

    unset($_SESSION['cart']);
    header("Location: ../index.php");
    exit;
}
