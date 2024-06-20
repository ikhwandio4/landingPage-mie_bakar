<?php
// Include file untuk koneksi ke database dan fungsi-fungsi yang diperlukan
include 'koneksi.php';
if (isset($_GET['hapus'])) {
  $id_pemesanan = $_GET['hapus'];
  $query = "DELETE FROM reservasi WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id_pemesanan);
  if ($stmt->execute()) {
      echo "<script>alert('Data berhasil dihapus.'); window.location='reservasi-list.php';</script>";
  } else {
      echo "<script>alert('Gagal menghapus data.'); window.location='reservasi-list.php';</script>";
  }
  $stmt->close();
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
            <h1 class="h3 mb-0 text-gray-800">Daftar Reservasi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Reservasi</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List Reservasi</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ID Reservasi</th>
                        <th>Nama Pelanggan</th>
                        <th>No. Telepon</th>
                        <th>Tanggal Reservasi</th>
                        <th>Pukul</th>
                        <th>Jumlah Orang</th>
                        <th>Menu</th>
                        <th>Meja</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Loop untuk menampilkan data reservasi -->
                      <?php
                      // Query untuk mengambil data reservasi dari database
                      $query = "SELECT * FROM reservasi";
                      $result = $conn->query($query);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row['id'] . "</td>";
                          echo "<td>" . $row['nama'] . "</td>";
                          echo "<td>" . $row['no_telepon'] . "</td>";
                          echo "<td>" . $row['tanggal'] . "</td>";
                          echo "<td>" . $row['pukul'] . "</td>";
                          echo "<td>" . $row['jumlah_orang'] . "</td>";
                          echo "<td>" . $row['menu'] . "</td>";
                          echo "<td>" . $row['meja_id'] . "</td>";
                          echo "<td>";
                          echo "<a href='reservasi-edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                          echo "<a href='reservasi-list.php?hapus=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus reservasi ini?\")'>Hapus</a>";
                          echo "</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='9'>Belum ada data reservasi.</td></tr>";
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
