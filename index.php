<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link rel="stylesheet" href="style/style.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* CSS Tambahan untuk Efek Transisi Smooth */
        .fade-out {
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.8s ease;
            display: none;
        }

        .hidden-content {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }

        .hidden-content.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Styling Foto Suci agar Bulat, Pas & Estetik */
        .profile-img-box {
            width: 170px;
            height: 170px;
            margin: 60px auto 25px auto; /* Margin atas 60px agar tidak tertutup blur navbar */
            transition: transform 0.3s ease;
        }

        .profile-img-box:hover {
            transform: scale(1.05); /* Efek membesar sedikit saat kursor lewat */
        }

        .profile-img-box img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 20px rgba(255, 105, 180, 0.4);
        }

        /* Merapikan Teks Ucapan */
        .love-text {
            font-size: 1.15rem;
            line-height: 1.8;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            color: #fff;
        }
    </style>
</head>
<body>

    <?php include(__DIR__ . '/component/navbar.php'); ?>

    <section class="hero">

        <div class="content" id="main-content">
            <h1>Happy Birthday</h1>
            <p>A little website for someone special 💖</p>
            <div class="button-group">
                <a href="#" id="start-btn">
                    <button>Start Journey →</button>
                </a>
            </div>
        </div>

        <div class="content hidden-content" id="secret-content">
            
            <div class="profile-img-box">
                <img src="assets/photo/mymemory.jpeg" alt="Suci">
            </div>
            
            <p class="love-text">
                "Selamat ulang tahun, Sayang! ✨<br>
                Terima kasih ya sudah hadir dan membawa banyak warna indah di hidupku. Semoga di usiamu yang baru ini, kamu selalu dikelilingi oleh kebahagiaan, kesehatan, dan semua impianmu bisa tercapai. Aku akan selalu ada di sini buat dukung kamu. I love you so much! 💖"
            </p>

            <div class="button-group">
                <a href="about.php">
                    <button>Next</button>
                </a>
            </div>
        </div>

    </section>

    <script src="js/music.js?v=1.1"></script>

    <script>
        document.getElementById('start-btn').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah perpindahan halaman instan
            
            // Putar Musik dari js/music.js
            if (typeof playMusic === 'function') {
                playMusic();
            }
            
            const mainContent = document.getElementById('main-content');
            const secretContent = document.getElementById('secret-content');

            // 1. Berikan efek animasi menghilang pada konten utama
            mainContent.style.opacity = '0';
            mainContent.style.transform = 'translateY(-20px)';
            mainContent.style.transition = 'all 0.6s ease';

            // 2. Tampilkan konten rahasia secara smooth setelah konten utama hilang total
            setTimeout(function() {
                mainContent.style.display = 'none';
                
                secretContent.style.display = 'block';
                setTimeout(function() {
                    secretContent.classList.add('show');
                }, 50);
            }, 600);
        });
    </script>

</body>
</html>