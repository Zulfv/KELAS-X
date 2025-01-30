<?php
session_start();

// Cek apakah permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $card_number = htmlspecialchars(trim($_POST['card_number']));
    $card_name = htmlspecialchars(trim($_POST['card_name']));
    $expiry_date = htmlspecialchars(trim($_POST['expiry_date']));
    $cvv = htmlspecialchars(trim($_POST['cvv']));

    // Validasi input
    if (empty($card_number) || empty($card_name) || empty($expiry_date) || empty($cvv)) {
        echo "Semua field harus diisi.";
        exit();
    }

    // Simpan informasi pembayaran ke database atau proses lebih lanjut di sini
    // Misalnya, simpan ke database
    // Contoh: savePaymentToDatabase($card_number, $card_name, $expiry_date, $cvv, $_SESSION['checkout_info']);

    // Kosongkan keranjang setelah pembayaran
    unset($_SESSION['cart']);
    unset($_SESSION['checkout_info']); // Hapus informasi checkout

    // Tampilkan konfirmasi
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pembayaran Berhasil</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa; /* Warna latar belakang */
                color: #333; /* Warna teks */
                text-align: center;
                padding: 50px;
            }
            h1 {
                color: #28a745; /* Hijau */
            }
            .confirmation-container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #28a745; /* Hijau */
                border-radius: 10px;
                background-color: #fff; /* Putih */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .summary {
                margin-top: 20px;
                border-top: 1px solid #28a745; /* Hijau */
                padding-top: 10px;
            }
            .back-link {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #007bff; /* Biru */
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .back-link:hover {
                background-color: #0056b3; /* Biru lebih gelap saat hover */
            }
        </style>
    </head>
    <body>
        <div class="confirmation-container">
            <h1>Pembayaran Berhasil!</h1>
            <p>Terima kasih, pembayaran Anda telah berhasil diproses.</p>
            <p>Informasi Pembayaran:</p>
            <p>Nama Pemegang Kartu: <?php echo htmlspecialchars($card_name); ?></p>
            <p>Nomor Kartu: <?php echo htmlspecialchars($card_number); ?></p>
            <p>Tanggal Kadaluarsa: <?php echo htmlspecialchars($expiry_date); ?></p>
            <a href="index.php" class="back-link">Kembali ke Halaman Utama</a>
        </div>
    </body>
    </html>

    <?php
} else {
    header('Location: index.php');
}
?>