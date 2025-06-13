<?php
require_once '../config/koneksi.php';

$results_html = '';
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $search_query = trim($_GET['q']);
    $search_term = "%" . $search_query . "%";

    $stmt = $conn->prepare("SELECT id, nama_paket, gambar_url FROM packages WHERE nama_paket LIKE ? LIMIT 5");
    $stmt->bind_param("s", $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($paket = $result->fetch_assoc()) {

            $results_html .= '<a href="../package/package.php?q='.urlencode($paket['nama_paket']).'" class="search-result-item">';
            $results_html .= '<span>' . htmlspecialchars($paket['nama_paket']) . '</span>';
            $results_html .= '</a>';
        }
    } else {
        $results_html = '<div class="search-no-results">Tidak ada hasil ditemukan.</div>';
    }
    $stmt->close();
}
$conn->close();
echo $results_html;
?>