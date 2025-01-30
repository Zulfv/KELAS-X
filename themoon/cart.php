<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #2b2b2b;
            color: #fff;
            text-align: center;
        }
        .retro-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 3px solid #ffcc00;
            border-radius: 10px;
            background-color: #1a1a1a;
            box-shadow: 0 4px 8px rgba(255, 204, 0, 0.8);
        }
        .retro-title {
            font-size: 24px;
            color: #ffcc00;
        }
        .retro-list {
            list-style: none;
            padding: 0;
        }
        .retro-card {
            background-color: #333;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 2px solid #ffcc00;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .retro-button {
            background-color: #ff4444;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .retro-button:hover {
            background-color: #cc0000;
        }
        .retro-text-warning {
            color: #ffcc00;
        }
    </style>
</head>
<body>
    <div class="retro-container">
        <h1 class="retro-title">Keranjang Belanja</h1>
        <ul class="retro-list">
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <li class="retro-card">
                        <span><?php echo htmlspecialchars($item['name']); ?> - Rp. <?php echo number_format($item['price']); ?></span>
                        <form method="post" action="process_cart.php" style="display:inline;">
                            <input type="hidden" name="item_index" value="<?php echo $index; ?>">
                            <button type="submit" name="remove_from_cart" class="retro-button">Hapus</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="retro-text-warning">Keranjang Anda kosong.</li>
            <?php endif; ?>
        </ul>
        <div class="text-center mt-4">
            <a href="index.php" class="retro-button">Kembali ke Produk</a>
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <a href="checkout.php" class="retro-button">Checkout</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
