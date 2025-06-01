<?php
session_start();
require 'config.php'; // Koneksi ke database

// Ambil semua produk dari database
$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Produk - Galaksi Alat</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #5765a2;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .produk-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .produk {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            margin: 10px;
            width: 250px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .produk img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .produk h3 {
            font-size: 14px;
        }
        .produk h3 a {
            color: #ffeb3b;
            text-decoration: none;
        }
        .produk p {
            font-size: 12px;
        }
        .produk .harga {
            font-size: 14px;
            font-weight: bold;
        }
        .produk form {
            margin-top: 10px;
        }
        .produk input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 12px;
            margin-right: 5px;
            border-radius: 5px;
            border: none;
        }
        .produk button {
            padding: 8px 12px;
            background: #ffeb3b;
            color: black;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
        }
        .produk button:hover {
            background: #ffe600;
        }
        .tombol {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #ffeb3b;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Produk Kami</h1>
    </div>
    <div class="produk-container">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="produk">
                <img src="images/<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['nama_produk']); ?>">
                <h3>
                    <a href="detail_produk.php?id=<?= $row['id']; ?>">
                        <?= htmlspecialchars($row['nama']); ?>
                    </a>
                </h3>
                <p class="harga">Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
                <p><?= htmlspecialchars($row['deskripsi']); ?></p>

                <!-- Form Tambah ke Keranjang -->
                <form method="POST" action="add_to_cart.php">
                    <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Tambah ke Keranjang</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>

    <a href="cart.php" class="tombol">🛒 Lihat Keranjang</a>
</body>
</html>
