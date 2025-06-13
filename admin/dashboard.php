<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php?error=Anda tidak memiliki akses.");
    exit;
}

$query = "SELECT reservations.*, users.nama as user_nama 
          FROM reservations 
          JOIN users ON reservations.user_id = users.id 
          ORDER BY reservations.created_at DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Muara Jambu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="sidebar">
        <h3 class="text-white text-center">Admin Panel</h3>
        <hr class="text-white">
        <ul>
            <li class="active"><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="pengguna.php"><i class="fas fa-users"></i> Kelola Pengguna</a></li>
            <li><a href="paket.php"><i class="fas fa-box-open"></i> Kelola Paket</a></li>
            <li class="testimoni.php"><a href="testimoni.php"><i class="fas fa-star"></i> Kelola Testimoni</a></li>
            <li><a href="galeri_form.php"><i class="fas fa-images"></i> Kelola Galeri</a></li>
            <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h2><i class="fas fa-tachometer-alt"></i> Dashboard</h2>
            <div class="user-wrapper">
                <i class="fas fa-user-circle"></i>
                <div>
                    <h4><?php echo htmlspecialchars($_SESSION['user_nama']); ?></h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Reservasi Masuk</h4>
                <div class="search-wrapper">
                    <span class="fas fa-search"></span>
                    <input type="search" id="searchInput" class="form-control" placeholder="Cari nama pemesan...">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th><th>Nama Pemesan</th><th>Nama Akun</th><th>Tgl Reservasi</th><th>Jumlah Orang</th><th>Status</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="reservationTableBody">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama_pemesan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['user_nama']); ?></td>
                                    <td><?php echo date('d M Y', strtotime($row['tanggal_reservasi'])); ?></td>
                                    <td><?php echo $row['jumlah_orang']; ?></td>
                                    <td>
                                        <span class="badge 
                                            <?php 
                                                if($row['status'] == 'Pending') echo 'bg-warning text-dark';
                                                elseif($row['status'] == 'Confirmed') echo 'bg-success';
                                                else echo 'bg-danger';
                                            ?>">
                                            <?php echo htmlspecialchars($row['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Confirmed" class="btn btn-success btn-sm" title="Setujui"><i class="fas fa-check"></i></a>
                                        <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Cancelled" class="btn btn-danger btn-sm" title="Tolak" onclick="return confirm('Anda yakin ingin menolak reservasi ini?');"><i class="fas fa-times"></i></a>
                                        <a href="../profile/reservasi/reservasi_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="text-center">Tidak ada data reservasi.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('reservationTableBody');

        searchInput.addEventListener('keyup', function() {
            const query = this.value;
            const xhr = new XMLHttpRequest();
            
            xhr.open('GET', 'ajax_search_reservations.php?q=' + encodeURIComponent(query), true);

            xhr.onload = function() {
                if (this.status === 200) {
                    tableBody.innerHTML = this.responseText;
                } else {
                    console.error("Terjadi error saat melakukan pencarian.");
                }
            }
            xhr.send();
        });
    });
    </script>
    </body>
</html>