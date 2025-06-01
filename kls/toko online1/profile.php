<?php
session_start();
include 'config.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil data pengguna dari database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #0a0f1c;
            font-family: Arial, sans-serif;
        }
        .id-card {
            width: 500px;
            background: linear-gradient(135deg, #003399, #001f4d);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .photo-box {
            width: 120px;
            height: 140px;
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-info {
            font-size: 16px;
            line-height: 1.8;
            text-align: center;
        }
        .form-group {
            text-align: center;
            margin-top: 10px;
        }
        .form-group button {
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            background: #ffcc00;
            color: black;
            font-size: 14px;
        }
        /* Sembunyikan form upload awalnya */
        #photoForm {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <h2>PROFIL PENGGUNA</h2>
        <div class="photo-box">
            <img id="profilePhoto" src="<?php echo htmlspecialchars($user['photo'] ?? 'uploads/default.jpg'); ?>" alt="Foto Profil">
        </div>
        <div class="profile-info">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Member Sejak:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
        </div>

        <!-- Tombol untuk menampilkan form upload -->
        <div class="form-group">
            <button id="changePhotoBtn" onclick="togglePhotoForm()">Ganti Foto</button>
        </div>

        <!-- Form upload (disembunyikan dulu) -->
        <div class="form-group" id="photoForm">
            <form action="change_photo.php" method="post" enctype="multipart/form-data">
                <input type="file" name="photo" accept="image/png, image/jpeg" required>
                <button type="submit">Upload Foto</button>
            </form>
        </div>

        <div class="form-group">
            <a href="index.php"><button>Home</button></a>
            <a href="logout.php"><button>Logout</button></a>
        </div>
    </div>

    <script>
        function togglePhotoForm() {
            var form = document.getElementById("photoForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
</body>
</html>
