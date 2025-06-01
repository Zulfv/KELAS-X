<?php
require_once '../dbcontroller.php';

if (isset($_POST['daftar'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telepon = htmlspecialchars($_POST['telepon']);

    $cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email = '$email'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Email sudah terdaftar. Silakan gunakan email lain.";
    } else {
        $query = "INSERT INTO pelanggan (nama_pelanggan, email, password, alamat, telepon) 
                  VALUES ('$nama', '$email', '$password', '$alamat', '$telepon')";
        if (mysqli_query($koneksi, $query)) {
            $success = "Pendaftaran berhasil. Silakan login.";
        } else {
            $error = "Terjadi kesalahan saat menyimpan data.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar - Restoran Lezat</title>
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

  <!-- REGISTER FORM -->
  <main class="container my-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center fw-bold"><i class="bi bi-person-plus-fill me-2"></i>Daftar Pelanggan</h2>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php elseif (isset($success)): ?>
      <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="post" novalidate>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="form-control" required />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" name="email" id="email" class="form-control" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" name="password" id="password" class="form-control" required />
      </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Lengkap</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="2" required></textarea>
      </div>

      <div class="mb-3">
        <label for="telepon" class="form-label">No. Telepon</label>
        <input type="text" name="telepon" id="telepon" class="form-control" required />
      </div>

      <button type="submit" name="daftar" class="btn btn-warning w-100 fw-semibold">
        <i class="bi bi-person-plus-fill me-1"></i>Daftar
      </button>
    </form>

    <p class="mt-3 text-center">
      Sudah punya akun? <a href="login.php" class="text-warning fw-semibold">Login di sini</a>
    </p>
  </main>

  <!-- FOOTER -->
  <footer class="bg-warning text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; 2025 Restoran Lezat</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
