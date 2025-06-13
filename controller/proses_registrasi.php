<?php
require_once '../config/koneksi.php';


$nama = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


if (empty($nama) || empty($email) || empty($password)) {
    header("Location: ../registrasi/registrasi.php?error=Harap isi semua field.");
    exit();
}

if ($password !== $confirm_password) {
    header("Location: ../registrasi/registrasi.php?error=Password tidak cocok.");
    exit();
}

$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    header("Location: ../registrasi/registrasi.php?error=Email sudah terdaftar.");
    exit();
}
$stmt->close();

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nama, $email, $hashed_password);

if ($stmt->execute()) {

    $stmt->close();
    header("Location: ../login/login.php?success=Registrasi berhasil! Silakan login.");
    exit();
} else {

    $stmt->close();
    header("Location: ../registrasi/registrasi.php?error=Terjadi kesalahan. Coba lagi.");
    exit();
}
?>