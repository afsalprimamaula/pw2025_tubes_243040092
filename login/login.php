<?php
// Di sini Anda bisa menambahkan logika PHP di masa mendatang, misalnya:
// - Memulai session (session_start();)
// - Mengecek apakah pengguna sudah login dan mengarahkannya ke halaman lain
// - Menangani data POST dari form login
// - Mengatur variabel yang akan digunakan di HTML

// Contoh sederhana: Mengatur judul halaman melalui PHP
$pageTitle = "Halaman Login";

// Jika ada pesan error atau sukses dari proses login sebelumnya (contoh)
$errorMessage = "";
$successMessage = "";

// --- CONTOH PENANGANAN FORM (sederhana, bisa dikembangkan) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

    // Lakukan validasi sederhana (contoh)
    if (empty($email) || empty($password)) {
        $errorMessage = "Email dan Password tidak boleh kosong!";
    } else {
        // Di sini Anda akan menambahkan logika validasi login yang sebenarnya
        // Misalnya, mengecek ke database
        if ($email == "user@example.com" && $password == "password123") { // Contoh kredensial statis
            $successMessage = "Login berhasil! Mengarahkan...";
            // Di sini Anda bisa mengarahkan pengguna ke halaman dashboard
            // header("Location: dashboard.php");
            // exit;
        } else {
            $errorMessage = "Email atau Password salah!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> Muara Jambu</title> 
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
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" title="TikTok"><i class="fab fa-tiktok"></i></a>
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

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control email-input" id="email" name="email" placeholder="email adress" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control password-input" id="password" name="password" placeholder="password" required>
                    </div>
                    <button type="submit" class="btn btn-login">Login</button>
                </form>
            </div>
        </div>
    </div>
    <a class="login-link" href="../registrasi/registrasi.php">Don't have an account? Register here</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>