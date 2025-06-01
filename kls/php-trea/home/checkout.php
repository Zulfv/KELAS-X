<?php
session_start();
require_once '../dbcontroller.php';

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-warning navbar-light">
    <div class="container">
      <a class="navbar-brand fw-bold" href="../index.php"><i class="bi bi-bag-fill me-2"></i>Restoran Lezat</a>
    </div>
  </nav>

  <div class="container my-5">
    <h3 class="mb-4"><i class="bi bi-clipboard-check me-2 text-success"></i>Checkout Pesanan</h3>

    <form action="proses_checkout.php" method="POST" class="row g-3">
      <div class="col-md-6">
        <label for="nama" class="form-label">Nama Pelanggan</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label for="meja" class="form-label">Nomor Meja</label>
        <input type="number" name="meja" id="meja" class="form-control" required>
      </div>

      <div class="col-12">
        <h5 class="mt-4 mb-2">Rincian Pesanan</h5>
        <ul class="list-group">
          <?php 
          $total = 0;
          foreach ($_SESSION['cart'] as $item): 
            $subtotal = $item['harga'] * $item['qty'];
            $total += $subtotal;
          ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= $item['nama'] ?> (x<?= $item['qty'] ?>)
            <span>Rp<?= number_format($subtotal, 0, ',', '.') ?></span>
          </li>
          <?php endforeach; ?>
          <li class="list-group-item d-flex justify-content-between fw-bold">
            Total
            <span>Rp<?= number_format($total, 0, ',', '.') ?></span>
          </li>
        </ul>
      </div>

      <div class="col-12 text-end">
        <button type="submit" class="btn btn-success btn-lg mt-3">
          <i class="bi bi-cash-stack me-1"></i>Bayar Sekarang
        </button>
      </div>
    </form>
  </div>

  <footer class="bg-warning text-dark text-center py-3">
    <p class="mb-0">&copy; 2025 Restoran Lezat</p>
  </footer>
</body>
</html>
