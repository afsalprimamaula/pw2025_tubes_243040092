<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'] ?? null;
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? null;
    $tempat_lahir = $_POST['tempat_lahir'] ?? null;
    $tanggal_lahir = !empty($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : null;
    $alamat = $_POST['alamat'] ?? null;
    $foto_path = $_POST['foto_lama']; 

    if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] == 0) {
        $target_dir = "../uploads/avatars/";
        
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_name = uniqid() . '-' . basename($_FILES["foto_profil"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["foto_profil"]["tmp_name"], $target_file)) {

                if (!empty($foto_path) && $foto_path != 'aset/img/default-avatar.png' && file_exists("../".$foto_path)) {
                    unlink("../".$foto_path);
                }
                $foto_path = "uploads/avatars/" . $file_name; 
            }
        }
    }

    $stmt = $conn->prepare(
        "UPDATE users SET 
            nama = ?, 
            email = ?, 
            nomor_hp = ?, 
            jenis_kelamin = ?, 
            tempat_lahir = ?, 
            tanggal_lahir = ?, 
            alamat = ?, 
            foto_profil = ? 
        WHERE id = ?"
    );

    $stmt->bind_param("ssssssssi", $nama, $email, $nomor_hp, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $alamat, $foto_path, $user_id);

    if ($stmt->execute()) {
        $_SESSION['user_nama'] = $nama;
        header("location: profile.php?update=sukses");
    } 
    else {
        header("location: edit_profile.php?error=Gagal memperbarui profil.");
    }
    
    $stmt->close();
    $conn->close();
} 
else {
    header("location: profile.php");
    exit;
}
?>