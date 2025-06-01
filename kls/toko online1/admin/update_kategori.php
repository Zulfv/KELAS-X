<?php
include '../config.php';

$id = $_POST['id'];
$name = $_POST['name'];

if ($_FILES['image']['name']) {
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/".$image);
    mysqli_query($conn, "UPDATE categories SET name='$name', image='$image' WHERE id=$id");
} else {
    mysqli_query($conn, "UPDATE categories SET name='$name' WHERE id=$id");
}

header('Location: kategori.php');
