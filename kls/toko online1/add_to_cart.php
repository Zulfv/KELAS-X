<?php
session_start();
include 'config.php';

if (!isset($_POST['product_id']) || !isset($_POST['quantity'])) {
    header('Location: index.php');
    exit();
}

$product_id = intval($_POST['product_id']);
$quantity = intval($_POST['quantity']);

if ($quantity < 1) {
    $quantity = 1;
}

$sql = "SELECT * FROM produk WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Produk tidak ditemukan!";
    exit();
}

$product = $result->fetch_assoc();
$stmt->close();

// Inisialisasi keranjang jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Tambahkan produk ke keranjang dengan jumlah yang benar
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]['quantity'] += $quantity;
} else {
    $_SESSION['cart'][$product_id] = [
        'nama' => $product['nama'],
        'price' => $product['harga'],
        'quantity' => $quantity
    ];
}

// Kembali ke halaman sebelumnya atau ke cart.php
$previous_page = $_SERVER['HTTP_REFERER'] ?? 'cart.php';
header("Location: $previous_page");
exit();
?>
