<?php
session_start();
include 'config.php';

// Pastikan session cart ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Tambah produk ke keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['name'], $_POST['price'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
}

$total = 0;
if (!empty($_SESSION['cart'])) {
    $total = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $_SESSION['cart']));
}
?>

 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: black;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Efek Bintang */
        .stars {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background: white;
            width: 2px;
            height: 2px;
            opacity: 0;
            animation: twinkle 3s infinite ease-in-out;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }

        .checkout-box {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            text-align: left;
            width: 400px;
            margin: auto;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            position: relative;
            z-index: 10;
        }

        label, input, textarea, select, button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: none;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button {
            flex: 1;
            margin: 5px;
            padding: 12px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            color: white;
            border: none;
        }

        .confirm {
            background-color: #28a745;
        }

        .confirm:hover {
            background-color: #218838;
        }

        .back {
            background-color: #ff4444;
        }

        .back:hover {
            background-color: #cc0000;
        }




    </style>
</head>
<body>
    <!-- Bintang animasi -->
    <div class="stars"></div>

    <h1>Checkout</h1>
    <div class="checkout-box">
        <form action="process_checkout.php" method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="phone">Nomor HP:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="address">Alamat:</label>
            <textarea id="address" name="address" required></textarea>
            
            <label for="payment">Metode Pembayaran:</label>
            <select id="payment" name="payment" required>
                <option value="transfer">Transfer Bank</option>
                <option value="cod">Cash on Delivery</option>
            </select>
            
            
            <div class="button-container">
                <button type="submit" class="button confirm">Konfirmasi Pembayaran</button>
                <a href="cart.php" class="button back">Kembali ke Keranjang</a>
            </div>
        </form>
    </div>

    <script>
        // Membuat bintang animasi secara dinamis
        function createStars() {
            const starContainer = document.querySelector('.stars');
            for (let i = 0; i < 100; i++) {
                let star = document.createElement('div');
                star.className = 'star';
                star.style.top = Math.random() * 100 + 'vh';
                star.style.left = Math.random() * 100 + 'vw';
                star.style.animationDuration = (Math.random() * 3 + 2) + 's';
                starContainer.appendChild(star);
            }
        }
        createStars();
    </script>
</body>
</html>
