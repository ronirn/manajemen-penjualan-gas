<?php
include '../header.php';

$query_total_barang = mysqli_query($connection, "SELECT COUNT(*) AS total_barang FROM barang");
$total_barang = mysqli_fetch_assoc($query_total_barang)['total_barang'];

$query_total_terjual = mysqli_query($connection, "SELECT SUM(jumlah) AS total_terjual FROM barang_laku");
$total_terjual = mysqli_fetch_assoc($query_total_terjual)['total_terjual'];

$tanggal_hari_ini = date('Y-m-d');
$query_transaksi_hari_ini = mysqli_query($connection, "SELECT COUNT(*) AS jumlah_transaksi FROM barang_laku WHERE tanggal = '$tanggal_hari_ini'");
$jumlah_transaksi_hari_ini = mysqli_fetch_assoc($query_transaksi_hari_ini)['jumlah_transaksi'];

$query_total_pendapatan = mysqli_query($connection, "SELECT SUM(total_harga) AS total_pendapatan FROM barang_laku");
$total_pendapatan = mysqli_fetch_assoc($query_total_pendapatan)['total_pendapatan'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container-fluid {
            width: 100%;
            padding: 20px;
        }

        .col-xl-3,
        .col-md-6 {
            padding: 15px;
            box-sizing: border-box;
        }

        .card {
            border: none;
            border-radius: 5px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 1.5rem;
        }

        .card-body {
            display: flex;
            align-items: center;
            padding: 1.25rem;
        }

        .text-primary {
            color: #4e73df !important;
        }

        .text-success {
            color: #1cc88a !important;
        }

        .text-info {
            color: #36b9cc !important;
        }

        .text-warning {
            color: #f6c23e !important;
        }

        .text-danger {
            color: #e74a3b !important;
        }

        .h5 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .chart-area,
        .chart-pie {
            position: relative;
            height: 100%;
        }

        .card-primary {
            background-color: #4e73df;
            color: white;
        }

        .card-success {
            background-color: #1cc88a;
            color: white;
        }

        .card-warning {
            background-color: #f6c23e;
            color: white;
        }

        .card-danger {
            background-color: #e74a3b;
            color: white;
        }

        .card-body i {
            color: #eaeaea;
        }

        .chart-card {
            background-color: #ffffff;
            margin-top: 20px;
            padding: 15px;
        }

        .info-section {
            flex: 1;
        }

        .icon-section {
            margin-left: 15px;
        }

        .icon-section i {
            color: white;
        }

        .chart-area,
        .chart-pie {
            padding: 20px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="info-section">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Barang Tersedia</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $total_barang; ?></div>
                        </div>
                        <div class="icon-section">
                            <i class="fas fa-cubes fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="info-section">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Barang Terjual</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $total_terjual; ?></div>
                        </div>
                        <div class="icon-section">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="info-section">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $jumlah_transaksi_hari_ini; ?></div>
                        </div>
                        <div class="icon-section">
                            <i class="fas fa-history fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="info-section">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo "Rp " . number_format($total_pendapatan); ?></div>
                        </div>
                        <div class="icon-section">
                            <i class="fas fa-coins fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Area -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4 chart-card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4 chart-card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pendapatan</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Barang Terjual', 'Pendapatan'],
                datasets: [{
                    label: 'Grafik Penjualan',
                    data: [<?php echo $total_terjual; ?>, <?php echo $total_pendapatan; ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctxPie = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Barang Terjual', 'Pendapatan'],
                datasets: [{
                    data: [<?php echo $total_terjual; ?>, <?php echo $total_pendapatan; ?>],
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
</body>

</html>

<?php
include 'footer.php';
?>