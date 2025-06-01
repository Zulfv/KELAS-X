<?php
include '../config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    echo "🚫 Akses ditolak!";
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM admin");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Admin</title>
    <style>
        body {
            background: url('../assets/bg-stars.gif') repeat;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            padding: 30px;
            background-color: black;
        }

        .container {
            background-color: rgba(0, 0, 50, 0.8);
            padding: 25px;
            border-radius: 15px;
            border: 2px dashed #0ff;
            max-width: 900px;
            margin: auto;
        }

        h2 {
            text-align: center;
            text-shadow: 2px 2px 4px #0ff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        th, td {
            border: 1px solid #0ff;
            padding: 10px;
            text-align: center;
            color: #fff;
        }

        th {
            background-color: #0ff;
            color: #000;
        }

        a {
            text-decoration: none;
            color: #0ff;
            padding: 6px 10px;
            border-radius: 5px;
            background-color: #111;
            transition: 0.3s;
        }

        a:hover {
            background-color: #0ff;
            color: #000;
            transform: scale(1.05);
        }

        .add-button {
            display: block;
            width: fit-content;
            margin: 0 auto 20px;
            font-size: 12px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>

<div class="container">
    <h2>👩‍🚀 Manajemen Admin</h2>
    <a href="register.php" class="add-button">➕ Tambah Admin</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['role']; ?></td>
            <td>
                <a href="edit_admin.php?id=<?= $row['id']; ?>">✏️ Edit</a>
                <a href="hapus_admin.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus admin ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
