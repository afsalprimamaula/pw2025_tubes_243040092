<?php
session_start();
require_once '../config/koneksi.php';

// Keamanan: Hanya admin yang bisa akses
if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php");
    exit;
}

// Cek apakah aksi dan ID ada di URL
if (isset($_GET['action']) && $_GET['action'] == 'hapus' && isset($_GET['id'])) {
    $user_id_to_delete = $_GET['id'];
    $current_admin_id = $_SESSION['user_id'];

    // Keamanan Tambahan: Admin tidak bisa menghapus akunnya sendiri
    if ($user_id_to_delete == $current_admin_id) {
        header("location: pengguna.php?status=gagal_hapus_diri");
        exit;
    }

    // Ambil path foto profil sebelum menghapus data dari DB
    $stmt_select = $conn->prepare("SELECT foto_profil FROM users WHERE id = ?");
    $stmt_select->bind_param("i", $user_id_to_delete);
    $stmt_select->execute();
    $stmt_select->bind_result($foto_path);
    $stmt_select->fetch();
    $stmt_select->close();

    // Hapus file foto profil dari server (jika ada dan bukan avatar default)
    if (!empty($foto_path) && $foto_path != 'aset/img/default-avatar.png' && file_exists("../".$foto_path)) {
        unlink("../".$foto_path);
    }

    // Siapkan dan jalankan query DELETE
    $stmt_delete = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt_delete->bind_param("i", $user_id_to_delete);

    if ($stmt_delete->execute()) {
        header("location: pengguna.php?status=hapus_sukses");
    } else {
        header("location: pengguna.php?status=gagal");
    }
    $stmt_delete->close();

} else {
    // Jika aksi tidak valid, kembali ke halaman pengguna
    header("location: pengguna.php");
}

$conn->close();
exit;
?>