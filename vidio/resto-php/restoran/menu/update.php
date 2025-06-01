<?php 
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

        $item = $db->getITEM($sql);

        $idkategori = $item['idkategori'];
        $gambar = $item['gambar'];

    }
    
    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
?>

<h3>Insert menu</h3>

<div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">Kategori</label><br>
            <select name="idkategori" id="">
                <?php foreach($row as $r): ?>
                    <option <?php if ($idkategori == $r['idkategori']) echo "selected" ?> value="<?php echo $r['idkategori'] ?>"> <?php echo $r['kategori'] ?> </option>
                <?php endforeach ?> 
            </select>
        </div>

        <div class="form-group w-50">
            <label for="">Nama Menu</label>
            <input type="text" name="menu" required value="<?php echo $item['menu']?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Harga</label>
            <input type="text" name="harga" number required value="<?php echo $item['harga']?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Gambar</label><br>
            <input type="file" name="gambar">
        </div>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-danger">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (!empty($temp)) {
            $gambar = $gambar = $_FILES['gambar']['name'];
            move_uploaded_file($temp,'../upload/'.$gambar);
        }

        $sql = "UPDATE tblmenu SET idkategori=$idkategori, menu='$menu', gambar='$gambar', harga=$harga WHERE idmenu = $id";
        $db->runSQL($sql);
        header("location:?f=menu&m=select");

    }
?>