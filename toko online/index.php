<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="c34.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="#">Shop</a>
            <a href="about.php">About</a>
        </div>
        <div class="search">
            <input type="text" placeholder="Search...">
        </div>
        <div class="auth">
            <a href="register.php">Daftar</a> | <a href="login.php">Login</a>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner">
        <img src="images/banner-static.jpg" alt="Static Banner">
        <img src="images/banner-dynamic.gif" alt="Dynamic Banner">
    </section>

    <!-- Products -->
    <section class="products">
        <div class="product">
        <img src="images/product1.jpg" alt="Product 1"> <!-- Jika gambar ada di folder 'images' -->
            <h3>Product Name 1</h3>
            <p>$100</p>
            <button class="cart-button">Add to Cart</button>
        </div>
        <div class="product">
            <img src="images/product2.jpg" alt="Product 2">
            <h3>Product Name 2</h3>
            <p>$120</p>
            <button class="cart-button">Add to Cart</button>
        </div>
        <div class="product">
            <img src="images/product3.jpg" alt="Product 3">
            <h3>Product Name 3</h3>
            <p>$90</p>
            <button class="cart-button">Add to Cart</button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div>
                <h4>Payment Options</h4>
                <p>Visa, Mastercard, PayPal</p>
            </div>
            <div>
                <h4>Social Media</h4>
                <a href="#">Facebook</a> | <a href="#">Instagram</a>
            </div>
            <div>
                <h4>Contact Us</h4>
                <p>Email: support@example.com</p>
                <p>Phone: +123456789</p>
            </div>
        </div>
    </footer>
</body>
</html>