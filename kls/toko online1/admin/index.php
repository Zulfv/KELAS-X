<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Luar Angkasa</title>
    <style>
        body {
            background: url('../assets/bg-stars.gif') repeat;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            padding: 30px;
            background-color: black;
        }

        h2, p {
            text-shadow: 2px 2px 4px #0ff;
        }

        .container {
            max-width: 700px;
            margin: auto;
            border: 3px dashed #0ff;
            padding: 20px;
            border-radius: 15px;
            background-color: rgba(0, 0, 50, 0.7);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #0ff;
            background-color: #111;
            padding: 10px 15px;
            border-radius: 8px;
            display: inline-block;
            transition: 0.3s;
        }

        a:hover {
            background-color: #0ff;
            color: #000;
            transform: scale(1.1);
        }

        .logout {
            margin-top: 20px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>

<div class="container">
    <h2>🚀 Selamat Datang, <?= $_SESSION['admin']; ?>!</h2>
    <p>🛰️ Role: <?= $_SESSION['role']; ?></p>

    <hr>

    <ul>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <li><a href="admin.php">👨‍🚀 Kelola Admin</a></li>
        <?php endif; ?>

        <li><a href="kategori.php">🪐 Kelola Kategori</a></li>
        <li><a href="produk.php">👽 Kelola Produk</a></li>
    </ul>

    <div class="logout">
        <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">🚪 Logout</a>
    </div>
</div>

</body>
</html>
