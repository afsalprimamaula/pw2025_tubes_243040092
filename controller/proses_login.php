<?php
session_start();
require_once '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("location: ../login/login.php?error=Email dan password harus diisi");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, nama, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nama'] = $user['nama'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("location: ../admin/dashboard.php");
            } else {
                header("location: ../home/home.php");
            }
            exit;
        } else {
            header("location: ../login/login.php?error=Password salah");
            exit;
        }
    } else {
        header("location: ../login/login.php?error=Email tidak terdaftar");
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    header("location: ../login/login.php");
    exit;
}
?>