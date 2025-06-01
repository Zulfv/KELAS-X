 <?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "db-restoran";

$koneksi = mysqli_connect($host, $user, $password, $database);

var_dump($koneksi);

?>