<?php
include '../config.php';
session_start();

$result = mysqli_query($conn, "SELECT p.*, c.name AS kategori FROM produk p LEFT JOIN categories c ON p.kategori_id = c.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Produk</title>
    <style>
        body {
            background: url('../assets/bg-stars.gif') repeat;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            padding: 30px;
            background-color: black;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: rgba(0, 0, 50, 0.8);
            padding: 25px;
            border-radius: 15px;
            border: 2px dashed #f0f;
        }

        h2 {
            text-align: center;
            text-shadow: 2px 2px 4px #f0f;
        }

        a {
            text-decoration: none;
            color: #f0f;
            padding: 6px 10px;
            background-color: #111;
            border-radius: 6px;
            margin: 5px;
            transition: 0.3s;
        }

        a:hover {
            background-color: #f0f;
            color: #000;
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.6);
        }

        th, td {
            border: 1px solid #f0f;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f0f;
            color: #000;
        }

        img {
            border-radius: 10px;
            box-shadow: 0 0 10px #f0f;
        }

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>

<div class="container">
    <h2>🚀 Daftar Produk</h2>
    <a href="tambah_produk.php">➕ Tambah Produk</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td>Rp<?= number_format($row['harga']); ?></td>
            <td><?= substr($row['deskripsi'], 0, 50); ?>...</td>
            <td><img src="../images/<?= $row['gambar']; ?>" width="80"></td>
            <td>
                <a href="edit_produk.php?id=<?= $row['id']; ?>">✏️ Edit</a>
                <a href="hapus_produk.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus produk ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
