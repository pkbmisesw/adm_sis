
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

$master = "Admin Kelurahan";
$dba = "user";
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
        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">-->
        <!--    Tambah-->
        <!--      </button>-->
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
                  <th>Nik</th>
                  <th>Kelurahan</th>
                  <th>Nama</th>
                  <th>Level_id</th>
                  <th>Email</th>
                  <th>Status_aktif</th>
                  <th>Hp</th>
                  <th>Ktp</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_user` WHERE level_id = 2 AND status_jabatan = 2 ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $data['nik'];?></td>
                  <td>
                      <?php
                        $sqla = "SELECT * FROM m_kelurahan WHERE id = '".$data['id_kel']."'";
                        $stmta = $conn->prepare($sqla);
                        $stmta->execute();
                        $rowa = $stmta->fetch();
                        echo $rowa['nama'];
                      ?>
                  </td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['level_id'];?></td>
                  <td><?php echo $data['email'];?></td>
                  <td><?php echo $data['status_aktif'];?></td>
                  <td><?php echo $data['hp'];?></td>
                  <td><a href="../../images/<?php echo $data['ktp'];?>">Lihat</a></td>
                  <td>
                  <button 
                      data-id="<?= $data['id'] ?>" 
                      data-nik="<?= $data['nik']?>"
                      data-nama="<?= $data['nama']?>"
                      data-level_id="<?= $data['level_id']?>"
                      data-email="<?= $data['email']?>"
                      data-status_aktif="<?= $data['status_aktif']?>"
                      data-hp="<?= $data['hp']?>"
                      data-ktp="<?= $data['ktp']?>"
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
                  <th>Nik</th>
                  <th>Kelurahan</th>
                  <th>Nama</th>
                  <th>Level_id</th>
                  <th>Email</th>
                  <th>Status_aktif</th>
                  <th>Hp</th>
                  <th>Ktp</th>
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
              <label class="col-form-label">Nik :</label>
              <input type="text" class="form-control" id="myInput" name="nik" />
          </div>

          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" class="form-control"  name="nama" placeholder="<?php echo $ketnama. " ".$master. " ..."; ?>" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Level_id :</label>
              <input type="text" class="form-control" name="level_id" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Email :</label>
              <input type="text" class="form-control" name="email" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Password :</label>
              <input type="password" class="form-control" name="password" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Status_aktif :</label>
              <input type="text" class="form-control" name="status_aktif" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Hp :</label>
              <input type="text" class="form-control" name="hp" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Ktp :</label>
              <input type="text" class="form-control" name="ktp" />
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
                      <label class="control-label" >Nik : </label>        
                      <input type="text" class="form-control" id="nik_edit" name="nik" />
                  </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Nama : </label>        
                    <input type="text" class="form-control" id="nama_edit" name="nama" />
                        </div>
                  
                  

                  <div class="form-group">
                      <label class="control-label" >Level_id : </label>        
                      <input type="text" class="form-control" id="level_id_edit" name="level_id" />
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Email : </label>        
                      <input type="text" class="form-control" id="email_edit" name="email" />
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Status_aktif : </label>        
                      <input type="text" class="form-control" id="status_aktif_edit" name="status_aktif" />
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Hp : </label>        
                      <input type="text" class="form-control" id="hp_edit" name="hp" />
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Ktp : </label>        
                      <input type="text" class="form-control" id="ktp_edit" name="ktp" />
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
            $("#nik_edit").val($(this).attr('data-nik'));
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#level_id_edit").val($(this).attr('data-level_id'));
            $("#email_edit").val($(this).attr('data-email'));
            $("#status_aktif_edit").val($(this).attr('data-status_aktif'));
            $("#hp_edit").val($(this).attr('data-hp'));
            $("#ktp_edit").val($(this).attr('data-ktp'));
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
