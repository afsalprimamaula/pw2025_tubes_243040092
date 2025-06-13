<?php
session_start();
require_once '../config/koneksi.php'; 

$testimoni_query = "SELECT t.ulasan, u.nama, u.foto_profil, p.nama_paket 
                    FROM testimoni t 
                    JOIN users u ON t.user_id = u.id 
                    LEFT JOIN packages p ON t.package_id = p.id
                    WHERE t.status = 'approved' 
                    ORDER BY t.created_at DESC 
                    LIMIT 3";
$testimoni_result = $conn->query($testimoni_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muara Jambu - Landing Page</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../aset/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <header class="hero-section">
        <video autoplay muted loop playsinline class="hero-video-background">
            <source src="video/TAMPILAN_AWAL.mp4" type="video/mp4">
        </video>
        <div class="hero-video-overlay"></div>

        <nav class="navbar transparent">
            <div class="container navbar-container">
                <div class="navbar-left">
                    <div class="logo">
                        Muara Jambu
                    </div>
                </div>

                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="../package/package.php">Package</a></li>
                    <li><a href="../reservasi/reservasi.php">Reservation</a></li>
                    <li><a href="../contact/contact.php">Contact Us</a></li>
                </ul>

               <div class="navbar-right">
                    <div class="search-container">
                        <form action="../package/package.php" method="GET" class="search-form">
                            <div class="search-box">
                                <input type="text" name="q" id="navbarSearchInput" placeholder="Cari paket..." autocomplete="off">
                                <button type="submit" class="search-icon-button">
                                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                                </button>
                            </div>
                        </form>
                        <div id="searchResults" class="search-results"></div>
                    </div>
                    
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <div class="profile-dropdown">
                            <i class="fa-solid fa-user-circle profile-icon"></i>
                            
                            <div class="dropdown-content">
                                <div class="dropdown-header">
                                    <span>Halo, <?php echo htmlspecialchars($_SESSION['user_nama']); ?></span>
                                </div>
                                <a href="../profile/profile.php"><i class="fas fa-user-edit"></i> Lihat Profile</a>
                                <a href="../profile/reservasi_saya.php"><i class="fas fa-receipt"></i> Reservasi Saya</a>
                                <a href="../profile/ubah_password.php"><i class="fas fa-key"></i> Ubah Password</a>
                                <a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="../login/login.php" class="login-button">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <div class="hero-content">
        </div>
    </header>

    <main>

        <section class="experience-section">
            <div class="container">
                <h2 class="section-title">Pengalaman Liburan Yang Istimewa</h2>
                <p class="section-subtitle">Nikmati keindahan alam dan budaya lokal dalam suasana tenang dan alami di wisata Muara Jambu</p>
                <div class="cards-grid">
                    <a href="../package/package.php#package" class="card">
                        <i class="fa-solid fa-campground card-icon"></i>
                        <h3>Camping Nyaman</h3>
                        <p>Deskripsi singkat tentang fasilitas camping yang nyaman di Muara Jambu.</p>
                    </a>
                    <a href="../package/package.php#activity" class="card">
                        <i class="fa-solid fa-person-hiking card-icon"></i>
                        <h3>Aktivitas Seru</h3>
                        <p>Jelajahi jalur tracking yang menantang dengan pemandangan alam yang memukau.</p>
                    </a>
                    <a href="#map-section" class="card">
                        <i class="fa-solid fa-location-dot card-icon"></i>
                        <h3>Lokasi Strategis</h3>
                        <p>Berada di lokasi yang mudah diakses dan dekat dengan berbagai destinasi menarik.</p>
                    </a>
                    <a href="../reservasi/reservasi.php" class="card">
                        <i class="fa-solid fa-calendar-check card-icon"></i>
                        <h3>Reservasi Mudah</h3>
                        <p>Proses reservasi yang cepat dan mudah untuk kenyamanan liburan Anda.</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="spotlight-section">
            <div class="spotlight-content-wrapper">
                <div class="spotlight-text-area">
                    <div class="spotlight-header">
                        <h2>SPOTLIGHT</h2>
                        <h3>Discover Muara Jambu Iconic Treasures</h3>
                    </div>
                    <div class="carousel-navigation">
                        <span class="current-slide">01</span><span class="slash">/</span><span class="total-slides">06</span>
                        <div class="nav-arrows">
                            <button class="arrow-left" id="arrowLeft"><i class="fas fa-chevron-left"></i></button>
                            <button class="arrow-right" id="arrowRight"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="spotlight-carousel-container">
                    <div class="spotlight-carousel" id="spotlightCarousel">
                        <div class="spotlight-card">
                            <a href="../package/package.php">
                            <div class="spotlight-image-wrapper">
                                <img src="img/camping.jpg" alt="Camping" class="spotlight-image">
                                <div class="image-overlay-icon">
                                    <i class="fas fa-image"></i> </div>
                            </div>
                            <div class="spotlight-card-content">
                                <h4>Camping</h4>
                                <p>Rasakan serunya berkemah di bawah langit berbintang dengan suasana hutan yang asri dan udara yang sejuk. Camping di Muara Jambu cocok untuk keluarga, komunitas, dan pecinta alam.</p>
                                </a>
                            </div>
                        </div>

                        <div class="spotlight-card">
                            <a href="../package/package.php#filter-group">
                            <div class="spotlight-image-wrapper">
                                <img src="img/pondokan.png" alt="Pondokan" class="spotlight-image">
                                <div class="image-overlay-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                            </div>
                            <div class="spotlight-card-content">
                                <h4>Pondokan</h4>
                                <p>Nikmati kenyamanan pondok berkonsep modern yang menyatu dengan alam. Cocok untuk Anda yang mencari ketenangan dan privasi.</p>
                                </a>
                            </div>
                        </div>

                        <div class="spotlight-card">
                            <a href="../package/package.php#activity" class="card">
                            <div class="spotlight-image-wrapper">
                                <img src="img/aktivitas.png" alt="Aktivitas" class="spotlight-image">
                                <div class="image-overlay-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                            </div>
                            <div class="spotlight-card-content">
                                <h4>Aktivitas Seru</h4>
                                <p>Berbagai pilihan aktivitas seru seperti arung jeram atau berperahu di danau yang jernih, dan juga area bermain anak.</p>
                            </div>
                            </a>
                        </div>
                        <div class="spotlight-card">
                            <a href="../galeri/galeri.php">
                            <div class="spotlight-image-wrapper">
                                <img src="img/kolam.webp" alt="Lainnya 1" class="spotlight-image">
                                <div class="image-overlay-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                            </div>
                            <div class="spotlight-card-content">
                                <h4>Kolam Renang</h4>
                                <p>Nikmati kemewahan kolam renang dengan pemandangan alam yang memukau.</p>
                            </div>
                            </a>
                        </div>
                        <div class="spotlight-card">
                            <a href="../galeri/galeri.php">
                            <div class="spotlight-image-wrapper">
                                <img src="img/spot.jpg" alt="Lainnya 1" class="spotlight-image">
                                <div class="image-overlay-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                            </div>
                            <div class="spotlight-card-content">
                                <h4>Spot Lainnya</h4>
                                <p>Jelajahi berbagai spot menarik lainnya yang tersebar di area Muara Jambu.</p>
                            </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="testimonial-section">
            <div class="container">
                <h2 class="section-title">Testimoni</h2>
                <div class="testimonial-carousel">
                    <?php if ($testimoni_result && $testimoni_result->num_rows > 0): ?>
                        <?php while($testi = $testimoni_result->fetch_assoc()): ?>
                            <div class="testimonial-card">
                                <img src="../<?php echo htmlspecialchars($testi['foto_profil'] ?? 'aset/img/default-avatar.png'); ?>" alt="Foto <?php echo htmlspecialchars($testi['nama']); ?>">
                                <?php if(!empty($testi['nama_paket'])): ?>
                                    <small class="text-muted package-review-label">
                                        Ulasan untuk: <strong><?php echo htmlspecialchars($testi['nama_paket']); ?></strong>
                                    </small>
                                <?php endif; ?>
                                <p>"<?php echo htmlspecialchars($testi['ulasan']); ?>"</p>
                                <span>- <?php echo htmlspecialchars($testi['nama']); ?></span>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>Belum ada testimoni untuk ditampilkan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section id="map-section" class="map-section"></section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-columns">
                <div class="footer-col footer-col-about">
                    <h4>MUARA JAMBU</h4>
                    <p>Camping seru di Muara Jambu! Nikmati alam, fasilitas nyaman, dan momen tak terlupakan bersama teman & keluarga. Reservasi sekarang!.</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/share/15NoiWdnWW/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/muarajambuofficial?igsh=OWViNmI2aHgwdmZ6"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@muarajambuofficial?_t=ZS-8x0DAZWVz1x&_r=1"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-col footer-col-hours">
                    <h4>Jam Buka</h4>
                    <p>Senin - Minggu : 24 JAM</p>

                </div>
                <div class="footer-col footer-col-contact">
                    <h4>Kontak</h4>
                    <p><i class="fa-solid fa-envelope"></i> muarajambu@gmail.com</p>
                    <p><i class="fa-solid fa-phone"></i> 0821-1111-8313 (Yayat)</p>
                                                    <p>0813-1500-2823 (Sandi)</p>
                                                    <p>0813-1500-2824 (Aceng)</p>
                    <p><i class="fa-solid fa-location-dot"></i> Desa Cibeusi, Kecamatan CIater, Kaputan Subang.</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Muara Jambu. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a> | <a href="#">by Afsal Pima Maula</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const spotlightCarousel = document.getElementById('spotlightCarousel');
            const arrowLeft = document.getElementById('arrowLeft');
            const arrowRight = document.getElementById('arrowRight');
            const currentSlideSpan = document.querySelector('.current-slide');
            const totalSlidesSpan = document.querySelector('.total-slides');

            function updateSlideNumber() {
                const scrollLeft = spotlightCarousel.scrollLeft;
                const cardWidth = spotlightCarousel.querySelector('.spotlight-card').offsetWidth + 20;
                const currentCardIndex = Math.round(scrollLeft / cardWidth) + 1;
                currentSlideSpan.textContent = String(currentCardIndex).padStart(2, '0');
            }

            const totalCards = spotlightCarousel.querySelectorAll('.spotlight-card').length;
            totalSlidesSpan.textContent = String(totalCards).padStart(2, '0');

            arrowRight.addEventListener('click', function() {
                const cardWidth = spotlightCarousel.querySelector('.spotlight-card').offsetWidth;
                const gap = 20;
                spotlightCarousel.scrollBy({
                    left: cardWidth + gap,
                    behavior: 'smooth'
                });
            });

            arrowLeft.addEventListener('click', function() {
                const cardWidth = spotlightCarousel.querySelector('.spotlight-card').offsetWidth;
                const gap = 20;
                spotlightCarousel.scrollBy({
                    left: -(cardWidth + gap),
                    behavior: 'smooth'
                });
            });

            spotlightCarousel.addEventListener('scroll', updateSlideNumber);

            updateSlideNumber();
        });
    </script>

<script src="../aset/main.js"></script>


</body>
</html>
