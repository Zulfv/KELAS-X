<?php
session_start();
require_once '../dbcontroller.php';
$conn = $koneksi;

// --- Handle tambah ke keranjang ---
if (isset($_POST['tambah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $qty = 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
    } else {
        $_SESSION['cart'][$id] = [
            'nama' => $nama,
            'harga' => $harga,
            'gambar' => $gambar,
            'qty' => $qty
        ];
    }

    header("Location: produk.php");
    exit;
}

// --- Query ---
$search = $_GET['search'] ?? '';
$kategori = $_GET['kategori'] ?? '';
$page = $_GET['page'] ?? 1;
$limit = 8;
$offset = ($page - 1) * $limit;

$where = [];
if ($search) $where[] = "nama_menu LIKE '%$search%'";
if ($kategori) $where[] = "id_kategori = '$kategori'";
$whereSQL = count($where) ? "WHERE " . implode(" AND ", $where) : "";

$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM menu $whereSQL"))['jml'];
$pages = ceil($total / $limit);

$kategoriResult = mysqli_query($conn, "SELECT id_kategori, nama_kategori FROM kategori");
$menuResult = mysqli_query($conn, "SELECT * FROM menu $whereSQL LIMIT $limit OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Menu Restoran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-warning navbar-light">
  <div class="container">
    <a class="navbar-brand fw-bold" href="../index.php"><i class="bi bi-bag-fill me-2"></i>Restoran Lezat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php"><i class="bi bi-house-fill me-1"></i>Home</a></li>
        <li class="nav-item"><a class="nav-link" href="produk.php"><i class="bi bi-card-list me-1"></i>Menu</a></li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <i class="bi bi-cart-fill me-1"></i>Keranjang
            <?php
              $total_item = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0;
              if ($total_item > 0) {
                echo "<span class='badge bg-danger ms-1'>$total_item</span>";
              }
            ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Header -->
<div class="container text-center my-4">
  <h2 class="fw-bold"><i class="bi bi-star-fill text-warning me-2"></i>Menu Paling Laris</h2>
</div>

<!-- Search & Filter -->
<div class="container mb-4">
  <form method="GET" class="row g-2">
    <div class="col-md-5">
      <input type="text" name="search" class="form-control" placeholder="Cari menu..." value="<?= htmlspecialchars($search) ?>" />
    </div>
    <div class="col-md-4">
      <select name="kategori" class="form-select">
        <option value="">Semua Kategori</option>
        <?php while ($kat = mysqli_fetch_assoc($kategoriResult)): ?>
          <option value="<?= $kat['id_kategori'] ?>" <?= $kategori == $kat['id_kategori'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($kat['nama_kategori']) ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="col-md-3">
      <button type="submit" class="btn btn-warning w-100"><i class="bi bi-search me-1"></i>Cari</button>
    </div>
  </form>
</div>

<!-- Menu Cards -->
<div class="container pb-4">
  <div class="row">
    <?php while($row = mysqli_fetch_assoc($menuResult)): ?>
    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="../img/<?= htmlspecialchars($row['gambar']) ?>" class="card-img-top" style="height: 180px; object-fit: cover;" alt="<?= htmlspecialchars($row['nama_menu']) ?>" />
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><i class="bi bi-file-earmark-text me-1"></i><?= htmlspecialchars($row['nama_menu']) ?></h5>
          <p class="fw-semibold text-warning">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
          <form method="post" class="mt-auto">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="nama_menu" value="<?= htmlspecialchars($row['nama_menu']) ?>">
            <input type="hidden" name="harga" value="<?= $row['harga'] ?>">
            <input type="hidden" name="gambar" value="<?= htmlspecialchars($row['gambar']) ?>">
            <button type="submit" name="tambah" class="btn btn-warning w-100"><i class="bi bi-cart-plus me-1"></i>+ Keranjang</button>
          </form>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

  <!-- Pagination -->
  <nav class="d-flex justify-content-center">
    <ul class="pagination">
      <?php for ($i = 1; $i <= $pages; $i++): ?>
        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
          <a class="page-link" href="?search=<?= urlencode($search) ?>&kategori=<?= urlencode($kategori) ?>&page=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
</div>

<!-- Footer -->
<footer class="bg-warning text-dark text-center py-3">
  <p class="mb-0">&copy; 2025 Restoran Lezat</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
