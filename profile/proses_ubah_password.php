<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if (empty($password_lama) || empty($password_baru) || empty($konfirmasi_password)) {
        header("Location: ubah_password.php?error=Semua field harus diisi.");
        exit;
    }

    if ($password_baru !== $konfirmasi_password) {
        header("Location: ubah_password.php?error=Password baru dan konfirmasi tidak cocok.");
        exit;
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashed_password_db);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password_lama, $hashed_password_db)) {
        $new_hashed_password = password_hash($password_baru, PASSWORD_DEFAULT);

        $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update_stmt->bind_param("si", $new_hashed_password, $user_id);
        
        if ($update_stmt->execute()) {
            header("Location: ubah_password.php?sukses=Password berhasil diubah. Silakan login kembali dengan password baru Anda.");
        } 
        else {
            header("Location: ubah_password.php?error=Terjadi kesalahan saat mengubah password.");
        }
        $update_stmt->close();
    } 
    else {
        header("Location: ubah_password.php?error=Password lama yang Anda masukkan salah.");
        exit;
    }
    $conn->close();
} 
    else {

        header("location: profile.php");
    exit;
}
?>