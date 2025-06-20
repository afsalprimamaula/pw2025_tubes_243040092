<?php
session_start();
require_once '../config/koneksi.php'; // Sesuaikan path jika perlu
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Muara Jambu</title>
    <link rel="stylesheet" href="contact.css"> 
    <link rel="stylesheet" href="../aset/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <header class="hero-section contact-hero-section">
        <img src="img/mjdepan.webp" alt="Background Image Contact" class="hero-image-background">
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
                    <li><a href="../reservasi/reservasi.php">Reservation</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
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
            <div class="contact-hero-text">
                <h1>Hubungi Kami</h1>
                <p class="subtitle">MUARA JAMBU RECREATION & CAMP</p>
                <p>Kami siap mendengar pertanyaan dan masukan Anda.</p>
            </div>
        </div>
    </header>

    <main class="contact-main-section">
        <div class="container">
            <div class="contact-columns-wrapper">
                <div class="contact-info-col">
                    <h3>Informasi kontak</h3>
                    <div class="contact-info-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <h4>Alamat</h4>
                            <p>Desa Cibeusi, Kecamatan Ciater, Kaputan Subang.</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <h4>Telepon</h4>
                            <p>0821-1111-8313 (Yayat)</p>
                            <p>0813-1500-2823 (Sandi)</p>
                            <p>0813-1500-2824 (Aceng)</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fa-solid fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>muarajambu@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-social-icons">
                        <a href="https://www.facebook.com/share/15NoiWdnWW/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/muarajambuofficial?igsh=OWViNmI2aHgwdmZ6" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@muarajambuofficial?_t=ZS-8x0DAZWVz1x&_r=1" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="contact-form-col">
                    <h3>Kirim Pesan</h3>
                    <form action="#" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="masukkan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="masukkan alamat email" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="5" placeholder="tulis pesan anda" required></textarea>
                        </div>
                        <button type="submit" class="btn-kirim-pesan">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
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

    <script src="../aset/main.js"></script>

</body>
</html>