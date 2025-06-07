<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muara Jambu - Landing Page</title>
    <link rel="stylesheet" href="galeri.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <header class="hero-section">
        <img src="img/1.jpg" alt="Background Image" class="hero-image-background">
        <div class="hero-overlay"></div>

        <nav class="navbar transparent">
            <div class="container navbar-container">
                <div class="navbar-left">
                    <div class="logo">
                        Muara Jambu
                    </div>
                </div>

                <ul class="nav-links">
                    <li><a href="../home/home.php">Home</a></li>
                    <li><a href="../package/package.php">Package</a></li>
                    <li><a href="reservasi.php">Reservation</a></li>
                    <li><a href="../contact/contact.php">Contact Us</a></li>
                </ul>

                <div class="navbar-right">
                    <div class="search-box">
                        <input type="text" placeholder="search">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    </div>
                    <button class="login-button">Login</button>
                    <i class="fa-solid fa-user-circle profile-icon"></i>
                </div>
            </div>
        </nav>

        <div class="hero-content">
                <div class="info-reservasi-text">
                    <h2>GALERI</h2>
                    <p class="subtitle">Spot Lainnya</p>
                </div>
            </div>
    </header>

    <section class="gallery-section">
        <div class="container">
            <div class="gallery-grid">
                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="img/2.jpg" alt="Spot Pemandangan">
                        <span class="gallery-tag">Pemandangan</span>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="img/3.jpg" alt="Aliran Sungai">
                        <span class="gallery-tag">Sungai</span>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="img/4.jpg" alt="Area Tenda">
                        <span class="gallery-tag">Camping</span>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="img/5.jpg" alt="Api Unggun">
                        <span class="gallery-tag">Api Unggun</span>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="img/6.jpg" alt="Saung Bambu">
                         <span class="gallery-tag">Saung</span>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image-container">
                        <img src="img/7.jpg" alt="Jembatan Kayu">
                        <span class="gallery-tag">Jembatan</span>
                    </div>
                </div>
            </div>

            <div class="pagination-container">
                <span class="pagination-info">Menampilkan 1 - 6 dari 42 spot</span>
                <div class="pagination-nav">
                    <a href="#" class="page-link disabled">Sebelumnya</a>
                    <a href="#" class="page-link active">1</a>
                    <a href="#" class="page-link">2</a>
                    <a href="#" class="page-link">3</a>
                    <a href="#" class="page-link">4</a>
                    <a href="#" class="page-link">5</a>
                    <a href="#" class="page-link">6</a>
                    <a href="#" class="page-link">7</a>
                    <a href="#" class="page-link">Selanjutnya</a>
                </div>
            </div>
        </div>
    </section>
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
    

</body>
</html>