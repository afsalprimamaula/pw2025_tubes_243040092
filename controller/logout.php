<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi untuk mengakhiri sesi pengguna
session_destroy();

// Alihkan pengguna kembali ke halaman login setelah logout berhasil
header("location: ../login/login.php");
exit;
?>