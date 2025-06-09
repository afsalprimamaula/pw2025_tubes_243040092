<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login/login.php");
    exit;
}

// Data pengguna dari session (bisa digunakan jika perlu)
$namaLengkap = isset($_SESSION['user_nama']) ? htmlspecialchars($_SESSION['user_nama']) : 'User';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Saya - Muara Jambu</title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="reservasi_saya.css">
</head>
<body>

    <div class="main-container">
        <header class="page-header">
            <h2>Reservasi Saya</h2>
            <p>Lihat dan kelola semua reservasi yang telah Anda buat di Muara Jambu.</p>
        </header>

        <div class="toolbar">
            <a href="../reservasi/menureservasi.php" class="btn btn-new-reservation">
                <i class="fas fa-plus-circle"></i> Buat Reservasi Baru
            </a>
            <div class="filter-group">
                <label for="statusFilter">Status:</label>
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
            <h3 class="section-title">Sebelumnya</h3>

            
            <div class="reservation-card">
                <div class="card-date">
                    <span class="day">09</span>
                    <span class="month-year">Jun 2025</span>
                    <span class="time">20:00</span>
                </div>
                <div class="card-details">
                    <h4 class="item-name">Camping Family</h4>
                    <p class="item-id">ID: 444BC66B</p>
                    <div class="item-meta">
                        <span><i class="fas fa-user-friends"></i> 4 orang</span>
                        <span><i class="fas fa-clock"></i> Durasi 1 Malam</span>
                    </div>
                </div>
                <div class="card-status">
                    <span class="status-badge waiting">
                        <i class="fas fa-hourglass-half"></i> Menunggu Konfirmasi
                    </span>
                    
                    <a href="../profile/reservasi/reservasi_detail.php" class="details-link">Lihat Detail</a>
                </div>
            </div>

            
            <div class="reservation-card">
                <div class="card-date">
                    <span class="day">29</span>
                    <span class="month-year">Mei 2025</span>
                    <span class="time">15:00</span>
                </div>
                <div class="card-details">
                    <h4 class="item-name">Pondokan</h4>
                    <p class="item-id">ID: 394406FC</p>
                    <div class="item-meta">
                        <span><i class="fas fa-user-friends"></i> 2 orang</span>
                        <span><i class="fas fa-clock"></i> Durasi 1 Malam</span>
                    </div>
                </div>
                <div class="card-status">
                    <span class="status-badge waiting">
                         <i class="fas fa-hourglass-half"></i> Menunggu Konfirmasi
                    </span>

                    <a href="../profile/reservasi/reservasi_detail.php" class="details-link">Lihat Detail</a>
                </div>
            </div>

        </section>

        <div class="info-box-bottom">
            <h4 class="info-box-title">Informasi Penting</h4>
            <ul>
                <li>Saat check-in, Anda dapat langsung melakukan pemesanan menu melalui staff kami.</li>
                <li>Mohon datang 10 menit sebelum waktu reservasi.</li>
                <li>Jika Anda ingin membatalkan atau mengubah reservasi, silakan lakukan minimal 3 jam sebelum waktu reservasi.</li>
            </ul>
        </div>

    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
