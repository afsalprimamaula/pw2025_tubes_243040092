<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muara Jambu - Landing Page</title>
    <link rel="stylesheet" href="home.css">
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
                    <div class="search-box">
                        <input type="text" placeholder="search">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    </div>
                    <a href="../login/login.php"><button class="login-button">Login</button></a>
                    <i class="fa-solid fa-user-circle profile-icon"></i>
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
                    <div class="card">
                        <i class="fa-solid fa-campground card-icon"></i>
                        <h3>Camping Nyaman</h3>
                        <p>Deskripsi singkat tentang fasilitas camping yang nyaman di Muara Jambu.</p>
                    </div>
                    <div class="card">
                        <i class="fa-solid fa-person-hiking card-icon"></i>
                        <h3>Aktivitas Seru</h3>
                        <p>Jelajahi jalur tracking yang menantang dengan pemandangan alam yang memukau.</p>
                    </div>
                    <div class="card">
                        <i class="fa-solid fa-location-dot card-icon"></i>
                        <h3>Lokasi Strategis</h3>
                        <p>Berada di lokasi yang mudah diakses dan dekat dengan berbagai destinasi menarik.</p>
                    </div>
                    <div class="card">
                        <i class="fa-solid fa-calendar-check card-icon"></i>
                        <h3>Reservasi Mudah</h3>
                        <p>Proses reservasi yang cepat dan mudah untuk kenyamanan liburan Anda.</p>
                    </div>
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
                            <div class="spotlight-image-wrapper">
                                <img src="img/camping.jpg" alt="Camping" class="spotlight-image">
                                <div class="image-overlay-icon">
                                    <i class="fas fa-image"></i> </div>
                            </div>
                            <div class="spotlight-card-content">
                                <h4>Camping</h4>
                                <p>Rasakan serunya berkemah di bawah langit berbintang dengan suasana hutan yang asri dan udara yang sejuk. Camping di Muara Jambu cocok untuk keluarga, komunitas, dan pecinta alam.</p>
                            </div>
                        </div>
                        <div class="spotlight-card">
                            <div class="spotlight-image-wrapper">
                                <img src="img/pondokan.png" alt="Pondokan" class="spotlight-image">
                                <div class="image-overlay-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                            </div>
                            <div class="spotlight-card-content">
                                <h4>Pondokan</h4>
                                <p>Nikmati kenyamanan pondok berkonsep modern yang menyatu dengan alam. Cocok untuk Anda yang mencari ketenangan dan privasi.</p>
                            </div>
                        </div>
                        <div class="spotlight-card">
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
                        </div>
                        <div class="spotlight-card">
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
                        </div>
                        <div class="spotlight-card">
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
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="testimonial-section">
            <div class="container">
                <h2 class="section-title">Testimoni</h2>
                <div class="testimonial-carousel">
                    <div class="testimonial-card">
                        <img src="assets/avatar1.jpg" alt="User 1">
                        <p>"A terrific piece of praise! Pelayanan sangat ramah dan tempatnya indah sekali, ingin kembali lagi!"</p>
                        <span>- Nama Pelanggan 1</span>
                    </div>
                    <div class="testimonial-card">
                        <img src="assets/avatar2.jpg" alt="User 2">
                        <p>"A fantastic bit of feedback! Liburan di Muara Jambu adalah pengalaman tak terlupakan. Sangat direkomendasikan!"</p>
                        <span>- Nama Pelanggan 2</span>
                    </div>
                    <div class="testimonial-card">
                        <img src="assets/avatar3.jpg" alt="User 3">
                        <p>"A genuinely glowing review! Fasilitas lengkap, pemandangan asri, cocok untuk healing dan keluarga."</p>
                        <span>- Nama Pelanggan 3</span>
                    </div>
                    <div class="testimonial-card">
                        <img src="assets/avatar4.jpg" alt="User 4">
                        <p>"Sungguh pengalaman yang menakjubkan! Pemandu wisata sangat membantu dan ramah."</p>
                        <span>- Nama Pelanggan 4</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="map-section">
            <div class="container">
                <div class="map-box">
                    <p class="subtitle-map">DISCOVER TOP DESTINATIONS AND ATTRACTIONS</p>
                    <h3>MUARA JAMBU</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126791.43197172928!2d107.59697535695828!3d-6.741500092182958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e6921335eb82d27%3A0xfb0a00e7c1c0eeaf!2sKp.%20Neglasari%20RT%2FRW.018%2F004%2C%20Desa%2C%20Cibeusi%2C%20Kec.%20Ciater%2C%20Kabupaten%20Subang%2C%20Jawa%20Barat%2041281!3m2!1d-6.7415069999999995!2d107.6793773!5e0!3m2!1sid!2sid!4v1748865432226!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-columns">
                <div class="footer-col footer-col-about">
                    <h4>MUARA JAMBU</h4>
                    <p>Camping seru di Muara Jambu! Nikmati alam, fasilitas nyaman, dan momen tak terlupakan bersama teman & keluarga. Reservasi sekarang!.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-col footer-col-hours">
                    <h4>Jam Buka</h4>
                    <p>Senin - Minggu : 24 JAM</p>

                </div>
                <div class="footer-col footer-col-contact">
                    <h4>Kontak</h4>
                    <p><i class="fa-solid fa-envelope"></i> info@muarajambu.com</p>
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

            // Fungsi untuk mengupdate nomor slide saat ini
            function updateSlideNumber() {
                const scrollLeft = spotlightCarousel.scrollLeft;
                const cardWidth = spotlightCarousel.querySelector('.spotlight-card').offsetWidth + 20; // Lebar kartu + gap
                const currentCardIndex = Math.round(scrollLeft / cardWidth) + 1;
                currentSlideSpan.textContent = String(currentCardIndex).padStart(2, '0');
            }

            // Set total slides saat halaman dimuat
            const totalCards = spotlightCarousel.querySelectorAll('.spotlight-card').length;
            totalSlidesSpan.textContent = String(totalCards).padStart(2, '0');

            // Event listener untuk tombol panah kanan
            arrowRight.addEventListener('click', function() {
                const cardWidth = spotlightCarousel.querySelector('.spotlight-card').offsetWidth; // Lebar satu kartu
                const gap = 20; // Jarak antar kartu
                spotlightCarousel.scrollBy({
                    left: cardWidth + gap, // Gulir sejauh lebar satu kartu ditambah gap
                    behavior: 'smooth'
                });
            });

            // Event listener untuk tombol panah kiri
            arrowLeft.addEventListener('click', function() {
                const cardWidth = spotlightCarousel.querySelector('.spotlight-card').offsetWidth; // Lebar satu kartu
                const gap = 20; // Jarak antar kartu
                spotlightCarousel.scrollBy({
                    left: -(cardWidth + gap), // Gulir ke kiri sejauh lebar satu kartu ditambah gap
                    behavior: 'smooth'
                });
            });

            // Event listener untuk update nomor slide saat carousel di-scroll
            spotlightCarousel.addEventListener('scroll', updateSlideNumber);

            // Panggil pertama kali untuk inisialisasi nomor slide
            updateSlideNumber();
        });
    </script>

</body>
</html>