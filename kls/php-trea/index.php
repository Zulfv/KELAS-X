<?php
session_start();
require_once 'dbcontroller.php';
$conn = $koneksi;

// Ambil 4 menu paling laris untuk ditampilkan (sesuai gambar)
$menuResult = mysqli_query($conn, "SELECT * FROM menu ORDER BY jumlah DESC LIMIT 4");

// Hitung total item di keranjang
$total_item = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restoran Lezat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- Notifikasi sukses -->
<?php if (isset($_GET['sukses'])): ?>
  <div id="suksesAlert" class="alert alert-success alert-dismissible fade show mx-auto mt-3" role="alert" style="max-width: 600px;">
    <i class="bi bi-check-circle-fill me-2"></i>Pesanan berhasil ditambahkan ke keranjang!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-warning shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-shop me-2"></i>Restoran Lezat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php"><i class="bi bi-house-fill me-1"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home/produk.php"><i class="bi bi-card-list me-1"></i>Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home/tentangkami.php"><i class="bi bi-info-circle me-1"></i>Tentang Kami</a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link" href="home/cart.php">
            <i class="bi bi-cart-fill me-1"></i>Keranjang
            <?php if ($total_item > 0): ?>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= $total_item ?>
                <span class="visually-hidden">items in cart</span>
              </span>
            <?php endif; ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php"><i class="bi bi-person-plus-fill me-1"></i>Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Header -->
<div class="bg-dark text-white text-center py-5">
  <div class="container">
    <h1 class="display-4 fw-bold"><i class="bi bi-basket-fill me-2"></i>Selamat Datang di Restoran Lezat</h1>
    <p class="lead mb-4">Nikmati hidangan terbaik kami setiap hari!</p>
    <a href="home/produk.php" class="btn btn-warning btn-lg"><i class="bi bi-eye-fill me-2"></i>Lihat Menu</a>
  </div>
</div>

<!-- Menu Paling Laris -->
<div class="container my-5">
  <h2 class="text-center fw-bold mb-4"><i class="bi bi-star-fill text-warning me-2"></i>Menu Paling Laris</h2>
  <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
    <?php while($row = mysqli_fetch_assoc($menuResult)): ?>
    <div class="col">
      <div class="card h-100 border-0 shadow-sm p-3">
        <div class="card-body">
          <h6 class="card-title text-secondary"><i class="bi bi-file-earmark-text me-2"></i><?= htmlspecialchars($row['nama_menu']) ?></h6>
          <p class="card-text fw-bold text-warning">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
          <a href="home/tambah_cart.php?id=<?= $row['id'] ?>" class="btn btn-warning w-100"><i class="bi bi-cart-plus me-2"></i>Keranjang</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Footer -->
<footer class="bg-warning text-dark text-center py-3">
  <p class="mb-0">© 2025 Restoran Lezat</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Auto close alert setelah 3 detik
  const alertBox = document.getElementById('suksesAlert');
  if (alertBox) {
    setTimeout(() => {
      const alert = new bootstrap.Alert(alertBox);
      alert.close();
    }, 3000);
  }
</script>
</body>
</html>