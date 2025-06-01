<?php 

class DB {

    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $database = "db-restoran1";
    private $port = 8111; // Ganti ke 3306 jika pakai port default XAMPP
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = $this->koneksiDB();
    }

    private function koneksiDB()
    {
        $koneksi = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database,
            $this->port
        );

        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        return $koneksi;
    }

    public function getALL($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $data = [];

        if (!$result) {
            die("Query gagal: " . mysqli_error($this->koneksi));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return !empty($data) ? $data : null;
    }

    public function getITEM($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);

        if (!$result) {
            die("Query gagal: " . mysqli_error($this->koneksi));
        }

        return mysqli_fetch_assoc($result);
    }

    public function rowCOUNT($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);

        if (!$result) {
            die("Query gagal: " . mysqli_error($this->koneksi));
        }

        return mysqli_num_rows($result);
    }

    public function runSQL($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);

        if (!$result) {
            die("Query gagal: " . mysqli_error($this->koneksi));
        }

        return $result;
    }

    public function pesan($text = "")
    {
        echo $text;
    }
}

?>
