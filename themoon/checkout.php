<?php
session_start();

// Cek apakah keranjang belanja kosong
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header('Location: cart.php'); // Arahkan ke keranjang jika kosong
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #2b2b2b;
            color: #fff;
            text-align: center;
        }
        .retro-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 3px solid #ffcc00;
            border-radius: 10px;
            background-color: #1a1a1a;
            box-shadow: 0 4px 8px rgba(255, 204, 0, 0.8);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .retro-container.show {
            opacity: 1;
            transform: translateY(0);
        }
        .retro-title {
            font-size: 24px;
            color: #ffcc00;
        }
        .retro-label {
            display: block;
            margin: 10px 0 5px;
            color: #ffcc00;
        }
        .retro-input {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ffcc00;
            border-radius: 5px;
            background-color: #333;
            color: white;
        }
        .retro-button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .retro-button:hover {
            background-color: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ffcc00;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="retro-container" id="checkoutContainer">
        <h1 class="retro-title">Checkout</h1>
        <form method="post" action="process_checkout.php">
            <label for="name" class="retro-label">Nama:</label>
            <input type="text" name="name" class="retro-input" required>
            <label for="address" class="retro-label">Alamat:</label>
            <input type="text" name="address" class="retro-input" required>
            <button type="submit" class="retro-button">Proses Pembayaran</button>
        </form>
        <a href="cart.php" class="back-link">Kembali ke Keranjang</a>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('checkoutContainer').classList.add('show');
        };
    </script>
</body>
</html>
