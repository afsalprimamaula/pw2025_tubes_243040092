<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Reservasi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="menu.css">
</head>
<body>

    <div class="reservation-container">
        <div class="card reservation-card">
            <h2>Form Reservasi</h2>
            <!-- Form action can be added later -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" placeholder="Pilih tanggal" onfocus="(this.type='date')">
                </div>
                
                <div class="mb-3">
                    <label for="paket" class="form-label">PAKET</label>
                    <select class="form-select" id="paket">
                        <option selected>Pilih paket</option>
                        <option value="Camping">Camping</option>
                        <option value="Pondokan">Pondokan</option>
                        <option value="River Tubing">River Tubing</option>
                        <option value="Rekreasi">Rekreasi</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="jumlahTamu" class="form-label">Jumlah Tamu</label>
                    <select class="form-select" id="jumlahTamu">
                        <option>1 tamu</option>
                        <option selected>2 tamu</option>
                        <option>3 tamu</option>
                        <option>4 tamu</option>
                        <option>5 tamu</option>
                        <option>6 tamu atau lebih</option>
                    </select>
                </div>
                
                <div class="mb-3">
                     <label for="pilihMeja" class="form-label">Pilih Meja</label>
                    <div class="alert alert-custom" role="alert">
                        Silakan pilih tanggal, waktu, dan jumlah tamu terlebih dahulu.
                    </div>
                </div>

                <div class="mb-4">
                    <label for="permintaanKhusus" class="form-label">Permintaan Khusus (opsional)</label>
                    <textarea class="form-control" id="permintaanKhusus" rows="4" placeholder="Jika Anda memiliki permintaan khusus, silakan tuliskan di sini..."></textarea>
                </div>
                
                <!-- MODIFIED: Button is now a link styled as a button -->
                <a href="../reservasi_sukses/reservasi_berhasil.php" class="btn btn-submit w-100 text-center">Buat Reservasi</a>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
