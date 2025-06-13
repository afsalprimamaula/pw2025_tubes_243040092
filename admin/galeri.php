<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php"); exit;
}

$result = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Galeri - Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="sidebar">
        </div>

    <div class="main-content">
        <header>
        <h2><i class="fas fa-images"></i> Kelola Galeri</h2>
        <a href="galeri_form.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Profil Admin
        </a>
    </header>
        <main>
            <a href="galeri_form.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Foto Baru</a>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Gambar</th>
                            <th>Tag</th>
                            <th>Caption</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><img src="../<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['caption']); ?>" width="150" class="img-thumbnail"></td>
                                    <td><span class="badge bg-info"><?php echo htmlspecialchars($row['tag']); ?></span></td>
                                    <td><?php echo htmlspecialchars($row['caption']); ?></td>
                                    <td><?php echo date('d M Y, H:i', strtotime($row['uploaded_at'])); ?></td>
                                    <td>
                                        <a href="galeri_proses.php?action=hapus&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus foto ini?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">Belum ada foto di galeri.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>