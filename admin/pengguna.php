<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php?error=Anda tidak memiliki akses.");
    exit;
}

$result = $conn->query("SELECT id, nama, email, role, created_at FROM users ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="sidebar">
        <h3 class="text-white text-center">Admin Panel</h3>
        <hr class="text-white">
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="active"><a href="pengguna.php"><i class="fas fa-users"></i> Kelola Pengguna</a></li>
            <li><a href="paket.php"><i class="fas fa-box-open"></i> Kelola Paket</a></li>
            <li><a href="testimoni.php"><i class="fas fa-star"></i> Kelola Testimoni</a></li>
            <li><a href="galeri_form.php"><i class="fas fa-images"></i> Kelola Galeri</a></li>
            <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h2><i class="fas fa-users"></i> Kelola Pengguna</h2>
            <div class="user-wrapper">
                <i class="fas fa-user-circle"></i>
                <div>
                    <h4><?php echo htmlspecialchars($_SESSION['user_nama']); ?></h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Peran pengguna berhasil diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            } elseif (isset($_GET['status']) && $_GET['status'] == 'gagal') {
                 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal mengubah peran pengguna.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
            ?>

            <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'hapus_sukses') {
                        echo '<div class="alert alert-success">Pengguna berhasil dihapus.</div>';
                    } elseif ($_GET['status'] == 'gagal_hapus_diri') {
                        echo '<div class="alert alert-danger">Anda tidak bisa menghapus akun Anda sendiri.</div>';
                    } else {
                        echo '<div class="alert alert-danger">Terjadi kesalahan.</div>';
                    }
                }
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th><th>Nama</th><th>Email</th><th>Peran (Role)</th><th>Tanggal Daftar</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td>
                                        <span class="badge <?php echo ($row['role'] == 'admin') ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo htmlspecialchars($row['role']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('d M Y', strtotime($row['created_at'])); ?></td>
                                    <td>
                                        <a href="ganti_role.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" title="Ubah Peran"><i class="fas fa-user-shield"></i></a>
                                        <a href="proses_pengguna.php?action=hapus&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus pengguna ini secara permanen?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center">Tidak ada data pengguna.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>