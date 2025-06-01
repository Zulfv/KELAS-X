<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

header("Location: index.php"); // Redirect ke halaman utama
exit();
?>