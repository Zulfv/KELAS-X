<?php
include '../config.php';
$result = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body {
            background: url('../assets/bg-stars.gif') repeat;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            background-color: black;
            padding: 50px;
        }

        .form-container {
            background-color: rgba(0, 0, 50, 0.85);
            border: 2px dashed #f0f;
            border-radius: 15px;
            max-width: 700px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 10px #f0f;
        }

        h2 {
            text-align: center;
            text-shadow: 2px 2px #f0f;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="number"], textarea, select, input[type="file"], button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            font-family: inherit;
        }

        button {
            background-color: #f0f;
            color: #000;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #fff;
            color: #000;
        }

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>

<div class="form-container">
    <h2>🚀 Tambah Produk</h2>
    <form method="POST" action="simpan_produk.php" enctype="multipart/form-data">
        <label>Nama Produk:</label>
        <input type="text" name="nama" required>

        <label>Harga:</label>
        <input type="number" name="harga" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" rows="4" required></textarea>

        <label>Kategori:</label>
        <select name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
            <?php endwhile; ?>
        </select>

        <label>Gambar Produk:</label>
        <input type="file" name="gambar" required>

        <button type="submit">🛸 Simpan Produk</button>
    </form>
</div>

</body>
</html>
