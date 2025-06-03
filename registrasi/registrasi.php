<?php
// --- Variabel untuk halaman ---
$pageTitle = "Registrasi Akun";
$formLegend = "Sign up";

// --- Variabel untuk pesan form ---
$errorMessage = "";
$successMessage = "";

// --- Variabel untuk menyimpan input pengguna (jika ada error validasi) ---
$inputName = "";
$inputEmail = "";

// --- CONTOH PENANGANAN FORM REGISTRASI (sederhana) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan lakukan sanitasi dasar
    $inputName = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $inputEmail = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    // Untuk password, jangan gunakan htmlspecialchars saat mengambil, tapi saat akan ditampilkan (jika memang perlu)
    // Namun, password biasanya tidak ditampilkan kembali ke form.
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // Validasi sederhana (contoh, bisa jauh lebih kompleks)
    if (empty($inputName) || empty($inputEmail) || empty($password) || empty($confirmPassword)) {
        $errorMessage = "Semua kolom wajib diisi!";
    } elseif (strlen($password) < 6) { // Contoh validasi panjang password
        $errorMessage = "Password minimal harus 6 karakter.";
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "Konfirmasi password tidak cocok!";
    } elseif (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) { // Validasi format email
        $errorMessage = "Format email tidak valid!";
    } else {
        // Jika semua validasi lolos (placeholder untuk logika registrasi sebenarnya)
        // Di sini Anda akan menambahkan logika untuk menyimpan data ke database
        // Misalnya:
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // panggil_fungsi_simpan_ke_database($inputName, $inputEmail, $hashedPassword);

        $successMessage = "Registrasi berhasil! Silakan login.";
        // Anda bisa mengosongkan input setelah berhasil atau mengarahkan ke halaman login
        $inputName = ""; // Kosongkan input nama setelah sukses
        $inputEmail = ""; // Kosongkan input email setelah sukses
        // Untuk pengalaman pengguna yang lebih baik, setelah registrasi sukses,
        // Anda mungkin ingin mengarahkan pengguna ke halaman login atau dashboard.
        // header("Location: login.php?registration=success");
        // exit;
    }
}
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
            <div class="login-form"> <h2><?php echo htmlspecialchars($formLegend); ?></h2>
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
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control email-input" id="name" name="name" placeholder="username" value="<?php echo htmlspecialchars($inputName); ?>" required>
                        </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control email-input" id="email" name="email" placeholder="email adress" value="<?php echo htmlspecialchars($inputEmail); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Create password</label>
                        <input type="password" class="form-control email-input" id="password" name="password" placeholder="create password" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control email-input" id="confirm_password" name="confirm_password" placeholder="confirm password" required>
                    </div>
                    <button type="submit" class="btn btn-login">Sign up</button> </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
