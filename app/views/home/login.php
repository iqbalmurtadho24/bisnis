<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $data['judul'] ?></title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASEURL ?>css/adminlte/adminlte.min.css">
  <link rel="stylesheet" href="<?= BASEURL ?>css/login/login.css">
  <link rel="stylesheet" href="<?= BASEURL ?>css/notyf/notyf.min.css">

</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?= BASEURL ?>img/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="<?= BASEURL ?>img/logo.svg" alt="logo" class="logo">
              </div>

              <p class="login-card-description">Sign into your account</p>
              <form action="<?= BASEURL ?>home/do_login" method="post">
                <input type="hidden" name="token" value="">
                <div class="form-group">
                  <label class="sr-only">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" autoComplete='off'>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="***********">
                </div>
                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login" autoComplete='off'>
              </form>

              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <?= $data['pesan']?>
  <script src="<?= BASEURL ?>js/jquery/jquery-3.3.1.min.js"></script>
  <script src="<?= BASEURL ?>js/notyf/notyf.min.js"></script>
  <script src="<?= BASEURL ?>js/flasher.js"></script>
  <script src="<?= BASEURL ?>js/adminlte/adminlte.min.js"></script>
  <script src="<?= BASEURL ?>js/adminlte/bootstrap.bundle.min.js"></script>

</body>

</html>