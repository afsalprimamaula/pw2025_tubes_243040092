<?php
session_start();
require_once '../config/koneksi.php';

$errorMessage = '';

// Perbaikan 1: Kondisi diubah untuk hanya memeriksa metode POST, karena tombol submit tidak punya atribut 'name'.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $errorMessage = "Email dan Password tidak boleh kosong!";
        // Opsi: redirect kembali ke halaman login dengan pesan error
        // header('Location: ../login/login.php?error=' . urlencode($errorMessage));
        // exit();
    } else {
        $sql = "SELECT id, username, email, password, role FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    // Login berhasil!
                    $_SESSION['user_id'] = $user['id'];
                    // Perbaikan 2: Menggunakan kolom 'nama' sesuai query, bukan 'username'.
                    $_SESSION['user_nama'] = $user['username'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_role'] = $user['role'];
                    // Perbaikan 3: Menamakan session 'loggedin' agar konsisten dengan pengecekan di home.php
                    $_SESSION['loggedin'] = true;

                    // Arahkan semua role ke home.php setelah login berhasil
                    header("Location: ../home/home.php");
                    exit();

                } else {
                    $errorMessage = "Email atau Password yang Anda masukkan salah!";
                }
            } else {
                $errorMessage = "Email atau Password yang Anda masukkan salah!";
            }
            $stmt->close();
        } else {
            $errorMessage = "Terjadi kesalahan pada sistem. Coba lagi nanti.";
        }
    }
    
    // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
    if (!empty($errorMessage)) {
        // Anda bisa meneruskan pesan error melalui session atau query string
        $_SESSION['login_error'] = $errorMessage;
        header('Location: ../login/login.php');
        exit();
    }
}

$conn->close();
?>