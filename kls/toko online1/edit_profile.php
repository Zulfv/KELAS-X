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
            height: 420px;
            background: linear-gradient(135deg, #003399, #001f4d);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .header {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }
        .content {
            display: flex;
            align-items: center;
            gap: 20px;
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
            flex: 1;
        }
        .profile-info strong {
            color: #ffcc00;
        }
        .form-group {
            text-align: center;
        }
        .form-group input {
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            border: none;
        }
        .buttons {
            text-align: center;
        }
        .buttons a, .buttons button {
            text-decoration: none;
            color: #ffffff;
            background: #ffcc00;
            padding: 8px 12px;
            border-radius: 5px;
            margin: 5px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <div class="header">PROFIL PENGGUNA</div>
        <div class="content">
            <div class="photo-box">
                <img id="profilePhoto" src="<?php echo htmlspecialchars($user['photo'] ?? 'uploads/default.jpg'); ?>" alt="Foto Profil">
            </div>
            <div class="profile-info">
                <p><strong>Username:</strong> <span id="username"><?php echo htmlspecialchars($user['username']); ?></span></p>
                <p><strong>Email:</strong> <span id="email"><?php echo htmlspecialchars($user['email']); ?></span></p>
                <p><strong>Member Sejak:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
            </div>
        </div>

        <!-- Ganti Foto Profil -->
        <div class="form-group">
            <form id="photoForm" enctype="multipart/form-data">
                <input type="file" id="photoInput" name="photo" accept="image/png, image/jpeg" required>
                <button type="button" onclick="uploadPhoto()">Ganti Foto</button>
            </form>
        </div>

        <!-- Edit Profil -->
        <div class="form-group">
            <button onclick="toggleEdit()">Edit Profil</button>
            <form id="editForm" action="edit_profile.php" method="post" style="display:none;">
                <input type="text" name="username" id="editUsername" required>
                <input type="email" name="email" id="editEmail" required>
                <button type="submit">Simpan</button>
            </form>
        </div>

        <div class="buttons">
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <script>
        function toggleEdit() {
            document.getElementById("editForm").style.display = "block";
            document.getElementById("editUsername").value = document.getElementById("username").innerText;
            document.getElementById("editEmail").value = document.getElementById("email").innerText;
        }

        function uploadPhoto() {
            let fileInput = document.getElementById("photoInput");
            let formData = new FormData();
            formData.append("photo", fileInput.files[0]);

            fetch("change_photo.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() !== "error") {
                    document.getElementById("profilePhoto").src = data;
                } else {
                    alert("Gagal mengganti foto!");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
</body>
</html>
