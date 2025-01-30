<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Validasi input
    if (empty($name) || empty($address)) {
        echo "Nama dan alamat tidak boleh kosong.";
        exit();
    }

    // Simpan informasi pengiriman ke dalam sesi
    $_SESSION['checkout_info'] = [
        'name' => $name,
        'address' => $address
    ];

    // Arahkan ke halaman pembayaran
    header('Location: payment.php');
    exit();
} else {
    header('Location: index.php');
}