<?php
// Include the file containing the database connection and functions
include 'menu.php';

// Handle delete request
if (isset($_GET['hapus'])) {
    $id_testimoni = $_GET['hapus'];
    if (hapusMenu($id_testimoni)) {
        echo "Ulasan berhasil dihapus.";
    } else {
        echo "Gagal menghapus ulasan.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Menu</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
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
                        <h1 class="h3 mb-0 text-gray-800">Ulasan</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu</li>
                        </ol>
                    </div>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- Main Content -->
            <div class="container-fluid">
                <!-- Data Table Example -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">List Menu</h6>
                            <a href="menu-add.php" class="btn btn-primary mb-3">Tambah</a>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                    
                                            <th>Nama</th>
                                            <th>harga</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Rows go here -->
                                        <?php
                                    $menu = ambilMenu();
                                    foreach ($menu as $u) {
                                        echo "<tr>";
                                        echo "<td>" . $u['nama'] . "</td>";
                                        echo "<td>" . $u['harga'] . "</td>";
                                        echo "<td>" . $u['deskripsi'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='menu-edit.php?id=" . $u['id_menu'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                                        echo "<a href='menu-list.php?hapus=" . $u['id_menu'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus ulasan ini?\")'>Hapus</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
             <!-- Footer -->
             <?php include 'footer.php'; ?>
            <!-- End of Footer --> 
    </div>
</div>


  <script src="./RuangAdmin-master/vendor/jquery/jquery.min.js"></script>
  <script src="./RuangAdmin-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./RuangAdmin-master/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="./RuangAdmin-master/js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="./RuangAdmin-master/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="./RuangAdmin-master/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  </body>
</html>