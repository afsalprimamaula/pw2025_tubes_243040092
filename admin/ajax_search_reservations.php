<?php
session_start();
require_once '../config/koneksi.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['user_role'] !== 'admin') {
    die("Akses ditolak.");
}

$search_query = isset($_GET['q']) ? $_GET['q'] : '';
$search_term = "%" . $search_query . "%";

$query = "SELECT reservations.*, users.nama as user_nama 
          FROM reservations 
          JOIN users ON reservations.user_id = users.id 
          WHERE reservations.nama_pemesan LIKE ?
          ORDER BY reservations.created_at DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $search_term);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $status_class = '';
        if($row['status'] == 'Pending') $status_class = 'bg-warning text-dark';
        elseif($row['status'] == 'Confirmed') $status_class = 'bg-success';
        else $status_class = 'bg-danger';

        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . htmlspecialchars($row['nama_pemesan']) . '</td>';
        echo '<td>' . htmlspecialchars($row['user_nama']) . '</td>';
        echo '<td>' . date('d M Y', strtotime($row['tanggal_reservasi'])) . '</td>';
        echo '<td>' . $row['jumlah_orang'] . '</td>';
        echo '<td><span class="badge ' . $status_class . '">' . htmlspecialchars($row['status']) . '</span></td>';
        echo '<td>';
        echo '<a href="update_status.php?id='.$row['id'].'&status=Confirmed" class="btn btn-success btn-sm" title="Setujui"><i class="fas fa-check"></i></a> ';
        echo '<a href="update_status.php?id='.$row['id'].'&status=Cancelled" class="btn btn-danger btn-sm" title="Tolak" onclick="return confirm(\'Anda yakin?\');"><i class="fas fa-times"></i></a> ';
        echo '<a href="../profile/reservasi/reservasi_detail.php?id='.$row['id'].'" class="btn btn-info btn-sm" title="Lihat Detail"><i class="fas fa-eye"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="7" class="text-center">Tidak ada reservasi yang cocok dengan pencarian Anda.</td></tr>';
}

$stmt->close();
$conn->close();
?>