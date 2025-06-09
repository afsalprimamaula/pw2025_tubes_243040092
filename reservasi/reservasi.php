<?php 
session_start();
require_once '../config/koneksi.php'; // Sesuaikan path jika perlu
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muara Jambu - Landing Page</title>
    <link rel="stylesheet" href="reservasi.css">
    <link rel="stylesheet" href="../aset/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <header class="hero-section">
        <img src="img/foto1.jpg" alt="Background Image" class="hero-image-background">
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

                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <div class="profile-dropdown">
                            <i class="fa-solid fa-user-circle profile-icon"></i>
                            <div class="dropdown-content">
                                <div class="dropdown-header">
                                    <span><?php echo htmlspecialchars($_SESSION['user_nama']); ?></span>
                                </div>
                                <a href="../profile/profile.php"><i class="fa-solid fa-user"></i> Lihat Profile Saya</a>
                                <a href="../profile/reservasi_saya.php"><i class="fa-solid fa-calendar-check"></i> Reservasi Saya</a>
                                <a href="#"><i class="fa-solid fa-key"></i> Ubah Password</a>
                                <a href="../controller/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="../login/login.php" class="login-button-link"><button class="login-button">Login</button></a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <div class="hero-content">
                <div class="info-reservasi-text">
                    <h2>Informasi Reservasi</h2>
                    <p class="subtitle">RECREATION & CAMP</p>
                    <p>Kami menyediakan layanan reservasi untuk memastikan pengalaman camping Anda berjalan lancar.<BR> Waktu Check-in jam 14.00 WIB dan Check out jam 12.00 WIB.</p>
                </div>
            </div>
    </header>

    <section class="info-cards-section">
        <div class="container">
            <div class="info-card">
                <i class="fas fa-clock card-icon"></i>
                <h3>Jam Operasional</h3>
                <p>Senin - Minggu : 24 JAM </p> <p><span>HTM:15K per orang</span></p>
            </div>
            <div class="info-card">
                <i class="fas fa-calendar-check card-icon"></i>
                <h3>Reservasi</h3>
                <p>Lakukan reservasi tenda Anda dengan mudah untuk menikmati pengalaman camping yang tak terlupakan di Muara Jambu.</p>
                <a href="menureservasi.php" class="card-button">Reservasi Sekarang</a>
                </div>
            <div class="info-card">
                <i class="fas fa-phone card-icon"></i>
                <h3>Kontak</h3>
                <p>0821-1111-8313 (Yayat)</p>
                <p>0813-1500-2823 (Sandi)</p>
                <p>0813-1500-2824 (Aceng)</p>
            </div>
        </div>
    </section>

    <section class="my-reservations-section">
        <div class="container">
            <h2>Reservasi Saya</h2>
            <p>Lihat dan kelola reservasi yang telah Anda buat.</p>
            <!-- UPDATED: Link to new reservations page -->
            <a href="../profile/reservasi_saya.php" class="btn-lihat-reservasi">Lihat Reservasi</a>
            </div>
    </section>

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
