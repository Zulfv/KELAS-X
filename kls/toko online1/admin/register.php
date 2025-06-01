<!DOCTYPE html>
<html>
<head>
    <title>Register Admin</title>
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

        .register-box {
            background-color: rgba(0, 0, 80, 0.85);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px #f0f;
            text-align: center;
            width: 400px;
        }

        h2 {
            text-shadow: 2px 2px #f0f;
        }

        input[type="email"], input[type="password"], select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
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
        }

        a {
            color: #f0f;
            text-decoration: none;
            font-size: 12px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>

<div class="register-box">
    <h2>🪐 Daftar Admin</h2>
    <form action="simpan_admin.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
            <option value="manager">Manager</option>
        </select>
        <button type="submit">Daftar</button>
    </form>
    <a href="login.php">Sudah punya akun? Login</a>
</div>

</body>
</html>
