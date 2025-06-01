<?php
session_start();
include 'config.php';

// Ambil kategori dari database
$sql_categories = "SELECT * FROM categories";
$result_categories = $conn->query($sql_categories);
$categories = [];
if ($result_categories && $result_categories->num_rows > 0) {
    while ($category = $result_categories->fetch_assoc()) {
        $categories[] = $category;
    }
}

// Ambil input pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mengambil produk berdasarkan pencarian
$sql = "SELECT * FROM produk WHERE nama LIKE '%$search%'";
$result = $conn->query($sql);
if (!$result) {
    echo "Error: " . $conn->error;
}

// Query untuk mengambil banner
$sql_banners = "SELECT * FROM banners";
$result_banners = $conn->query($sql_banners);
$banners = [];
if ($result_banners) {
    if ($result_banners->num_rows > 0) {
        while ($banner = $result_banners->fetch_assoc()) {
            $banners[] = $banner;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> <!-- Link ke file CSS terpisah -->
    <title>Toko Online</title>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <img src="images/rocket.png" alt="Rocket" class="rocket-icon">
            <h1>OXTET</h1>
            <div class="header-links">
                <a href="index.php">Home</a>
                <a href="cart.php">Cart</a>
                <a href="about.php">About</a>
                <a href="produk.php">Product</a>
                <form method="GET" action="search.php" class="search-form">
              <input type="text" name="search" placeholder="Cari produk..." required>
               <button type="submit">Cari</button>
               </form>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="profile.php">Profil Saya</a>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="register.php">Daftar</a>
                    <a href="login.php">Login</a>
                <?php endif; ?>
                <a href="bantuan.php">Bantuan</a>
            </div>
        </div>
    </div>

    <!-- Banner Slideshow -->
    <div class="banner">
        <?php foreach ($banners as $index => $banner): ?>
            <img src="images/<?php echo htmlspecialchars($banner['image']); ?>" alt="<?php echo htmlspecialchars($banner['alt_text']); ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>">
        <?php endforeach; ?>
        <div class="banner-controls">
            <button id="prev">❮</button>
            <button id="next">❯</button>
        </div>
    </div>

    <!-- Kategori -->
    <div class="categories">
        <h2 class="category-title">Kategori</h2>
        <ul>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="category.php?id=<?php echo $category['id']; ?>">
                            <img src="images/<?php echo htmlspecialchars($category['image']); ?>" alt="<?php echo htmlspecialchars($category['name']); ?>" class="category-image">
                            <br>
                            <span class="category-name"><?php echo htmlspecialchars($category['name']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Tidak ada kategori ditemukan.</li>
            <?php endif; ?>
        </ul>
    </div>

    <h2>Produk Terlaris</h2>
<div class="product-grid">
    <?php
    $sql = "SELECT * FROM produk ORDER BY terjual DESC LIMIT 10";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            echo "<div class='product-card'>";
            echo "<a href='detail_produk.php?id=" . $product['id'] . "'>";
            echo "<img src='images/" . htmlspecialchars($product['gambar']) . "' class='product-image'>";
            echo "<h3 class='product-name'>" . htmlspecialchars($product['nama']) . "</h3>";
            echo "</a>";
            echo "<p class='product-price'>Rp " . number_format($product['harga'], 0, ',', '.') . "</p>";

            echo "<form action='add_to_cart.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='product_id' value='" . $product['id'] . "'>";
            echo "<input type='hidden' name='quantity' value='1'>";
            echo "<button type='submit' class='cart-button'>Masukkan ke Keranjang</button>";
            echo "</form>";

            echo "<form action='checkout.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='product_id' value='" . $product['id'] . "'>";
            echo "<input type='hidden' name='quantity' value='1'>";
            echo "<button type='submit' class='buy-button'>Beli Sekarang</button>";
            echo "</form>";

            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada produk yang ditemukan.</p>";
    }
    ?>
</div>



    <script>
        // JavaScript untuk mengatur slideshow
        let currentIndex = 0;
        const images = document.querySelectorAll('.banner img');
        const totalImages = images.length;

        function showImage(index) {
            images.forEach((img, i) => {
                img.classList.remove('active');
                if (i === index) {
                    img.classList.add('active');
                }
            });
        }

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalImages;
            showImage(currentIndex);
        });

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            showImage(currentIndex);
        });

        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalImages;
            showImage(currentIndex);
        }, 5000);
    </script>

        <!-- Footer -->
<div class="footer">
  <!-- Sosial Media -->
   
 <div class="footer-section">
      <h3><span class="icon">🌐</span> Sosial Media</h3>
      <div class="footer-social">
         <div class="social-item"><span>🟦</span><a href="#">Facebook</a></div>
         <div class="social-item"><span>📷</span><a href="#">Instagram</a></div>
          <div class="social-item"><span>🐦</span><a href="#">Twitter</a></div>
          <div class="social-item"><span>🎥</span><a href="#">YouTube</a></div>
      </div>
 </div>



  <!-- Pembayaran -->
  <div class="footer-section">
    <h3>💳 Pembayaran</h3>
    <ul>
      <li>🏦 Transfer Bank</li>
      <li>📱 E-Wallet (OVO, Dana, Gopay)</li>
      <li>💸 COD (Bayar di Tempat)</li>
      <li>🪙 Koin Digital</li>
    </ul>
  </div>

  <!-- Kontak -->
  <div class="footer-section">
    <h3>📞 Kontak</h3>
    <ul>
      <li>Email: support@oxtet.com</li>
      <li>Telepon: 0812-3456-7890</li>
      <li>Alamat: Jakarta, Indonesia</li>
    </ul>
  </div>
</div>

<!-- Footer Bottom -->
<div class="footer-bottom">
  &copy; 2025 OXTET. Semua Hak Dilindungi.
</div>

</body>
</html>
