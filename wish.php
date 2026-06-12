<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Wish</title>
    <link rel="stylesheet" href="style/style.css">
    
    <style>
        /* Reset & Font Bawaan Project (Biar Konsisten) */
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #07030a; 
            color: white; 
            margin: 0; 
        }

        .wish-section {
            text-align: center;
            padding: 100px 20px;
            min-height: 85vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* Gradien warna pink gelap keunguan biar matching dengan style.css baru */
            background: linear-gradient(135deg, #07030a, #3a1533, #0a050d);
            position: relative;
            overflow: hidden;
        }

        h1, p { 
            margin: 0; 
        }
        
        h1#wish-title { 
            font-size: 50px; 
            font-weight: 700; 
            margin-bottom: 15px; 
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5), 0 0 30px rgba(255, 119, 200, 0.3); 
        }
        
        p#wish-subtitle { 
            font-size: 18px; 
            margin-bottom: 50px; 
            color: rgba(255, 255, 255, 0.85); 
        }

        /* ================= KUE ESTETIK (CSS ART) ================= */
        .cake-container {
            position: relative;
            width: 250px;
            height: 160px;
            margin: 40px auto;
            cursor: pointer;
            transition: transform 0.3s ease;
            z-index: 10;
        }

        .cake-container:hover {
            transform: translateY(-5px);
        }

        /* Lilin Tirus Bergradasi */
        .candle {
            position: absolute;
            top: -65px;
            left: 50%;
            transform: translateX(-50%);
            width: 14px;
            height: 70px;
            background: linear-gradient(to right, #f8bbd0, #ffffff);
            border-radius: 6px;
            z-index: 20;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        /* Api Lilin Berdenyut (Flicker Effect) */
        .flame {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 32px;
            background: #ff9d00;
            border-radius: 50% 50% 20% 20%;
            box-shadow: 0 0 20px 8px rgba(255, 157, 0, 0.8), 0 0 10px rgba(255, 255, 255, 0.6);
            animation: flicker 0.6s infinite alternate;
        }

        @keyframes flicker {
            0% { transform: translateX(-50%) scale(1) skewX(2deg); opacity: 0.9; }
            100% { transform: translateX(-50%) scale(1.1) skewX(-2deg); opacity: 1; }
        }

        /* Ketika lilin ditiup/padam */
        .candle.blown .flame {
            display: none;
        }

        /* Animasi asap tipis setelah lilin padam */
        .smoke {
            display: none;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 25px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: escape 1.5s ease-out;
        }

        @keyframes escape {
            0% { transform: translateX(-50%) translateY(0) scale(1); opacity: 0.8; }
            100% { transform: translateX(-20%) translateY(-30px) scale(3); opacity: 0; }
        }

        /* Badan Utama Kue */
        .cake {
            width: 250px;
            height: 140px;
            background-color: #6d4c41; /* Warna Cokelat Kue Spons */
            border-radius: 15px 15px 5px 5px;
            position: relative;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        }

        /* Krim Soft Pink di Atas Kue */
        .cream {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 35px;
            background: #f8bbd0;
            border-radius: 15px 15px 0 0;
        }

        /* Efek Tetesan Lumeran Krim (Drips) */
        .cream::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 45px;
            background: #f8bbd0;
            border-radius: 10px;
            top: 15px;
            left: 15px;
            box-shadow: 
                30px 10px 0 #f8bbd0, 
                60px 18px 0 #f8bbd0, 
                90px 8px 0 #f8bbd0, 
                120px 22px 0 #f8bbd0, 
                150px 12px 0 #f8bbd0, 
                180px 25px 0 #f8bbd0, 
                210px 14px 0 #f8bbd0;
        }

        /* Taburan Meises Putih Berkilau (Sprinkles) */
        .sprinkles {
            position: absolute;
            width: 100%;
            height: 20px;
            top: 8px;
            left: 0;
            z-index: 5;
        }

        .sprinkles::before {
            content: '';
            position: absolute;
            width: 4px;
            height: 10px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 2px;
            top: 0;
            left: 25px;
            box-shadow: 
                35px 5px 0 rgba(255, 255, 255, 0.85), 
                65px 2px 0 rgba(255, 255, 255, 0.85), 
                95px 7px 0 rgba(255, 255, 255, 0.85), 
                125px 3px 0 rgba(255, 255, 255, 0.85), 
                155px 6px 0 rgba(255, 255, 255, 0.85), 
                185px 1px 0 rgba(255, 255, 255, 0.85), 
                215px 5px 0 rgba(255, 255, 255, 0.85);
        }

        /* Piring Tatakan Kue (Glassmorphism Effect) */
        .plate {
            width: 310px;
            height: 14px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3), 0 0 15px rgba(255, 119, 200, 0.1);
        }

        /* ================= UCAPAN & TOMBOL DATA ================= */
        .wish-result {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
            margin-top: 40px;
            max-width: 650px;
            z-index: 10;
        }

        .wish-result.show {
            opacity: 1;
            transform: translateY(0);
        }

        .wish-result h2 { 
            color: #fff; 
            font-size: 32px; 
            font-weight: 600; 
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.4); 
        }

        .wish-result p { 
            font-size: 1.1rem; 
            line-height: 1.7; 
            color: rgba(255, 255, 255, 0.9); 
            margin-top: 12px; 
        }

        .next-btn {
            margin-top: 35px;
            opacity: 0;
            transition: opacity 0.8s ease;
            pointer-events: none;
            z-index: 10;
        }

        .next-btn.show {
            opacity: 1;
            pointer-events: auto;
        }

        /* EFFECT: CONFETTI KERTAS JATUH */
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f2d74e;
            top: -20px;
            z-index: 1;
            border-radius: 3px;
            animation: fall linear forwards;
        }

        @keyframes fall {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(105vh) rotate(720deg); opacity: 0; }
        }
    </style>
</head>
<body>

<?php include(__DIR__ . '/component/navbar.php'); ?>

<section class="wish-section" id="wishContainer">

    <h1 id="wish-title">Make a Wish, Sayang... 🎂</h1>
    <p id="wish-subtitle">Klik lilinnya buat tiup ya!</p>

    <div class="cake-container" id="cake-box" onclick="blowCandle()">
        
        <div class="candle" id="main-candle">
            <div class="flame"></div>
            <div class="smoke" id="candle-smoke"></div>
        </div>
        
        <div class="cake">
            <div class="cream"></div>
            <div class="sprinkles"></div>
        </div>
        
        <div class="plate"></div>
        
    </div>

    <div class="wish-result" id="result-box">
        <h2>Yaaay! Selamat Ulang Tahun! 🎉👏</h2>
        <p>
            Semoga semua doa, harapan, dan keinginan yang barusan kamu semogakan di dalam hati dikabulkan oleh Tuhan ya, Sayang. Amin! ❤️
        </p>
    </div>

    <div class="next-btn" id="next-btn-box">
        <a href="massage.php">
            <button>Lihat Pesan Terakhir ➔</button>
        </a>
    </div>

</section>

<script src="js/music.js?v=1.1"></script>

<script>
    let isBlown = false;

    // 2. TRIGGER GERAKAN PAKSA AUDIO (ANTI-BLOCK BROWSER)
    window.addEventListener('DOMContentLoaded', () => {
        forcePlayAudio();
    });

    function forcePlayAudio() {
        // Otomatis mencari objek audio bawaan dari script musik kamu
        const audioObj = document.getElementById('mediaAudio') || window.audioVolume || window.bgMusic;
        if (audioObj) {
            audioObj.play().catch(() => {
                console.log("Browser menahan autoplay, musik dipicu via klik lilin nanti.");
            });
        }
    }

    function blowCandle() {
        if (isBlown) return; 
        isBlown = true;

        // Paksa mainkan lagu tepat saat lilin di-klik (Interaksi User Terdeteksi Valid)
        forcePlayAudio();

        const candle = document.getElementById('main-candle');
        const smoke = document.getElementById('candle-smoke');
        const resultBox = document.getElementById('result-box');
        const nextBtnBox = document.getElementById('next-btn-box');
        const title = document.getElementById('wish-title');
        const subtitle = document.getElementById('wish-subtitle');

        // 1. Padamkan api dan trigger asap
        candle.classList.add('blown');
        smoke.style.display = 'block';

        // 2. Transisi teks judul atas secara halus
        title.innerHTML = "Yeaaay! ✨";
        subtitle.innerHTML = "Semoga seluruh harapanmu dikabulkan.";

        // 3. Efek Kejutan Tambahan: Hujan Confetti Warni-warni
        createConfettiShower();

        // 4. Memunculkan kotak teks ucapan & tombol lanjut
        setTimeout(() => {
            resultBox.classList.add('show');
            nextBtnBox.classList.add('show');
        }, 500);
    }

    // GENERATOR HUJAN CONFETTI
    function createConfettiShower() {
        const container = document.getElementById('wishContainer');
        const colors = ['#ff4b5c', '#f8bbd0', '#ffccd5', '#ff9d00', '#4bcffa', '#34e7e4', '#2ecc71'];
        
        for (let i = 0; i < 70; i++) {
            const confetti = document.createElement('div');
            confetti.classList.add('confetti');
            
            // Variasi posisi, warna, ukuran, dan durasi jatuh acak
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.width = Math.random() * 6 + 6 + 'px';
            confetti.style.height = Math.random() * 6 + 12 + 'px';
            confetti.style.animationDuration = Math.random() * 2 + 2 + 's';
            confetti.style.animationDelay = Math.random() * 0.5 + 's';
            
            container.appendChild(confetti);

            // Bersihkan elemen dari DOM setelah jatuh
            setTimeout(() => {
                confetti.remove();
            }, 2500);
        }
    }
</script>

</body>
</html>