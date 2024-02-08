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

$master = "Subpages";
$dba = "subpages";

?>

<?php
  include '../headernew.php';
  include '../sidebarnew.php';
  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="page-wrapper">
    <div class="page-content-wrapper">
      <div class="page-content">
        <!-- Content Header (Page header) -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Home</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"> </i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Table <?php echo $master; ?></li>
              </ol>
            </nav>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">


              <div class="card radius-15">
                <div class="card-body">
                  <div class="card-title">
                    <h3 class="box-title"><?php echo $master; ?></h3>
                  </div>


                  <?php
                $id = $_GET['id']; 
                $sql = "SELECT * FROM m_subpages WHERE id = $id ORDER BY id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch();
                ?>

                  <form action="../../controller/<?php echo $dba;?>_controller.php?op=edit" method="post"
                    enctype="multipart/form-data" class="form-horizontal">

                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Pages</label>
                      <div class="col-sm-8">
                        <select class="form-control select2" style="width: 100%;" name="pages_id">
                          <option value="<?php echo $row['pages_id'];?>"><?php echo $row['pages_id'];?></option>


                          <?php
                      $sqla = $conn->prepare("SELECT * FROM m_pages WHERE stat = 1 ");
                      $sqla->execute();
                      while($datab=$sqla->fetch()) {
                      ?>
                          <option value="<?php echo $datab['id'];?>"><?php echo $datab['nama'];?> -
                            <?php echo $datab['id'];?>
                          </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama"
                          value="<?php echo $row['nama']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-8">
                        <textarea id="editor1" class="form-control" placeholder="description"
                          name="des"><?php echo $row['des']; ?></textarea>
                      </div>
                    </div>



                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Update</button>
                      </div>
                    </div>
                  </form>

                  <!-- /.tab-pane -->



                  <!-- /.box-body -->
                </div>
              </div>

              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>





<?php
  include '../footer.php';
  ?>

<script src="../../public/bower_components/ckeditor/ckeditor.js"></script>

<script>
$(function() {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('editor1')
  //bootstrap WYSIHTML5 - text editor
  $('.textarea').wysihtml5()
})
</script>





</body>

</html>