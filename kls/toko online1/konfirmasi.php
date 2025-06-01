<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Checkout Berhasil</title>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: radial-gradient(ellipse at center, #000000 0%, #050505 100%);
      overflow: hidden;
      color: white;
      font-family: 'Press Start 2P', cursive;
      text-align: center;
    }

    .teks {
      margin-top: 100px;
      font-size: 20px;
      opacity: 0;
      animation: muncul 2s ease-out forwards;
      animation-delay: 5s;
      animation-fill-mode: forwards;
    }

    @keyframes muncul {
      from { opacity: 0; transform: scale(0.5); }
      to { opacity: 1; transform: scale(1); }
    }

    .alien, .astronaut {
      position: absolute;
      top: 40%;
      width: 80px;
    }

    .alien {
      left: -100px;
      animation: alienTerbang 5s linear forwards;
    }

    .astronaut {
      left: -150px;
      animation: astronautKejar 5s linear forwards;
    }

    @keyframes alienTerbang {
      0% { left: -100px; }
      100% { left: 110%; }
    }

    @keyframes astronautKejar {
      0% { left: -150px; }
      100% { left: 100%; }
    }

    .bintang {
      position: absolute;
      background: white;
      border-radius: 50%;
      animation: berkedip 2s infinite;
    }

    @keyframes berkedip {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.2; }
    }
  </style>
</head>
<body>

  <!-- Tulisan -->
  <h1 class="teks">🚀 Pembayaran Berhasil! 👽</h1>

  <!-- Animasi alien dan astronot -->
  <img src="images/alien-1.png" class="alien" alt="Alien">
  <img src="images/astronaut.png" class="astronaut" alt="Astronaut">

  <!-- Bintang-bintang -->
  <?php
    for ($i = 0; $i < 50; $i++) {
      $size = rand(1, 3);
      $top = rand(0, 100);
      $left = rand(0, 100);
      echo "<div class='bintang' style='width:{$size}px;height:{$size}px;top:{$top}vh;left:{$left}vw;'></div>";
    }
  ?>

  <!-- Musik efek -->
  <audio autoplay>
    <source src="sounds/success.mp3" type="audio/mpeg">
  </audio>

</body>
</html>
