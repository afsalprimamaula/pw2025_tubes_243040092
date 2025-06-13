<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    die("Akses ditolak.");
}

if (isset($_POST['action']) && $_POST['action'] == 'tambah') {
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "../galeri/img/"; 
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = uniqid() . '-' . basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $image_path = "galeri/img/" . $file_name; 
            $tag = $_POST['tag'];
            $caption = $_POST['caption'];

            $stmt = $conn->prepare("INSERT INTO gallery (image_url, tag, caption) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $image_path, $tag, $caption);
            $stmt->execute();
            $stmt->close();
        }
    }
}
else if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id = $_GET['id'];
    
    $stmt_select = $conn->prepare("SELECT image_url FROM gallery WHERE id = ?");
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $stmt_select->bind_result($path_to_delete);
    $stmt_select->fetch();
    $stmt_select->close();

    if (!empty($path_to_delete) && file_exists("../".$path_to_delete)) {
        unlink("../".$path_to_delete);
    }

    $stmt_delete = $conn->prepare("DELETE FROM gallery WHERE id = ?");
    $stmt_delete->bind_param("i", $id);
    $stmt_delete->execute();
    $stmt_delete->close();
}

$conn->close();
header("Location: galeri.php"); 
exit;
?>