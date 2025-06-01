<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Tiket Luar Angkasa</title>
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
            position: relative;
        }
        .ticket h1::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            background: url('https://example.com/airplane.png') no-repeat center center; /* Ganti dengan URL gambar pesawat Anda */
            background-size: contain;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            animation: fly 5s linear infinite; /* Animasi terbang */
        }
        .form-container {
            width: 100%;
            padding-right: 20px;
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
        /* Gaya untuk gambar pesawat */
    </style>
</head>
<body>
<div class="ticket">
        <div class="form-container">
            <h1>Tiket Registrasi</h1>
            <form action="process_register.php" method="POST">
                <div class="mb-2">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
        </div>
        <div class="ticket-info">
            <p>DEPARTURE: Mars</p>
            <p>DESTINATION: Earth</p>
            <p>CLASS: First</p>
            <p>SEAT: 1A/C3</p>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>