<?php
$pageTitle = "Registrasi";
$inputName = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
$inputEmail = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> - Muara Jambu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="registrasi.css">
</head>
<body>
    <div class="main-container">
        <div class="image-section">
        </div>
        <div class="form-section">
            <img src="img/logo mj.png" alt="Muara Jambu Logo" class="logo">
            <div class="login-form">
                <h2>Registrasi</h2>
                <div class="social-icons">
                    <a href="https://www.facebook.com/share/15NoiWdnWW/" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/muarajambuofficial?igsh=OWViNmI2aHgwdmZ6" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@muarajambuofficial?_t=ZS-8x0DAZWVz1x&_r=1" title="TikTok"><i class="fab fa-tiktok"></i></a>
                </div>

                <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?>

                <form method="POST" action="../controller/proses_registrasi.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control email-input" id="name" name="name" placeholder="username" value="<?php echo $inputName; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control email-input" id="email" name="email" placeholder="email address" value="<?php echo $inputEmail; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Create password</label>
                        <input type="password" class="form-control email-input" id="password" name="password" placeholder="create password" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control email-input" id="confirm_password" name="confirm_password" placeholder="confirm password" required>
                    </div>
                    <button type="submit" class="btn btn-login">Sign up</button>
                </form>
                <a href="../login/login.php" class="login-link">Sudah punya akun? login disini</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>