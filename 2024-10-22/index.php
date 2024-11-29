<?php
   $data = "sayabelajar php di smkn 2 buduran";
   
   echo $data;

   $isi = "hari ini saya belajar php";
   $materi="materi belajar php";
   $sekolah = ["tk aisyiyah","sdn sidokare 1 sidoarjo","smpn 6 sidoarjo","smkn 2 buduran"];
   $identitas =['zulfi aulia anjani',"kutuk tenga rt8 rw7 sidokare sidoarjo"];
   $judul = ["curiculum vitae"];
   $hobies = ["mancing","bermain kucing"];
   $skill = ["HTML Expert","CSS Expert","PHP Newbie"];
   $list1  = "variabel";
   $list2  = "array";
   $list3  = "pengujian";
   $list4  = "pengulangan";
   $list5  = "funcition";
   $list6  = "class";
   $list7  = "object";
   $list8  = "framework";
   $list9  = "PHP dan MYSQL";

   $list = [
          "variabel",
          "array",
          "pengujian",
          "pengulangan",
          "function",
          "class",
          "object",
          "framework",
         "PHP dan MYSQL",]
                      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
    <style>
        .kamar{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?=  $judul[0]; ?></h1>
    </div>
    <div class="identitas">
        <table>
            <thead>
            </thead>
            <tbody>
                <tr>
                    <th>Identitas</th>
                </tr>
                <tr>
                    <th>Nama</th>
                    <th><?= $identitas[0]; ?></th>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th><?= $identitas[1];  ?></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="kamar">
    <h1><?=$data; ?></h1>
    <p><?=$isi; ?></p>
    <h2><?=$materi; ?></h2>
    <ol>
        <li><?=$list[0]; ?></li>
        <p>Variabel adalah wadah atau tempat menyimpan data</p>
        <p>Data bisa berupa text atau string bisa juga angka atau numeric, Data juga bisa gabungan antara text, angka, dan simbol</p>
        <li><?=$list[1]; ?></li>
        <li><?=$list[2]; ?></li>
        <li><?=$list[3]; ?></li>
        <li><?=$list[4]; ?></li>
        <li><?=$list[5]; ?></li>
        <li><?=$list[6]; ?></li>
        <li><?=$list[7]; ?></li>
        <li><?=$list[8]; ?></li>
    </ol>
    </div>
</body>
</html>