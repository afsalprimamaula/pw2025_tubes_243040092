<?php
session_start();
require_once '../config/koneksi.php';

// --- LOGIKA PAGINATION ---
// 1. Tentukan berapa item per halaman
$limit = 6; 

// 2. Tentukan halaman saat ini
$halaman_aktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
if ($halaman_aktif < 1) {
    $halaman_aktif = 1;
}

// 3. Hitung offset (data mulai dari mana)
$offset = ($halaman_aktif - 1) * $limit;

// 4. Hitung total data gambar di database
$total_result = $conn->query("SELECT COUNT(*) as total FROM gallery");
$total_rows = $total_result->fetch_assoc()['total'];
$total_halaman = ceil($total_rows / $limit);

// 5. Ambil data gambar sesuai limit dan offset
$stmt = $conn->prepare("SELECT * FROM gallery ORDER BY uploaded_at DESC LIMIT ? OFFSET ?");
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$gallery_result = $stmt->get_result();
// --- SELESAI LOGIKA PAGINATION ---
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muara Jambu - Landing Page</title>
    <link rel="stylesheet" href="galeri.css">
    <link rel="stylesheet" href="../aset/style.css">
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
                <div class="info-reservasi-text">
                    <h2>GALERI</h2>
                    <p class="subtitle">Spot Lainnya</p>
                </div>
            </div>
    </header>

    <section class="gallery-section">
        <div class="container">
            <div class="gallery-grid">
                <?php if ($gallery_result->num_rows > 0): ?>
                    <?php while($item = $gallery_result->fetch_assoc()): ?>
                        <div class="gallery-card">
                            <div class="gallery-image-container">
                                <img src="../<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['caption']); ?>">
                                <span class="gallery-tag"><?php echo htmlspecialchars($item['tag']); ?></span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center">Belum ada gambar di galeri.</p>
                <?php endif; ?>
            </div>

            <div class="pagination-container">
                <span class="pagination-info">Menampilkan <?php echo $gallery_result->num_rows; ?> dari <?php echo $total_rows; ?> spot</span>
                <div class="pagination-nav">
                    <a href="?halaman=<?php echo $halaman_aktif - 1; ?>" class="page-link <?php if($halaman_aktif <= 1) echo 'disabled'; ?>">Sebelumnya</a>
                    
                    <?php for ($i = 1; $i <= $total_halaman; $i++): ?>
                        <a href="?halaman=<?php echo $i; ?>" class="page-link <?php if($halaman_aktif == $i) echo 'active'; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>

                    <a href="?halaman=<?php echo $halaman_aktif + 1; ?>" class="page-link <?php if($halaman_aktif >= $total_halaman) echo 'disabled'; ?>">Selanjutnya</a>
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

    <script src="../aset/main.js"></script>
    

</body>
</html>