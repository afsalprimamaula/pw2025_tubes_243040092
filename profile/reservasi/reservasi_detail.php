<?php
session_start();
require_once '../../config/koneksi.php'; 

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../../login/login.php");
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("location: ../reservasi_saya.php");
    exit;
}

$reservation_id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

$stmt = $conn->prepare("SELECT r.*, u.email as user_email FROM reservations r JOIN users u ON r.user_id = u.id WHERE r.id = ?");
$stmt->bind_param("i", $reservation_id);
$stmt->execute();
$result = $stmt->get_result();
$reservation = $result->fetch_assoc();

if (!$reservation) {
    header("location: ../reservasi_saya.php");
    exit;
}

if ($reservation['user_id'] !== $user_id && $user_role !== 'admin') {
    header("location: ../../home/home.php?error=Akses ditolak");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reservasi #<?php echo htmlspecialchars($reservation['id']); ?> - Muara Jambu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="reservasi_detail.css">
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-lg receipt-card">
            <div class="card-header text-center">
                <h2 class="mb-0">Detail Reservasi</h2>
                <p class="mb-0">Muara Jambu Recreation & Camp</p>
            </div>
            <div class="card-body p-4">
                <div class="header-info">
                    <div>
                        <strong>ID Reservasi:</strong> #<?php echo htmlspecialchars($reservation['id']); ?>
                    </div>
                    <div>
                        <strong>Tanggal Pesan:</strong> <?php echo date('d M Y, H:i', strtotime($reservation['created_at'])); ?>
                    </div>
                </div>
                <hr>
                <dl class="row">
                    <dt class="col-sm-4">Nama Pemesan</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($reservation['nama_pemesan']); ?></dd>

                    <dt class="col-sm-4">Email Akun</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($reservation['user_email']); ?></dd>

                    <dt class="col-sm-4">Nomor Telepon</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($reservation['nomor_telepon']); ?></dd>

                    <dt class="col-sm-4">Tanggal Check-in</dt>
                    <dd class="col-sm-8"><?php echo date('l, d F Y', strtotime($reservation['tanggal_reservasi'])); ?></dd>

                    <dt class="col-sm-4">Waktu Kedatangan</dt>
                    <dd class="col-sm-8"><?php echo date('H:i', strtotime($reservation['waktu_reservasi'])); ?> WIB</dd>
                    
                    <dt class="col-sm-4">Jumlah Orang</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($reservation['jumlah_orang']); ?> orang</dd>

                    <dt class="col-sm-4">Status</dt>
                    <dd class="col-sm-8">
                        <span class="badge bg-<?php echo ($reservation['status'] == 'Confirmed') ? 'success' : (($reservation['status'] == 'Cancelled') ? 'danger' : 'warning text-dark'); ?>">
                            <?php echo htmlspecialchars($reservation['status']); ?>
                        </span>
                    </dd>

                    <?php if(!empty($reservation['pesan_tambahan'])): ?>
                        <dt class="col-sm-4">Permintaan Khusus</dt>
                        <dd class="col-sm-8"><?php echo nl2br(htmlspecialchars($reservation['pesan_tambahan'])); ?></dd>
                    <?php endif; ?>
                </dl>
                <hr>
                <div class="footer-note text-center">
                    <p>Terima kasih telah melakukan reservasi. Tunjukkan detail ini kepada staf kami saat check-in.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <?php if ($user_role === 'admin'): ?>
                <a href="../../admin/dashboard.php" class="btn btn-dark"><i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard</a>
            <?php else: ?>
                 <a href="../reservasi_saya.php" class="btn btn-dark"><i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Reservasi</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>