<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout Berhasil</title>
    <style>
        body {
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
            background: black;
            color: white;
            text-align: center;
            overflow: hidden;
        }

        h1 {
            font-size: 2em;
            margin-top: 30px;
            animation: fadeIn 2s ease-in-out;
        }

        .alien-container {
            margin-top: 50px;
            animation: float 3s ease-in-out infinite;
        }

        .alien {
            width: 150px;
            height: auto;
        }

        .button {
            margin-top: 30px;
            padding: 12px 24px;
            background: #00ffcc;
            color: black;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: background 0.3s;
            display: inline-block;
        }

        .button:hover {
            background: #00ccaa;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .stars {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background: white;
            width: 2px;
            height: 2px;
            opacity: 0;
            animation: twinkle 3s infinite ease-in-out;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="stars"></div>

    <h1>🎉 Terima kasih sudah checkout! 🎉</h1>
    <div class="alien-container">
        <img class="alien" src="images/alien-smile.png" alt="Alien Smiling">
    </div>
    <a class="button" href="index.php">👽 Kembali ke Menu Utama</a>

    <script>
        // Bintang bergerak
        function createStars() {
            const starContainer = document.querySelector('.stars');
            for (let i = 0; i < 100; i++) {
                let star = document.createElement('div');
                star.className = 'star';
                star.style.top = Math.random() * 100 + 'vh';
                star.style.left = Math.random() * 100 + 'vw';
                star.style.animationDuration = (Math.random() * 3 + 2) + 's';
                starContainer.appendChild(star);
            }
        }
        createStars();
    </script>
</body>
</html>
