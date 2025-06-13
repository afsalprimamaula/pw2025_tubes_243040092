<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    die("Akses ditolak.");
}

function upload_gambar() {
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] != 0) {
        return null;
    }

    $target_dir = "../uploads/";
    $file_name = uniqid() . '-' . basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (getimagesize($_FILES["gambar"]["tmp_name"]) === false) {
        return false; 
    }

    $allowed_types = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
    if (!in_array($imageFileType, $allowed_types)) {
        return false; 
    }

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        return "uploads/" . $file_name; 
    } else {
        return false; 
    }
}

if (isset($_POST['submit'])) {
    
    $gambar_path = $_POST['gambar_lama'] ?? null;
    $upload_result = upload_gambar();

    if ($upload_result === false) {
        header("Location: paket.php?status=gagal_upload");
        exit;
    } elseif ($upload_result !== null) {
        if(!empty($gambar_path) && file_exists("../".$gambar_path)) {
            unlink("../".$gambar_path);
        }
        $gambar_path = $upload_result;
    }
    
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $satuan_harga = $_POST['satuan_harga'];
    $fitur = $_POST['fitur'];
    $kategori = $_POST['kategori']; 

    if (empty($_POST['id'])) { 
        $stmt = $conn->prepare("INSERT INTO packages (nama_paket, deskripsi, harga, satuan_harga, fitur, gambar_url, kategori) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissss", $nama_paket, $deskripsi, $harga, $satuan_harga, $fitur, $gambar_path, $kategori);
    } else { 
        $id = $_POST['id'];
        $stmt = $conn->prepare("UPDATE packages SET nama_paket=?, deskripsi=?, harga=?, satuan_harga=?, fitur=?, gambar_url=?, kategori=? WHERE id=?");
        $stmt->bind_param("ssissssi", $nama_paket, $deskripsi, $harga, $satuan_harga, $fitur, $gambar_path, $kategori, $id);
    }

    $stmt->execute();
    $stmt->close();
} 
else if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id = $_GET['id'];
    
    $stmt_select = $conn->prepare("SELECT gambar_url FROM packages WHERE id = ?");
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $stmt_select->bind_result($gambar_path_to_delete);
    $stmt_select->fetch();
    $stmt_select->close();

    if(!empty($gambar_path_to_delete) && file_exists("../".$gambar_path_to_delete)) {
        unlink("../".$gambar_path_to_delete);
    }

    $stmt_delete = $conn->prepare("DELETE FROM packages WHERE id = ?");
    $stmt_delete->bind_param("i", $id);
    $stmt_delete->execute();
    $stmt_delete->close();
}

$conn->close();
header("Location: paket.php"); 
exit;
?>