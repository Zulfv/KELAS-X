<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f8ff;
            overflow: hidden; /* Sembunyikan overflow */
        }

        .airplane {
            width: 100px; /* Ukuran gambar pesawat */
            position: absolute; /* Posisi absolut untuk animasi */
            animation: takeoff 3s linear forwards; /* Animasi lepas landas */
        }

        @keyframes takeoff {
            0% { transform: translate(100vw, 0); } /* Mulai dari luar kanan */
            50% { transform: translate(50vw, -20vh); } /* Bergerak ke kiri dan sedikit naik */
            100% { transform: translate(-1000%, -20vh); } /* Berakhir di luar kiri */
        }

        .message {
            margin-top: 20px;
            font-size: 24px;
            color: #4caf50;
            display: none; /* Sembunyikan pesan awalnya */
        }

        .login-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: none; /* Sembunyikan tombol awalnya */
        }

        .login-button:hover {
            background-color: #45a049; /* Warna saat hover */
        }
    </style>
</head>
<body>

    <img src="images/airplane.png" alt="Pesawat Terbang" class="airplane"> <!-- Ganti dengan path gambar pesawat Anda -->
    <div class="message" id="successMessage">Registrasi Berhasil!</div>
    <button class="login-button" id="loginButton" onclick="location.href='login.php'">Login</button> <!-- Tombol Login -->

    <script>
        // Fungsi untuk menampilkan pesan dan tombol setelah animasi selesai
        function showSuccessMessage() {
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('loginButton').style.display = 'block'; // Tampilkan tombol login
        }

        // Tampilkan pesan setelah animasi selesai (3 detik)
        setTimeout(showSuccessMessage, 3000);
    </script>

</body>
</html>