<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form action="process_request_reset.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit">Kirim Link Reset</button>
    </form>
</body>
</html>