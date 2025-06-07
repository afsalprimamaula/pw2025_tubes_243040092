<?php
// --- Sertakan file konfigurasi database MySQLi ---
require_once '../config/koneksi.php'; // Pastikan file config_mysqli.php berada di direktori yang sama

// --- Variabel untuk halaman ---
$pageTitle = "Registrasi Akun (MySQLi)";
$formLegend = "Sign up";

// --- Variabel untuk pesan form ---
$errorMessage = "";
$successMessage = "";

// --- Variabel untuk menyimpan input pengguna (jika ada error validasi) ---
$inputName = "";
$inputEmail = "";

// --- Penanganan Form Registrasi ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan lakukan sanitasi dasar
    $inputName = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $inputEmail = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // Validasi dasar
    if (empty($inputName) || empty($inputEmail) || empty($password) || empty($confirmPassword)) {
        $errorMessage = "Semua kolom wajib diisi!";
    } elseif (strlen($password) < 6) {
        $errorMessage = "Password minimal harus 6 karakter.";
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "Konfirmasi password tidak cocok!";
    } elseif (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Format email tidak valid!";
    } else {


        // 1. Cek apakah email sudah terdaftar (menggunakan prepared statement)
        $stmtCheckEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if ($stmtCheckEmail === false) {
            $errorMessage = "Gagal menyiapkan statement pengecekan email: " . $conn->error;
            error_log("MySQLi prepare error (check email): " . $conn->error);
        } else {
            $stmtCheckEmail->bind_param("s", $inputEmail); // "s" berarti string
            $stmtCheckEmail->execute();
            $stmtCheckEmail->store_result(); // Simpan hasil untuk mengecek num_rows

            if ($stmtCheckEmail->num_rows > 0) {
                $errorMessage = "Email sudah terdaftar. Silakan gunakan email lain.";
            } else {
                // 2. Hash password sebelum disimpan
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$role = 1;

                // 3. Siapkan statement SQL untuk memasukkan data (menggunakan prepared statement)
                $stmtInsert = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
                if ($stmtInsert === false) {
                    $errorMessage = "Gagal menyiapkan statement insert: " . $conn->error;
                    error_log("MySQLi prepare error (insert user): " . $conn->error);
                } else {
                    $stmtInsert->bind_param("sssi", $inputName, $inputEmail, $hashedPassword, $role); // "sss" berarti tiga string

                    // 4. Eksekusi statement
                    if ($stmtInsert->execute()) {
                        $successMessage = "Registrasi berhasil! Silakan login.";
                        // Kosongkan input setelah sukses
                        $inputName = "";
                        $inputEmail = "";
                        // Anda bisa mengarahkan ke halaman login:
                        // header("Location: login.php?registration=success");
                        // exit;
                    } else {
                        $errorMessage = "Registrasi gagal. Terjadi kesalahan pada server.";
                        // Sebaiknya log detail error server, jangan tampilkan ke pengguna
                        error_log("Gagal mengeksekusi statement insert MySQLi: " . $stmtInsert->error);
                    }
                    $stmtInsert->close(); // Tutup statement insert
                }
            }
            $stmtCheckEmail->close(); // Tutup statement check email
        }
        $conn->close(); // Selalu tutup koneksi
    }
}
?>
