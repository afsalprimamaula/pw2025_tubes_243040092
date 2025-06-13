<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("location: ../login/login.php"); exit;
}

$packages_result = $conn->query("SELECT id, nama_paket FROM packages ORDER BY nama_paket ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulis Ulasan - Muara Jambu</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tulis_testimoni.css">
    </head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-dark text-white">
                        <h3 class="mb-0"><i class="fas fa-star me-2"></i>Tulis Ulasan Anda</h3>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <p class="text-center text-muted mb-4">Bagikan pengalaman berharga Anda di Muara Jambu untuk membantu pengunjung lain.</p>
                        
                        <?php
                        // Menampilkan pesan error atau sukses dari URL
                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
                        }
                        if (isset($_GET['sukses'])) {
                            echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_GET['sukses']) . '</div>';
                        }
                        ?>

                        <form action="proses_testimoni.php" method="POST">
                            <div class="mb-3">
                                <label for="package_id" class="form-label">Pilih Paket yang Diulas</label>
                                <select class="form-select" id="package_id" name="package_id" required>
                                    <option value="" disabled selected>-- Pilih Paket --</option>
                                    <?php while($pkg = $packages_result->fetch_assoc()): ?>
                                        <option value="<?php echo $pkg['id']; ?>"><?php echo htmlspecialchars($pkg['nama_paket']); ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-4 text-center">
                                <label class="form-label d-block">Beri Rating</label>
                                <div class="rating-stars">
                                    <input type="radio" id="star5" name="rating" value="5" required/><label for="star5" title="5 bintang">★</label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 bintang">★</label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 bintang">★</label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 bintang">★</label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 bintang">★</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="ulasan" class="form-label">Ulasan Anda</label>
                                <textarea class="form-control" id="ulasan" name="ulasan" rows="6" placeholder="Ceritakan bagaimana pengalaman Anda, apa yang Anda sukai, dan saran untuk kami..." required></textarea>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="profile.php" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali ke Profil</a>
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane me-2"></i>Kirim Ulasan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>