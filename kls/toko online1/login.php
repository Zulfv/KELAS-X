<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tiket Luar Angkasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(218, 224, 230), rgb(233, 235, 238));
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .ticket {
            background: linear-gradient(to bottom, #b08d57, #8b6f47);
            color: black;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            width: 700px;
            height: 400px;
            border: 3px solid #2d2d2d;
            font-family: 'Courier New', Courier, monospace;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
        .ticket::before, .ticket::after {
            content: "";
            position: absolute;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
        .ticket::before {
            left: -20px;
        }
        .ticket::after {
            right: -20px;
        }
        .ticket::after, .ticket::before {
            box-shadow: inset 0 0 5px rgba(0,0,0,0.3);
        }
        .ticket h1 {
            font-weight: bold;
            color: #2d2d2d;
            border-bottom: 2px dashed #2d2d2d;
            padding-bottom: 10px;
            margin-bottom: 10px;
            text-align: left;
            margin-left: 10px; /* Geser tulisan ke kiri */
        }
        .form-container {
            width: 60%;
            padding-right: 20px;
            padding-left: 20px;
        }
        .ticket-info {
            font-size: 14px;
            border-left: 2px dashed #2d2d2d;
            padding-left: 20px;
            text-align: left;
            width: 50%;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #2d2d2d;
        }
        .btn-primary {
            background-color: #2d2d2d;
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #4c4c4c;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #dc3545; /* Warna merah untuk tombol kembali */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #c82333; /* Warna saat hover */
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="form-container">
            <h1>Tiket Login</h1>
            <form action="process_login.php" method="POST">
                <div class="mb-2">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
            <button class="back-button" id="backButton" onclick="location.href='registration.php'">Kembali ke Registrasi</button> <!-- Tombol Kembali -->
            </div>
        <div class="ticket-info">
            <p>DEPARTURE: Mars</p>
            <p>DESTINATION: Earth</p>
            <p>CLASS: First</p>
            <p>SEAT: 1A/C3</p>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan tombol kembali setelah 3 detik
        function showBackButton() {
            document.getElementById('backButton').style.display = 'block'; // Tampilkan tombol kembali
        }

        // Tampilkan tombol kembali setelah 3 detik
        setTimeout(showBackButton, 3000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>