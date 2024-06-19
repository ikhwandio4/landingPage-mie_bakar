<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mie Celaket</title>
    <link href="./RuangAdmin-master/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="./RuangAdmin-master/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./RuangAdmin-master/css/ruang-admin.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="./assets/img/logo.png">
                </div>
                <div class="sidebar-brand-text mx-3">Mie Celaket</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Features</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFormPenjualan" aria-expanded="true" aria-controls="collapseFormPenjualan">
                    <i class="fab fa-fw fa-wpforms"></i>
                    <span>Penjualan</span>
                </a>
                <div id="collapseFormPenjualan" class="collapse" aria-labelledby="headingFormPenjualan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Penjualan</h6>
                        <a class="collapse-item" href="pemesanan-list.php">Penjualan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFormMenu" aria-expanded="true" aria-controls="collapseFormMenu">
                    <i class="fab fa-fw fa-wpforms"></i>
                    <span>Menu Celaket</span>
                </a>
                <div id="collapseFormMenu" class="collapse" aria-labelledby="headingFormMenu" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu</h6>
                        <a class="collapse-item" href="menu-list.php">Menu</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTableKritikSaran" aria-expanded="true" aria-controls="collapseTableKritikSaran">
                    <i class="fas fa-envelope"></i>
                    <span>Kritik & Saran</span>
                </a>
                <div id="collapseTableKritikSaran" class="collapse" aria-labelledby="headingTableKritikSaran" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kritik & Saran</h6>
                        <a class="collapse-item" href="kritikSaran-list.php">Kritik Saran</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ulasan-list.php">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Ulasan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTableReservasi" aria-expanded="true" aria-controls="collapseTableReservasi">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Reservasi</span>
                </a>
                <div id="collapseTableReservasi" class="collapse" aria-labelledby="headingTableReservasi" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reservasi</h6>
                        <a class="collapse-item" href="reservasi-list.php">Daftar Reservasi</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Logout</div>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
    </div>

    <script src="./RuangAdmin-master/vendor/jquery/jquery.min.js"></script>
    <script src="./RuangAdmin-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./RuangAdmin-master/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./RuangAdmin-master/js/ruang-admin.min.js"></script>
    <script src="./RuangAdmin-master/vendor/chart.js/Chart.min.js"></script>
    <script src="./RuangAdmin-master/js/demo/chart-area-demo.js"></script>
</body>
</html>
