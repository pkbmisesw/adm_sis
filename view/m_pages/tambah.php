
<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if( $_SESSION['level_id'] == "1" ){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "Pages";
$dba = "pages";

?>
 
  <?php
  include '../header.php';
  include '../sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

        <?php echo $master; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tambah <?php echo $master; ?></a></li>
        <li class="active"><?php echo $master; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah <?php echo $master; ?></h3>
            </div>
            

          
                <form action="../../controller/<?php echo $dba;?>_controller.php?op=tambah" method="post"  enctype="multipart/form-data" class="form-horizontal">
                  
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                      <textarea id="editor1" class="form-control" placeholder="description" name="des"></textarea>
                    </div>
                  </div>

                  

                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Tambah</button>
                    </div>
                  </div>
                </form>
          
              <!-- /.tab-pane -->



            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  

   
  
  <?php
  include '../footer.php';
  ?>

<script src="../../public/bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
  
    



</body>
</html>
