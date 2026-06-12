<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    
    <link rel="stylesheet" href="style/style.css?v=1.1">
    
    <style>
        /* ==================== STYLE UTAMA & INTERAKSI CARD ==================== */
        .card {
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            z-index: 10;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
        }

        .description-box {
            margin-top: 30px;
            min-height: 80px;
            position: relative;
            z-index: 10;
        }

        .desc-content {
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.5s ease;
            font-size: 1.1rem;
            line-height: 1.6;
            background: rgba(255, 255, 255, 0.05);
            padding: 15px 20px;
            border-radius: 10px;
            border-left: 4px solid #ff4b5c;
            max-width: 600px;
            margin: 0 auto;
        }

        .desc-content.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* STYLE: DUA FOTO KOTAK SEJAJAR */
        .about-images-wrapper {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 35px auto;
            max-width: 500px;
            flex-wrap: wrap;
            position: relative;
            z-index: 10;
        }

        .about-image-card {
            width: 150px;
            height: 190px;
            overflow: hidden;
            border-radius: 12px;
            border: 3px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .about-image-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 12px 25px rgba(255, 119, 200, 0.3);
        }

        .about-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ==================== ANIMASI: FLOATING HEARTS ==================== */
        body {
            position: relative;
            overflow-x: hidden;
        }

        .hearts-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .heart-particle {
            position: absolute;
            bottom: -20px;
            color: rgba(255, 75, 92, 0.6);
            font-size: 1.2rem;
            animation: floatUp linear forwards;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-105vh) translateX(var(--random-x)) rotate(var(--random-rotate));
                opacity: 0;
            }
        }

        /* ==================== ANIMASI: TYPING TICKER ==================== */
        .date-ticker-container {
            margin: 15px auto;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1.2rem;
            color: #ffccd5;
            text-shadow: 0 0 8px rgba(255, 75, 92, 0.5);
            min-height: 25px;
            font-weight: bold;
        }

        .typing-cursor {
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* ==================== STYLE: MINI MINI CALENDAR DESIGN ==================== */
        .calendar-wrapper {
            margin: 25px auto;
            max-width: 320px; /* Ukuran pas mini estetik */
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 15px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 10;
        }

        .calendar-header {
            font-size: 1.1rem;
            color: #ffccd5;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
        }

        .calendar-day-label {
            font-size: 0.75rem;
            color: #ffb7e8;
            font-weight: bold;
            padding-bottom: 5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .calendar-date {
            font-size: 0.95rem;
            color: #ffffff;
            padding: 5px 0;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        /* Tanggal kosong di awal bulan Juni (Juni 2026 dimulai hari Senin, kosongkan baris Minggu) */
        .calendar-date.empty {
            visibility: hidden;
        }

        /* HIGHLIGHT KHUSUS TANGGAL 13 JUNI */
        .calendar-date.birthday-highlight {
            background: #ff4b5c;
            color: #ffffff;
            font-weight: bold;
            box-shadow: 0 0 12px #ff4b5c;
            animation: pulseGlow 2s infinite;
            border: 1px solid #ffffff;
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 5px #ff4b5c; }
            50% { box-shadow: 0 0 18px #ff4b5c; transform: scale(1.05); }
            100% { box-shadow: 0 0 5px #ff4b5c; }
        }
    </style>
</head>
<body>

    <div class="hearts-container" id="heartsContainer"></div>

    <?php include(__DIR__ . '/component/navbar.php'); ?>

    <section class="about-section" style="position: relative; z-index: 5;">

        <div class="about-content">

            <h1>About Her ✨</h1>

            <p style="margin-bottom: 5px;">
                She is someone special who always brings happiness,
                warmth, and beautiful memories into my life.
            </p>

            <div class="date-ticker-container">
                <span id="typingText"></span><span class="typing-cursor">|</span>
            </div>

            <div class="calendar-wrapper">
                <div class="calendar-header" id="calendarTitle">📅 Juni 2026</div>
                <div class="calendar-grid">
                    <div class="calendar-day-label">Mi</div>
                    <div class="calendar-day-label">Se</div>
                    <div class="calendar-day-label">Se</div>
                    <div class="calendar-day-label">Ra</div>
                    <div class="calendar-day-label">Ka</div>
                    <div class="calendar-day-label">Ju</div>
                    <div class="calendar-day-label">Sa</div>

                    <div class="calendar-date empty"></div>
                    <div class="calendar-date">1</div>
                    <div class="calendar-date">2</div>
                    <div class="calendar-date">3</div>
                    <div class="calendar-date">4</div>
                    <div class="calendar-date">5</div>
                    <div class="calendar-date">6</div>

                    <div class="calendar-date">7</div>
                    <div class="calendar-date">8</div>
                    <div class="calendar-date">9</div>
                    <div class="calendar-date">10</div>
                    <div class="calendar-date">11</div>
                    <div class="calendar-date">12</div>
                    
                    <div class="calendar-date birthday-highlight" title="Suci's Birthday! 🎉">13</div>
                    
                    <div class="calendar-date">14</div>
                    <div class="calendar-date">15</div>
                    <div class="calendar-date">16</div>
                    <div class="calendar-date">17</div>
                    <div class="calendar-date">18</div>
                    <div class="calendar-date">19</div>
                    <div class="calendar-date">20</div>

                    <div class="calendar-date">21</div>
                    <div class="calendar-date">22</div>
                    <div class="calendar-date">23</div>
                    <div class="calendar-date">24</div>
                    <div class="calendar-date">25</div>
                    <div class="calendar-date">26</div>
                    <div class="calendar-date">27</div>

                    <div class="calendar-date">28</div>
                    <div class="calendar-date">29</div>
                    <div class="calendar-date">30</div>
                </div>
            </div>
            <div class="about-images-wrapper">
                <div class="about-image-card">
                    <img src="assets/photo/fotokecil.jpeg" alt="Foto Masa Kecil">
                </div>
                <div class="about-image-card">
                    <img src="assets/photo/sma.jpeg" alt="Foto Masa Sekolah">
                </div>
            </div>

            <div class="info-box">
                <div class="card" onclick="showDesc('smile')">
                    <h2>Beautiful Smile</h2>
                </div>

                <div class="card" onclick="showDesc('heart')">
                    <h2>Kind Heart</h2>
                </div>

                <div class="card" onclick="showDesc('person')">
                    <h2>My Favorite Person</h2>
                </div>
            </div>

            <div class="description-box">
                <div id="desc-smile" class="desc-content">
                    "Senyuman kamu itu punya daya magis sendiri tahu gak? Tiap kali aku lagi capek atau pusing, liat senyum manis kamu aja rasanya semua beban langsung hilang gitu aja. Jangan bosan-bosan buat tersenyum ya, Sayang! 😊"
                </div>
                
                <div id="desc-heart" class="desc-content">
                    "Salah satu hal yang paling bikin aku kagum dan sayang sama kamu adalah ketulusan hati kamu. Kamu selalu peduli, sabar menghadapi aku, dan punya cara tersendiri buat bikin orang di sekitar kamu merasa nyaman. Beruntung banget aku bisa milikin kamu. ❤️"
                </div>
                
                <div id="desc-person" class="desc-content">
                    "Dari miliaran orang di dunia, kamu tetap jadi orang nomor satu favorit aku. Tempat terbaik buat aku pulang, berbagi cerita, keluh kesah, sampai hal-hal random gak jelas. *You are my today, and all of my tomorrows.* 🌹"
                </div>
            </div>

            <div class="next-btn" style="margin-top: 40px;">
                <a href="timeline.php">
                    <button>Next Memory →</button>
                </a>
            </div>

        </div>

    </section>

    <script src="js/music.js?v=1.1"></script>

    <script>
        // Deteksi Otomatis Hari H Ulang Tahun (13 Juni)
        const hariIni = new Date();
        const isBirthdayMode = (hariIni.getDate() === 13 && hariIni.getMonth() === 5);

        // 1. LOGIKA ANIMASI KETIK
        const textTarget = document.getElementById('typingText');
        let romanticPhrase = "Since we met, every day feels like a blessing... ✨";
        
        if (isBirthdayMode) {
            romanticPhrase = "🎉 Happy Birthday, My Love! May all your wishes come true... 💖";
            document.getElementById('calendarTitle').innerText = "🎂 HBD MY PRINCESS 🎂";
        }

        let textIndex = 0;
        textTarget.innerHTML = ""; 

        function typeWriterAnimation() {
            if (textIndex < romanticPhrase.length) {
                textTarget.innerHTML += romanticPhrase.charAt(textIndex);
                textIndex++;
                setTimeout(typeWriterAnimation, 80);
            }
        }
        window.addEventListener('DOMContentLoaded', typeWriterAnimation);


        // 2. LOGIKA GENERATOR FLOATING HEARTS
        const container = document.getElementById('heartsContainer');
        const heartSymbols = ['❤️', '💖', '💝', '💕', '🌸'];

        function createHeart() {
            const heart = document.createElement('div');
            heart.classList.add('heart-particle');
            heart.innerText = heartSymbols[Math.floor(Math.random() * heartSymbols.length)];
            
            const startLeft = Math.random() * 100;
            const duration = Math.random() * 3 + 4;
            const size = Math.random() * 0.6 + 0.8;
            
            heart.style.left = startLeft + 'vw';
            heart.style.animationDuration = duration + 's';
            heart.style.fontSize = size + 'rem';
            
            const randomX = (Math.random() * 100 - 50) + 'px';
            const randomRotate = (Math.random() * 360) + 'deg';
            heart.style.setProperty('--random-x', randomX);
            heart.style.setProperty('--random-rotate', randomRotate);

            container.appendChild(heart);

            setTimeout(() => {
                heart.remove();
            }, duration * 1000);
        }
        setInterval(createHeart, 400);


        // 3. LOGIKA SHOW DESCRIPTION CARD
        function showDesc(type) {
            const allDescs = document.querySelectorAll('.desc-content');
            allDescs.forEach(desc => {
                desc.classList.remove('show');
                desc.style.display = 'none';
            });

            const targetDesc = document.getElementById('desc-' + type);
            targetDesc.style.display = 'block';
            setTimeout(() => {
                targetDesc.classList.add('show');
            }, 50);
        }
    </script>

</body>
</html>