<?php
include '../dbcontroller.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kategori WHERE id=$id");
header("Location: select.php");
