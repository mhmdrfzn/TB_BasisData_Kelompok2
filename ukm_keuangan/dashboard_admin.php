<?php
include 'auth.php';
include 'db.php';

$total_pemasukan = $conn->query("SELECT SUM(jumlah) as total FROM transaksi WHERE jenis = 'pemasukan'")->fetch_assoc()['total'] ?? 0;
$total_pengeluaran = $conn->query("SELECT SUM(jumlah) as total FROM transaksi WHERE jenis = 'pengeluaran'")->fetch_assoc()['total'] ?? 0;
$saldo = $total_pemasukan - $total_pengeluaran;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - UKM Keuangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; margin: 0; }
        .nav-left {
            height: 100vh;
            background: #343a40;
            padding: 20px;
            color: white;
        }
        .nav-left a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .nav-left a:hover {
            background: #495057;
        }
        .header-bar {
            background: white;
            padding: 15px 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .content-wrapper {
            padding: 20px;
        }
        .card-summary {
            text-align: center;
            padding: 20px;
            color: white;
            border-radius: 6px;
        }
        .bg-orange { background-color: #fd7e14; }
        .bg-green { background-color: #28a745; }
        .bg-red { background-color: #dc3545; }
        .bg-blue { background-color: #007bff; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="nav-left">
        <h4>e-KAS</h4>
        <p><?= $_SESSION['username'] ?> - Online</p>
        <hr>
        <a href="dashboard_admin.php">DASHBOARD</a>
        <a href="users/">USERS</a>
        <a href="transaksi/">TRANSAKSI</a>
        <a href="tagihan/">TAGIHAN</a>
        <a href="piutang/">PIUTANG</a>
        <a href="logout.php">KELUAR</a>
    </div>
    <div class="flex-grow-1">
        <div class="header-bar d-flex justify-content-between">
            <h4>Dashboard Keuangan</h4>
            <div>Hai, <?= $_SESSION['username'] ?> | <?= date('l, d F Y') ?></div>
        </div>
        <div class="content-wrapper">
            <div class="row text-white mb-4">
                <div class="col-md-4">
                    <div class="card-summary bg-orange">
                        <h5>Total Pemasukan</h5>
                        <h3>Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary bg-green">
                        <h5>Total Pengeluaran</h5>
                        <h3>Rp <?= number_format($total_pengeluaran, 0, ',', '.') ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary bg-blue">
                        <h5>Saldo Akhir</h5>
                        <h3>Rp <?= number_format($saldo, 0, ',', '.') ?></h3>
                    </div>
                </div>
            </div>
            <p class="text-muted">Data lebih lanjut seperti grafik dan laporan dapat ditambahkan di bawah ini.</p>
        </div>
    <canvas id="chartTren" height="100"></canvas>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch('chart_data.php')
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('chartTren').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: data.pemasukan,
                        borderColor: 'green',
                        backgroundColor: 'rgba(0,128,0,0.1)',
                        fill: true
                    },
                    {
                        label: 'Pengeluaran',
                        data: data.pengeluaran,
                        borderColor: 'red',
                        backgroundColor: 'rgba(255,0,0,0.1)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    });
</script>
</body>
</html>
