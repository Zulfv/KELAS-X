<?php
session_start();

if (!isset($_GET['id'])) {
    header('Location: cart.php');
    exit();
}

$id = intval($_GET['id']);

if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

header('Location: cart.php');
exit();
