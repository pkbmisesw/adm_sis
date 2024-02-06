
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

$master = "Pengaturan";
$dba = "setting";

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
                $sql = "SELECT * FROM setting ORDER BY id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch();
                ?>
          
                <form action="../../controller/<?php echo $dba;?>_controller.php?op=edit" method="post"  enctype="multipart/form-data" class="form-horizontal">

                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                  
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Upload Logo/Icon</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" placeholder="Logo/Icon" name="berkas" >
                      <small>* favicon.png logo.png</small>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Pic Logo</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Pic Logo" name="logo" value="<?php echo $row['logo']; ?>">
                    </div>
                  </div>

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?php echo $row['nama']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" placeholder="description" name="des"><?php echo $row['des']; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Running Text</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Running Text" name="run_text" value="<?php echo $row['run_text']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nomor Wa</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="6285280000000" name="wa" value="<?php echo $row['wa']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Kalimat Wa</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Kalimat Wa" name="kata_wa" value="<?php echo $row['kata_wa']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">SEO</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="keyword" name="seo" value="<?php echo $row['seo']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="email" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Youtube Link</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="youtube" name="yt" value="<?php echo $row['yt']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Warna</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="warna" name="warna" value="<?php echo $row['warna']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Neon Warna</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="neon warna" name="neon" value="<?php echo $row['neon']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Skin</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="skin" name="skin" value="<?php echo $row['skin']; ?>">
                    <small>* blue, blue-light, yellow, yellow-light, green,	green-light, purple,	purple-light, red,	red-light, black,  black-light,</small>
                    </div>
                  </div>
                  
                  
                    
                    
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Pilihan Posisi Web</label>
                    <div class="col-sm-8">
                        <h5 style="color:red;">Atur Posisi Ketika Tampilan Website Pertama Kali dibuka Copy Paste nama php warna hitam dibagian bawah dan isi bagian tersebut sesuai keinginan</h5>
                    <br>
                    
                      <a>1. Slide - </a>w_slide.php<br>
                      <a>2. Konten - </a>w_konten.php<br>
                      <a>3. Video - </a>w_video.php<br>
                      <a>4. Tentang - </a>w_tentang.php<br>
                      <a>5. Populer - </a>w_populer.php<br>
                      <a>6. Berita - </a>w_berita.php<br>
                      <a>7. Mitra - </a>w_mitra.php<br>
                      <a>8. RunText - </a>w_run.php<br>
                      <a>9. Berita2 - </a>w_beritab.php<br>
                      <a>10. Total - </a>w_total.php<br>
                    </div>
                  </div>

                  
                  
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Posisi Satu</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="s_satu" name="s_satu" value="<?php echo $row['s_satu']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Posisi Dua</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="s_dua" name="s_dua" value="<?php echo $row['s_dua']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Posisi Tiga</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="s_tiga" name="s_tiga" value="<?php echo $row['s_tiga']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Posisi Empat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="s_empat" name="s_empat" value="<?php echo $row['s_empat']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Posisi Lima</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="s_lima" name="s_lima" value="<?php echo $row['s_lima']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Posisi Enam</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="s_enam" name="s_enam" value="<?php echo $row['s_enam']; ?>">
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

<script>

    $(document).ready(function() {
        $('#nama').trigger('focus');
    });
  </script> 
  
    



</body>
</html>
