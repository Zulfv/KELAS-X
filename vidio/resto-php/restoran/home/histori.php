<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email = $_SESSION['pelanggan'];

// Ambil idpelangan dari tblpelanggan
$sql = "SELECT idpelanggan FROM tblpelanggan WHERE email = '$email'";
$pelanggan = $db->getITEM($sql);
$idpelangan = $pelanggan['idpelanggan'];

// Hitung jumlah data histori order
$jumlahdata = $db->rowCOUNT("SELECT idorder FROM tblorder WHERE idpelangan = '$idpelangan'");
$banyak = 2;
$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

$sql = "SELECT * FROM tblorder WHERE idpelangan = '$idpelangan' ORDER BY tglorder DESC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);

$no = 1 + $mulai;
?>

<h3>Histori Pembelian</h3>
<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($row)) { ?>
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['tglorder'] ?></td>
                    <td><?php echo $r['total'] ?></td>
                    <td><a href="?f=home&m=detail&id=<?php echo $r['idorder'] ?>">Detail</a></td>
                </tr>
            <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>

<?php
for ($i = 1; $i <= $halaman; $i++) {
    echo '<a href="?f=home&m=histori&p=' . $i . '">' . $i . '</a>';
    echo '&nbsp;&nbsp;&nbsp;';
}
?>
