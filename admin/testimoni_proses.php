<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin' || !isset($_GET['action']) || !isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$action = $_GET['action'];
$id = $_GET['id'];

if ($action == 'approve') {
    $stmt = $conn->prepare("UPDATE testimoni SET status = 'approved' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
} elseif ($action == 'delete') {
    $stmt = $conn->prepare("DELETE FROM testimoni WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: testimoni.php");
exit;