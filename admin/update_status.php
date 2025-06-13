<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php?error=Akses ditolak.");
    exit;
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $reservation_id = $_GET['id'];
    $new_status = $_GET['status'];

    $allowed_statuses = ['Confirmed', 'Cancelled'];
    if (in_array($new_status, $allowed_statuses)) {

        $stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $new_status, $reservation_id);

        if ($stmt->execute()) {
            header("Location: dashboard.php?update=sukses");
        } else {
            header("Location: dashboard.php?update=gagal");
        }
        $stmt->close();
    } else {
        header("Location: dashboard.php?update=gagal");
    }
} else {
    header("Location: dashboard.php");
}

$conn->close();
exit;
?>