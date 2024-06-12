<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="./RuangAdmin-master/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="./RuangAdmin-master/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="./RuangAdmin-master/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login To Celaket</h1>
                  </div>
                  <!-- Tampilkan pesan error jika ada -->
                  <?php if (isset($_GET["error"])) : ?>
                      <p style="color: red;">Username atau password salah. Silakan coba lagi.</p>
                  <?php endif; ?>
                  <form class="user" method="POST" action="proses_login.php">
                    <div class="form-group">
                      <input type="text" class="form-control" name="username" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="./RuangAdmin-master/vendor/jquery/jquery.min.js"></script>
  <script src="./RuangAdmin-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./RuangAdmin-master/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="./RuangAdmin-master/js/ruang-admin.min.js"></script>
</body>
</html>
