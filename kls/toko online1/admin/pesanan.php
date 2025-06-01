<?php
session_start();

// Cek role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';
include 'header.php';

// Proses update status jika ada permintaan
if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE pesanan SET status='$status' WHERE id=$id");
}

// Proses hapus pesanan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pesanan WHERE id=$id");
    header("Location: pesanan.php");
    exit();
}

// Ambil data pesanan
$pesanan = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tanggal_pesanan DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Pesanan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background: #0d0d2b;
            color: white;
            font-family: 'Courier New', Courier, monospace;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #1c1c3a;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        th {
            background-color: #26264f;
        }
        a, select, button {
            font-family: inherit;
            background: #222;
            color: #00ffcc;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        a:hover, button:hover {
            background: #444;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Pesanan</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>HP</th>
            <th>Alamat</th>
            <th>Metode</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($pesanan)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
            <td><?= htmlspecialchars($row['no_hp']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= $row['metode_pembayaran'] ?></td>
            <td>Rp<?= number_format($row['total_harga']) ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <select name="status" onchange="this.form.submit()">
                        <option <?= $row['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                        <option <?= $row['status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                        <option <?= $row['status'] == 'Dikirim' ? 'selected' : '' ?>>Dikirim</option>
                        <option <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                    <button name="update_status">✔</button>
                </form>
            </td>
            <td><?= $row['tanggal_pesanan'] ?></td>
            <td>
                <a href="pesanan.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus pesanan ini?')">🗑️</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
