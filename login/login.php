<?php
session_start(); // Mulai session

// Jika sudah login, redirect ke home
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: ../home/home.php");
    exit;
}

$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';
$successMessage = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Muara Jambu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="main-container">
        <div class="image-section">
        </div>
        <div class="form-section">
            <img src="img/logo mj.png" alt="Muara Jambu Logo" class="logo">
            <div class="login-form">
                <h2>Login</h2>
                <div class="social-icons">
                    <a href="https://www.facebook.com/share/15NoiWdnWW/" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/muarajambuofficial?igsh=OWViNmI2aHgwdmZ6" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@muarajambuofficial?_t=ZS-8x0DAZWVz1x&_r=1" title="TikTok"><i class="fab fa-tiktok"></i></a>
                </div>

                <?php
                // Menampilkan pesan error jika ada
                if (!empty($errorMessage)) {
                    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($errorMessage) . '</div>';
                }
                // Menampilkan pesan sukses jika ada
                if (!empty($successMessage)) {
                    echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($successMessage) . '</div>';
                }
                ?>

                <form method="POST" action="../controller/proses_login.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control email-input" id="email" name="email" placeholder="email address" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control password-input" id="password" name="password" placeholder="password" required>
                    </div>
                    <button type="submit" class="btn btn-login">Login</button>
                </form>
                <a href="../registrasi/registrasi.php" class="login-link">Belum punya akun? Registrasi disini</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>