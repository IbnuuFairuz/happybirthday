<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    
    <link rel="stylesheet" href="style/style.css?v=1.1">
    
    <style>
        /* CSS Tambahan agar ada foto di dalam timeline item */
        .timeline-img {
            width: 100%;
            max-width: 250px;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .timeline-item:hover .timeline-img {
            transform: scale(1.03);
        }

        .timeline-content h2 {
            color: #ff4b5c; /* Warna pink/merah romantis untuk judul momen */
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <?php include(__DIR__ . '/component/navbar.php'); ?>

    <section class="timeline-section">

        <h1 class="timeline-title">
            Our Journey ✨
        </h1>

        <div class="timeline">

            <div class="timeline-item">
                <div class="timeline-content">
                    <h2>The First Time</h2>
                    <p>
                        Awal mula cerita indah kita dimulai. Di mana semua hal random berubah jadi momen yang paling aku tunggu-tunggu setiap hari.
                    </p>
                    <img src="assets/photo/firsttime (1).jpeg" alt="Awal Kenal" class="timeline-img">
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <h2>Going Through Together</h2>
                    <p>
                        Melewati banyak hari, cerita, tawa, bahkan hal-hal konyol bareng kamu. Makasih ya udah selalu sabar dan bertahan di samping aku.
                    </p>
                    <img src="assets/photo/tengah.jpeg" alt="Melewati Bersama" class="timeline-img">
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <h2>2026 - Happy Birthday! 💖</h2>
                    <p>
                        Dan di tahun ini, di hari spesialmu ini, aku berharap kita bisa terus sama-sama mengukir cerita yang lebih indah lagi ke depannya. Tetap jadi orang favoritku ya, Sayang!
                    </p>
                    <img src="assets/photo/1.jpeg" alt="Ulang Tahun" class="timeline-img">
                </div>
            </div>

        </div>

        <div class="next-btn" style="margin-top: 40px;">
            <a href="gallery.php">
                <button>
                    Continue Journey →
                </button>
            </a>
        </div>

    </section>

    <script src="js/music.js?v=1.1"></script>

</body>
</html>