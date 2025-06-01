<!DOCTYPE html>
<html>
<head>
    <title>Tentang Kami</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffaf3;
        }
        .bg-orange {
            background-color: #ff8800;
            color: white;
        }
        .lead {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="bg-orange py-4">
        <div class="container text-center">
            <h1 class="display-5 fw-bold">Tentang Kami</h1>
            <p class="lead">Selamat datang di RestoKu - Tempat terbaik untuk menikmati hidangan lezat!</p>
        </div>
    </div>

    <!-- Isi Konten -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="https://images.unsplash.com/photo-1600891963934-77e7b4b0e3bb" class="img-fluid rounded shadow" alt="Foto Restoran">
            </div>
            <div class="col-md-6">
                <h3 class="text-warning mb-3">RestoKu – Rasa dan Kenangan</h3>
                <p>Kami hadir untuk menyajikan makanan berkualitas tinggi dengan cita rasa yang autentik dan pelayanan yang ramah. Sejak didirikan, RestoKu telah menjadi pilihan utama keluarga, teman, dan pasangan yang ingin menikmati hidangan lezat dalam suasana nyaman.</p>
                <p>Dari makanan tradisional Indonesia hingga fusion modern, kami selalu mengutamakan bahan segar dan teknik memasak terbaik untuk memastikan pengalaman makan yang tak terlupakan.</p>
                <p><strong>Lokasi:</strong> Jl. Kuliner No. 123, Kota Lezat<br>
                <strong>Jam Buka:</strong> Setiap hari, 10.00 - 22.00</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-orange py-3 text-center">
        <p class="mb-0">&copy; <?= date("Y") ?> RestoKu. Semua Hak Dilindungi.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
