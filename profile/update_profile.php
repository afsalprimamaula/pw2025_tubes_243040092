<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    exit('Anda harus login untuk melakukan aksi ini.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Proses dan perbarui data teks ke dalam Session
    $_SESSION['user_nama']    = htmlspecialchars($_POST['namaLengkap']);
    $_SESSION['user_gender']  = htmlspecialchars($_POST['jenisKelamin']);
    $_SESSION['user_pob']     = htmlspecialchars($_POST['tempatLahir']);
    $_SESSION['user_dob']     = htmlspecialchars($_POST['tanggalLahir']);
    $_SESSION['user_phone']   = htmlspecialchars($_POST['nomorHp']);
    $_SESSION['user_address'] = htmlspecialchars($_POST['alamat']);

    // 2. Proses upload file foto profil
    // Periksa apakah ada file yang diupload dan tidak ada error
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
        $uploadDir = 'uploads/'; // Direktori tempat menyimpan file
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        
        $fileName = basename($_FILES['profilePicture']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Buat nama file yang unik untuk menghindari penimpaan file
        $newFileName = uniqid() . '.' . $fileExtension;
        $targetFile = $uploadDir . $newFileName;

        // Validasi tipe file
        if (in_array($fileExtension, $allowedTypes)) {
            // Coba pindahkan file yang diupload ke direktori tujuan
            if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $targetFile)) {
                // Jika berhasil, simpan path file baru ke session
                $_SESSION['user_avatar'] = $targetFile;
            } else {
                // Handle error jika gagal memindahkan file (opsional)
                // Contoh: header("Location: edit_profile.php?error=uploadfailed"); exit();
            }
        } else {
             // Handle error jika tipe file tidak diizinkan (opsional)
             // Contoh: header("Location: edit_profile.php?error=invalidtype"); exit();
        }
    }

    // 3. Arahkan kembali pengguna ke halaman profil
    header("Location: profile.php?status=updated");
    exit;

} else {
    header("Location: profile.php");
    exit;
}
?>