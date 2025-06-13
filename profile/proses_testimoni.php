<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    
    $package_id = $_POST['package_id'] ?? null; 
    $rating = $_POST['rating'] ?? 5; 
    $ulasan = trim($_POST['ulasan']); 

    if (empty($ulasan) || empty($package_id)) {
        header("Location: tulis_testimoni.php?error=Harap pilih paket dan isi ulasan Anda.");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO testimoni (user_id, package_id, ulasan, rating, status) VALUES (?, ?, ?, ?, 'pending')");
    
    $stmt->bind_param("iisi", $user_id, $package_id, $ulasan, $rating);

    if ($stmt->execute()) {
        header("Location: tulis_testimoni.php?sukses=Terima kasih! Ulasan Anda telah dikirim dan sedang menunggu persetujuan.");
        } 
    else {
        header("Location: tulis_testimoni.php?error=Gagal mengirim ulasan. Silakan coba lagi.");
    }
    
    $stmt->close();
    $conn->close();
    
} else {

    header("location: tulis_testimoni.php");
    exit;
}
?>