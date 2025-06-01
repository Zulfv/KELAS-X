<?php
include '../config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "Akses ditolak!";
    exit;
}

$id = $_POST['id'];
$email = $_POST['email'];
$role = $_POST['role'];

$query = "UPDATE admin SET email = '$email', role = '$role' WHERE id = $id";
mysqli_query($conn, $query);

header('Location: admin.php');
