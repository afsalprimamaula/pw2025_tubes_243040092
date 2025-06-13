<?php
session_start();
require_once '../config/koneksi.php';

// Mengambil kolom 'kategori' dari database
$sql = "SELECT id, nama_paket, deskripsi, harga, satuan_harga, fitur, gambar_url, kategori FROM packages ORDER BY harga ASC";
$result = $conn->query($sql);
$packages = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Paket Kami - Muara Jambu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../aset/style.css">
    <link rel="stylesheet" href="package.css">
</head>
<body>

    <header class="hero-section contact-hero-section">
        <img src="img/pw 11.jpg" alt="Background Image Contact" class="hero-image-background">
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
            <div class="contact-hero-text">
                <h1>Hubungi Kami</h1>
                <p class="subtitle">MUARA JAMBU RECREATION & CAMP</p>
                <p>Kami siap mendengar pertanyaan dan masukan Anda.</p>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <div class="text-center mb-5">
            <h2>Pilih Kategori</h2>
            <p class="lead text-muted">Pilih kategori camping yang sesuai dengan kebutuhan Anda.</p>
        </div>

        <div class="category-filters mb-5">
            <button class="filter-button active" data-filter="all">Semua</button>
            <button class="filter-button" data-filter="family">Camping Family</button>
            <button class="filter-button" data-filter="dome">Camping Dome</button>
            <button class="filter-button" data-filter="pondokan">Pondokan</button>
            <button class="filter-button" data-filter="activity">Outdoor Activity</button>
        </div>

        <div class="row package-grid">
            <?php if (count($packages) > 0): ?>
                <?php foreach ($packages as $paket): ?>
                    <div class="col-lg-4 col-md-6 mb-4 package-item" data-category="<?php echo htmlspecialchars($paket['kategori'] ?? 'all'); ?>">
                        <div class="package-card-new">
                            <img src="../<?php echo htmlspecialchars($paket['gambar_url']); ?>" alt="<?php echo htmlspecialchars($paket['nama_paket']); ?>" class="package-image">
                            <div class="package-content">
                                <h3 class="package-title"><?php echo htmlspecialchars($paket['nama_paket']); ?></h3>
                                <p class="package-description"><?php echo htmlspecialchars($paket['deskripsi']); ?></p>
                                <div class="package-price-details">
                                    <p class="package-price"><?php echo 'Rp' . number_format($paket['harga']); ?></p>
                                    <span class="package-price-info">(<?php echo htmlspecialchars($paket['satuan_harga']); ?>)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Tidak ada paket yang ditemukan.</p>
                </div>
            <?php endif; ?>
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

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-button');
    const packageItems = document.querySelectorAll('.package-item');

    function filterPackages(filterValue) {
        packageItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            if (filterValue === 'all' || itemCategory === filterValue) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            filterPackages(filter);
        });
    });

    filterPackages('all');
});
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../aset/main.js"></script>
</body>
</html>