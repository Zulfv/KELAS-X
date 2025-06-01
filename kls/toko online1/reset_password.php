<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form action="process_reset_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label for="password">Password Baru:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>