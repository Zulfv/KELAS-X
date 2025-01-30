<?php
// Hubungkan ke database
include('includes/db.php');

// Query untuk kategori
$categories_query = "SELECT * FROM categories";
$categories_result = mysqli_query($conn, $categories_query);

// Query untuk iklan
$ads_query = "SELECT * FROM ads";
$ads_result = mysqli_query($conn, $ads_query);

// Query untuk produk
$products_query = "SELECT * FROM products";
$products_result = mysqli_query($conn, $products_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEMOON - Retro Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/retro.css">
</head>
<body class="retro-bg text-light"> 
    <!-- Header -->
    <header class="retro-header d-flex justify-content-between align-items-center p-3">
        <a href="index.php" class="retro-title">THEMOON</a>
        <form class="d-flex" action="products.php" method="GET">
            <input type="text" name="search" class="retro-input" placeholder="Cari produk...">
            <button type="submit" class="retro-button">Cari</button>
        </form>
        <div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="retro-button">Logout</a>
            <?php else: ?>
                <a href="login.php" class="retro-button">Login</a>
                <a href="register.php" class="retro-button">Register</a>
                <a href="cart.php" class="retro-button">Keranjang</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Iklan -->
    <h2 class="retro-title text-center mt-4">IKLAN PROMO</h2>
    <section class="retro-section">
        <div class="retro-container">
            <?php if (mysqli_num_rows($ads_result) > 0): ?>
                <?php while ($ad = mysqli_fetch_assoc($ads_result)): ?>
                    <div class="retro-card">
                        <a href="<?php echo $ad['link']; ?>" target="_blank">
                            <img src="images/<?php echo $ad['image']; ?>" class="retro-img">
                            <p><?php echo $ad['name']; ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-warning">Tidak ada iklan yang tersedia.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Kategori -->
    <h2 class="retro-title text-center mt-4">KATEGORI</h2>
    <section class="retro-section">
        <div class="retro-container">
            <?php if (mysqli_num_rows($categories_result) > 0): ?>
                <?php while ($category = mysqli_fetch_assoc($categories_result)): ?>
                    <div class="retro-card text-center">
                        <img src="images/<?php echo $category['image']; ?>" class="retro-img-circle">
                        <p><?php echo $category['name']; ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-warning">Tidak ada kategori yang tersedia.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Produk -->
    <h2 class="retro-title text-center mt-4">PRODUK</h2>
    <section class="retro-section">
        <div class="retro-container">
            <?php if (mysqli_num_rows($products_result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($products_result)): ?>
                    <div class="retro-card">
                        <img src="images/<?php echo htmlspecialchars($row['image_url']); ?>" class="retro-img">
                        <h6><?php echo htmlspecialchars($row['name']); ?></h6>
                        <p class="retro-price">Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></p>
                        <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="retro-button">Tambah ke Keranjang</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-warning text-center">Tidak ada produk.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer class="retro-footer text-center p-4">
    <div class="container">
        <h5 class="mt-4">Tentang Kami</h5>
        <p class="mb-4">Kami adalah THEMOON, toko retro yang menyediakan berbagai produk unik dan menarik. Temukan barang-barang vintage dan modern yang akan membuat gaya Anda semakin keren!</p>

        <h5 class="mt-4">Link Penting</h5>
        <ul class="list-unstyled">
            <li><a href="index.php" class="text-light h5">Beranda</a></li>
            <li><a href="products.php" class="text-light h5">Produk</a></li>
            <li><a href="about.php" class="text-light h5">Tentang Kami</a></li>
            <li><a href="contact.php" class="text-light h5">Kontak</a></li>
        </ul>

        <h5 class="mt-4">Ikuti Kami</h5>
        <div class="social-icons">
            <a href="https://www.facebook.com/yourpage" target="_blank" class="text-light me-3">
                <i class="fab fa-facebook-f fa-2x"></i>
            </a>
            <a href="https://twitter.com/yourprofile" target="_blank" class="text-light me-3">
                <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a href="https://www.instagram.com/yourprofile" target="_blank" class="text-light me-3">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <a href="https://www.youtube.com/yourchannel" target="_blank" class="text-light">
                <i class="fab fa-youtube fa-2x"></i>
            </a>
        </div>
        <hr class="my-4">
        <p>&copy; 2023 THEMOON. All rights reserved.</p>
    </div>
</footer>

    <script src="script.js"></script>
</body>
</html>
