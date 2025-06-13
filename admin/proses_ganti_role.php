<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin' || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../login/login.php");
    exit;
}

$user_id = $_POST['user_id'];
$new_role = $_POST['role'];

if ($new_role !== 'admin' && $new_role !== 'user') {
    header("location: pengguna.php?status=gagal");
    exit;
}

$stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
$stmt->bind_param("si", $new_role, $user_id);

if ($stmt->execute()) {
    header("location: pengguna.php?status=sukses");
} else {
    header("location: pengguna.php?status=gagal");
}

$stmt->close();
$conn->close();
?>