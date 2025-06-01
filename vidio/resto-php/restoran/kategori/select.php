<?php 
     
     $jumlahdata =  $db->rowCOUNT("SELECT idkategori FROM tblkategori ");
     $banyak = 3;
     $halaman = ceil($jumlahdata / $banyak);


     if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p - 1) * $banyak;
    } else {
        $mulai = 0;
    }
    
    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);

    $no = 1+$mulai;
?> 
  <div class="d-flex align-items-center mb-3">
  <a class="btn btn-primary ml-3" href="?f=kategori&m=insert" role="button">TAMBAH DATA</a>
  <h3 class="mb-3">Kategori</h3>
</div>


    
<table  class="table table-bordered">
     <thead>
         <tr>
           <th>no</th>
           <th>kategori</th>
           <th>delete</th>
           <th>update</th>
         </tr>
     </thead>
      <tbody>
        <?php foreach ($row as $r):?>
          <tr>
            <td><?php  echo $no++ ?></td>
            <td><?php  echo $r['kategori'] ?></td>
            <td><a href="?f=kategori&m=delete&id=<?php echo $r['idkategori']?>">delete</a></td>
            <td><a href="?f=kategori&m=update&id=<?php echo $r['idkategori']?>">update</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    

</table>


 <?php

   for ($i = 1; $i <= $halaman; $i++) {
    echo "<a href='?f=kategori&m=select&p=$i' class='btn btn-outline-primary btn-sm mr-2'>$i</a>";
       echo '&nbsp;&nbsp;&nbsp;';
  }

 ?>

