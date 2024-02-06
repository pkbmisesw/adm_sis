<?php
error_reporting(0);
include 'config.php';

if(!isset($_SESSION['email'] ) == 0) {
  header('Location: view/admin/');
}

if(isset($_POST['login'])) {
  $email    = $_POST['email'];
  $password = $_POST['password'];

  try {
    //$sql = "SELECT * FROM users WHERE name = :name AND password = :password";
    $sql = "SELECT * FROM m_user WHERE email = :email AND status_aktif = 1 AND level_id >= 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    //$stmt->bindParam(':password', $password);
    $stmt->execute();
    
    $row = $stmt->fetch();
    $hash_password = $row['password'];
    if (password_verify($password, $hash_password)){
      $count = $stmt->rowCount();
      if($count == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['level_id'] = $row['level_id'];
        $_SESSION['status_jabatan'] = $row['status_jabatan'];
        $_SESSION['id_kec'] = $row['id_kec'];
        $_SESSION['id_kel'] = $row['id_kel'];
        header("Location: view/admin/");
        return;
      }else{
        echo "<div class='notif'>Silahkan Lengkapi Data !</div>";
      }
    }
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
}


$sqla = "SELECT * FROM setting ORDER BY id DESC";
$stmta = $conn->prepare($sqla);
$stmta->execute();
$rowa = $stmta->fetch();

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $rowa['nama']; ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
  <!-- Icons CSS -->
  <link rel="stylesheet" href="assets/css/icons.css" />
  <!-- App CSS -->
  <link rel="stylesheet" href="assets/css/app.css" />
  <!-- Google Font -->

</head>

<body class="bg-login">
  <!-- <div class="login-box">
    <div class="login-logo">
      <a href="#"><b><?php echo $rowa['nama']; ?></b></a>
    </div>
     /.login-logo -->
  <!-- <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <-- /.col -->
  <!-- <div class="col-xs-4">
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">MASUK</button>
          </div> -->
  <!-- /.col -->
  <!-- </div>
      </form>

      <button type="button" class="btn btn-success btn-block btn-flat" data-toggle="modal"
        data-target="#exampleModal">DAFTAR PENGGUNA</button>
      <a href="./daftar_admin"><button type="button" class="btn btn-primary btn-block btn-flat">DAFTAR
          ADMIN</button></a> -->
  <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
  <!-- /.social-auth-links -->

  <!--<a href="#">I forgot my password</a><br>-->
  <!--<a href="register.html" class="text-center">Register a new membership</a>-->

  <!-- </div> -->
  <!-- /.login-box-body  -->
  <!-- </div> -->
  <!-- /.login-box -->

  <div class="wrapper">
    <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
      <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
          <div class="card radius-15 overflow-hidden">
            <div class="row g-0">
              <div class="col-xl-6">
                <div class="card-body p-5">
                  <div class="text-center">
                    <img src="assets/images/logo-icon.png" width="80" alt="" />
                    <h3 class="mt-4 font-weight-bold">
                      Welcome sss Back
                    </h3>
                  </div>
                  <div class="">
                    <div class="d-grid">
                      <a class="btn my-4 shadow-sm btn-white" href="javascript:;">
                        <span class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description" />
                          <span>Sign in with
                            Google</span>
                        </span>
                      </a>
                      <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign in with
                        Facebook</a>
                    </div>
                    <div class="login-separater text-center mb-4">
                      <span>OR SIGN IN WITH EMAIL</span>
                      <hr />
                    </div>
                    <div class="form-body">
                      <form class="row g-3" action="" method="post">
                        <div class="col-12">
                          <label for="inputEmailAddress" class="form-label">Email
                            Address</label>
                          <input type="email" class="form-control" id="inputEmailAddress" placeholder="Email Address"
                            name="email" />
                        </div>
                        <div class=" col-12">
                          <label for="inputChoosePassword" class="form-label">Enter
                            Password</label>
                          <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control border-end-0" name="password"
                              id="inputChoosePassword" value="12345678" placeholder="Enter Password" />
                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                class="bx bx-hide"></i></a>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="" />
                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                              Me</label>
                          </div>
                        </div>
                        <div class="col-md-6 text-end">
                          <a href="authentication-forgot-password.html">Forgot Password
                            ?</a>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary">
                              <i class="bx bxs-lock-open"></i>Sign in
                            </button>
                          </div>
                        </div>
                        <div class="col-12 text-center">
                          <p>
                            Don't have an
                            account yet?
                            <a href="authentication-signup.html">Sign up here</a>
                          </p>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                <img src="assets/images/login-images/login-frent-img.jpg" class="img-fluid" alt="..." />
              </div>
            </div>
            <!--end row-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="register.php" method="post" class="user" enctype="multipart/form-data">

            <div class="form-label-group">
              <input type="text" name="nik" class="form-control" placeholder="NIK" required autofocus>
              <label for="inputNIK"></label>
            </div>

            <div class="form-label-group">
              <input type="file" name="ktp" class="form-control" placeholder="KTP" required>
              <label for="inputKTP"><a style="color:red;">* Upload KTP</a></label>
            </div>

            <div class="form-label-group">
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
              <label for="inputEnama"></label>
            </div>

            <div class="form-label-group">
              <input type="text" name="hp" class="form-control" placeholder="Nomor hp / wa" required>
              <label for="inputHp"></label>
            </div>

            <div class="form-label-group">
              <input type="email" name="email" class="form-control" placeholder="Email address" required>
              <label for="inputEmail"></label>
            </div>

            <div class="form-label-group">
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <label for="inputPassword"></label>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery 3 -->
  <script src="public/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="public/plugins/iCheck/icheck.min.js"></script>
  <script>
  $(function() {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  </script>
</body>

</html>