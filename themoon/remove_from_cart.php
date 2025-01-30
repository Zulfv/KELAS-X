<?php
session_start();

if (isset($_GET['key'])) {
    $key = intval($_GET['key']);

    if (isset($_SESSION['cart'][$key])) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
    }
}

header("Location: cart.php");
exit();
?>
