<?php
session_start();
include('includes/db.php'); // Pastikan file koneksi sudah benar

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Ambil produk dari database
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        // Tambahkan produk ke keranjang
        $_SESSION['cart'][] = $product; // Menyimpan produk dalam sesi
        header('Location: cart.php'); // Kembali ke halaman produk
        exit();
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak ditentukan.";
}
?>