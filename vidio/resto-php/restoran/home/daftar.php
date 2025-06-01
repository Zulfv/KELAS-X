<h3>Registrasi Pelanggan</h3>

<div>
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Pelanggan</label>
            <input type="text" name="pelanggan" required placeholder="isi pelanggan" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Alamat</label>
            <input type="text" name="alamat" required placeholder="isi alamat" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Telp</label>
            <input type="text" name="telp" required placeholder="isi telp" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Email</label>
            <input type="email" name="email" required placeholder="Email" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="password" required placeholder="password" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" required placeholder="password" class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-secondary">
        </div>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $pelanggan = $_POST['pelanggan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    // Mengecek apakah password dan konfirmasi password cocok
    if ($password === $konfirmasi) {
        // Menyiapkan query untuk memasukkan data ke dalam tabel
        $sql = "INSERT INTO tblpelanggan (pelanggan, alamat, telp, email, password, status) VALUES ('$pelanggan', '$alamat', '$telp', '$email', '$password', 1)";
        
        // Menjalankan query untuk menyimpan data ke database
        $db->runSQL($sql);

        // Redirect ke halaman info setelah sukses
        header("location:?f=home&m=info");
    } else {
        echo "<h3>PASSWORD TIDAK SAMA DENGAN KONFIRMASI</h3>";
    }
}
?>
