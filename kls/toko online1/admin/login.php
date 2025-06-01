<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            background: url('../assets/bg-stars.gif') repeat;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: rgba(0, 0, 50, 0.85);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px #0ff;
            text-align: center;
            width: 350px;
        }

        h2 {
            text-shadow: 2px 2px #0ff;
        }

        input[type="email"], input[type="password"], button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
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
        }

        a {
            color: #0ff;
            text-decoration: none;
            font-size: 12px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>

<div class="login-box">
    <h2>🚀 Login Admin</h2>
    <form action="proses_login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk</button>
    </form>
    <a href="register.php">Belum punya akun? Daftar</a>
</div>

</body>
</html>
