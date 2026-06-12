<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="style/style.css">
    
    <style>
        /* CSS Tambahan untuk Efek Typing dan Spasi */
        .typing-container {
            font-size: 1.2rem;
            line-height: 1.8;
            max-width: 650px;
            margin: 20px auto;
            min-height: 150px; /* Menjaga tinggi layout agar tidak kaku */
            color: rgba(255, 255, 255, 0.9);
            text-align: center;
        }

        /* Efek kursor ngetik yang berkedip di akhir kalimat */
        .cursor {
            display: inline-block;
            width: 3px;
            background-color: #ff4b5c;
            animation: blink 0.7s infinite;
            margin-left: 3px;
        }

        @keyframes blink {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        /* Sembunyikan tombol back dulu, muncul setelah teks selesai diketik */
        .button-group {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.8s ease;
            margin-top: 30px;
        }

        .button-group.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>

<?php include(__DIR__ . '/component/navbar.php'); ?>

<section class="hero" style="background: linear-gradient(135deg, #07030a, #3a1533, #0a050d); min-height: 90vh; display: flex; align-items: center; justify-content: center;">

    <div class="content" style="z-index: 10; position: relative;">

        <h1>For You 💖</h1>

        <div class="typing-container">
            <span id="typing-text"></span><span class="cursor" id="cursor">|</span>
        </div>

        <div class="button-group" id="back-btn-group">
            <a href="index.php">
                <button>Back To Start ↺</button>
            </a>
        </div>

    </div>

</section>

<script src="js/music.js?v=1.1"></script>

<script>
    // Teks romantis
    const messageText = "Makasih banyak ya, Sayang, udah mau meluangkan waktu buat melihat kado kecil digital ini. Terima kasih untuk setiap senyuman, setiap memori hangat, dan setiap momen indah yang kita lewati bareng-bareng. Aku bersyukur banget bisa punya kamu. Semoga di usiamu yang sekarang, bahagia dan sehat selalu ya. I love you today, tomorrow, and forever... Happy Birthday! 🎂✨";
    
    let index = 0;
    const speed = 40; // Diubah ke 40ms agar ritme ketikan berjalan santai, lambat, dan emosional
    
    const textContainer = document.getElementById('typing-text');
    const buttonGroup = document.getElementById('back-btn-group');
    const cursor = document.getElementById('cursor');

    // FORCE AUTOPLAY AUDIO AGAR TETEP JALAN SAAT PINDAH HALAMAN
    function forceMusicPlay() {
        const globalAudio = document.getElementById('mediaAudio') || window.audioVolume || window.bgMusic;
        if (globalAudio) {
            globalAudio.play().catch(() => {
                console.log("Autoplay musik ditahan sistem browser.");
            });
        }
    }

    function typeWriter() {
        if (index < messageText.length) {
            // Cetak huruf satu per satu dengan ritme yang lebih lambat
            textContainer.innerHTML += messageText.charAt(index);
            index++;
            setTimeout(typeWriter, speed);
        } else {
            // Jika teks sudah selesai diketik, munculkan tombol kembali secara smooth
            buttonGroup.classList.add('show');
            // Hilangkan kursor berkedip setelah selesai
            cursor.style.display = 'none';
        }
    }

    // Jalankan musik & animasi ketik barengan saat DOM siap
    window.addEventListener('DOMContentLoaded', () => {
        forceMusicPlay();
        
        // Jeda awal 600ms sebelum mulai ngetik biar transisi halamannya beres dulu
        setTimeout(typeWriter, 600);
    });

    // Fallback click jika browser memblokir audio otomatis di awal
    document.body.addEventListener('click', () => {
        forceMusicPlay();
    }, { once: true });
</script>

</body>
</html>