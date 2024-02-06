
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

$master = "Umum";
$dba = "dumum";
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
                <thead class="rapi">
                  <tr class="rapi">
                    <th rowspan="3">No</th>
                    <th rowspan="3">No Urut</th>
                    <th rowspan="3">Kecamatan</th>
                    <th colspan="5" class="rapi">Jumlah Kelompok</th>
                    <th colspan="2" class="rapi">Jumlah</th>
                    <th colspan="2">Jumlah Jiwa</th>
                    <th colspan="6">Jumlah Kader</th>
                    <th colspan="4">Jumlah Tenaga Sekertariat</th>
                    <th rowspan="3">Keterangan</th>
                    <th rowspan="3">Aksi</th>
                  </tr>
                  <tr class="rapi">
                    <th rowspan="2">Kelurahan</th>
                    <th rowspan="2">Lingkungan</th>
                    <th rowspan="2">PKK RW</th>
                    <th rowspan="2">PKK RT</th>
                    <th rowspan="2">Dasawisma</th>
                    <th rowspan="2">Kepala Rumah Tangga</th>
                    <th rowspan="2">Kepala Keluarga</th>
                    <th rowspan="2">L</th>
                    <th rowspan="2">P</th>
                    <th colspan="2">Anggota TP PKK</th>
                    <th colspan="2">Umum</th>
                    <th colspan="2">Khusus</th>
                    <th colspan="2">Honorer</th>
                    <th colspan="2">Bantuan</th>
                  </tr>
                  <tr class="rapi">
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `d_umum` WHERE status IN (1,3) ORDER BY no_urut ASC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td>
                       <button 
                      data-id="<?= $data['id'] ?>" 
                      data-no_urut="<?= $data['no_urut'] ?>" 
                      data-kecamatan="<?= $data['kecamatan'] ?>" 
                        data-kelurahan="<?= $data['kelurahan']?>" 
                        data-ling="<?= $data['ling']?>"
                        data-p_rw="<?= $data['p_rw']?>"
                        data-p_rt="<?= $data['p_rt']?>"
                        data-dasa="<?= $data['dasa']?>"
                        data-k_rumah="<?= $data['k_rumah']?>"
                        data-kk="<?= $data['kk']?>"
                        data-j_laki="<?= $data['j_laki']?>"
                        data-j_perempuan="<?= $data['j_perempuan']?>"
                        data-a_laki="<?= $data['a_laki']?>"
                        data-a_perempuan="<?= $data['a_perempuan']?>"
                        data-u_laki="<?= $data['u_laki']?>"
                        data-u_perempuan="<?= $data['u_perempuan']?>"
                        data-k_laki="<?= $data['k_laki']?>"
                        data-k_perempuan="<?= $data['k_perempuan']?>"
                        data-h_laki="<?= $data['h_laki']?>"
                        data-h_perempuan="<?= $data['h_perempuan']?>"
                        data-b_laki="<?= $data['b_laki']?>"
                        data-b_perempuan="<?= $data['b_perempuan']?>"
                        data-ket="<?= $data['ket']?>"
                        data-status="<?= $data['status']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
                      -
                      [<?php echo $data['no_urut'];?>]
                  </td>
                  <td><a href="kel?p=<?php echo $data['id'];?>&s=2&kec=<?php echo $data['kecamatan'];?>"><?php echo $data['kecamatan'];?></a></td>
                    <td><?php echo $data['kelurahan'];?></td>
                    <td><?php echo $data['ling'];?></td>
                    <td><?php echo $data['p_rw'];?></td>
                    <td><?php echo $data['p_rt'];?></td>
                	<td><?php echo $data['dasa'];?></td>
                	<td><?php echo $data['k_rumah'];?></td>
                	<td><?php echo $data['kk'];?></td>
                	<td><?php echo $data['j_laki'];?></td>
                	<td><?php echo $data['j_perempuan'];?></td>
                	<td><?php echo $data['a_laki'];?></td>
                	<td><?php echo $data['a_perempuan'];?></td>
                	<td><?php echo $data['u_laki'];?></td>
                	<td><?php echo $data['u_perempuan'];?></td>
                	<td><?php echo $data['k_laki'];?></td>
                	<td><?php echo $data['k_perempuan'];?></td>
                	<td><?php echo $data['h_laki'];?></td>
                	<td><?php echo $data['h_perempuan'];?></td>
                	<td><?php echo $data['b_laki'];?></td>
                	<td><?php echo $data['b_perempuan'];?></td>
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
                    <th>Kelurahan</th>
                    <th>Lingkungan</th>
                    <th>PKK RW</th>
                    <th>PKK RT</th>
                    <th>Dasa Wisma</th>
                    <th>Kepala Rumah Tangga</th>
                    <th>Kepala Keluarga</th>
                    <th>Jumlah Laki</th>
                    <th>Jumlah Perempuan</th>
                    <th>Anggota Laki</th>
                    <th>Anggota Perempuan</th>
                    <th>Umum Laki</th>
                    <th>Umum Perempuan</th>
                    <th>Khusus Laki</th>
                    <th>Khusus Perempuan</th>
                    <th>Honor Laki</th>
                    <th>Honor Perempuan</th>
                    <th>Bantuan Laki</th>
                    <th>Bantuan Perempuan</th>
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
            <label class="col-form-label">Kecamatan:</label>
            <input type="text" class="form-control" id="myInput" name="kecamatan" placeholder="Silahkan Masukan Kecamatan" />
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kelurahan : </label>       
                <input type="text" class="form-control" name="kelurahan" placeholder="Silahkan Mengisi Kelurahan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Lingkungan : </label>       
                <input type="text" class="form-control" name="ling" placeholder="Silahkan Mengisi Lingkungan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >PKK RW : </label>       
                <input type="text" class="form-control" name="p_rw" placeholder="Silahkan Mengisi PKK RW"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >PKK RT : </label>       
                <input type="text" class="form-control" name="p_rt" placeholder="Silahkan Mengisi PKK RT"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Dasa Wisma : </label>       
                <input type="text" class="form-control" name="dasa" placeholder="Silahkan Mengisi Dasa Wisma"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kepala Rumah Tangga : </label>       
                <input type="text" class="form-control" name="k_rumah" placeholder="Silahkan Mengisi Kepala Rumah Tangga"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kepala Keluarga : </label>       
                <input type="text" class="form-control" name="kk" placeholder="Silahkan Mengisi Kepala Keluarga"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Laki : </label>       
                <input type="text" class="form-control" name="j_laki" placeholder="Silahkan Mengisi Jumlah Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Perempuan : </label>       
                <input type="text" class="form-control" name="j_perempuan" placeholder="Silahkan Mengisi Jumlah Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Anggota Laki : </label>       
                <input type="text" class="form-control" name="a_laki" placeholder="Silahkan Mengisi Anggota Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Anggota Perempuan : </label>       
                <input type="text" class="form-control" name="a_perempuan" placeholder="Silahkan Mengisi Anggota Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Umum Laki : </label>       
                <input type="text" class="form-control" name="u_laki" placeholder="Silahkan Mengisi Umum Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Umum Perempuan : </label>       
                <input type="text" class="form-control" name="u_perempuan" placeholder="Silahkan Mengisi Umum Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Khusus Laki : </label>       
                <input type="text" class="form-control" name="k_laki" placeholder="Silahkan Mengisi Khusus Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Khusus Perempuan : </label>       
                <input type="text" class="form-control" name="k_perempuan" placeholder="Silahkan Mengisi Khusus Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Honor Laki : </label>       
                <input type="text" class="form-control" name="h_laki" placeholder="Silahkan Mengisi Honor Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Honor Perempuan : </label>       
                <input type="text" class="form-control" name="h_perempuan" placeholder="Silahkan Mengisi Honor Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Bantuan Laki : </label>       
                <input type="text" class="form-control" name="b_laki" placeholder="Silahkan Mengisi Bantuan Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Bantuan Perempuan : </label>       
                <input type="text" class="form-control" name="b_perempuan" placeholder="Silahkan Mengisi Bantuan Perempuan"/>
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
                    <label class="control-label" >Kelurahan : </label>         
                        <input type="text" class="form-control" id="kelurahan_edit" name="kelurahan" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Lingkungan : </label>         
                        <input type="text" class="form-control" id="ling_edit" name="ling" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >PKK RW : </label>         
                        <input type="text" class="form-control" id="p_rw_edit" name="p_rw" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >PKK RT : </label>         
                        <input type="text" class="form-control" id="p_rt_edit" name="p_rt" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Dasa Wisma : </label>         
                        <input type="text" class="form-control" id="dasa_edit" name="dasa" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Kepala Rumah Tangga : </label>         
                        <input type="text" class="form-control" id="k_rumah_edit" name="k_rumah" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Kepala Keluarga : </label>         
                        <input type="text" class="form-control" id="kk_edit" name="kk" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Jumlah Laki : </label>         
                        <input type="text" class="form-control" id="j_laki_edit" name="j_laki" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Jumlah Perempuan : </label>         
                        <input type="text" class="form-control" id="j_perempuan_edit" name="j_perempuan" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Anggota Laki : </label>         
                        <input type="text" class="form-control" id="a_laki_edit" name="a_laki" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Anggota Perempuan : </label>         
                        <input type="text" class="form-control" id="a_perempuan_edit" name="a_perempuan" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Umum Laki : </label>         
                        <input type="text" class="form-control" id="u_laki_edit" name="u_laki" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Umum Perempuan : </label>         
                        <input type="text" class="form-control" id="u_perempuan_edit" name="u_perempuan" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Khusus Laki : </label>         
                        <input type="text" class="form-control" id="k_laki_edit" name="k_laki" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Khusus Perempuan : </label>         
                        <input type="text" class="form-control" id="k_perempuan_edit" name="k_perempuan" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Honor Laki : </label>         
                        <input type="text" class="form-control" id="h_laki_edit" name="h_laki" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Honor Perempuan : </label>         
                        <input type="text" class="form-control" id="h_perempuan_edit" name="h_perempuan" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Bantuan Laki : </label>         
                        <input type="text" class="form-control" id="b_laki_edit" name="b_laki" />
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label" >Bantuan Perempuan : </label>         
                        <input type="text" class="form-control" id="b_perempuan_edit" name="b_perempuan" />
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


<script src="../../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



 
  
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
            $("#kelurahan_edit").val($(this).attr('data-kelurahan'));
            $("#ling_edit").val($(this).attr('data-ling'));
            $("#p_rw_edit").val($(this).attr('data-p_rw'));
            $("#p_rt_edit").val($(this).attr('data-p_rt'));
            $("#dasa_edit").val($(this).attr('data-dasa'));
            $("#k_rumah_edit").val($(this).attr('data-k_rumah'));
            $("#kk_edit").val($(this).attr('data-kk'));
            $("#j_laki_edit").val($(this).attr('data-j_laki'));
            $("#j_perempuan_edit").val($(this).attr('data-j_perempuan'));
            $("#a_laki_edit").val($(this).attr('data-a_laki'));
            $("#a_perempuan_edit").val($(this).attr('data-a_perempuan'));
            $("#u_laki_edit").val($(this).attr('data-u_laki'));
            $("#u_perempuan_edit").val($(this).attr('data-u_perempuan'));
            $("#k_laki_edit").val($(this).attr('data-k_laki'));
            $("#k_perempuan_edit").val($(this).attr('data-k_perempuan'));
            $("#h_laki_edit").val($(this).attr('data-h_laki'));
            $("#h_perempuan_edit").val($(this).attr('data-h_perempuan'));
            $("#b_laki_edit").val($(this).attr('data-b_laki'));
            $("#b_perempuan_edit").val($(this).attr('data-b_perempuan'));
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
