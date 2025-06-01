<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $quantity = max(1, intval($_POST['quantity'])); // Pastikan jumlah minimal 1

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    }

    // Hitung ulang total harga
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    echo json_encode(['total' => number_format($total, 0, ',', '.')]);
    exit;
}
?>
