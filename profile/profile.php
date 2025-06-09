<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login/login.php");
    exit;
}

// Data pengguna dari session dengan nilai default
$namaLengkap = isset($_SESSION['user_nama']) ? htmlspecialchars($_SESSION['user_nama']) : 'Muhamad Nur Salam';
$emailUser = isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : 'user1@gmail.com';
$username = isset($_SESSION['user_username']) ? htmlspecialchars($_SESSION['user_username']) : '@user1';
$jenisKelamin = isset($_SESSION['user_gender']) ? htmlspecialchars($_SESSION['user_gender']) : 'Laki-laki';
$tempatLahir = isset($_SESSION['user_pob']) ? htmlspecialchars($_SESSION['user_pob']) : 'Subang';
$tanggalLahir = isset($_SESSION['user_dob']) ? htmlspecialchars($_SESSION['user_dob']) : '26 April 1999';
$nomorHp = isset($_SESSION['user_phone']) ? htmlspecialchars($_SESSION['user_phone']) : '085221560909';
$alamat = isset($_SESSION['user_address']) ? htmlspecialchars($_SESSION['user_address']) : 'Jl. Ciwaruga, Kabupaten Bandung Barat, Jawa Barat, Indonesia';
// Gunakan gambar dari session, jika tidak ada, gunakan placeholder
$profilePicture = isset($_SESSION['user_avatar']) ? htmlspecialchars($_SESSION['user_avatar']) : 'https://placehold.co/100x100/EFEFEF/333?text=Foto';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Muara Jambu</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../aset/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

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
                                <a href="reservasi_saya.php"><i class="fa-solid fa-calendar-check"></i> Reservasi Saya</a>
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

    <div class="content-wrapper">
        <div class="profile-container">
            <aside class="profile-sidebar">
                <div class="user-info">
                    <img src="<?php echo $profilePicture; ?>" alt="Foto Profil" class="avatar">
                    <h2 class="user-name"><?php echo $namaLengkap; ?></h2>
                    <p class="user-username"><?php echo $username; ?></p>
                </div>
                <nav class="sidebar-nav">
                    <ul>
                        <li class="active"><a href="#"><i class="fas fa-user"></i> Profil Saya</a></li>
                        <!-- UPDATED: Link to new reservations page -->
                        <li><a href="reservasi_saya.php"><i class="fas fa-receipt"></i> Reservasi Saya</a></li>
                        <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </nav>
            </aside>

            <main class="profile-content">
                <div class="info-card">
                    <div class="card-header">
                        <h1>Informasi Akun</h1>
                        <a href="edit_profile.php" class="btn-edit">Edit Profil</a>
                    </div>
                    <div class="card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Nama Lengkap</span>
                                <span class="info-value"><?php echo $namaLengkap; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Jenis Kelamin</span>
                                <span class="info-value"><?php echo $jenisKelamin; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tempat Lahir</span>
                                <span class="info-value"><?php echo $tempatLahir; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tanggal Lahir</span>
                                <span class="info-value"><?php echo $tanggalLahir; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Nomor HP</span>
                                <span class="info-value"><?php echo $nomorHp; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value"><?php echo $emailUser; ?></span>
                            </div>
                            <div class="info-item full-width">
                                <span class="info-label">Alamat Lengkap</span>
                                <span class="info-value"><?php echo $alamat; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

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
