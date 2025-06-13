<?php
session_start();
require_once '../config/koneksi.php';

// Melindungi halaman: hanya user yang login bisa akses
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}

// Ambil ID user dari session
$user_id = $_SESSION['user_id'];

// Ambil semua data reservasi milik user tersebut dari database, diurutkan dari yang terbaru
$stmt = $conn->prepare("SELECT id, nama_pemesan, tanggal_reservasi, waktu_reservasi, jumlah_orang, status FROM reservations WHERE user_id = ? ORDER BY tanggal_reservasi DESC, waktu_reservasi DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$reservations = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Saya - Muara Jambu</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="reservasi_saya.css">
</head>
<body>

    <div class="main-container">
        <header class="page-header">
            <a href="../profile/profile.php" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Profil</a>
            <h1>Reservasi Saya</h1>
            <p>Lihat dan kelola semua reservasi yang telah Anda buat di Muara Jambu.</p>
        </header>

        <?php
        if (isset($_GET['batal_sukses'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . htmlspecialchars($_GET['batal_sukses']) . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        if (isset($_GET['batal_gagal'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . htmlspecialchars($_GET['batal_gagal']) . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        ?>
        <div class="toolbar">
            <a href="../reservasi/menureservasi.php" class="btn btn-new-reservation">
                <i class="fas fa-plus-circle"></i> Buat Reservasi Baru
            </a>
            <div class="filter-group">
                <label for="statusFilter">Filter Status:</label>
                <select id="statusFilter" class="form-select">
                    <option value="semua" selected>Semua</option>
                    <option value="menunggu">Menunggu Konfirmasi</option>
                    <option value="dikonfirmasi">Dikonfirmasi</option>
                    <option value="selesai">Selesai</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
            </div>
        </div>

        <section class="reservations-list">
            <?php if (count($reservations) > 0): ?>
                <?php foreach ($reservations as $res): ?>
                <div class="reservation-card">
                    <div class="card-date">
                        <span class="day"><?php echo date('d', strtotime($res['tanggal_reservasi'])); ?></span>
                        <span class="month-year"><?php echo date('M Y', strtotime($res['tanggal_reservasi'])); ?></span>
                    </div>
                    <div class="card-details">
                        <h4 class="item-name">Reservasi #<?php echo htmlspecialchars($res['id']); ?></h4>
                        <div class="item-meta">
                            <span><i class="fas fa-user-friends"></i> <?php echo htmlspecialchars($res['jumlah_orang']); ?> orang</span>
                            <span><i class="fas fa-clock"></i> Pukul <?php echo date('H:i', strtotime($res['waktu_reservasi'])); ?></span>
                        </div>
                    </div>
                    <div class="card-status">
                        <?php
                            $status_text = '';
                            $status_class = '';
                            $status_icon = 'fa-hourglass-half'; 
                            if ($res['status'] == 'Pending') {
                                $status_text = 'Menunggu Konfirmasi';
                                $status_class = 'waiting';
                                $status_icon = 'fas fa-hourglass-half';
                            } elseif ($res['status'] == 'Confirmed') {
                                $status_text = 'Dikonfirmasi';
                                $status_class = 'confirmed';
                                $status_icon = 'fas fa-check-circle';
                            } elseif ($res['status'] == 'Cancelled') {
                                $status_text = 'Dibatalkan';
                                $status_class = 'cancelled';
                                $status_icon = 'fas fa-times-circle';
                            } else {
                                $status_text = htmlspecialchars($res['status']);
                                $status_class = 'default';
                            }
                        ?>
                        <span class="status-badge <?php echo $status_class; ?>">
                            <i class="<?php echo $status_icon; ?>"></i> <?php echo $status_text; ?>
                        </span>
                    </div>
                    <div class="card-action">
                        <a href="reservasi/reservasi_detail.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        <?php 
                        if ($res['status'] == 'Pending' || $res['status'] == 'Confirmed'): 
                        ?>
                            <a href="batal_reservasi.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-outline-danger ms-2" onclick="return confirm('Anda yakin ingin membatalkan reservasi ini?');">
                                Batalkan
                            </a>
                        <?php endif; ?>
                    </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state-card">
                    <i class="fas fa-calendar-alt empty-icon"></i>
                    <h4>Anda Belum Punya Reservasi</h4>
                    <p>Sepertinya Anda belum pernah membuat reservasi. Ayo rencanakan petualangan Anda!</p>
                    <a href="../reservasi/menureservasi.php" class="btn btn-new-reservation mt-3">
                        <i class="fas fa-plus-circle"></i> Buat Reservasi Pertama Anda
                    </a>
                </div>
            <?php endif; ?>
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>