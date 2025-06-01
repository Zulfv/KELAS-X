<?php
require_once '../dbcontroller.php';
session_start();

if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email = '$email'");
    if (mysqli_num_rows($query) == 1) {
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data['password'])) {
            $_SESSION['pelanggan'] = [
                'id' => $data['id'],
                'nama' => $data['nama_pelanggan'],
                'email' => $data['email']
            ];
            header("Location: ../index.php");
            exit;
        } else {
            $error = "Kata sandi salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Restoran Lezat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="nav-link text-white" href="../index.php">
      <i class="bi bi-shop-window me-2"></i>Restoran Lezat
    </a>
    <div class="ms-auto d-flex gap-3">
      <a class="nav-link text-white" href="../index.php">
        <i class="bi bi-house-door-fill me-1"></i>Home
      </a>
      <a class="nav-link text-white fw-semibold" href="info.php">
        <i class="bi bi-info-circle-fill me-1"></i>Tentang
      </a>
    </div>
  </div>
</nav>

<!-- LOGIN FORM -->
<main class="container my-5" style="max-width: 400px;">
  <h2 class="mb-4 text-center fw-bold"><i class="bi bi-box-arrow-in-right me-2"></i>Login Pelanggan</h2>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>

  <form method="post" novalidate>
    <div class="mb-3">
      <label for="email" class="form-label">Alamat Email</label>
      <input type="email" name="email" id="email" class="form-control" required />
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Kata Sandi</label>
      <input type="password" name="password" id="password" class="form-control" required />
    </div>

    <button type="submit" name="login" class="btn btn-warning w-100 fw-semibold">
      <i class="bi bi-box-arrow-in-right me-1"></i>Login
    </button>
  </form>

  <p class="mt-3 text-center">
    Belum punya akun? <a href="daftar.php" class="text-warning fw-semibold">Daftar di sini</a>
  </p>
</main>

<!-- FOOTER -->
<footer class="bg-warning text-white text-center py-3 mt-5">
  <p class="mb-0">&copy; 2025 Restoran Lezat</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
