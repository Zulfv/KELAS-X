<?php
session_start(); // Mulai sesi
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Toko Kami</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color:#5765;
        }
        .header {
            background-color:#447498 ;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header-links a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
        }
        .about-content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin: 10px 0;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color:#447498 ;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <h1>Galaksi Alat</h1>
            <div class="header-links">
                <a href="index.php">Home</a>
                <a href="cart.php">Cart</a>
                <a href="register.php">Daftar</a>
                <a href="login.php">Login</a>
                <a href="bantuan.php">Bantuan</a>
            </div>
        </div>
    </div>

    <!-- Konten Tentang Toko -->
    <div class="about-content">
        <h2>Tentang Toko Kami</h2>
        <p>Selamat datang di <strong>Galaksi Alat</strong>, toko online yang mengkhususkan diri dalam menjual alat-alat dan perlengkapan luar angkasa yang inovatif dan berkualitas tinggi! Kami percaya bahwa eksplorasi luar angkasa bukan hanya untuk para ilmuwan dan astronot, tetapi juga untuk semua orang yang memiliki rasa ingin tahu dan semangat petualangan.</p>

        <h3>Visi dan Misi</h3>
        <p><strong>Visi Kami</strong> adalah menjadi pemimpin dalam penyediaan alat-alat luar angkasa yang dapat diakses oleh semua orang, dari penggemar astronomi hingga peneliti profesional. Kami ingin menginspirasi generasi baru untuk menjelajahi dan memahami alam semesta.</p>
        <p><strong>Misi Kami</strong> adalah menyediakan produk berkualitas tinggi yang mendukung eksplorasi luar angkasa dan pendidikan sains. Kami berkomitmen untuk:</p>
        <ul>
            <li>Menawarkan alat-alat luar angkasa yang inovatif dan fungsional.</li>
            <li>Memberikan informasi dan sumber daya yang mendidik tentang luar angkasa.</li>
            <li>Menyediakan layanan pelanggan yang responsif dan ramah.</li>
        </ul>

        <h3>Produk Kami</h3>
        <p>Di <strong>Galaksi Alat</strong>, kami menawarkan berbagai produk, termasuk:</p>
        <ul>
            <li><strong>Teleskop</strong>: Teleskop berkualitas tinggi untuk pengamatan bintang dan planet.</li>
            <li><strong>Peralatan Astronomi</strong>: Alat-alat untuk pengukuran dan penelitian luar angkasa.</li>
            <li><strong>Model Roket</strong>: Kit model roket untuk penggemar dan pelajar.</li>
            <li><strong>Buku dan Sumber Daya</strong>: Buku tentang astronomi, eksplorasi luar angkasa, dan teknologi luar angkasa.</li>
        </ul>

        <h3>Kenapa Memilih Kami?</h3>
        <p>Kami menawarkan:</p>
        <ul>
            <li><strong>Kualitas Terjamin</strong>: Kami hanya menjual produk dari merek terpercaya yang telah terbukti di industri luar angkasa.</li>
            <li><strong>Harga Bersaing</strong>: Kami berusaha untuk memberikan harga terbaik untuk setiap produk yang kami tawarkan.</li>
            <li><strong>Pengiriman Cepat</strong>: Kami bekerja sama dengan layanan pengiriman terbaik untuk memastikan produk Anda sampai tepat waktu.</li>
            <li><strong>Layanan Pelanggan</strong>: Tim kami siap membantu Anda dengan pertanyaan atau masalah yang mungkin Anda hadapi.</li>
        </ul>

        <h3>Hubungi Kami</h3>
        <p>Kami ingin mendengar dari Anda! Jika Anda memiliki pertanyaan, saran, atau umpan balik, jangan ragu untuk menghubungi kami melalui halaman <a href="contact.php">Kontak</a>. Kami berkomitmen untuk memberikan layanan terbaik kepada Anda.</p>

        <p>Terima kasih telah memilih <strong>Galaksi Alat</strong> sebagai tujuan belanja Anda untuk alat-alat luar angkasa. Kami berharap Anda menikmati pengalaman berbelanja di toko kami dan terinspirasi untuk menjelajahi alam semesta!</p>
    </div>

<!-- Footer -->
<footer>
    <p>&copy; 2023 Galaksi Alat. Semua hak dilindungi.</p>
</footer>
</body>
</html>