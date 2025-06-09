<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login/login.php");
    exit;
}

// Placeholder data for demonstration
$namaLengkap = isset($_SESSION['user_nama']) ? htmlspecialchars($_SESSION['user_nama']) : 'Afsal Pima Maula';
$userEmail = isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : 'afsalpima@example.com';
$userPhone = isset($_SESSION['user_phone']) ? htmlspecialchars($_SESSION['user_phone']) : '081234567890';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reservasi - Muara Jambu</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="reservasi_detail.css">
</head>
<body>

    <div class="main-container">
        <div class="back-link-container">
            <a href="reservasi_saya.php" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Reservasi Saya</a>
        </div>

        <div class="detail-card">
            <div class="card-header">
                <h3>Detail Reservasi</h3>
                <span class="status-badge waiting text-warning mphasis"><i class="fas fa-hourglass-half"></i> Menunggu Konfirmasi</span>
            </div>
            <div class="card-body">
                <div class="main-details">
                    <div class="qr-code-section">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=ID:444BC66B" alt="QR Code Reservasi">
                        <p>Tunjukkan QR Code ini kepada staff kami saat check-in.</p>
                    </div>
                    <div class="reservation-info">
                        <h4>Camping Family</h4>
                        <p class="item-id">ID Reservasi: <strong>444BC66B</strong></p>
                        
                        <div class="info-section">
                            <h5>Informasi Pemesan</h5>
                            <p><strong>Nama:</strong> <?php echo $namaLengkap; ?></p>
                            <p><strong>No. Telepon:</strong> <?php echo $userPhone; ?></p>
                            <p><strong>Email:</strong> <?php echo $userEmail; ?></p>
                        </div>
                        
                        <div class="info-section">
                            <h5>Detail Kunjungan</h5>
                            <p><strong>Tanggal:</strong> 09 Juni 2025</p>
                            <p><strong>Waktu Check-in:</strong> 14:00</p>
                            <p><strong>Jumlah Tamu:</strong> 4 Orang</p>
                        </div>
                    </div>
                </div>

                <div class="payment-details">
                    <h5>Rincian Pembayaran</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Paket Camping Family (Weekday)</td>
                                <td class="text-end">Rp649.000</td>
                            </tr>
                            <tr>
                                <td>Biaya Layanan</td>
                                <td class="text-end">Rp5.000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="fw-bold">Total Pembayaran</td>
                                <td class="text-end fw-bold">Rp654.000</td>
                            </tr>
                        </tfoot>
                    </table>
                    <p class="payment-method">Metode Pembayaran: <strong>Transfer Bank (BCA)</strong></p>
                </div>

                <div class="action-buttons">
                    <button class="btn btn-danger-custom"><i class="fas fa-times-circle"></i> Batalkan Reservasi</button>
                    <button class="btn btn-secondary-custom"><i class="fas fa-edit"></i> Ubah Reservasi</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
