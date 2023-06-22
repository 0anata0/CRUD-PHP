<?php

session_start();

include 'config/koneksi.php';
include 'config/controller.php';

//check apakah tombol login ditekan
if (isset($_POST['login'])) {
  //ambil input uname dan password
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  //check uname
  $result = mysqli_query($db, "SELECT * FROM data_akun WHERE username = '$username'");

  //jika ada usernya
  if (mysqli_num_rows($result) == 1) {
    //check passwordnya
    $hasil = mysqli_fetch_assoc($result);
    if (password_verify($password, $hasil['password'])) {
      // set session
      $_SESSION['login']    = true;
      $_SESSION['id_akun']  = $hasil['id_akun'];
      $_SESSION['nama']     = $hasil['nama'];
      $_SESSION['username'] = $hasil['username'];
      $_SESSION['email']    = $hasil['email'];
      $_SESSION['level']    = $hasil['level'];

      //jika login benar akan diarahkan ke file index.php
      header("Location: index.php");
      exit;
    }
  }
  //jika tidak ada usernya
  $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="generator" content="">
  <title>Login</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <link href="assets-temp/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="icon" href="assets-temp/dist/img/nins.jpg">

</head>

<body class="text-center">

  <main class="form-signin">
    <form class="align-items-center" action="" method="POST" style="max-width: 600px; margin: 0 auto;">
      <img class="mb-4" src="assets-temp/dist/img/cat.svg" alt="" width="100%" height="100%">
      <h3 class="mb-3 fw-normal">Let's Get Started!</h3>

      <div class="form-floating mb-3 w-100">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username...." required>
        <label for="floatingInput"><i class="fas fa-user"></i> Username</label>
      </div>
      <div class="form-floating mb-3 w-100">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password...." required>
        <label for="floatingPassword"><i class="fas fa-lock"></i> Password</label>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
      </svg>
      <?php if (isset($error)) : ?>
        <div class="alert alert-danger d-flex align-items-center w-100" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
          </svg>
          <div class="text-center">
            Username/Password salah
          <?php endif; ?>
          </div>
        </div>
        <button class="btn btn-primary" type="submit" name="login">Login</button>
    </form>

  </main>
  <p class="mt-5 mb-3 text-muted">Copyright &copy; Anata <?= date('Y'); ?></p>
</body>

</html>