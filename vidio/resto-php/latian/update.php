<?php

require_once "../function.php";

$id = 22; // Tetapkan ID dulu sebelum dipakai
$sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);

// Tampilkan form sebelum proses POST
?>

<form action="" method="post">
    kategori:
    <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>">
    <br>
    <input type="submit" name="simpan" value="simpan">
</form>

<?php
if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori']; // Ambil dari input form

    // Hindari SQL injection (jika tidak pakai PDO)
    $kategori = mysqli_real_escape_string($koneksi, $kategori);

    $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";
    $result = mysqli_query($koneksi, $sql);

  header("location:http://localhost/RESTO-PHP/restoran/kategori/select.php");
    

   

    
}
?>
