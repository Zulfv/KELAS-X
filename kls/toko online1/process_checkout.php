<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simpan data pembayaran jika perlu (nama, alamat, dll)
    unset($_SESSION['cart']); // Kosongkan keranjang

    header("Location: checkout_success.php");
    exit();
} else {
    header("Location: checkout.php");
    exit();
}
