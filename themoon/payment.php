<?php
session_start();

// Cek apakah keranjang belanja kosong
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header('Location: cart.php'); // Arahkan ke keranjang jika kosong
    exit();
}

// Cek apakah informasi pengiriman sudah ada
if (!isset($_SESSION['checkout_info'])) {
    header('Location: checkout.php'); // Arahkan ke halaman checkout jika tidak ada informasi
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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
    <div class="retro-container" id="paymentContainer">
        <h1 class="retro-title">Pembayaran</h1>
        <form method="post" action="process_payment.php">
            <label for="card_number" class="retro-label">Nomor Kartu:</label>
            <input type="text" name="card_number" class="retro-input" required>
            <label for="card_name" class="retro-label">Nama Pemegang Kartu:</label>
            <input type="text" name="card_name" class="retro-input" required>
            <label for="expiry_date" class="retro-label">Tanggal Kadaluarsa (MM/YY):</label>
            <input type="text" name="expiry_date" class="retro-input" required>
            <label for="cvv" class="retro-label">CVV:</label>
            <input type="number" name="cvv" class="retro-input" required>
            <button type="submit" class="retro-button">Bayar</button>
        </form>
        <a href="checkout.php" class="back-link">Kembali ke Checkout</a>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('paymentContainer').classList.add('show');
        };
    </script>
</body>
</html>
