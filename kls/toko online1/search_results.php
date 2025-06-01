<?php
session_start();
include 'config.php';

// Ambil hasil pencarian dari session
$search_results = isset($_SESSION['search_results']) ? $_SESSION['search_results'] : [];
unset($_SESSION['search_results']); // Hapus session setelah ditampilkan
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Hasil Pencarian</h2>
    <?php if (!empty($search_results)): ?>
        <ul>
            <?php foreach ($search_results as $product): ?>
                <li>
                    <a href="detail_produk.php?id=<?php echo $product['id']; ?>">
                        <?php echo htmlspecialchars($product['nama_produk']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Tidak ada hasil yang ditemukan.</p>
    <?php endif; ?>

    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
