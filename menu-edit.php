<?php
include 'menu.php';

// Get the menu ID from the URL
$id_menu = isset($_GET['id']) ? $_GET['id'] : null;

// Redirect to menu list if ID is not provided
if (!$id_menu) {
    header("Location: menu-list.php");
    exit;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $uploadFileDir = './uploaded_files/';
        // Check if directory exists, if not, create it
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $image = $newFileName;
        } else {
            echo 'There was some error moving the file to upload directory.';
            $image = null;
        }
    } else {
        $image = null;
    }

    if (updateMenu($id_menu, $nama, $harga, $deskripsi, $image)) {
        echo "Menu berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui menu.";
    }
}

// Fetch the menu details
$menu = ambilMenuById($id_menu);
if (!$menu) {
    header("Location: menu-list.php");
    exit;
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
  <title>Edit Menu</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Edit Menu</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="menu-list.php">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Menu</h6>
                </div>
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="menuName">Name</label>
                      <input type="text" class="form-control" id="menuName" name="nama" value="<?= $menu['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="menuPrice">Price</label>
                      <input type="number" class="form-control" id="menuPrice" name="harga" value="<?= $menu['harga'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="menuDescription">Description</label>
                      <textarea class="form-control" id="menuDescription" name="deskripsi" rows="3" required><?= $menu['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="menu-list.php" class="btn btn-secondary">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>

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

</body>

</html>
