<?php
session_start();

// 1. KODE PERLINDUNGAN HALAMAN
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}

// 2. KODE PENGAMBILAN DATA
require_once '../config/koneksi.php';

$user_id = $_SESSION['user_id'];

// Mengambil semua kolom termasuk foto_profil
$stmt = $conn->prepare("SELECT nama, email, created_at, nomor_hp, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, foto_profil FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();

// Logika untuk menampilkan data atau teks default
$user_username = isset($user['nama']) ? strtolower(explode(' ', $user['nama'])[0]) : 'user';
$user_gender = !empty($user['jenis_kelamin']) ? $user['jenis_kelamin'] : 'Belum diisi';
$user_pob = !empty($user['tempat_lahir']) ? $user['tempat_lahir'] : 'Belum diisi';
$user_dob = !empty($user['tanggal_lahir']) ? date('d F Y', strtotime($user['tanggal_lahir'])) : 'Belum diisi';
$user_phone = !empty($user['nomor_hp']) ? $user['nomor_hp'] : 'Belum diisi';
$user_address = !empty($user['alamat']) ? $user['alamat'] : 'Belum diisi';
$user_photo = !empty($user['foto_profil']) ? $user['foto_profil'] : 'aset/img/default-avatar.png';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="content-wrapper">
        <div class="profile-container">
            <aside class="profile-sidebar">
                <div class="user-info">
                    <img src="../<?php echo htmlspecialchars($user['foto_profil'] ?? 'aset/img/default-avatar.png'); ?>" alt="Foto Profil" class="avatar">
                    <h2 class="user-name"><?php echo htmlspecialchars($user['nama']); ?></h2>
                    <p class="user-username">@<?php echo htmlspecialchars($user_username); ?></p>
                </div>
                <nav class="sidebar-nav">
                    <ul>
                        <li class="active"><a href="profile.php"><i class="fas fa-user"></i> Profil Saya</a></li>
                        <li><a href="reservasi_saya.php"><i class="fas fa-receipt"></i> Reservasi Saya</a></li>
                        <li><a href="tulis_testimoni.php"><i class="fas fa-star"></i> Tulis Ulasan</a></li>
                        <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </nav>
                <div class="back-to-site">
                    <a href="../home/home.php" class="btn btn-outline-dark w-100">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Website
                    </a>
                </div>
            </aside>

            <main class="profile-content">
                <?php
                if (isset($_GET['update']) && $_GET['update'] == 'sukses') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Profil Anda telah berhasil diperbarui.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                }
                ?>
                <div class="info-card">
                    <div class="card-header">
                        <h1>Informasi Akun</h1>
                        <a href="edit_profile.php" class="btn-edit">Edit Profil</a>
                    </div>
                    <div class="card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Nama Lengkap</span>
                                <span class="info-value"><?php echo htmlspecialchars($user['nama']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Jenis Kelamin</span>
                                <span class="info-value"><?php echo htmlspecialchars($user_gender); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tempat Lahir</span>
                                <span class="info-value"><?php echo htmlspecialchars($user_pob); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tanggal Lahir</span>
                                <span class="info-value"><?php echo htmlspecialchars($user_dob); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Nomor HP</span>
                                <span class="info-value"><?php echo htmlspecialchars($user_phone); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value"><?php echo htmlspecialchars($user['email']); ?></span>
                            </div>
                            <div class="info-item full-width">
                                <span class="info-label">Alamat Lengkap</span>
                                <span class="info-value"><?php echo htmlspecialchars($user_address); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>