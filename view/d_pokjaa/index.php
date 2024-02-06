
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

$master = "Pokja 1";
$dba = "dpokjaa";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>
 
  <?php
  include '../header.php';
  include '../sidebar.php';
  ?>

 <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid black;
}

th, td {
  padding: 8px;
  text-align: center;
  vertical-align: middle;
  border: 1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>  
  
<style>
    .rapi{
        text-align: center;
        vertical-align: middle;
    }
</style>
  
<link rel="stylesheet" href="../../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <!--<thead>-->
                <!--<tr>-->
                <!--  <th>No</th>-->
                <!--  <th>Kecamatan</th>-->
                <!--    <th>Kelurahan</th>-->
                <!--    <th>Lingkungan</th>-->
                <!--    <th>PKK RW</th>-->
                <!--    <th>PKK RT</th>-->
                <!--    <th>Dasa Wisma</th>-->
                <!--    <th>Kepala Rumah Tangga</th>-->
                <!--    <th>Kepala Keluarga</th>-->
                <!--    <th>Jumlah Laki</th>-->
                <!--    <th>Jumlah Perempuan</th>-->
                <!--    <th>Anggota Laki</th>-->
                <!--    <th>Anggota Perempuan</th>-->
                <!--    <th>Umum Laki</th>-->
                <!--    <th>Umum Perempuan</th>-->
                <!--    <th>Khusus Laki</th>-->
                <!--    <th>Khusus Perempuan</th>-->
                <!--    <th>Honor Laki</th>-->
                <!--    <th>Honor Perempuan</th>-->
                <!--    <th>Bantuan Laki</th>-->
                <!--    <th>Bantuan Perempuan</th>-->
                <!--    <th>Keterangan</th>-->
                <!--  <th>Aksi</th>-->
                <!--</tr>-->
                <!--</thead>-->
                
                
                
                 <thead class="rapi">
                      <tr class="rapi">
                        <th rowspan="3">No</th>
                        <th rowspan="3">No Urut</th>
                        <th rowspan="3">Kecamatan</th>
                        <th colspan="3">Jumlah Kader</th>
                        <th colspan="8">Penghayatan dan pengamalan pancasila</th>
                        <th colspan="5">Gotong royong</th>
                        <th rowspan="3">Keterangan</th>
                        <th rowspan="3">Aksi</th>
                      </tr>
                      <tr class="rapi">
                        <th rowspan="2">PKBN</th>
                        <th rowspan="2">PKDRT</th>
                        <th rowspan="2">POLA ASUH</th>
                        <th colspan="2">PKBN</th>
                        <th colspan="2">PKDRT</th>
                        <th colspan="2">Pola Asuh</th>
                        <th colspan="2">Lansia</th>
                        <th colspan="5">Jumlah Kelompok</th>
                      </tr>
                      <tr class="rapi">
                        <th >Jumlah kelompok simulasi</th>
                        <th >Jumlah Anggota</th>
                        <th >Jumlah kelompok simulasi</th>
                        <th >Jumlah Anggota</th>
                        <th >Jumlah kelompok simulasi</th>
                        <th >Jumlah Anggota</th>
                        <th >Jumlah kelompok simulasi</th>
                        <th >Jumlah Anggota</th>
                        <th >Kerja Bakti</th>
                        <th >Rukun Kematian</th>
                        <th >Keagamaan</th>
                        <th >Jimpitan</th>
                        <th >Arisan</th>
                        
                      </tr>
                    </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `d_pokjaa` WHERE status IN (1,3) ORDER BY no_urut ASC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td>
                       <button 
                      data-id="<?= $data['id'] ?>" 
                       data-kecamatan="<?= $data['kecamatan']?>"
                        data-j_pkbn="<?= $data['j_pkbn']?>"
                        data-j_pkdrt="<?= $data['j_pkdrt']?>"
                        data-pola="<?= $data['pola']?>"
                        data-p_pkbn_sim="<?= $data['p_pkbn_sim']?>"
                        data-p_pkbn_anggota="<?= $data['p_pkbn_anggota']?>"
                        data-p_pkdrt_sim="<?= $data['p_pkdrt_sim']?>"
                        data-p_pkdrt_anggota="<?= $data['p_pkdrt_anggota']?>"
                        data-pola_kel="<?= $data['pola_kel']?>"
                        data-pola_anggota="<?= $data['pola_anggota']?>"
                        data-lansia_kel="<?= $data['lansia_kel']?>"
                        data-lansia_anggota="<?= $data['lansia_anggota']?>"
                        data-g_jum_ker="<?= $data['g_jum_ker']?>"
                        data-g_jum_ruk="<?= $data['g_jum_ruk']?>"
                        data-g_jum_agama="<?= $data['g_jum_agama']?>"
                        data-g_jum_jimpit="<?= $data['g_jum_jimpit']?>"
                        data-g_jum_arisan="<?= $data['g_jum_arisan']?>"
                        data-ket="<?= $data['ket']?>"
                        data-status="<?= $data['status']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
                      -
                      [<?php echo $data['no_urut'];?>]
                  </td>
                  <td><a href="kel?p=<?php echo $data['id'];?>&s=2&kec=<?php echo $data['kecamatan'];?>"><?php echo $data['kecamatan'];?></a></td>
                    <td><?php echo $data['j_pkbn'];?></td>
                	<td><?php echo $data['j_pkdrt'];?></td>
                	<td><?php echo $data['pola'];?></td>
                	<td><?php echo $data['p_pkbn_sim'];?></td>
                	<td><?php echo $data['p_pkbn_anggota'];?></td>
                	<td><?php echo $data['p_pkdrt_sim'];?></td>
                	<td><?php echo $data['p_pkdrt_anggota'];?></td>
                	<td><?php echo $data['pola_kel'];?></td>
                	<td><?php echo $data['pola_anggota'];?></td>
                	<td><?php echo $data['lansia_kel'];?></td>
                	<td><?php echo $data['lansia_anggota'];?></td>
                	<td><?php echo $data['g_jum_ker'];?></td>
                	<td><?php echo $data['g_jum_ruk'];?></td>
                	<td><?php echo $data['g_jum_agama'];?></td>
                	<td><?php echo $data['g_jum_jimpit'];?></td>
                	<td><?php echo $data['g_jum_arisan'];?></td>
                	<td><?php echo $data['ket'];?></td>
                  <td>
                 
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
                  <th>No Urut</th>
                   <th>Kecamatan</th>
                    <th>Jumlah Kader PKBN</th>
                    <th>Jumlah Kader PKDRT</th>
                    <th>Pola Asuh</th>
                    <th>Peng PKBN Simulasi</th>
                    <th>Peng PKBN Anggota</th>
                    <th>Peng PKDRT Simulasi</th>
                    <th>Peng PKDRT Anggota</th>
                    <th>Pola Asuh Kelompok</th>
                    <th>Pola Asuh Anggota</th>
                    <th>Lansia Kelompok</th>
                    <th>Lansia Anggota</th>
                    <th>Gotong Royong Kel Bakti</th>
                    <th>Gotong Royong Kel Rukun</th>
                    <th>Gotong Royong Kel Agama</th>
                    <th>Gotong Royong Kel Jimpitan</th>
                    <th>Gotong Royong Kel Arisan</th>
                    <th>Keterangan</th>
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
            <label class="control-label" >Kecamatan : </label>       
                <input type="text" class="form-control" name="kecamatan" placeholder="Silahkan Mengisi Kecamatan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader PKBN : </label>       
                <input type="text" class="form-control" name="j_pkbn" placeholder="Silahkan Mengisi Jumlah Kader PKBN"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader PKDRT : </label>       
                <input type="text" class="form-control" name="j_pkdrt" placeholder="Silahkan Mengisi Jumlah Kader PKDRT"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pola Asuh : </label>       
                <input type="text" class="form-control" name="pola" placeholder="Silahkan Mengisi Pola Asuh"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Peng PKBN Simulasi : </label>       
                <input type="text" class="form-control" name="p_pkbn_sim" placeholder="Silahkan Mengisi Peng PKBN Simulasi"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Peng PKBN Anggota : </label>       
                <input type="text" class="form-control" name="p_pkbn_anggota" placeholder="Silahkan Mengisi Peng PKBN Anggota"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Peng PKDRT Simulasi : </label>       
                <input type="text" class="form-control" name="p_pkdrt_sim" placeholder="Silahkan Mengisi Peng PKDRT Simulasi"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Peng PKDRT Anggota : </label>       
                <input type="text" class="form-control" name="p_pkdrt_anggota" placeholder="Silahkan Mengisi Peng PKDRT Anggota"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pola Asuh Kelompok : </label>       
                <input type="text" class="form-control" name="pola_kel" placeholder="Silahkan Mengisi Pola Asuh Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pola Asuh Anggota : </label>       
                <input type="text" class="form-control" name="pola_anggota" placeholder="Silahkan Mengisi Pola Asuh Anggota"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Lansia Kelompok : </label>       
                <input type="text" class="form-control" name="lansia_kel" placeholder="Silahkan Mengisi Lansia Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Lansia Anggota : </label>       
                <input type="text" class="form-control" name="lansia_anggota" placeholder="Silahkan Mengisi Lansia Anggota"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Gotong Royong Kel Bakti : </label>       
                <input type="text" class="form-control" name="g_jum_ker" placeholder="Silahkan Mengisi Gotong Royong Kel Bakti"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Gotong Royong Kel Rukun : </label>       
                <input type="text" class="form-control" name="g_jum_ruk" placeholder="Silahkan Mengisi Gotong Royong Kel Rukun"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Gotong Royong Kel Agama : </label>       
                <input type="text" class="form-control" name="g_jum_agama" placeholder="Silahkan Mengisi Gotong Royong Kel Agama"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Gotong Royong Kel Jimpitan : </label>       
                <input type="text" class="form-control" name="g_jum_jimpit" placeholder="Silahkan Mengisi Gotong Royong Kel Jimpitan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Gotong Royong Kel Arisan : </label>       
                <input type="text" class="form-control" name="g_jum_arisan" placeholder="Silahkan Mengisi Gotong Royong Kel Arisan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keterangan : </label>       
                <input type="text" class="form-control" name="ket" placeholder="Silahkan Mengisi Keterangan"/>
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
                <label class="control-label" >No Urut : </label>        
                    <input type="text" class="form-control" id="no_urut_edit" name="no_urut" />
                </div>
                    
    			   <div class="form-group">
                <label class="control-label" >Kecamatan : </label>         
                    <input type="text" class="form-control" id="kecamatan_edit" name="kecamatan" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader PKBN : </label>         
                    <input type="text" class="form-control" id="j_pkbn_edit" name="j_pkbn" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader PKDRT : </label>         
                    <input type="text" class="form-control" id="j_pkdrt_edit" name="j_pkdrt" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pola Asuh : </label>         
                    <input type="text" class="form-control" id="pola_edit" name="pola" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Peng PKBN Simulasi : </label>         
                    <input type="text" class="form-control" id="p_pkbn_sim_edit" name="p_pkbn_sim" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Peng PKBN Anggota : </label>         
                    <input type="text" class="form-control" id="p_pkbn_anggota_edit" name="p_pkbn_anggota" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Peng PKDRT Simulasi : </label>         
                    <input type="text" class="form-control" id="p_pkdrt_sim_edit" name="p_pkdrt_sim" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Peng PKDRT Anggota : </label>         
                    <input type="text" class="form-control" id="p_pkdrt_anggota_edit" name="p_pkdrt_anggota" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pola Asuh Kelompok : </label>         
                    <input type="text" class="form-control" id="pola_kel_edit" name="pola_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pola Asuh Anggota : </label>         
                    <input type="text" class="form-control" id="pola_anggota_edit" name="pola_anggota" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Lansia Kelompok : </label>         
                    <input type="text" class="form-control" id="lansia_kel_edit" name="lansia_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Lansia Anggota : </label>         
                    <input type="text" class="form-control" id="lansia_anggota_edit" name="lansia_anggota" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Gotong Royong Kel Bakti : </label>         
                    <input type="text" class="form-control" id="g_jum_ker_edit" name="g_jum_ker" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Gotong Royong Kel Rukun : </label>         
                    <input type="text" class="form-control" id="g_jum_ruk_edit" name="g_jum_ruk" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Gotong Royong Kel Agama : </label>         
                    <input type="text" class="form-control" id="g_jum_agama_edit" name="g_jum_agama" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Gotong Royong Kel Jimpitan : </label>         
                    <input type="text" class="form-control" id="g_jum_jimpit_edit" name="g_jum_jimpit" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Gotong Royong Kel Arisan : </label>         
                    <input type="text" class="form-control" id="g_jum_arisan_edit" name="g_jum_arisan" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keterangan : </label>         
                    <input type="text" class="form-control" id="ket_edit" name="ket" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Status : </label>         
                    <input type="text" class="form-control" id="status_edit" name="status" />
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


<!--<link rel="stylesheet" href="../../public/bower_components/bootstrap/dist/css/bootstrap.min.css">-->
<!--<script src="../../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>-->
<!--<script src="../../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->



 
  
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
            $("#no_urut_edit").val($(this).attr('data-no_urut'));
            $("#kecamatan_edit").val($(this).attr('data-kecamatan'));
            $("#j_pkbn_edit").val($(this).attr('data-j_pkbn'));
            $("#j_pkdrt_edit").val($(this).attr('data-j_pkdrt'));
            $("#pola_edit").val($(this).attr('data-pola'));
            $("#p_pkbn_sim_edit").val($(this).attr('data-p_pkbn_sim'));
            $("#p_pkbn_anggota_edit").val($(this).attr('data-p_pkbn_anggota'));
            $("#p_pkdrt_sim_edit").val($(this).attr('data-p_pkdrt_sim'));
            $("#p_pkdrt_anggota_edit").val($(this).attr('data-p_pkdrt_anggota'));
            $("#pola_kel_edit").val($(this).attr('data-pola_kel'));
            $("#pola_anggota_edit").val($(this).attr('data-pola_anggota'));
            $("#lansia_kel_edit").val($(this).attr('data-lansia_kel'));
            $("#lansia_anggota_edit").val($(this).attr('data-lansia_anggota'));
            $("#g_jum_ker_edit").val($(this).attr('data-g_jum_ker'));
            $("#g_jum_ruk_edit").val($(this).attr('data-g_jum_ruk'));
            $("#g_jum_agama_edit").val($(this).attr('data-g_jum_agama'));
            $("#g_jum_jimpit_edit").val($(this).attr('data-g_jum_jimpit'));
            $("#g_jum_arisan_edit").val($(this).attr('data-g_jum_arisan'));
            $("#ket_edit").val($(this).attr('data-ket'));
            $("#status_edit").val($(this).attr('data-status'));
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
