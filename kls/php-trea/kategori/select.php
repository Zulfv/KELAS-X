<?php
include '../dbcontroller.php';
$result = mysqli_query($conn, "SELECT * FROM kategori");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . ' - ' . $row['nama'] . ' | ';
    echo "<a href='update.php?id={$row['id']}'>Edit</a> ";
    echo "<a href='delete.php?id={$row['id']}'>Hapus</a><br>";
}
?>
