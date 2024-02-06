
<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if( $_SESSION['status_jabatan'] == "2" ){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "Pokja 3";
$dba = "datapokjac";
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
      
       <?php
        $sql = "SELECT * FROM m_kecamatan WHERE id = '".$_SESSION['id_kec']."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        echo "Kecamatan ".$row['nama'];
      ?>
      <br>
      <?php
        $sql = "SELECT * FROM m_kelurahan WHERE id = '".$_SESSION['id_kel']."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        echo "Kelurahan ".$row['nama'];
      ?>
      
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
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
            
                
             <thead class="rapi">
            <tr class="rapi">
                <th rowspan="3">No</th>
                <th rowspan="3">Nama Lingkungan</th>
                <th colspan="3">Jumlah Kader</th>
                <th colspan="8">Pangan</th>
                <th colspan="3">Jumlah Industri Rumah tangga</th>
                <th colspan="2">Jumlah Rumah</th>
                <th rowspan="3">Keterangan</th>
                <th rowspan="3">Aksi</th>
            </tr>
            <tr class="rapi">
                <th rowspan="2">Pangan</th>
                <th rowspan="2">Sandang</th>
                <th rowspan="2">Tata Laksana Rumah Tangga</th>
                <th colspan="2">Makanan Pokok</th>
                <th colspan="6">Pemanfatan Pekarangan/Hatinya PKK</th>
                <th rowspan="2">Pangan</th>
                <th rowspan="2">Sandang</th>
                <th rowspan="2">Jasa</th>
                <th rowspan="2">Sehat</th>
                <th rowspan="2">Tidak Sehat</th>
            </tr>
            <tr class="rapi">
                <th scope="col">Beras</th>
                <th scope="col">Non Beras</th>
                <th scope="col">Perternakan</th>
                <th scope="col">Perikanan</th>
                <th scope="col">Warung Hidup</th>
                <th scope="col">Lumbung Hidup</th>
                <th scope="col">Toga</th>
                <th scope="col">Tanaman Keras</th>
            </tr>
        </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `data_pokjac` WHERE id_kel = '".$_SESSION['id_kel']."'");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                    <td><?php echo $data['nama_ling'];?></td>
                	<td><?php echo $data['j_k_pangan'];?></td>
                    <td><?php echo $data['j_k_sandang'];?></td>
                    <td><?php echo $data['j_k_ta_rt'];?></td>
                    <td><?php echo $data['p_mp_beras'];?></td>
                    <td><?php echo $data['p_mp_nberas'];?></td>
                    <td><?php echo $data['p_pp_ternak'];?></td>
                    <td><?php echo $data['p_pp_ikan'];?></td>
                    <td><?php echo $data['p_pp_warung'];?></td>
                    <td><?php echo $data['p_pp_lumbung'];?></td>
                    <td><?php echo $data['p_pp_toga'];?></td>
                    <td><?php echo $data['p_pp_tkeras'];?></td>
                    <td><?php echo $data['ji_pangan'];?></td>
                    <td><?php echo $data['ji_sandang'];?></td>
                    <td><?php echo $data['ji_jasa'];?></td>
                    <td><?php echo $data['jr_sehat'];?></td>
                    <td><?php echo $data['jr_tsehat'];?></td>
                    <td><?php echo $data['ket'];?></td>
                  <td>
                  <button 
                      data-id="<?= $data['id'] ?>" 
                      data-nama_ling="<?= $data['nama_ling']?>"
                        data-j_k_pangan="<?= $data['j_k_pangan']?>"
                        data-j_k_sandang="<?= $data['j_k_sandang']?>"
                        data-j_k_ta_rt="<?= $data['j_k_ta_rt']?>"
                        data-p_mp_beras="<?= $data['p_mp_beras']?>"
                        data-p_mp_nberas="<?= $data['p_mp_nberas']?>"
                        data-p_pp_ternak="<?= $data['p_pp_ternak']?>"
                        data-p_pp_ikan="<?= $data['p_pp_ikan']?>"
                        data-p_pp_warung="<?= $data['p_pp_warung']?>"
                        data-p_pp_lumbung="<?= $data['p_pp_lumbung']?>"
                        data-p_pp_toga="<?= $data['p_pp_toga']?>"
                        data-p_pp_tkeras="<?= $data['p_pp_tkeras']?>"
                        data-ji_pangan="<?= $data['ji_pangan']?>"
                        data-ji_sandang="<?= $data['ji_sandang']?>"
                        data-ji_jasa="<?= $data['ji_jasa']?>"
                        data-jr_sehat="<?= $data['jr_sehat']?>"
                        data-jr_tsehat="<?= $data['jr_tsehat']?>"
                        data-ket="<?= $data['ket']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
                    
                    <!--<a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>-->
                  
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
                   <th>Nama Lingkungan</th>
                    <th>Jumlah Kader Pangan</th>
                    <th>Jumlah Kader Sandang</th>
                    <th>Jumlah Kader Rumah Tangga</th>
                    <th>Pangan Makanan Pokok Beras</th>
                    <th>Pangan Makanan Pokok Non Beras</th>
                    <th>Pangan Pemanfaatan Peternakan</th>
                    <th>Pangan Pemanfaatan Perikanan</th>
                    <th>Pangan Pemanfaatan Warung Hidup</th>
                    <th>Pangan Pemanfaatan Lumbung Hidup</th>
                    <th>Pangan Pemanfaatan Toga</th>
                    <th>Pangan Pemanfaatan Tanaman Keras</th>
                    <th>Jumlah Industri Pangan</th>
                    <th>Jumlah Industri Sandang</th>
                    <th>Jumlah Industri Jasa</th>
                    <th>Jumlah Rumah Sehat</th>
                    <th>Jumlah Rumah Tidak Sehat</th>
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
            <label class="control-label" >Nama Lingkungan : </label>       
                <input type="text" class="form-control" name="nama_ling" placeholder="Silahkan Mengisi Nama Lingkungan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Pangan : </label>       
                <input type="text" class="form-control" name="j_k_pangan" placeholder="Silahkan Mengisi Jumlah Kader Pangan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Sandang : </label>       
                <input type="text" class="form-control" name="j_k_sandang" placeholder="Silahkan Mengisi Jumlah Kader Sandang"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Rumah Tangga : </label>       
                <input type="text" class="form-control" name="j_k_ta_rt" placeholder="Silahkan Mengisi Jumlah Kader Rumah Tangga"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Pangan Makanan Pokok Beras : </label>       
                <input type="text" class="form-control" name="p_mp_beras" placeholder="Silahkan Mengisi Pangan Makanan Pokok Beras"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangan Makanan Pokok Non Beras : </label>       
                <input type="text" class="form-control" name="p_mp_nberas" placeholder="Silahkan Mengisi Pangan Makanan Pokok Non Beras"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangan Pemanfaatan Peternakan : </label>       
                <input type="text" class="form-control" name="p_pp_ternak" placeholder="Silahkan Mengisi Pangan Pemanfaatan Peternakan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangan Pemanfaatan Perikanan : </label>       
                <input type="text" class="form-control" name="p_pp_ikan" placeholder="Silahkan Mengisi Pangan Pemanfaatan Perikanan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangan Pemanfaatan Warung Hidup : </label>       
                <input type="text" class="form-control" name="p_pp_warung" placeholder="Silahkan Mengisi Pangan Pemanfaatan Warung Hidup"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangan Pemanfaatan Lumbung Hidup : </label>       
                <input type="text" class="form-control" name="p_pp_lumbung" placeholder="Silahkan Mengisi Pangan Pemanfaatan Lumbung Hidup"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangan Pemanfaatan Toga : </label>       
                <input type="text" class="form-control" name="p_pp_toga" placeholder="Silahkan Mengisi Pangan Pemanfaatan Toga"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pangan Pemanfaatan Tanaman Keras : </label>       
                <input type="text" class="form-control" name="p_pp_tkeras" placeholder="Silahkan Mengisi Pangan Pemanfaatan Tanaman Keras"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Industri Pangan : </label>       
                <input type="text" class="form-control" name="ji_pangan" placeholder="Silahkan Mengisi Jumlah Industri Pangan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Industri Sandang : </label>       
                <input type="text" class="form-control" name="ji_sandang" placeholder="Silahkan Mengisi Jumlah Industri Sandang"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Industri Jasa : </label>       
                <input type="text" class="form-control" name="ji_jasa" placeholder="Silahkan Mengisi Jumlah Industri Jasa"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Sehat : </label>       
                <input type="text" class="form-control" name="jr_sehat" placeholder="Silahkan Mengisi Jumlah Rumah Sehat"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Tidak Sehat : </label>       
                <input type="text" class="form-control" name="jr_tsehat" placeholder="Silahkan Mengisi Jumlah Rumah Tidak Sehat"/>
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
                <label class="control-label" >Nama Lingkungan : </label>         
                    <input type="text" class="form-control" id="nama_ling_edit" name="nama_ling" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Pangan : </label>         
                    <input type="text" class="form-control" id="j_k_pangan_edit" name="j_k_pangan" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Sandang : </label>         
                    <input type="text" class="form-control" id="j_k_sandang_edit" name="j_k_sandang" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Rumah Tangga : </label>         
                    <input type="text" class="form-control" id="j_k_ta_rt_edit" name="j_k_ta_rt" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Makanan Pokok Beras : </label>         
                    <input type="text" class="form-control" id="p_mp_beras_edit" name="p_mp_beras" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Makanan Pokok Non Beras : </label>         
                    <input type="text" class="form-control" id="p_mp_nberas_edit" name="p_mp_nberas" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Pemanfaatan Peternakan : </label>         
                    <input type="text" class="form-control" id="p_pp_ternak_edit" name="p_pp_ternak" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Pemanfaatan Perikanan : </label>         
                    <input type="text" class="form-control" id="p_pp_ikan_edit" name="p_pp_ikan" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Pemanfaatan Warung Hidup : </label>         
                    <input type="text" class="form-control" id="p_pp_warung_edit" name="p_pp_warung" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Pemanfaatan Lumbung Hidup : </label>         
                    <input type="text" class="form-control" id="p_pp_lumbung_edit" name="p_pp_lumbung" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Pemanfaatan Toga : </label>         
                    <input type="text" class="form-control" id="p_pp_toga_edit" name="p_pp_toga" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pangan Pemanfaatan Tanaman Keras : </label>         
                    <input type="text" class="form-control" id="p_pp_tkeras_edit" name="p_pp_tkeras" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Industri Pangan : </label>         
                    <input type="text" class="form-control" id="ji_pangan_edit" name="ji_pangan" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Industri Sandang : </label>         
                    <input type="text" class="form-control" id="ji_sandang_edit" name="ji_sandang" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Industri Jasa : </label>         
                    <input type="text" class="form-control" id="ji_jasa_edit" name="ji_jasa" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Sehat : </label>         
                    <input type="text" class="form-control" id="jr_sehat_edit" name="jr_sehat" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Tidak Sehat : </label>         
                    <input type="text" class="form-control" id="jr_tsehat_edit" name="jr_tsehat" readonly/>
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keterangan : </label>         
                    <input type="text" class="form-control" id="ket_edit" name="ket" />
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
            $("#nama_ling_edit").val($(this).attr('data-nama_ling'));
            $("#j_k_pangan_edit").val($(this).attr('data-j_k_pangan'));
            $("#j_k_sandang_edit").val($(this).attr('data-j_k_sandang'));
            $("#j_k_ta_rt_edit").val($(this).attr('data-j_k_ta_rt'));
            $("#p_mp_beras_edit").val($(this).attr('data-p_mp_beras'));
            $("#p_mp_nberas_edit").val($(this).attr('data-p_mp_nberas'));
            $("#p_pp_ternak_edit").val($(this).attr('data-p_pp_ternak'));
            $("#p_pp_ikan_edit").val($(this).attr('data-p_pp_ikan'));
            $("#p_pp_warung_edit").val($(this).attr('data-p_pp_warung'));
            $("#p_pp_lumbung_edit").val($(this).attr('data-p_pp_lumbung'));
            $("#p_pp_toga_edit").val($(this).attr('data-p_pp_toga'));
            $("#p_pp_tkeras_edit").val($(this).attr('data-p_pp_tkeras'));
            $("#ji_pangan_edit").val($(this).attr('data-ji_pangan'));
            $("#ji_sandang_edit").val($(this).attr('data-ji_sandang'));
            $("#ji_jasa_edit").val($(this).attr('data-ji_jasa'));
            $("#jr_sehat_edit").val($(this).attr('data-jr_sehat'));
            $("#jr_tsehat_edit").val($(this).attr('data-jr_tsehat'));
            $("#ket_edit").val($(this).attr('data-ket'));
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
