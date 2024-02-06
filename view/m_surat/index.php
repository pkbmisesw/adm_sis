
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

$master = "Surat";
$dba = "surat";
$ket = "";
$ketnama = "Silahkan mengisi nama";

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

        Master Data <?php echo $master; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables <?php echo $master; ?></a></li>
        <li class="active">Master Data <?php echo $master; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
            Tambah
              </button>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Master Data <?php echo $master; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Dokumen</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_surat` ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['tgl'];?></td>
                  <td>
                      <?php if ($data['url'] == ""){?>
                      --
                      <?php }else{?>
                      <a href="../../images/<?php echo $data['url'];?>">Lihat</a>
                      <?php }?>
                      </td>
                  <td>
                      
                      <?php if ($data['stat'] == "0"){?>
                      <b style="color:green;">Surat Masuk</b>
                      <?php }else if ($data['stat'] == "1"){?>
                      <b style="color:blue;">Surat Keluar</b>
                      <?php }else if ($data['stat'] == "2"){?>
                      <b style="color:red;">Produk Hukum</b>
                      <?php }?>
                      </td>
                  <td>
                  <button 
                      data-id="<?= $data['id'] ?>" 
                      data-nama="<?= $data['nama']?>"
                      data-tgl="<?= $data['tgl']?>"
                      data-stat="<?= $data['stat']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
                       <a href="edits.php?id=<?php echo $data['id']?>">✍</a>
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>
                  </td>
                </tr>

                <?php
                $count=$count+1;
                } 
                ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Dokumen</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
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

   <!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?php echo $master;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="../../controller/<?php echo $dba;?>_controller.php?op=tambah" method="post"  enctype="multipart/form-data">


          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" class="form-control"  name="nama" placeholder="<?php echo $ketnama. " ".$master. " ..."; ?>" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Tanggal :</label>
              <input type="text" class="form-control" name="tgl" />
          </div>
          
          <div class="form-group">
              <label class="col-form-label">Status :</label>
              <input type="text" class="form-control" name="stat" />
              <small style="color:red">* 0 = Surat Masuk, 1 = Surat Keluar, 2 = Produk Hukum</small>
          </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" name="upload" type="button" class="btn btn-primary" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form-edit-transaksi-masuk">

              <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="id_edit" name="id" />
                    
                    <div class="form-group">
                    <label class="control-label" >Nama : </label>        
                    <input type="text" class="form-control" id="nama_edit" name="nama" />
                        </div>

                  <div class="form-group">
                      <label class="control-label" >Tanggal : </label>        
                      <input type="text" class="form-control" id="tgl_edit" name="tgl" />
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label" >Status : </label>        
                      <input type="text" class="form-control" id="stat_edit" name="stat" />
                      <small style="color:red">* 0 = Surat Masuk, 1 = Surat Keluar, 2 = Produk Hukum</small>
                  </div>

              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save-update">Save changes</button>
              </div>
          </form>
        </div>
      </div>
    </div>



   
  
  <?php
  include '../footer.php';
  ?>

<script type="text/javascript">
     $(document).ready(function(){
        
        $('#btn-save-update').click(function(){
           $.ajax({
               url: "edit.php",
               type : 'post',
               data : $('#form-edit-transaksi-masuk').serialize(),
               success: function(data){
                   var res = JSON.parse(data);
                   if (res.code == 200){
                       alert('Success Update');
                       location.reload();
                   }
               }
           }) 
        });
        
        $(document).on('click','.btn_update',function(){
            console.log("Masuk");
            $("#id_edit").val($(this).attr('data-id'));
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#tgl_edit").val($(this).attr('data-tgl'));
            $("#stat_edit").val($(this).attr('data-stat'));
            $('#edit').modal('show');
        });
    });

    $(document).ready(function() {
      $('#tambah').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus');
      });

      $('#edit').on('shown.bs.modal', function() {
        $('#nik_edit').trigger('focus');
      });


    });
  </script> 
  
    

  <script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'scrollX'     : true,
      'autoWidth'   : false
    })
  })
</script>


</body>
</html>
