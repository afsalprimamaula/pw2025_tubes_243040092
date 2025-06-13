<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    header("location: ../login/login.php"); exit;
}

$filter_rating = isset($_GET['rating']) ? (int)$_GET['rating'] : 0;

$query = "SELECT testimoni.*, users.nama as user_nama 
          FROM testimoni 
          JOIN users ON testimoni.user_id = users.id";

$params = [];
$types = "";

if ($filter_rating >= 1 && $filter_rating <= 5) {
    $query .= " WHERE testimoni.rating = ?";
    $params[] = $filter_rating;
    $types .= "i";
}

$query .= " ORDER BY testimoni.created_at DESC";

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Testimoni - Admin</title>
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
            <li class="active"><a href="testimoni.php"><i class="fas fa-star"></i> Kelola Testimoni</a></li>
            <li><a href="galeri_form.php"><i class="fas fa-images"></i> Kelola Galeri</a></li>
            <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h2><i class="fas fa-star"></i> Kelola Testimoni</h2>
            <div class="user-wrapper">
                <i class="fas fa-user-circle"></i>
                <div>
                    <h4><?php echo htmlspecialchars($_SESSION['user_nama']); ?></h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="card mb-3">
                <div class="card-body">
                    <form action="testimoni.php" method="GET" class="d-flex align-items-center">
                        <label for="rating" class="form-label me-2 mb-0">Filter Rating:</label>
                        <select class="form-select me-2" name="rating" id="rating" style="width: 200px;">
                            <option value="">Semua Rating</option>
                            <option value="5" <?php if($filter_rating == 5) echo 'selected'; ?>>★★★★★ (5 Bintang)</option>
                            <option value="4" <?php if($filter_rating == 4) echo 'selected'; ?>>★★★★ (4 Bintang)</option>
                            <option value="3" <?php if($filter_rating == 3) echo 'selected'; ?>>★★★ (3 Bintang)</option>
                            <option value="2" <?php if($filter_rating == 2) echo 'selected'; ?>>★★ (2 Bintang)</option>
                            <option value="1" <?php if($filter_rating == 1) echo 'selected'; ?>>★ (1 Bintang)</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="testimoni.php" class="btn btn-secondary ms-2">Reset</a>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr><th>User</th><th>Ulasan</th><th>Rating</th><th>Status</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        <?php if($result && $result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['user_nama']); ?></td>
                                    <td style="min-width: 300px;"><?php echo htmlspecialchars($row['ulasan']); ?></td>
                                    <td style="color: #ffc107; white-space: nowrap;"><?php echo str_repeat('★', $row['rating']); ?></td>
                                    <td>
                                        <span class="badge <?php echo ($row['status'] == 'approved') ? 'bg-success' : 'bg-warning text-dark'; ?>">
                                            <?php echo ucfirst($row['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] == 'pending'): ?>
                                            <a href="testimoni_proses.php?action=approve&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success" title="Setujui"><i class="fas fa-check"></i></a>
                                        <?php endif; ?>
                                        <a href="testimoni_proses.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin hapus?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">Tidak ada testimoni yang cocok dengan filter ini.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>