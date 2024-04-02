<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengelolaan Laundry</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" style="padding: 25px;">
                            <h3>TOTAL MEMBER</h3>
                        </div>
                        <?php
                                $sql = "SELECT * FROM tb_member";

                                if ($result = mysqli_query($koneksi, $sql)) {

                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows($result);

                                    // Display result

                                ?>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none"
                                href="./dashboard.php?page=member">
                                <h5><?php printf(" %d\n", $rowcount); ?></h5>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" style="padding: 25px;">
                            <h3>DATA TRANSAKSI</h3>
                        </div>
                        <?php
                                $sql = "SELECT * FROM tb_transaksi";

                                if ($result = mysqli_query($koneksi, $sql)) {

                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows($result);

                                    // Display result

                                ?>
                        <div class=" card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none"
                                href="./dashboard.php?page=laporan">
                                <h5><?php printf(" %d\n", $rowcount); ?></h5>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" style="padding: 25px;">
                            <h3>TOTAL PAKET</h3>
                        </div>
                        <?php
                                $sql = "SELECT * FROM tb_paket";

                                if ($result = mysqli_query($koneksi, $sql)) {

                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows($result);

                                    // Display result

                                ?>
                        <div class=" card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none"
                                href="./dashboard.php?page=paket">
                                <h5><?php printf(" %d\n", $rowcount); ?></h5>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" style="padding: 25px;">
                            <h3>TOTAL PENDAPATAN</h3>
                        </div>
                        <?php
                    // Query SQL untuk menghitung jumlah transaksi
$sql = "SELECT SUM(total_harga) AS total_transaksi FROM tb_detail_transaksi";

// Eksekusi query
$result = mysqli_query($koneksi, $sql);

// Periksa apakah query berhasil dieksekusi
if($result) {
    // Ambil nilai jumlah transaksi dari hasil query
    $row = mysqli_fetch_assoc($result);
    $total_transaksi = $row['total_transaksi'];
} else {
    // Jika query gagal dieksekusi, atur total transaksi menjadi 0
    $total_transaksi = 0;
}
?>
                        <div class=" card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none">
                                <h5>Rp.
                                    <?= number_format($total_transaksi, 0, ',', '.'); ?></h5>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</div>
<?php
                                }
                            }
                            
                        }         
                    ?>




<div
    style="display: flex; justify-content: center; gap: 1px; margin-right: 100px; margin-left: 100px; margin-top: 20px; margin-bottom: 40px; border: 1px solid #ccc;">
    <div style="width: 55%;">
        <div style="text-align: center; font-weight: bold; margin-top: 10px;">CHART JUMLAH TRANSAKSI BULAN INI</div>
        <canvas id="myChart" style="width: 100%; height: 350px; border: 1px solid #ccc;"></canvas>
    </div>
    <div style="width: 40%;">
        <div style="text-align: center; font-weight: bold; margin-top: 10px;">CHART STATUS PEMBAYARAN LAUNDRY</div>
        <canvas id="myPieChart" style="max-width: 500px; max-height: 350px; display: block; margin: 0 auto;"></canvas>
    </div>
</div>
<?php
// Chart  Batang
$currentMonth = date('m');
$currentYear = date('Y');
$query = "SELECT DAY(tgl) as tanggal, COUNT(*) as jumlah_transaksi FROM tb_transaksi WHERE MONTH(tgl) = $currentMonth AND YEAR(tgl) = $currentYear GROUP BY DAY(tgl)";
$result = mysqli_query($koneksi, $query);
$labels = [];
$jumlah_transaksi = [];
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['tanggal'];
    $jumlah_transaksi[] = $row['jumlah_transaksi'];
}

// Chart PAI

$query_dibayar = "SELECT COUNT(*) as total_dibayar FROM tb_transaksi WHERE dibayar = 'dibayar'";
$result_dibayar = mysqli_query($koneksi, $query_dibayar);
$row_dibayar = mysqli_fetch_assoc($result_dibayar);
$total_dibayar = $row_dibayar['total_dibayar'];

$query_belum_dibayar = "SELECT COUNT(*) as total_belum_dibayar FROM tb_transaksi WHERE dibayar = 'belum_dibayar'";
$result_belum_dibayar = mysqli_query($koneksi, $query_belum_dibayar);
$row_belum_dibayar = mysqli_fetch_assoc($result_belum_dibayar);
$total_belum_dibayar = $row_belum_dibayar['total_belum_dibayar'];
?>



</main>

<!-- JS CHART -->

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Jumlah Transaksi',
            data: <?php echo json_encode($jumlah_transaksi); ?>,
            backgroundColor: '#90e0ef',
            borderColor: '#90e0ef',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Chart PAI

var ctx2 = document.getElementById('myPieChart').getContext('2d');
var myPieChart = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Dibayar', 'Belum Dibayar'],
        datasets: [{
            data: [<?php echo $total_dibayar; ?>, <?php echo $total_belum_dibayar; ?>],
            backgroundColor: [
                '#4CBB17',
                '#D5212E'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'Status Pembayaran',
                position: 'bottom',
                font: {
                    weight: 'bold'
                }
            }
        }
    }
});
</script>