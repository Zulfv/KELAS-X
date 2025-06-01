<?php
include '../config.php';

$name = $_POST['name'];
$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp, "../images/".$image);

mysqli_query($conn, "INSERT INTO categories (name, image) VALUES ('$name', '$image')");
header('Location: kategori.php');
