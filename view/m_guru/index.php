
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

$master = "Guru_Tendik";
$dba = "guru_tendik";
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
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>NUPTK</th>
                    <th>Status Kepegawaian</th>
                    <th>NIP</th>
                    <th>TMT CPNS</th>
                    <th>TMT PNS</th>
                    <th>Pangkat Golongan</th>
                    <th>Masa Kerja</th>
                    <th>Tugas Tambahan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_guru_tendik` ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['sekolah'];?></td>
                    <td><?php echo $data['npsn'];?></td>
                    <td><?php echo $data['nama'];?></td>
                    <td><?php echo $data['alamat'];?></td>
                    <td><?php echo $data['nik'];?></td>
                    <td><?php echo $data['gender'];?></td>
                    <td><?php echo $data['ttl'];?></td>
                    <td><?php echo $data['agama'];?></td>
                    <td><?php echo $data['nuptk'];?></td>
                    <td><?php echo $data['status'];?></td>
                    <td><?php echo $data['nip'];?></td>
                    <td><?php echo $data['tmt_cpns'];?></td>
                    <td><?php echo $data['tmt_pns'];?></td>
                    <td><?php echo $data['p_gol'];?></td>
                    <td><?php echo $data['m_kerja'];?></td>
                    <td><?php echo $data['t_tambah'];?></td>
                  <td>
                  <button 
                        data-sekolah="<?= $data['sekolah'] ?>" 
                        data-npsn="<?= $data['npsn'] ?>" 
                        data-nama="<?= $data['nama']?>"
                        data-alamat="<?= $data['alamat']?>"
                        data-nik="<?= $data['nik']?>"
                        data-gender="<?= $data['gender']?>"
                        data-ttl="<?= $data['ttl']?>"
                        data-agama="<?= $data['agama']?>"
                        data-nuptk="<?= $data['nuptk']?>"
                        data-status="<?= $data['status']?>"
                        data-nip="<?= $data['nip']?>"
                        data-tmt_cpns="<?= $data['tmt_cpns']?>"
                        data-tmt_pns="<?= $data['tmt_pns']?>"
                        data-p_gol="<?= $data['p_gol']?>"
                        data-m_kerja="<?= $data['m_kerja']?>"
                        data-t_tambah="<?= $data['t_tambah']?>"
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
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>NUPTK</th>
                    <th>Status Kepegawaian</th>
                    <th>NIP</th>
                    <th>TMT CPNS</th>
                    <th>TMT PNS</th>
                    <th>Pangkat Golongan</th>
                    <th>Masa Kerja</th>
                    <th>Tugas Tambahan</th>
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
            <label class="col-form-label">Nama Satuan Pendidikan :</label>
            <input type="text" class="form-control" id="myInput" name="sekolah" placeholder="Silahkan isi Nama Satuan Pendidikan" />
            </div>
            
            <div class="form-group">
            <label class="control-label" >NPSN : </label>       
                <input type="text" class="form-control" name="npsn" placeholder="Silahkan Mengisi Nomor NPSN"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Nama Lengkap : </label>       
                <input type="text" class="form-control" name="nama" placeholder="Silahkan Mengisi Nama Lengkap"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Alamat : </label>       
                <input type="text" class="form-control" name="alamat" placeholder="Silahkan Mengisi Alamat"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >NIK : </label>       
                <input type="text" class="form-control" name="nik" placeholder="Silahkan Mengisi NIK"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jenis Kelamin : </label>       
                <input type="text" class="form-control" name="gender" placeholder="Silahkan Mengisi Jenis Kelamin"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Tempat Tanggal Lahir : </label>       
                <input type="text" class="form-control" name="ttl" placeholder="Silahkan Mengisi Tempat Lahir Anda"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Agama : </label>       
                <input type="text" class="form-control" name="agama" placeholder="Silahkan Mengisi Agama"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >NUPTK : </label>       
                <input type="text" class="form-control" name="nuptk" placeholder="Silahkan Mengisi Nomor NUPTK"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Status Kepegawaian : </label>       
                <input type="text" class="form-control" name="status" placeholder="Silahkan Mengisi Status Kepegawaian"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >NIP : </label>       
                <input type="text" class="form-control" name="nip" placeholder="Silahkan Mengisi NIP ANDA"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >TMT CPNS : </label>       
                <input type="text" class="form-control" name="tmt_cpns" placeholder="Silahkan Mengisi TMT CPNS"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >TMT PNS : </label>       
                <input type="text" class="form-control" name="tmt_pns" placeholder="Silahkan Mengisi TMT PNS"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangkat Golongan : </label>       
                <input type="text" class="form-control" name="p_gol" placeholder="Silahkan Mengisi Pangkat Golongan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Masa kerja : </label>       
                <input type="text" class="form-control" name="m_kerja" placeholder="Masukkan Masa kerja Anda"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Tugas Tambahan : </label>       
                <input type="text" class="form-control" name="t_tambah" placeholder="Masukkan Tugas Tambahan Anda"/>
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
                        <input type="text" class="form-control" id="sekolah_edit" name="sekolah" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >NPSN : </label>         
                        <input type="text" class="form-control" id="npsn_edit" name="npsn" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Nama Lengkap : </label>         
                        <input type="text" class="form-control" id="nama_edit" name="nama" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Alamat : </label>         
                        <input type="text" class="form-control" id="alamat_edit" name="alamat" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >NIK : </label>         
                        <input type="text" class="form-control" id="nik_edit" name="nik" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Jenis Kelamin : </label>         
                        <input type="text" class="form-control" id="gender_edit" name="gender" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Tempat Tanggal Lahir : </label>         
                        <input type="text" class="form-control" id="ttl_edit" name="ttl" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Agama : </label>         
                        <input type="text" class="form-control" id="agama_edit" name="agama" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >NUPTK : </label>         
                        <input type="text" class="form-control" id="nuptk_edit" name="nuptk" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Status Kepegawaian : </label>         
                        <input type="text" class="form-control" id="status_edit" name="status" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >NIP : </label>         
                        <input type="text" class="form-control" id="nip_edit" name="nip" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >TMT CPNS : </label>         
                        <input type="text" class="form-control" id="tmt_cpns_edit" name="tmt_cpns" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >TMT PNS : </label>         
                        <input type="text" class="form-control" id="tmt_pns_edit" name="tmt_pns" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Pangkat Golongan : </label>         
                        <input type="text" class="form-control" id="p_gol_edit" name="p_gol" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Masa Kerja : </label>         
                        <input type="text" class="form-control" id="m_kerja_edit" name="m_kerja" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Tugas Tambahan : </label>         
                        <input type="text" class="form-control" id="t_tambah_edit" name="t_tambah" />
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
            $("#sekolah_edit").val($(this).attr('data-sekolah'));
            $("#npsn_edit").val($(this).attr('data-npsn'));
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#alamat_edit").val($(this).attr('data-alamat'));
            $("#nik_edit").val($(this).attr('data-nik'));
            $("#gender_edit").val($(this).attr('data-gender'));
            $("#ttl_edit").val($(this).attr('data-ttl'));
            $("#agama_edit").val($(this).attr('data-agama'));
            $("#nuptk_edit").val($(this).attr('data-nuptk'));
            $("#status_edit").val($(this).attr('data-status'));
            $("#nip_edit").val($(this).attr('data-nip'));
            $("#tmt_cpns_edit").val($(this).attr('data-tmt_cpns'));
            $("#tmt_pns_edit").val($(this).attr('data-tmt_pns'));
            $("#p_gol_edit").val($(this).attr('data-p_gol'));
            $("#m_kerja_edit").val($(this).attr('data-m_kerja'));
            $("#t_tambah_edit").val($(this).attr('data-t_tambah'));
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
