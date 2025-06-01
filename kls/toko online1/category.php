<?php
session_start();
include 'config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$kategori_id = intval($_GET['id']);

// Ambil info kategori
$sql_kategori = "SELECT * FROM categories WHERE id = ?";
$stmt_kategori = $conn->prepare($sql_kategori);
$stmt_kategori->bind_param("i", $kategori_id);
$stmt_kategori->execute();
$result_kategori = $stmt_kategori->get_result();

if ($result_kategori->num_rows == 0) {
    echo "Kategori tidak ditemukan.";
    exit();
}

$kategori = $result_kategori->fetch_assoc();
$stmt_kategori->close();

// Ambil produk berdasarkan kategori_id
$sql_produk = "SELECT * FROM produk WHERE kategori_id = ?";
$stmt_produk = $conn->prepare($sql_produk);
$stmt_produk->bind_param("i", $kategori_id);
$stmt_produk->execute();
$result_produk = $stmt_produk->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kategori: <?= htmlspecialchars($kategori['name']); ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Header (opsional bisa kamu include jika ada file header terpisah) -->
<h1>Kategori: <?= htmlspecialchars($kategori['name']); ?></h1>

<div class="product-grid">
    <?php if ($result_produk->num_rows > 0): ?>
        <?php while ($produk = $result_produk->fetch_assoc()): ?>
            <div class="product-card">
                <a href="detail_produk.php?id=<?= $produk['id']; ?>">
                    <img src="images/<?= htmlspecialchars($produk['gambar']); ?>" alt="<?= htmlspecialchars($produk['nama_produk']); ?>" class="product-image">
                    <h3 class="product-name"><?= htmlspecialchars($produk['nama_produk']); ?></h3>
                </a>
                <p class="product-price">Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></p>

                <form action="add_to_cart.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?= $produk['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="cart-button">Masukkan ke Keranjang</button>
                </form>

                <form action="checkout.php" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?= $produk['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="buy-button">Beli Sekarang</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Tidak ada produk dalam kategori ini.</p>
    <?php endif; ?>
</div>

<a href="index.php">← Kembali ke Beranda</a>

</body>
</html>
