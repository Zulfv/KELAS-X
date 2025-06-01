<?php
session_start(); // Mulai sesi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Bantuan - Galaksi Alat</title>
    <style>
        /* Gaya Umum */
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #5765a2;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        
        /* Header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #0d47a1;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .header h1 {
            margin: 0 15px;
            font-size: 16px;
        }

        .header-links a {
            color: white;
            text-decoration: none;
            margin: 0 8px;
            font-size: 10px;
        }

        .header-links a:hover {
            color: #ffeb3b;
        }

        .rocket-icon {
            width: 30px;
            height: auto;
        }

        /* Konten Bantuan */
        .bantuan-content {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            margin: 15px auto;
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        .bantuan-content h2, .bantuan-content h3 {
            color: #ffeb3b;
            font-size: 14px;
        }

        .bantuan-content p, .bantuan-content ul {
            font-size: 10px;
        }

        .bantuan-content ul {
            list-style: none;
            padding: 0;
        }

        .bantuan-content ul li {
            margin-bottom: 8px;
        }

        .bantuan-content ul li a {
            color: #42a5f5;
            text-decoration: none;
        }

        /* Footer */
        .footer {
    background-color: #222;
    color: white;
    padding: 40px 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
}

.footer-section {
    width: 30%;
    min-width: 200px;
}

.footer h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.footer ul {
    list-style: none;
    padding: 0;
}

.footer ul li {
    margin-bottom: 8px;
}

.footer ul li a {
    color: #bbb;
    text-decoration: none;
    font-size: 14px;
}

.footer ul li a:hover {
    color: #ff9800;
}

.footer-social {
    width: 100%; /* Menggunakan seluruh lebar */
    text-align: center; /* Menjadikan teks dan ikon berada di tengah */
    display: flex;
    flex-direction: column; /* Susun ikon ke bawah */
    align-items: center;
    gap: 10px; /* Jarak antar ikon */
}

.footer-social a {
    display: inline-block; /* Supaya ikon tetap dalam satu baris */
    color: white;
    font-size: 15px;
    transition: 0.3s;
    text-align: center;
}

.footer-social a:hover {
    color: #ff9800;
}


.footer-bottom {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #bbb;
}

    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <img src="images/rocket.png" alt="Rocket" class="rocket-icon">
            <h1>OXTET BANTU</h1>
        </div>
        <div class="header-links">
            <a href="index.php">Home</a>
            <a href="cart.php">Cart</a>
            <a href="about.php">About</a>
            <a href="product.php">Product</a>
            <a href="register.php">Daftar</a>
            <a href="login.php">Login</a>
            <a href="bantuan.php">Bantuan</a>
        </div>
    </div>

    <!-- Konten Bantuan -->
    <div class="bantuan-content">
        <h2>Bantuan</h2>
        <p>Selamat datang di halaman Bantuan Galaksi Alat! Kami di sini untuk membantu Anda dengan pertanyaan atau masalah yang mungkin Anda hadapi.</p>

        <h3>Kontak Dukungan Pelanggan</h3>
        <p>Jika Anda memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi tim dukungan pelanggan kami:</p>
        <ul>
            <li>Email: <a href="mailto:support@galaksialat.com">support@galaksialat.com</a></li>
            <li>Telepon: +62 123 456 789</li>
            <li>Jam Operasional: Senin - Jumat, 09:00 - 17:00 WIB</li>
        </ul>

        <h3>Pertanyaan yang Sering Diajukan (FAQ)</h3>
        <h4>1. Bagaimana cara melakukan pemesanan?</h4>
        <p>Untuk melakukan pemesanan, pilih produk yang Anda inginkan, tambahkan ke keranjang belanja, dan ikuti langkah-langkah untuk menyelesaikan pembayaran.</p>

        <h4>2. Apakah ada biaya pengiriman?</h4>
        <p>Biaya pengiriman tergantung pada lokasi Anda dan berat produk. Biaya akan ditampilkan sebelum Anda menyelesaikan pemesanan.</p>

        <h4>3. Bagaimana cara melacak pesanan saya?</h4>
        <p>Setelah pesanan Anda dikirim, Anda akan menerima email dengan nomor pelacakan. Anda dapat menggunakan nomor tersebut untuk melacak status pengiriman.</p>

        <h4>4. Apa yang harus saya lakukan jika produk yang saya terima rusak?</h4>
        <p>Jika Anda menerima produk yang rusak, silakan hubungi kami dalam waktu 7 hari setelah menerima produk untuk mendapatkan penggantian atau pengembalian.</p>

        <h3>Panduan Penggunaan Produk</h3>
        <p>Untuk panduan penggunaan produk, silakan kunjungi halaman produk masing-masing atau hubungi kami jika Anda memerlukan bantuan lebih lanjut.</p>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-section">
            <h3>Pembayaran</h3>
            <ul>
                <li><img src="images/payment-visa.png" alt="Visa"></li>
                <li><img src="images/payment-mastercard.png" alt="Mastercard"></li>
                <li><img src="images/payment-gopay.png" alt="GoPay"></li>
                <li><img src="images/payment-ovo.png" alt="OVO"></li>
            </ul>
        </div>

        <div class="footer-section footer-kontak">
            <h3>Kontak</h3>
            <ul>
                <li>Email: support@oxtet.com</li>
                <li>Telepon: 0812-3456-7890</li>
                <li>Alamat: Jakarta, Indonesia</li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Sosial Media</h3>
            <div class="footer-social">
                <a href="#"><img src="images/icon-facebook.png" alt="Facebook"></a>
                <a href="#"><img src="images/icon-instagram.png" alt="Instagram"></a>
                <a href="#"><img src="images/icon-twitter.png" alt="Twitter"></a>
                <a href="#"><img src="images/icon-youtube.png" alt="YouTube"></a>
            </div>
        </div>
    </footer>

    <div class="footer-bottom">
        &copy; 2025 OXTET. Semua Hak Dilindungi.
    </div>

</body>
</html>
