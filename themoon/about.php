<?php
// Hubungkan ke database jika diperlukan
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - THEMOON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/retro.css">
</head>
<body class="retro-bg text-light">

    <!-- Header -->
    <header class="retro-header d-flex justify-content-between align-items-center p-3">
        <a href="index.php" class="retro-title">THEMOON</a>
        <nav>
            <a href="index.php" class="retro-button">Beranda</a>
            <a href="products.php" class="retro-button">Produk</a>
            <a href="contact.php" class="retro-button">Kontak</a>
        </nav>
    </header>

    <!-- Tentang Kami -->
    <div class="container mt-5">
        <h1 class="text-center retro-title">Tentang Kami</h1>
        <p class="text-center">Selamat datang di THEMOON, toko retro yang penuh dengan barang-barang unik dan menarik!</p>

        <h2 class="mt-4">Visi Kami</h2>
        <p>Kami berkomitmen untuk menyediakan produk-produk berkualitas tinggi yang membawa kembali kenangan indah dari masa lalu. Kami percaya bahwa setiap barang memiliki cerita dan kami ingin berbagi cerita tersebut dengan Anda.</p>

        <h2 class="mt-4">Misi Kami</h2>
        <p>Misi kami adalah untuk menjadi tujuan utama bagi para pecinta barang retro dan vintage. Kami ingin memberikan pengalaman berbelanja yang menyenangkan dan memuaskan, serta membantu pelanggan menemukan barang-barang yang mereka cintai.</p>

        <h2 class="mt-4">Tim Kami</h2>
        <p>Kami memiliki tim yang terdiri dari para penggemar barang retro yang berpengalaman dan berdedikasi. Setiap anggota tim kami memiliki pengetahuan mendalam tentang produk yang kami tawarkan dan siap membantu Anda dalam menemukan barang yang tepat.</p>

        <h2 class="mt-4">Hubungi Kami</h2>
        <p>Jika Anda memiliki pertanyaan atau ingin tahu lebih lanjut tentang produk kami, jangan ragu untuk menghubungi kami melalui halaman <a href="contact.php" class="text-light">Kontak</a>.</p>
    </div>

    <footer class="retro-footer text-center p-4">
        <div class="container">
            <p>&copy; 2023 THEMOON. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>