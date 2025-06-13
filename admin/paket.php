<?php
session_start();
require_once '../config/koneksi.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php"); exit;
}
$result = $conn->query("SELECT * FROM packages ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Paket - Admin</title>
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
            <li><a href="pengguna.php"><i class="fas fa-users"></i> Kelola Pengguna</a></li>
            <li class="active"><a href="paket.php"><i class="fas fa-box-open"></i> Kelola Paket</a></li>
            <li><a href="testimoni.php"><i class="fas fa-star"></i> Kelola Testimoni</a></li>
            <li><a href="galeri_form.php"><i class="fas fa-images"></i> Kelola Galeri</a></li>
            <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h2><i class="fas fa-box-open"></i> Kelola Paket</h2>
            <a href="tambah_paket.php" class="btn btn-primary ms-auto"><i class="fas fa-plus"></i> Tambah Paket Baru</a>
        </header>
        <main>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama_paket']); ?></td>
                                    <td>Rp <?php echo number_format($row['harga']); ?></td>
                                    <td>
                                        <?php 
                                        if (!empty($row['kategori'])) {
                                            echo htmlspecialchars(ucfirst($row['kategori']));
                                        } else {
                                            echo '<span class="text-muted">N/A</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit_paket.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="proses_paket.php?action=hapus&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus paket ini?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">Belum ada paket.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>