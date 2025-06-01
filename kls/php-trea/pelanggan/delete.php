<?php
include '../dbcontroller.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM user WHERE id=$id AND role='pelanggan'");
header("Location: select.php");
?>
