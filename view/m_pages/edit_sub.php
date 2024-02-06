
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

$master = "Sub Pages";
$dba = "subpages";

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
        <li><a href="#"><?php echo $master; ?></a></li>
        <li class="active"><?php echo $master; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $master; ?></h3>
            </div>
            
            

            <?php
				$id = $_GET['id']; 
                $sql = "SELECT * FROM m_subpages WHERE id = $id ORDER BY id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch();
                ?>
          
                <form action="../../controller/<?php echo $dba;?>_controller.php?op=edits" method="post"  enctype="multipart/form-data" class="form-horizontal">

                
                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nama" placeholder="Title" name="nama" value="<?php echo $row['nama']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Upload Images</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" value="" id="a" onchange="tes()" name="berkas">
                      <input type="hidden" class="form-control" placeholder="File" name="gambar" value="" id="b">
                    </div>
                  </div>
                  
                  <script>
                      function tes(){
                          document.getElementById("b").value = document.getElementById("a").files[0].name;;
                      }
                  </script>
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Short Desc</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" placeholder="short description atau link jika pakai icon" name="sdes"><?php echo $row['sdes']; ?></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                      <textarea id="editor1" class="form-control" placeholder="description" name="des"><?php echo $row['des']; ?></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Date" name="tgl" value="<?php echo $row['tgl']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Seo</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="SEO" name="seo" value="<?php echo $row['seo']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="stat" value="<?php echo $row['stat']; ?>">
                      <a>1. Memiliki Dropdown</a><br>
                      <a>2. Memiliki Link</a><br>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Url</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Url" name="url" value="<?php echo $row['url']; ?>">
                      <small style="color:red;">* url default adalah "subpages?p="</small>
                      <small style="color:blue;">* url lebar adalah "apages?p="</small>
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
