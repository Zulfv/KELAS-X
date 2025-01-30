<?php
session_start();

// Menghapus produk dari keranjang
if (isset($_POST['remove_from_cart'])) {
    $item_index = $_POST['item_index'];
    if (isset($_SESSION['cart'][$item_index])) {
        unset($_SESSION['cart'][$item_index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
    }
}

// Arahkan kembali ke halaman keranjang
header('Location: cart.php');
exit();
?>