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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>REGISTRASI ADMIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">PENDAFTARAN ADMIN</p>
	
            <button type="button" class="btn btn-success btn-block btn-flat" data-toggle="modal" data-target="#exampleModal">ADMIN KELURAHAN</button>
            <button type="button" class="btn btn-primary btn-block btn-flat" data-toggle="modal" data-target="#adminkec">ADMIN KECAMATAN</button>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Admin Kelurahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="reg_admin.php" method="post" class="user" enctype="multipart/form-data">
               
            <div class="form-label-group">
                <input type="text" name="nik" class="form-control" placeholder="NIK" required autofocus>
                <label for="inputNIK"></label>
              </div>
              
              <div class="form-label-group">
                <input type="file" name="ktp" class="form-control" placeholder="KTP" required >
                <label for="inputKTP"><a style="color:red;">* KTP</a></label>
              </div>
           
            <div class="form-label-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required >
                <label for="inputEnama"></label>
            </div>
            
            <div class="form-label-group">
                <input type="text" name="hp" class="form-control" placeholder="Nomor hp / wa" required >
                <label for="inputHp"></label>
            </div>
            
            <div class="form-group">
              <label class="control-label">Kelurahan : </label>
              <select class="form-control" id="idtambah" name="id_kel" style="width: 100%">
                <option value="0">-- Pilih --</option>
                <?php
                   $sqld = $conn->prepare("SELECT * FROM `m_kelurahan` ORDER BY id DESC");
                   $sqld->execute();
                   while($datad=$sqld->fetch()) {
                ?>
                <option value="<?php echo $datad['id'];?>"><?php echo $datad['nama'];?></option>
                <?php } ?>
              </select>
            </div>
        
          <div class="form-label-group">
            <input type="email" name="email" class="form-control" placeholder="Email address" required >
            <label for="inputEmail"></label>
          </div>
    
          <div class="form-label-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <label for="inputPassword"></label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="daftar" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="adminkec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Admin Kecamatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="reg_adminkec.php" method="post" class="user" enctype="multipart/form-data">
               
            <div class="form-label-group">
                <input type="text" name="nik" class="form-control" placeholder="NIK" required autofocus>
                <label for="inputNIK"></label>
              </div>
              
              <div class="form-label-group">
                <input type="file" name="ktp" class="form-control" placeholder="KTP" required >
                <label for="inputKTP"><a style="color:red;">* KTP</a></label>
              </div>
           
            <div class="form-label-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required >
                <label for="inputEnama"></label>
            </div>
            
            <div class="form-label-group">
                <input type="text" name="hp" class="form-control" placeholder="Nomor hp / wa" required >
                <label for="inputHp"></label>
            </div>
            
            <div class="form-group">
              <label class="control-label">Kecamatan : </label>
              <select class="form-control" id="idtambah" name="id_kec" style="width: 100%">
                <option value="0">-- Pilih --</option>
                <?php
                   $sqld = $conn->prepare("SELECT * FROM `m_kecamatan` ORDER BY id DESC");
                   $sqld->execute();
                   while($datad=$sqld->fetch()) {
                ?>
                <option value="<?php echo $datad['id'];?>"><?php echo $datad['nama'];?></option>
                <?php } ?>
              </select>
            </div>
        
          <div class="form-label-group">
            <input type="email" name="email" class="form-control" placeholder="Email address" required >
            <label for="inputEmail"></label>
          </div>
    
          <div class="form-label-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <label for="inputPassword"></label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="daftar" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

 <script>
 $(function(){
  $('#idtambah').select2({
    dropdownParent: $('#tambah')
  });
}); 
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- jQuery 3 -->
<script src="public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="public/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
