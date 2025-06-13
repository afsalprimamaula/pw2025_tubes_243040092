<?php
session_start();
require_once '../config/koneksi.php';

$nama_pemesan_default = isset($_SESSION['user_nama']) ? $_SESSION['user_nama'] : '';

$packages_result = $conn->query("SELECT id, nama_paket FROM packages ORDER BY nama_paket ASC");

$nama_pemesan_default = '';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
$nama_pemesan_default = $_SESSION['user_nama'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Reservasi Profesional - Muara Jambu</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="menu.css">
</head>
<body>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card form-card">
                    <div class="card-body">
                        
                        <a href="../package/package.php" class="btn btn-light btn-sm mb-4">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Pilihan Paket
                        </a>
                        <div class="text-center mb-4">
                            <h2 class="card-title">Formulir Reservasi</h2>
                            <p class="card-subtitle">Lengkapi detail di bawah untuk mengamankan tempat Anda.</p>
                        </div>
                        
                        <?php
                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle me-2"></i>' . htmlspecialchars($_GET['error']) . '</div>';
                        }
                        ?>

                        <form action="../controller/proses_reservasi.php" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pemesan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($nama_pemesan_default); ?>" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="package_id" class="form-label">Pilih Paket</label>
                                <select class="form-select" id="package_id" name="package_id" required>
                                    <option value="" disabled selected>-- Pilih paket yang diinginkan --</option>
                                    <?php while($pkg = $packages_result->fetch_assoc()): ?>
                                        <option value="<?php echo $pkg['id']; ?>"><?php echo htmlspecialchars($pkg['nama_paket']); ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nomor_telepon">Nomor Telepon (Aktif)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                    <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Contoh: 081234567890" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_reservasi" class="form-label">Tanggal Check-in</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" class="form-control" id="tanggal_reservasi" name="tanggal_reservasi" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="waktu_reservasi" class="form-label">Waktu Kedatangan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <input type="time" class="form-control" id="waktu_reservasi" name="waktu_reservasi" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_orang">Jumlah Orang</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                    <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" min="1" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="pesan" class="form-label">Permintaan Khusus (Opsional)</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Contoh: Request tenda dekat sungai..."></textarea>
                            </div>
                            
                            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                                <button type="submit" class="btn btn-submit w-100"><i class="fas fa-paper-plane me-2"></i>Kirim Reservasi</button>
                            <?php else: ?>
                                <div class="alert alert-warning text-center">
                                    <a href="../login/login.php?error=Harap login untuk membuat reservasi.">Harap Login Terlebih Dahulu</a>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card info-card">
                    <div class="card-body">
                        <h4 class="info-title"><i class="fas fa-info-circle me-2"></i>Informasi Penting</h4>
                        <ul class="info-list">
                            <li>
                                <i class="fas fa-clock-rotate-left"></i>
                                <div>
                                    <strong>Jam Operasional</strong>
                                    <span>Check-in: 14.00 WIB, Check-out: 12.00 WIB</span>
                                </div>
                            </li>
                             <li>
                                <i class="fas fa-money-check-dollar"></i>
                                <div>
                                    <strong>Pembayaran</strong>
                                    <span>Pembayaran penuh dilakukan di lokasi saat check-in.</span>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-ban"></i>
                                <div>
                                    <strong>Kebijakan Pembatalan</strong>
                                    <span>Pembatalan harap dilakukan maksimal 3 jam sebelum waktu check-in.</span>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <div>
                                    <strong>Butuh Bantuan?</strong>
                                    <span>Hubungi Yayat di 0821-1111-8313</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>