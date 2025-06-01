<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <style>
        body {
            background: url('../assets/bg-stars.gif') repeat;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            background-color: black;
            padding: 50px;
        }

        .form-container {
            background-color: rgba(0, 0, 80, 0.85);
            border: 2px dashed #0ff;
            border-radius: 15px;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 10px #0ff;
        }

        h2 {
            text-align: center;
            text-shadow: 2px 2px #0ff;
        }

        input[type="text"], input[type="file"], button {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            border: none;
            border-radius: 8px;
            font-family: inherit;
        }

        button {
            background-color: #0ff;
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
    <h2>🪐 Tambah Kategori</h2>
    <form method="POST" action="simpan_kategori.php" enctype="multipart/form-data">
        <label>Nama Kategori:</label>
        <input type="text" name="name" required>

        <label>Gambar:</label>
        <input type="file" name="image" required>

        <button type="submit">🚀 Simpan</button>
    </form>
</div>

</body>
</html>
