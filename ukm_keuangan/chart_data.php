<?php
include 'auth.php';
include 'db.php';

$query = $conn->query("
    SELECT DATE_FORMAT(tanggal, '%Y-%m') AS bulan,
           SUM(CASE WHEN jenis='pemasukan' THEN jumlah ELSE 0 END) AS pemasukan,
           SUM(CASE WHEN jenis='pengeluaran' THEN jumlah ELSE 0 END) AS pengeluaran
    FROM transaksi
    GROUP BY bulan
    ORDER BY bulan
");

$labels = [];
$pemasukan = [];
$pengeluaran = [];

while ($row = $query->fetch_assoc()) {
    $labels[] = $row['bulan'];
    $pemasukan[] = (float)$row['pemasukan'];
    $pengeluaran[] = (float)$row['pengeluaran'];
}

echo json_encode([
    "labels" => $labels,
    "pemasukan" => $pemasukan,
    "pengeluaran" => $pengeluaran
]);
?>
