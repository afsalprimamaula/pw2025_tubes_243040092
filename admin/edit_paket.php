<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php?error=Anda tidak memiliki akses.");
    exit;
}

if (!isset($_GET['id'])) {
    header("location: paket.php");
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM packages WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$paket = $result->fetch_assoc();
$stmt->close();

if (!$paket) {
    echo "Paket tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Paket - Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li class="testimoni.php"><a href="testimoni.php"><i class="fas fa-star"></i> Kelola Testimoni</a></li>
            <li class="active"><a href="paket.php"><i class="fas fa-box-open"></i> Kelola Paket</a></li>
            <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h2><i class="fas fa-edit"></i> Edit Paket</h2>
        </header>
        <main>
            <form action="proses_paket.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?php echo $paket['id']; ?>">
                <input type="hidden" name="gambar_lama" value="<?php echo htmlspecialchars($paket['gambar_url']); ?>">
                
                <div class="mb-3">
                    <label for="nama_paket" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?php echo htmlspecialchars($paket['nama_paket']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo htmlspecialchars($paket['deskripsi']); ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $paket['harga']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="satuan_harga" class="form-label">Satuan Harga</label>
                        <input type="text" class="form-control" id="satuan_harga" name="satuan_harga" value="<?php echo htmlspecialchars($paket['satuan_harga']); ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fitur" class="form-label">Fitur Utama (pisahkan dengan koma)</label>
                    <input type="text" class="form-control" id="fitur" name="fitur" value="<?php echo htmlspecialchars($paket['fitur']); ?>">
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori">
                        <option value="family" <?php if($paket['kategori'] == 'family') echo 'selected'; ?>>Camping Family</option>
                        <option value="dome" <?php if($paket['kategori'] == 'dome') echo 'selected'; ?>>Camping Dome</option>
                        <option value="pondokan" <?php if($paket['kategori'] == 'pondokan') echo 'selected'; ?>>Pondokan</option>
                        <option value="activity" <?php if($paket['kategori'] == 'activity') echo 'selected'; ?>>Outdoor Activity</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Ubah Gambar Paket</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <?php if (!empty($paket['gambar_url'])): ?>
                        <div class="mt-2">
                            <small class="form-text text-muted">Gambar saat ini:</small><br>
                            <img src="../<?php echo htmlspecialchars($paket['gambar_url']); ?>" alt="Gambar Paket" width="150" class="img-thumbnail">
                            <br><small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" name="submit" value="edit_paket" class="btn btn-primary">Simpan Perubahan</button>
                <a href="paket.php" class="btn btn-secondary">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>