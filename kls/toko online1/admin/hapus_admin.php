<?php
include '../config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "Akses ditolak!";
    exit;
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM admin WHERE id = $id");

header('Location: admin.php');
