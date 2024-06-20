<?php
// Include the file containing the database connection and functions
include 'koneksi.php';

// Fungsi untuk mengambil jumlah data dari masing-masing tabel
function countMenus() {
    global $conn;
    $query = "SELECT COUNT(*) AS jumlah FROM menu";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah'];
}

function countFeedbacks() {
    global $conn;
    $query = "SELECT COUNT(*) AS jumlah FROM kritiksaran";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah'];
}

function countOrders() {
    global $conn;
    $query = "SELECT COUNT(*) AS jumlah FROM pemesanan";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah'];
}

function countReservations() {
    global $conn;
    $query = "SELECT COUNT(*) AS jumlah FROM reservasi";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah'];
}

// Query untuk menampilkan menu yang paling sering dibeli
$query_top_menus = "SELECT m.id_menu, m.nama, m.harga, COUNT(p.id_pemesanan) AS jumlah_pemesanan
                    FROM menu m
                    LEFT JOIN pemesanan p ON m.id_menu = p.id_pemesanan
                    GROUP BY m.id_menu, m.nama, m.harga
                    ORDER BY jumlah_pemesanan DESC
                    LIMIT 5";

$result_top_menus = $conn->query($query_top_menus);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="./RuangAdmin-master/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="./RuangAdmin-master/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./RuangAdmin-master/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>

                    <div class="row mb-3">
                        <!-- Jumlah Menu Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Menu</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countMenus(); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-utensils fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Jumlah Kritik dan Saran Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Kritik dan Saran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countFeedbacks(); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comment-alt fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Jumlah Pemesanan Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Pemesanan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countOrders(); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Jumlah Reservasi Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Reservasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countReservations(); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-alt fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Row-->

                    <!-- Tabel untuk Menu yang Paling Sering Dibeli -->
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top 5 Menu yang Paling Sering Dibeli</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Jumlah Pemesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1; // Variabel untuk nomor urut
                                            if ($result_top_menus->num_rows > 0) {
                                                while ($row = $result_top_menus->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $no++ . "</td>"; // Menampilkan nomor urut dan menaikkannya setiap iterasi
                                                    echo "<td>" . $row['nama'] . "</td>";
                                                    echo "<td>" . $row['harga'] . "</td>";
                                                    echo "<td>" . $row['jumlah_pemesanan'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>No menu data available</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Tabel untuk Menu yang Paling Sering Dibeli -->

                </div>
                <!---Container Fluid-->

                <!-- Footer -->
                <?php include 'footer.php'; ?>
                <!-- End of Footer -->

            </div>
        </div>
        <!---Content Wrapper-->

    </div>
    <!---Wrapper-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="./RuangAdmin-master/vendor/jquery/jquery.min.js"></script>
    <script src="./RuangAdmin-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./RuangAdmin-master/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./RuangAdmin-master/js/ruang-admin.min.js"></script>
</body>

</html>
