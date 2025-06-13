<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Paket Baru - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="main-content" style="margin-left:20px; padding:20px;">
        <header>
            <h2><i class="fas fa-plus"></i> Tambah Paket Baru</h2>
        </header>
        <main>
            <form action="proses_paket.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="tambah">

                <div class="mb-3">
                    <label for="nama_paket" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="satuan_harga" class="form-label">Satuan Harga</label>
                        <input type="text" class="form-control" id="satuan_harga" name="satuan_harga" value="per orang" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fitur" class="form-label">Fitur Utama (pisahkan dengan koma)</label>
                    <input type="text" class="form-control" id="fitur" name="fitur" placeholder="Contoh: Kapasitas 4 Orang, Termasuk Sarapan, Wi-Fi">
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="family">Camping Family</option>
                        <option value="dome">Camping Dome</option>
                        <option value="pondokan">Pondokan</option>
                        <option value="activity">Outdoor Activity</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar Paket</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan Paket</button>
                <a href="paket.php" class="btn btn-secondary">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>