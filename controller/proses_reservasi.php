<?php
session_start();
require_once '../config/koneksi.php';


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php?error=Harap login terlebih dahulu untuk membuat reservasi.");
    exit;
}


$user_id = $_SESSION['user_id'];
$nama_pemesan = $_POST['nama'];
$nomor_telepon = $_POST['nomor_telepon'];
$tanggal_reservasi = $_POST['tanggal_reservasi'];
$waktu_reservasi = $_POST['waktu_reservasi'];
$jumlah_orang = $_POST['jumlah_orang'];
$pesan_tambahan = $_POST['pesan'];


if (empty($nama_pemesan) || empty($nomor_telepon) || empty($tanggal_reservasi) || empty($waktu_reservasi) || empty($jumlah_orang)) {
    header("Location: ../reservasi/menureservasi.php?error=Harap isi semua field yang wajib diisi.");
    exit();
}


$stmt = $conn->prepare("INSERT INTO reservations (user_id, nama_pemesan, nomor_telepon, tanggal_reservasi, waktu_reservasi, jumlah_orang, pesan_tambahan) VALUES (?, ?, ?, ?, ?, ?, ?)");


$stmt->bind_param("issssis", $user_id, $nama_pemesan, $nomor_telepon, $tanggal_reservasi, $waktu_reservasi, $jumlah_orang, $pesan_tambahan);

if ($stmt->execute()) {

    header("Location: ../reservasi_sukses/reservasi_berhasil.php");
    exit();
} else {

    header("Location: ../reservasi/menureservasi.php?error=Gagal membuat reservasi. Silakan coba lagi.");
    exit();
}

$stmt->close();
$conn->close();
?>