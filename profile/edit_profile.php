<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT nama, email, nomor_hp, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, foto_profil FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Muara Jambu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="edit_profile.css"> </head>
<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="mb-0">Edit Informasi Akun</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?>
                <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="foto_lama" value="<?php echo htmlspecialchars($user['foto_profil'] ?? ''); ?>">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($user['nama'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nomor_hp" class="form-label">Nomor HP</label>
                            <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo htmlspecialchars($user['nomor_hp'] ?? ''); ?>" placeholder="Contoh: 08123456789">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" <?php echo empty($user['jenis_kelamin']) ? 'selected' : ''; ?>>-- Pilih --</option>
                                <option value="Laki-laki" <?php echo ($user['jenis_kelamin'] ?? '') == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo ($user['jenis_kelamin'] ?? '') == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo htmlspecialchars($user['tempat_lahir'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo htmlspecialchars($user['tanggal_lahir'] ?? ''); ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($user['alamat'] ?? ''); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto_profil" class="form-label">Ubah Foto Profil</label>
                        <input class="form-control" type="file" id="foto_profil" name="foto_profil">
                        <?php if (!empty($user['foto_profil'])): ?>
                            <div class="mt-2">
                                <small>Foto saat ini:</small><br>
                                <img src="../<?php echo htmlspecialchars($user['foto_profil']); ?>" alt="Foto Profil" width="100" class="img-thumbnail">
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="profile.php" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>