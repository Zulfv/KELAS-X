<?php
session_start();

include 'config.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: black;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
            background-image: url('images/space_background.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            box-shadow: 0 0 15px rgba(0, 0, 255, 0.5);
        }

        th, td {
            border: 1px solid white;
            padding: 10px;
        }

        .alien, .astronot, .planet {
            position: absolute;
            animation: floating 5s infinite alternate ease-in-out;
        }

        .alien {
            top: 20%;
            left: 10%;
            width: 100px;
        }


        @keyframes floating {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-20px);
            }
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px;
            background: #ffeb3b;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .update-button, .remove-button {
            display: inline-block;
            padding: 8px 15px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid #ffeb3b;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .update-button:hover, .remove-button:hover {
            background: #ffeb3b;
            color: black;
        }
        .checkout-button, .continue-shopping-button {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            background: linear-gradient(45deg, #00f, #0ff);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.8);
            font-size: 16px;
            transition: 0.3s;
        }
        .checkout-button:hover, .continue-shopping-button:hover {
            background: linear-gradient(45deg, #0ff, #00f);
            box-shadow: 0 0 20px rgba(0, 255, 255, 1);
        }
        .cart-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            animation: twinkle 1.5s infinite alternate;
        }

        .stars, .alien, .astronot, .planet {
            pointer-events: none;
        }

        @keyframes twinkle {
            from {
                opacity: 0.3;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="stars"></div>
    <img src="images/alien.png" class="alien" alt="Alien">

    <h2>Keranjang Belanja</h2>
    <table border="1">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $item):
            $item_total = $item['price'] * $item['quantity'];
            $total += $item_total;
        ?>
            <tr>
                <td><?= htmlspecialchars($item['nama']); ?></td>
                <td>Rp<?= number_format($item['price'], 0, ',', '.'); ?></td>
                <td>
                    <button class="quantity-change decrease" data-id="<?= $id; ?>">-</button>
                    <input type="number" nama="quantity" value="<?= $item['quantity']; ?>" min="1" class="quantity-input" data-id="<?= $id; ?>">
                    <button class="quantity-change increase" data-id="<?= $id; ?>">+</button>
                </td>
                <td>Rp<?= number_format($item_total, 0, ',', '.'); ?></td>
                <td><a href="remove_from_cart.php?id=<?= $id; ?>" class="remove-button">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Total</td>
            <td class="cart-total">Rp<?= number_format($total, 0, ',', '.'); ?></td>
            <td></td>
        </tr>
    </table>
    <div class="cart-buttons">
        <a href="checkout.php" class="checkout-button">Checkout</a>
        <a href="index.php" class="continue-shopping-button">Lanjut Belanja</a>
    </div>


    <script>
    
    document.querySelectorAll(".quantity-change").forEach(button => {
    button.addEventListener("click", function () {
        let input = this.parentElement.querySelector(".quantity-input");
        let productId = this.getAttribute("data-id");
        let newValue = parseInt(input.value) + (this.classList.contains("increase") ? 1 : -1);
        if (newValue < 1) newValue = 1;
        input.value = newValue;

        // Kirim update ke server
        fetch("update_cart.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id=${productId}&quantity=${newValue}`
        })
        .then(response => response.json())
        .then(data => {
            document.querySelector(".cart-total").textContent = "Rp" + data.total;
        });
    });
});
</script>



</body>
</html>
