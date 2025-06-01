<?php
session_start();
require_once '../dbcontroller.php';

$conn = $koneksi;

function getStock($conn, $id_menu) {
    $id_menu = mysqli_real_escape_string($conn, $id_menu);
    $res = mysqli_query($conn, "SELECT stok FROM menu WHERE id = '$id_menu' LIMIT 1");
    if ($res && $row = mysqli_fetch_assoc($res)) {
        return (int)$row['stok'];
    }
    return 0;
}

// Tambah ke keranjang
if (isset($_POST['tambah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $qty = (int)$_POST['qty'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $stok = getStock($conn, $id);
    $qty = min($qty, $stok);

    if (isset($_SESSION['cart'][$id])) {
        $newQty = $_SESSION['cart'][$id]['qty'] + $qty;
        $_SESSION['cart'][$id]['qty'] = min($newQty, $stok);
    } else {
        $_SESSION['cart'][$id] = [
            'nama' => $nama,
            'harga' => $harga,
            'gambar' => $gambar,
            'qty' => $qty
        ];
    }

    header("Location: cart.php");
    exit;
}

if (isset($_GET['hapus'])) {
    unset($_SESSION['cart'][$_GET['hapus']]);
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Keranjang Belanja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-warning">
    <div class="container">
      <a class="navbar-brand fw-bold" href="../index.php"><i class="bi bi-basket-fill me-2"></i>Restoran Lezat</a>
    </div>
  </nav>

  <div class="container my-5">
    <h3 class="mb-4"><i class="bi bi-cart4 me-2"></i>Keranjang Belanja</h3>

    <?php if (empty($_SESSION['cart'])): ?>
      <div class="alert alert-warning text-center">Keranjang masih kosong.</div>
    <?php else: ?>
      <table class="table table-striped table-bordered align-middle">
        <thead class="table-warning text-center">
          <tr>
            <th>Gambar</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Stok</th>
            <th>Subtotal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
          <?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <?php
              $stok = getStock($conn, $id);
              $qty = min($item['qty'], $stok);
              $_SESSION['cart'][$id]['qty'] = $qty;
              $subtotal = $item['harga'] * $qty;
              $total += $subtotal;
            ?>
            <tr class="text-center">
              <td><img src="../uploads/<?= htmlspecialchars($item['gambar']) ?>" class="img-thumbnail" style="width: 60px; height: 60px;"></td>
              <td><?= htmlspecialchars($item['nama']) ?></td>
              <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
              <td><?= $qty ?></td>
              <td><?= $stok ?></td>
              <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
              <td>
                <a href="cart.php?hapus=<?= $id ?>" class="btn btn-sm btn-danger" title="Hapus">
                  <i class="bi bi-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr class="table-warning">
            <th colspan="5" class="text-end">Total</th>
            <th colspan="2" class="text-end">Rp<?= number_format($total, 0, ',', '.') ?></th>
          </tr>
        </tfoot>
      </table>
      <div class="text-end">
        <a href="checkout.php" class="btn btn-success"><i class="bi bi-credit-card"></i> Checkout</a>
      </div>
    <?php endif; ?>
  </div>

  <footer class="bg-warning text-white text-center py-3">
    &copy; 2025 Restoran Lezat
  </footer>
</body>
</html>
