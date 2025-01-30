<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $delete_query)) {
        header('Location: admin_products.php');
        exit();
    } else {
        echo "Gagal menghapus produk: " . mysqli_error($conn);
    }
}
?>