<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login/login.php");
    exit;
}

// Ambil data dari session atau siapkan string kosong jika tidak ada
$namaLengkap = isset($_SESSION['user_nama']) ? htmlspecialchars($_SESSION['user_nama']) : '';
$jenisKelamin = isset($_SESSION['user_gender']) ? htmlspecialchars($_SESSION['user_gender']) : '';
$tempatLahir = isset($_SESSION['user_pob']) ? htmlspecialchars($_SESSION['user_pob']) : '';
$tanggalLahir = isset($_SESSION['user_dob']) ? htmlspecialchars($_SESSION['user_dob']) : '';
$nomorHp = isset($_SESSION['user_phone']) ? htmlspecialchars($_SESSION['user_phone']) : '';
$alamat = isset($_SESSION['user_address']) ? htmlspecialchars($_SESSION['user_address']) : '';
$profilePicture = isset($_SESSION['user_avatar']) ? htmlspecialchars($_SESSION['user_avatar']) : 'https://placehold.co/100x100/EFEFEF/333?text=Foto';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Muara Jambu</title>
    <link rel="stylesheet" href="../aset/style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="edit_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <nav class="navbar transparent">
        <div class="container navbar-container">
            <div class="navbar-left">
                <div class="logo">Muara Jambu</div>
            </div>
            <ul class="nav-links">
                <li><a href="../home/home.php">Home</a></li>
                <li><a href="../package/package.php">Package</a></li>
                <li><a href="../reservasi/reservasi.php">Reservation</a></li>
                <li><a href="../contact/contact.php">Contact Us</a></li>
            </ul>
             <div class="navbar-right">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <div class="profile-dropdown">
                        <i class="fa-solid fa-user-circle profile-icon"></i>
                        <div class="dropdown-content">
                            <a href="profile.php"><i class="fa-solid fa-user"></i> Lihat Profile Saya</a>
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
        <div class="edit-profile-card">
            <div class="edit-card-header">
                <h1>Edit Informasi Akun</h1>
            </div>
            <div class="edit-card-body">
                <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group profile-pic-group">
                        <img src="<?php echo $profilePicture; ?>" alt="Foto Profil Saat Ini" class="avatar">
                        <div>
                            <label for="profilePicture" class="btn btn-upload">
                                <i class="fas fa-camera"></i> Ganti Foto
                            </label>
                            <input type="file" id="profilePicture" name="profilePicture" accept="image/*">
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" id="namaLengkap" name="namaLengkap" class="form-input" value="<?php echo $namaLengkap; ?>" placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" id="jenisKelamin" name="jenisKelamin" class="form-input" value="<?php echo $jenisKelamin; ?>" placeholder="Laki-laki / Perempuan">
                        </div>
                        <div class="form-group">
                            <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="text" id="tempatLahir" name="tempatLahir" class="form-input" value="<?php echo $tempatLahir; ?>" placeholder="Kota kelahiran">
                        </div>
                        <div class="form-group">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="tanggalLahir" name="tanggalLahir" class="form-input" value="<?php echo $tanggalLahir; ?>">
                        </div>
                        <div class="form-group full-width">
                            <label for="nomorHp" class="form-label">Nomor HP</label>
                            <input type="tel" id="nomorHp" name="nomorHp" class="form-input" value="<?php echo $nomorHp; ?>" placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="form-group full-width">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" class="form-textarea" rows="4" placeholder="Masukkan alamat lengkap Anda"><?php echo $alamat; ?></textarea>
                        </div>
                        <div class="form-actions">
                            <a href="profile.php" class="btn btn-cancel">Batal</a>
                            <button type="submit" class="btn btn-save">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
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