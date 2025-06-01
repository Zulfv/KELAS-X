<?php
session_start();
include 'config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$product_id = intval($_GET['id']);
$sql = "SELECT * FROM produk WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Produk tidak ditemukan!";
    exit();
}

$product = $result->fetch_assoc();
$stmt->close();

// Ambil ulasan dari database
$ulasan_query = "SELECT * FROM ulasan WHERE produk_id = ? ORDER BY tanggal DESC";
$ulasan_stmt = $conn->prepare($ulasan_query);
$ulasan_stmt->bind_param("i", $product_id);
$ulasan_stmt->execute();
$ulasan_result = $ulasan_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['nama']); ?> - Detail Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Press Start 2P', cursive;
        background: url('images/space_background.jpg') no-repeat center center fixed;
        background-size: cover;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 10px; /* Ukuran dasar font dikecilkan */
    }
    .container {
        max-width: 600px; /* Lebih ramping */
        margin: auto;
        background: rgba(0,0,0,0.6);
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 20px #0ff;
    }
    img {
        width: 100%;
        max-width: 250px;
        border-radius: 10px;
        margin-bottom: 15px;
    }
    .button {
        background: #ffeb3b;
        color: black;
        border: none;
        padding: 6px 12px;
        font-size: 8px; /* Ukuran tombol lebih kecil */
        cursor: pointer;
        border-radius: 5px;
        margin-top: 8px;
        display: inline-block;
        text-decoration: none;
    }
    .ulasan-box {
        background: rgba(255,255,255,0.1);
        margin-top: 20px;
        padding: 15px;
        border-radius: 10px;
    }
    .ulasan-item {
        margin-bottom: 15px;
        text-align: left;
        font-size: 9px;
    }
    .ulasan-item h4 {
        margin: 0;
        color: #ffeb3b;
        font-size: 10px;
    }
    .rating {
        color: #ffd700;
        font-size: 9px;
    }
    textarea, input[type="text"], input[type="number"], select {
        font-family: 'Press Start 2P', cursive;
        width: 90%;
        padding: 8px;
        margin-top: 8px;
        background: black;
        color: white;
        border: 2px solid #ffeb3b;
        border-radius: 5px;
        font-size: 8px;
    }
    .stars {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: -1;
    }
    .star {
        position: absolute;
        width: 2px;
        height: 2px;
        background: white;
        animation: twinkle 1.5s infinite alternate;
    }
    @keyframes twinkle {
        from { opacity: 0.3; }
        to { opacity: 1; }
    }
</style>
</head>
<body>
    <div class="stars">
        <?php for ($i = 0; $i < 100; $i++): ?>
            <div class="star" style="top: <?= rand(0,100); ?>%; left: <?= rand(0,100); ?>%;"></div>
        <?php endfor; ?>
    </div>

    <div class="container">
        <h1><?php echo htmlspecialchars($product['nama']); ?></h1>
        <img src="images/<?= htmlspecialchars($product['gambar']); ?>" alt="<?= htmlspecialchars($product['nama']); ?>">
        <p><?= htmlspecialchars($product['deskripsi']); ?></p>
        <p>Harga: <span style="color: #0ff;">Rp<?= number_format($product['harga'], 0, ',', '.'); ?></span></p>

        <!-- Form Tambah ke Keranjang -->
        <form method="POST" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit" class="button">Tambah ke Keranjang</button>
        </form>

        <div class="ulasan-box">
            <h2>🧑‍🚀 Ulasan Pengguna</h2>
            <?php if ($ulasan_result->num_rows > 0): ?>
                <?php while ($ulasan = $ulasan_result->fetch_assoc()): ?>
                    <div class="ulasan-item">
                        <h4><?= htmlspecialchars($ulasan['nama']); ?></h4>
                        <div class="rating">
                            <?= str_repeat("⭐️", $ulasan['rating']); ?>
                        </div>
                        <p><?= htmlspecialchars($ulasan['komentar']); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Belum ada ulasan.</p>
            <?php endif; ?>

            <h2>📝 Tulis Ulasan</h2>
            <form method="POST" action="simpan_ulasan.php">
                <input type="hidden" name="produk_id" value="<?= $product['id']; ?>">
                <p><input type="text" name="nama" placeholder="Nama Anda" required></p>
                <p>
                    <select name="rating" required>
                        <option value="">Pilih Rating</option>
                        <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                        <option value="4">⭐️⭐️⭐️⭐️</option>
                        <option value="3">⭐️⭐️⭐️</option>
                        <option value="2">⭐️⭐️</option>
                        <option value="1">⭐️</option>
                    </select>
                </p>
                <p><textarea name="komentar" placeholder="Tulis komentar..." rows="4" required></textarea></p>
                <button type="submit" class="button">Kirim Ulasan</button>
            </form>
        </div>

        <div style="margin-top: 20px;">
            <a href="cart.php" class="button">🛒 Lihat Keranjang</a>
            <a href="index.php" class="button">🔙 Kembali</a>
        </div>
    </div>
</body>
</html>
