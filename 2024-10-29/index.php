<?php
$sekolah=["tk wanita","sdn sidokare 1","smpn 6 sidoarjo","smkn 2 buduran"]

$sekolah=["tk"=>"tk waniata","sd"=>"sdn sidokare 1","smp"=>"smpn 6 sidoarjo","smk"=>"smkn 2 buduran"]

$skills=["c++"=>"expert",]

echo$sekolah[0];
echo"<br>";
echo$sekolah["tk"];
echo"<br>";
echo$sekolah[1];
echo"<br>";
echo$sekolah["sd"];
echo"<br>";


for($i = 0; $i<4 ; $i++){
    echo $sekolah[$i];
    echo"<br>";
}

echo"<br>";

foreach($sekolah as$key){
    echo$key;
    echo"<br>";
}

echo"<br>";

foreach($sekolah as$key => $velue){
    echo$key;
    echo"=";
    echo $velue;
    echo"<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>RIWAYAT SEKOLAH</h2>
</body>
</html>