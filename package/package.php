<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muara Jambu - Landing Page</title>
    <link rel="stylesheet" href="package.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <header class="hero-section">
        <video autoplay muted loop playsinline class="hero-video-background">
            <source src="video/tamilan.mp4" type="video/mp4">
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
                    <li><a href="../home/home.php">Home</a></li>
                    <li><a href="package.php">Package</a></li>
                    <li><a href="../reservasi/reservasi.php">Reservation</a></li>
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
        </div>
    </header>

    <section id="package" class="package-section">
        <div class="container">
            <h2 class="section-title">Pilih Kategori</h2>
            <p class="section-subtitle">
                Pilih kategori camping yang sesuai dengan kebutuhan Anda. Dari keluarga, rombongan, hingga pilihan akomodasi unik seperti dome.
            </p>

            <div class="category-filters">
                <button class="filter-button active" id="filter-family">Camping Family</button>
                <button class="filter-button" id="filter-dome">Camping Dome</button>
                <button class="filter-button" id="filter-group">Pondokan</button>
                <button class="filter-button" id="filter-activity">Outdoor Activity</button>
            </div>

            <div class="package-grid">
                <div class="package-card camping-family-card">
                    <img src="img/family camp.jpg" alt="Family Camp" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Family Camp</h3>
                        <p class="package-description">
                            Fasilitas yang didapat: tenda arvenaz kapasitas 4 orang, lampu tenda, listrik, kasur-bantal, sleeping bag, kolam renang, tiket area, dan 1x sarapan pagi. (Api unggun untuk fasilitas bersama)
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp649.000 (Weekday) <span>Rp799.000 (Weekend)</span></p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card camping-family-card">
                    <img src="img/malanocamp.webp" alt="Family Camp" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Malano Camp </h3>
                        <p class="package-description">
                            Fasilitas yang didapat: tenda malano kapasitas 4 orang, lampu tenda, listrik, kasur-bantal, sleeping bag, kolam renang, tiket area, dan 1x sarapan pagi. (Api unggun untuk fasilitas bersama)
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp499.000 (Weekday) <span>Rp799.000 (Weekend)</span></p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>


                <div class="package-card camping-family-card">
                    <img src="img/group family.jpg" alt="Family Camp" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Camp Group min 20 px</h3>
                        <p class="package-description">
                            Bagi anda yang mempunyai group sebanyak 20 orang atau lebih, anda bisa menikmati tenda Family Camp dan Malano Camp dengan fasilitas yang lengkap
                        </p>
                        <div class="package-details">
                            <p class="package-info">*jika lebih dari 50 px mendapatkan diskon</p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>



                <div class="package-card camping-dome-card" style="display: none;"> 
                    <img src="img/dome2.jpg" alt="Malano Camp" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Tenda Dome 2 Orang</h3>
                        <p class="package-description">
                            Rasakan pengalaman camping yang berbeda dengan dome futuristik kami! Cocok untuk keluarga kecil atau pasangan yang mencari pengalaman unik.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp219.000 (Weekday) <span>Rp299.000 (Weekend)</span></p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>


                <div class="package-card camping-dome-card" style="display: none;"> 
                    <img src="img/tenda dome 3 .jpg" alt="Malano Camp" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Tenda Dome 3 Orang</h3>
                        <p class="package-description">
                            Rasakan pengalaman camping yang berbeda dengan dome futuristik kami! Cocok untuk keluarga kecil atau pasangan yang mencari pengalaman unik.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp299.000 (Weekday) <span>Rp399.000 (Weekend)</span></p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card camping-dome-card" style="display: none;"> 
                    <img src="img/Tenda Dome 4.jpg" alt="Tenda Dome" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Tenda Dome 4 Orang</h3>
                        <p class="package-description">
                            Rasakan pengalaman camping yang berbeda dengan dome futuristik kami! Cocok untuk keluarga kecil atau pasangan yang mencari pengalaman unik.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp399.000 (Weekday) <span>Rp499.000 (Weekend)</span></p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card camping-dome-card" style="display: none;"> 
                    <img src="img/area only.webp" alt="area only" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Camp Area Only</h3>
                        <p class="package-description">
                            Rasakan pengalaman camping yang berbeda dengan dome futuristik kami! Cocok untuk keluarga kecil atau pasangan yang mencari pengalaman unik.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp55.000 (Weekday) <span>Rp70.000 (Weekend)</span></p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card camping-dome-card" style="display: none;"> 
                    <img src="img/group1.webp" alt="Group Camp" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Group Camp</h3></h3>
                        <p class="package-description">
                            Rasakan pengalaman camping yang berbeda dengan dome futuristik kami! Cocok untuk keluarga kecil atau pasangan yang mencari pengalaman unik,Untuk grup lebih besar, silahkan hubungi kami.
                        </p>
                        <div class="package-details">
                            <p class="package-info">*jika lebih dari 50 px mendapatkan diskon</p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>



                <div class="package-card camping-group-card" style="display: none;"> 
                    <img src="img/Family Room.webp" alt="Camp Group min 20 px" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Family Room (6 Orang)</h3>
                        <p class="package-description">
                            Paket khusus maksimal 6 orang. Dapatkan harga spesial dan fasilitas lengkap untuk kegiatan grup Anda.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp549.000</p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                


                <div class="package-card camping-group-card" style="display: none;"> 
                    <img src="img/Pondok Gedoy.webp" alt="Camp Group min 20 px" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Pondok Gedoy (4 Orang)</h3>
                        <p class="package-description">
                            Paket khusus rombongan minimal 20 orang. Dapatkan harga spesial dan fasilitas lengkap untuk kegiatan grup Anda.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp449.000</p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card camping-group-card" style="display: none;"> 
                    <img src="img/Pondok Bata.webp" alt="Camp Group min 20 px" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Pondok Bata (3 Orang)</h3>
                        <p class="package-description">
                            Paket khusus rombongan minimal 20 orang. Dapatkan harga spesial dan fasilitas lengkap untuk kegiatan grup Anda.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp349.000</p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card camping-group-card" style="display: none;"> 
                    <img src="img/pondok standar.webp" alt="Camp Group min 20 px" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Pondok Standar (3 Orang)</h3>
                        <p class="package-description">
                            Paket khusus rombongan minimal 20 orang. Dapatkan harga spesial dan fasilitas lengkap untuk kegiatan grup Anda.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp299.000</p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card outdoor-activity-card" style="display: none;">
                    <img src="img/paintball.webp" alt="Outdoor Activity 2" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Paintball Seru</h3>
                        <p class="package-description">
                            Nikmati serunya bermain paintball di area khusus kami. Cocok untuk tim building atau keseruan bersama teman.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp120.000/Orang</p>
                            <p class="package-info">*minimal 20 Orang</p>
                        </div>
                    </div>
                </div>

                <div class="package-card outdoor-activity-card" style="display: none;">
                    <img src="img/rt1.webp" alt="Outdoor Activity 2" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">River Tubing</h3>
                        <p class="package-description">
                            Jelajahi keindahan hutan Muara Jambu dengan pemandu berpengalaman. Cocok untuk pecinta alam.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp60.000/Orang</p>
                            <p class="package-info">*harga dapat berubah sewaktu-waktu</p>
                        </div>
                    </div>
                </div>

                <div class="package-card outdoor-activity-card" style="display: none;">
                    <img src="img/fg.webp" alt="Outdoor Activity 2" class="package-image">
                    <div class="package-content">
                        <h3 class="package-title">Fun Games</h3>
                        <p class="package-description">
                            Jelajahi keindahan hutan Muara Jambu dengan pemandu berpengalaman. Cocok untuk pecinta alam.
                        </p>
                        <div class="package-details">
                            <p class="package-price">Rp100.000/Orang</p>
                            <p class="package-info">Per orang, durasi 2 jam</p>
                        </div>
                    </div>
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

    <script>
        // JavaScript untuk fungsionalitas filter
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-button');
            const packageCards = document.querySelectorAll('.package-card');

            // Fungsi untuk menyembunyikan semua kartu
            function hideAllCards() {
                packageCards.forEach(card => {
                    card.style.display = 'none';
                });
            }

            // Fungsi untuk menampilkan kartu berdasarkan kategori
            function showCardsByCategory(categoryClass) {
                packageCards.forEach(card => {
                    if (card.classList.contains(categoryClass)) {
                        card.style.display = 'flex'; // Menggunakan flex karena package-card display:flex;
                    }
                });
            }

            // Inisialisasi: Tampilkan hanya kartu "Camping Family" saat halaman pertama kali dimuat
            hideAllCards();
            showCardsByCategory('camping-family-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Hapus kelas 'active' dari semua tombol
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Tambahkan kelas 'active' ke tombol yang diklik
                    this.classList.add('active');

                    // Tentukan kategori yang akan ditampilkan berdasarkan ID tombol
                    let categoryToShow = '';
                    if (this.id === 'filter-family') {
                        categoryToShow = 'camping-family-card';
                    } else if (this.id === 'filter-dome') {
                        categoryToShow = 'camping-dome-card';
                    } else if (this.id === 'filter-group') {
                        categoryToShow = 'camping-group-card';
                    } else if (this.id === 'filter-activity') {
                        categoryToShow = 'outdoor-activity-card';
                    }

                    // Sembunyikan semua kartu terlebih dahulu
                    hideAllCards();
                    // Tampilkan kartu dari kategori yang dipilih
                    showCardsByCategory(categoryToShow);
                });
            });
        });
    </script>
</body>
</html>