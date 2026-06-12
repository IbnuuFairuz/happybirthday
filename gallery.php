<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    
    <link rel="stylesheet" href="style/style.css?v=1.1">
    
    <style>
        /* CSS Tambahan untuk Efek Hover Foto */
        .gallery-item {
            cursor: pointer;
            overflow: hidden;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.15);
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        /* CSS untuk Pop-up Lightbox (Modal Zoom Foto) */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .lightbox-modal.show {
            display: flex;
            opacity: 1;
        }

        .lightbox-content {
            max-width: 85%;
            max-height: 80vh;
            border-radius: 8px;
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.2);
            transform: scale(0.9);
            transition: transform 0.4s ease;
        }

        .lightbox-modal.show .lightbox-content {
            transform: scale(1);
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-btn:hover {
            color: #ff4b5c;
        }
    </style>
</head>
<body>

    <?php include(__DIR__ . '/component/navbar.php'); ?>

    <section class="gallery-section">

        <h1 class="gallery-title">
            Our Memories ✨
        </h1>

        <div class="gallery-grid">

            <div class="gallery-item" onclick="openLightbox('assets/photo/1.jpeg')">
                <img src="assets/photo/1.jpeg" alt="Memory 1">
            </div>

            <div class="gallery-item" onclick="openLightbox('assets/photo/2.jpeg')">
                <img src="assets/photo/2.jpeg" alt="Memory 2">
            </div>

            <div class="gallery-item" onclick="openLightbox('assets/photo/3.jpeg')">
                <img src="assets/photo/3.jpeg" alt="Memory 3">
            </div>

            <div class="gallery-item" onclick="openLightbox('assets/photo/4.jpeg')">
                <img src="assets/photo/4.jpeg" alt="Memory 4">
            </div>

            <div class="gallery-item" onclick="openLightbox('assets/photo/5.jpeg')">
                <img src="assets/photo/5.jpeg" alt="Memory 5">
            </div>

            <div class="gallery-item" onclick="openLightbox('assets/photo/6.jpeg')">
                <img src="assets/photo/6.jpeg" alt="Memory 6">
            </div>

        </div>

        <div id="lightbox" class="lightbox-modal" onclick="closeLightbox()">
            <span class="close-btn" onclick="closeLightbox()">&times;</span>
            <img class="lightbox-content" id="lightbox-img" src="" alt="Zoomed Memory">
        </div>

        <div class="next-btn" style="margin-top: 50px;">
            <a href="wish.php">
                <button>
                    Make a Wish 🎂
                </button>
            </a>
        </div>

    </section>

    <script src="js/music.js?v=1.1"></script>

    <script>
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');

        function openLightbox(src) {
            lightboxImg.src = src;
            lightbox.classList.add('show');
        }

        function closeLightbox() {
            lightbox.classList.remove('show');
        }

        // Menutup lightbox dengan tombol 'ESC' di keyboard
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>

</body>
</html>