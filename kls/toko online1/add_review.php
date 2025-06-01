<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = intval($_POST['product_id']);
    $user_name = $_POST['user_name'];
    $rating = intval($_POST['rating']);
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (product_id, user_name, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isis", $product_id, $user_name, $rating, $comment);
    $stmt->execute();

    header("Location: product.php?id=$product_id");
    exit();
}
?>