<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $target_dir = "uploads/";
    $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $file_name = "user_" . $user_id . "_" . time() . "." . $file_ext;
    $target_file = $target_dir . $file_name;

    // Cek apakah file benar-benar gambar
    $check = getimagesize($_FILES['photo']['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            // Simpan path foto ke database
            $sql = "UPDATE users SET photo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $target_file, $user_id);
            if ($stmt->execute()) {
                header("Location: profile.php"); // Redirect agar perubahan terlihat
                exit();
            } else {
                echo "Gagal menyimpan foto di database.";
            }
        } else {
            echo "Gagal mengupload foto.";
        }
    } else {
        echo "File bukan gambar.";
    }
} else {
    echo "Harap pilih gambar.";
}
?>
