<?php
session_start();
include '../config.php';

$email    = $_POST['email'];       // bukan 'username' lagi
$password = md5($_POST['password']); // cocokkan dengan register

$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $_SESSION['admin'] = $data['email'];
    $_SESSION['role']  = $data['role'];
    header("Location: index.php");
} else {
    echo "Login gagal. Email atau password salah.";
}
?>
