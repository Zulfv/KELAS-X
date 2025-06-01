<?php
include '../config.php';
session_start();

$result = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Kategori</title>
    <style>
        body {
            background: url('../assets/bg-stars.gif') repeat;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            padding: 30px;
            background-color: black;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background-color: rgba(0, 0, 50, 0.8);
            padding: 25px;
            border-radius: 15px;
            border: 2px dashed #0ff;
        }

        h2 {
            text-align: center;
            text-shadow: 2px 2px 4px #0ff;
        }

        a {
            text-decoration: none;
            color: #0ff;
            padding: 6px 10px;
            background-color: #111;
            border-radius: 6px;
            margin: 5px;
            transition: 0.3s;
        }

        a:hover {
            background-color: #0ff;
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
            border: 1px solid #0ff;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #0ff;
            color: #000;
        }

        img {
            border-radius: 10px;
            box-shadow: 0 0 10px #0ff;
        }

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>

<div class="container">
    <h2>🪐 Daftar Kategori Produk</h2>
    <a href="tambah_kategori.php">➕ Tambah Kategori</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><img src="../images/<?= $row['image']; ?>" width="80"></td>
            <td>
                <a href="edit_kategori.php?id=<?= $row['id']; ?>">✏️ Edit</a>
                <a href="hapus_kategori.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
