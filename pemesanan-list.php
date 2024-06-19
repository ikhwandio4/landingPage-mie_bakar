<?php
// Include file untuk koneksi ke database dan fungsi-fungsi yang diperlukan
include 'koneksi.php';
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
  <title>RuangAdmin - DataTables</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Daftar Pemesanan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List Pemesanan</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ID Pemesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Loop untuk menampilkan data pemesanan -->
                      <?php
                      // Query untuk mengambil data pemesanan dari database
                      $query = "SELECT * FROM pemesanan";
                      $result = $conn->query($query);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row['id_pemesanan'] . "</td>";
                          echo "<td>" . $row['nama_pelanggan'] . "</td>";
                          echo "<td>" . $row['tanggal_pesan'] . "</td>";
                          echo "<td>" . number_format($row['total_pembayaran'], 0, ',', '.') . "</td>";
                          echo "<td>";
                          echo "<a href='pemesanan-edit.php?id=" . $row['id_pemesanan'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                          echo "<a href='pemesanan-list.php?hapus=" . $row['id_pemesanan'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pemesanan ini?\")'>Hapus</a>";
                          echo "</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='5'>Belum ada data pemesanan.</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
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
    <!---Content Wrapper-->

  </div>
  <!---Wrapper-->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>
