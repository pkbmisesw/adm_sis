
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

$master = "Sekolah";
$dba = "sekolah";
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
                    <th>Nama Satuan Pendidikan</th>
                    <th>NPSN</th>
                    <th>Bentuk Pendidikan</th>
                    <th>Status Sekolah</th>
                    <th>Kecamatan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_sekolah` ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['nama'];?></td>
                    <td><?php echo $data['npsn'];?></td>
                    <td><?php echo $data['pendidikan'];?></td>
                    <td><?php echo $data['status'];?></td>
                    <td><?php echo $data['kecamatan'];?></td>
                  <td>
                  <button 
                        data-id="<?= $data['id'] ?>" 
                        data-nama="<?= $data['nama'] ?>" 
                        data-npsn="<?= $data['npsn']?>" 
                        data-pendidikan="<?= $data['pendidikan']?>"
                        data-status="<?= $data['status']?>"
                        data-kecamatan="<?= $data['kecamatan']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
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
                    <th>Nama Satuan Pendidikan</th>
                    <th>NPSN</th>
                    <th>Bentuk Pendidikan</th>
                    <th>Status Sekolah</th>
                    <th>Kecamatan</th>
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
            <label class="col-form-label">Nama Satuan Pendidikan:</label>
            <input type="text" class="form-control" id="myInput" name="nama" placeholder="Silahkan Masukan Nama Satuan Pendidikan" />
            </div>
            
            <div class="form-group">
            <label class="control-label" >NPSN : </label>       
                <input type="text" class="form-control" name="npsn" placeholder="Silahkan Mengisi Nomor NPSN"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Bentuk Pendidikan : </label>       
                <input type="text" class="form-control" name="pendidikan" placeholder="Silahkan Mengisi Bentuk Pendidikan"/>
                <small style="color:red;">* isi 1 untuk SD, status 2 untuk SMP</small>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Status Sekolah : </label>       
                <input type="text" class="form-control" name="status" placeholder="Silahkan Mengisi Status Sekolah"/>
                <small style="color:red;">* isi 1 untuk NEGERI, status 2 untuk SWASTA</small>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kecamatan : </label>       
                <input type="text" class="form-control" name="kecamatan" placeholder="Silahkan Mengisi Daerah Kecamatan"/>
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
                    <label class="control-label" >Nama Satuan Pendidikan : </label>        
                        <input type="text" class="form-control" id="nama_edit" name="nama" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >NPSN : </label>         
                        <input type="text" class="form-control" id="npsn_edit" name="npsn" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Bentuk Pendidikan : </label>         
                        <input type="text" class="form-control" id="pendidikan_edit" name="pendidikan" />
                        <small style="color:red;">* isi 1 untuk SD, status 2 untuk SMP</small>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Status Sekolah : </label>         
                        <input type="text" class="form-control" id="status_edit" name="status" />
                        <small style="color:red;">* isi 1 untuk NEGERI, status 2 untuk SWASTA</small>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Kecamatan : </label>         
                        <input type="text" class="form-control" id="kecamatan_edit" name="kecamatan" />
                        
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
            $("#npsn_edit").val($(this).attr('data-npsn'));
            $("#pendidikan_edit").val($(this).attr('data-pendidikan'));
            $("#status_edit").val($(this).attr('data-status'));
            $("#kecamatan_edit").val($(this).attr('data-kecamatan'));
            $('#edit').modal('show');
        });
    });

    $(document).ready(function() {
      $('#tambah').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus');
      });

      $('#edit').on('shown.bs.modal', function() {
        $('#nama_edit').trigger('focus');
      });


    });
  </script> 
  
    

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


</body>
</html>
