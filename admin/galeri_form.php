<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Foto Galeri - Admin Panel</title>
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
            <li><a href="paket.php"><i class="fas fa-box-open"></i> Kelola Paket</a></li>
            <li><a href="testimoni.php"><i class="fas fa-star"></i> Kelola Testimoni</a></li>
            <li class="active"><a href="galeri.php"><i class="fas fa-images"></i> Kelola Galeri</a></li>
            <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h2><i class="fas fa-plus"></i> Tambah Foto Baru ke Galeri</h2>
            <div class="user-wrapper">
                <i class="fas fa-user-circle"></i>
                <div>
                    <h4><?php echo htmlspecialchars($_SESSION['user_nama']); ?></h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="card">
                <div class="card-body">
                    <form action="galeri_proses.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="tambah">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih File Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="mb-3">
                            <label for="tag" class="form-label">Tag/Kategori Gambar</label>
                            <input type="text" class="form-control" id="tag" name="tag" placeholder="Contoh: Pemandangan, Sungai, Camping">
                        </div>
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption Singkat (Opsional)</label>
                            <input type="text" class="form-control" id="caption" name="caption">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload Foto</button>
                        <a href="galeri.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>