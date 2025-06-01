<?php
session_start();
require_once '../dbcontroller.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE id = $id");
    $menu = mysqli_fetch_assoc($query);

    if (!$menu) {
        die("Menu tidak ditemukan.");
    }

    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }

    // Tambahkan atau update jumlah
    if (isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id]['jumlah'] += 1;
    } else {
        $_SESSION['keranjang'][$id] = [
            'nama' => $menu['nama_menu'],
            'harga' => $menu['harga'],
            'jumlah' => 1
        ];
    }

    header('Location: cart.php'); // arahkan ke halaman keranjang
    exit;
} else {
    die("ID menu tidak ditemukan.");
}
