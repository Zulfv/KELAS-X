<?php
// Hubungkan ke database jika diperlukan
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - THEMOON</title>
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
            <a href="about.php" class="retro-button">Tentang Kami</a>
        </nav>
    </header>

    <!-- Kontak -->
    <div class="container mt-5">
        <h1 class="text-center retro-title">Kontak Kami</h1>
        <p class="text-center">Kami senang mendengar dari Anda! Silakan isi formulir di bawah ini untuk menghubungi kami.</p>

        <form action="send_contact.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>

        <h2 class="mt-5">Informasi Kontak</h2>
        <p>Email: <a href="mailto:info@themoon.com" class="text-light">info@themoon.com</a></p>
        <p>Telepon: <a href="tel:+62123456789" class="text-light">+62 123 456 789</a></p>
        
        <h2 class="mt-5">Lokasi Kami</h2>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.123456789012!2d-122.419415684681!3d37.774929279759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c12345678%3A0x1234567890abcdef!2sTHEMOON%20Store!5e0!3m2!1sen!2sid!4v1612345678901!5m2!1sen!2sid" allowfullscreen></iframe>
        </div>
    </div>

    <footer class="retro-footer text-center p-4">
        <div class="container">
            <p>&copy; 2023 THEMOON. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>