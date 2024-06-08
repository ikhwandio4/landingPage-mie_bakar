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
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span>Since last month</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                                <span>Since last year</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New User Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                                <span>Since last month</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                                <span>Since yesterday</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Row-->
                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <?php include 'footer.php'; ?>
            <!-- End of Footer -->
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="./RuangAdmin-master/vendor/jquery/jquery.min.js"></script>
    <script src="./RuangAdmin-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./RuangAdmin-master/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./RuangAdmin-master/js/ruang-admin.min.js"></script>
    <script src="./RuangAdmin-master/vendor/chart.js/Chart.min.js"></script>
    <script src="./RuangAdmin-master/js/demo/chart-area-demo.js"></script>
</body>

</html>
