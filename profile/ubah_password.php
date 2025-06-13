<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password - Muara Jambu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ubah_password.css">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-dark text-white">
                        <h3 class="mb-0"><i class="fas fa-key me-2"></i>Ubah Password</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
                        }
                        if (isset($_GET['sukses'])) {
                            echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_GET['sukses']) . '</div>';
                        }
                        ?>
                        <form action="proses_ubah_password.php" method="POST">
                            <div class="mb-3">
                                <label for="password_lama" class="form-label">Password Lama</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan password Anda saat ini" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password_baru" class="form-label">Password Baru</label>
                                 <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
                                    <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Minimal 6 karakter" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="konfirmasi_password" class="form-label">Konfirmasi Password Baru</label>
                                 <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Ketik ulang password baru Anda" required>
                                </div>
                            </div>
                            <hr>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                                <a href="profile.php" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali ke Profil</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>