<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("location: pengguna.php");
    exit;
}

$user_id = $_GET['id'];

$stmt = $conn->prepare("SELECT id, nama, role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    echo "Pengguna tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Ubah Peran Pengguna - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="main-content" style="margin-left: 20px; padding: 20px;">
        <header>
            <h2>Ubah Peran untuk: <?php echo htmlspecialchars($user['nama']); ?></h2>
        </header>
        <main>
            <form action="proses_ganti_role.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <div class="mb-3">
                    <label for="role" class="form-label">Peran (Role)</label>
                    <select class="form-select" id="role" name="role">
                        <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                        <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="pengguna.php" class="btn btn-secondary">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>