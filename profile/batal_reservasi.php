<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("location: reservasi_saya.php?batal_gagal=ID tidak valid.");
    exit;
}

$reservation_id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$new_status = 'Cancelled'; 

$stmt = $conn->prepare("SELECT user_id, status FROM reservations WHERE id = ?");
$stmt->bind_param("i", $reservation_id);
$stmt->execute();
$stmt->bind_result($owner_id, $current_status);
$stmt->fetch();
$stmt->close();

if ($owner_id !== $user_id) {
    header("location: reservasi_saya.php?batal_gagal=Anda tidak memiliki hak untuk membatalkan reservasi ini.");
    exit;
}

if ($current_status !== 'Pending' && $current_status !== 'Confirmed') {
    header("location: reservasi_saya.php?batal_gagal=Reservasi ini sudah tidak bisa dibatalkan.");
    exit;
}

$update_stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ? AND user_id = ?");
$update_stmt->bind_param("sii", $new_status, $reservation_id, $user_id);

if ($update_stmt->execute()) {
    header("location: reservasi_saya.php?batal_sukses=Reservasi berhasil dibatalkan.");
} else {
    header("location: reservasi_saya.php?batal_gagal=Terjadi kesalahan. Coba lagi.");
}

$update_stmt->close();
$conn->close();
?>