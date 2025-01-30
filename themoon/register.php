<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a2e;
            color: #ffcc00;
            font-family: 'Press Start 2P', cursive;
            text-align: center;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background: #333;
            padding: 2rem;
            border: 4px solid #ffcc00;
            box-shadow: 0 0 20px #ff6699, 0 0 40px #ffcc00;
            border-radius: 12px;
            width: 350px;
            text-align: center;
        }

        h2 {
            font-size: 2rem;
            color: #ffcc00;
            text-shadow: 2px 2px #000;
        }

        p {
            font-size: 0.6rem;
        }

        .form-control {
            background: #111;
            color: #fff;
            border: 2px solid #ffcc00;
            border-radius: 5px;
            padding: 0.5rem;
            width: 100%;
            margin: 0.5rem 0;
            font-size: 1rem;
            box-shadow: 0 0 10px #ff6699 inset;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .btn {
            background: #ff6699;
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            border: 2px solid #ffcc00;
            border-radius: 5px;
            padding: 0.5rem;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            text-shadow: 2px 2px #000;
            box-shadow: 0 0 15px #ffcc00;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #ffcc00;
            color: #111;
            box-shadow: 0 0 25px #ff6699;
        }

        .login-link {
            margin-top: 1rem;
        }

        .login-link a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            color: #ff6699;
        }

        .retro-elements {
            position: absolute;
            top: -50px;
            left: -50px;
            font-size: 5rem;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.05);
            transform: rotate(-30deg);
        }

        .retro-elements:nth-child(2) {
            top: auto;
            bottom: -50px;
            right: -50px;
            left: auto;
            transform: rotate(30deg);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <p>Masukkan data Anda untuk mendaftar.</p>
        <form action="process_register.php" method="POST">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="login-link">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html>
