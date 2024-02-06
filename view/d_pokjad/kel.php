
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

$master = "Pokja 4";
$dba = "dpokjadkel";
$ket = "";
$ketnama = "Silahkan mengisi nama";

$stat = $_GET['s'];
$id_kec = $_GET['p'];

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
                <th rowspan="4">No</th>
                <th rowspan="4">Kecamatan</th>
                <th colspan="6">Jumlah Kader</th>
                <th colspan="5">Kesehatan</th>
                <th colspan="8">Kelestarian Lingkungan Hidup</th>
                <th colspan="5">Perencanaan Sehat</th>
                <th rowspan="4">Keterangan</th>
                <th rowspan="4">Aksi</th>
            </tr>
            <tr class="rapi">
                <th rowspan="3">POSYANDU</th>
                <th rowspan="3">Gizi</th>
                <th rowspan="3">Kesling</th>
                <th rowspan="3">Penyuluhan Narkoba</th>
                <th rowspan="3">PHBS</th>
                <th rowspan="3">KB</th>
                <th colspan="5">POSYANDU</th>
                <th colspan="3">Jumlah rumah yang memiliki</th>
                <th rowspan="3">Jumlah MCK</th>
                <th colspan="4">Jumlah KRT yang mengunakan air</th>
                <th rowspan="3">Jumlah PUS</th>
                <th rowspan="3">Jumlah RUS</th>
                <th colspan="2">Jumlah AKSEPTOR KB</th>
                <th rowspan="3">Jumlah KK yang memiliki tabungan</th>
            </tr>
            <tr>
                <th rowspan="2">Jumlah</th>
                <th rowspan="2">Terintegrasi</th>
                <th colspan="3">Lansia</th>
                <th rowspan="2">Jamban</th>
                <th rowspan="2">SPAL</th>
                <th rowspan="2">Tempat Pembuangan Sampah</th>
                <th rowspan="2">PDAM</th>
                <th rowspan="2">Sumur</th>
                <th rowspan="2">Sungai</th>
                <th rowspan="2">Lain-lain</th>
                <th rowspan="2">L</th>
                <th rowspan="2">P</th>
            </tr>
            <tr class="rapi">
                <th scope="col">Jumlah Kelompok</th>
                <th scope="col">Jumlah Anggota</th>
                <th scope="col">Jumlah yang memiliki kartu berobat gratis</th>
            </tr>
        </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `d_pokjad` WHERE id_kec = '" .$id_kec. "' AND status = '" .$stat. "'");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                    <td><?php echo $data['kecamatan'];?></td>
                	<td><?php echo $data['j_k_pos'];?></td>
                	<td><?php echo $data['j_k_gizi'];?></td>
                	<td><?php echo $data['j_k_kes'];?></td>
                	<td><?php echo $data['j_k_nar'];?></td>
                	<td><?php echo $data['j_k_phbs'];?></td>
                	<td><?php echo $data['j_k_kb'];?></td>
                	<td><?php echo $data['kp_jumlah'];?></td>
                	<td><?php echo $data['kp_jumlah_i'];?></td>
                	<td><?php echo $data['kp_lan_jk'];?></td>
                	<td><?php echo $data['kp_lan_ja'];?></td>
                    <td><?php echo $data['kp_lan_bg'];?></td>
                    <td><?php echo $data['j_jamban'];?></td>
                    <td><?php echo $data['j_spal'];?></td>
                    <td><?php echo $data['j_sampah'];?></td>
                    <td><?php echo $data['j_mck'];?></td>
                    <td><?php echo $data['j_k_pdam'];?></td>
                    <td><?php echo $data['j_k_sumur'];?></td>
                    <td><?php echo $data['j_k_sungai'];?></td>
                    <td><?php echo $data['j_k_lain'];?></td>
                    <td><?php echo $data['j_pus'];?></td>
                    <td><?php echo $data['j_wus'];?></td>
                    <td><?php echo $data['ja_l'];?></td>
                    <td><?php echo $data['ja_p'];?></td>
                    <td><?php echo $data['j_kk'];?></td>
                    <td><?php echo $data['ket'];?></td>
                  <td>
                  <button 
                      data-id="<?= $data['id'] ?>" 
                      data-kecamatan="<?= $data['kecamatan']?>"
                        data-j_k_pos="<?= $data['j_k_pos']?>"
                        data-j_k_gizi="<?= $data['j_k_gizi']?>"
                        data-j_k_kes="<?= $data['j_k_kes']?>"
                        data-j_k_nar="<?= $data['j_k_nar']?>"
                        data-j_k_phbs="<?= $data['j_k_phbs']?>"
                        data-j_k_kb="<?= $data['j_k_kb']?>"
                        data-kp_jumlah="<?= $data['kp_jumlah']?>"
                        data-kp_jumlah_i="<?= $data['kp_jumlah_i']?>"
                        data-kp_lan_jk="<?= $data['kp_lan_jk']?>"
                        data-kp_lan_ja="<?= $data['kp_lan_ja']?>"
                        data-kp_lan_bg="<?= $data['kp_lan_bg']?>"
                        data-j_jamban="<?= $data['j_jamban']?>"
                        data-j_spal="<?= $data['j_spal']?>"
                        data-j_sampah="<?= $data['j_sampah']?>"
                        data-j_mck="<?= $data['j_mck']?>"
                        data-j_k_pdam="<?= $data['j_k_pdam']?>"
                        data-j_k_sumur="<?= $data['j_k_sumur']?>"
                        data-j_k_sungai="<?= $data['j_k_sungai']?>"
                        data-j_k_lain="<?= $data['j_k_lain']?>"
                        data-j_pus="<?= $data['j_pus']?>"
                        data-j_wus="<?= $data['j_wus']?>"
                        data-ja_l="<?= $data['ja_l']?>"
                        data-ja_p="<?= $data['ja_p']?>"
                        data-j_kk="<?= $data['j_kk']?>"
                        data-ket="<?= $data['ket']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>&p=<?php echo $_GET['p'] ?>&s=<?php echo $stat ?>&kec=<?php echo $_GET['kec'] ?>">❌</a>
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
                   <th>Kecamatan</th>
                    <th>Jumlah Kader Posyandu</th>
                    <th>Jumlah Kader Gizi</th>
                    <th>Jumlah Kader Kesling</th>
                    <th>Jumlah Kader Penyuluh Narkoba</th>
                    <th>Jumlah Kader Phbs</th>
                    <th>Jumlah Kader KB</th>
                    <th>Kesehatan Posyandu Jumlah</th>
                    <th>Kesehatan Posyandu Terintegrasi</th>
                    <th>Kesehatan Posyandu Lansia Jumlah Kelompok</th>
                    <th>Kesehatan Posyandu Lansia Jumlah Anggota</th>
                    <th>Kesehatan Posyandu Lansia Berobat Gratis</th>
                    <th>Jumlah Rumah Yang Memiliki Jamban</th>
                    <th>Jumlah Rumah Yang Memiliki Spal</th>
                    <th>Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah</th>
                    <th>Jumlah MCK</th>
                    <th>Jumlah KRT Yang Menggunakan Sumur</th>
                    <th>Jumlah KRT Yang Menggunakan Sumur</th>
                    <th>Jumlah KRT Yang Menggunakan Sungai</th>
                    <th>Jumlah KRT Yang Menggunakan Lain Lain</th>
                    <th>Jumlah Pus</th>
                    <th>Jumlah Wus</th>
                    <th>Jumlah Akseptor KB Laki Laki</th>
                    <th>Jumlah Akseptor KB Perempuan</th>
                    <th>Jumlah KK Yang memiliki Tabungan</th>
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
            <input type="hidden" class="form-control" value="<?php echo $_GET['s']?>" name="status" />
            <input type="hidden" class="form-control" value="<?php echo $_GET['p']?>" name="id_kec" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Kecamatan : </label>       
                <input type="text" class="form-control" name="kecamatan" placeholder="Silahkan Mengisi Kecamatan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Posyandu : </label>       
                <input type="text" class="form-control" name="j_k_pos" placeholder="Silahkan Mengisi Jumlah Kader Posyandu"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Gizi : </label>       
                <input type="text" class="form-control" name="j_k_gizi" placeholder="Silahkan Mengisi Jumlah Kader Gizi"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Kesling : </label>       
                <input type="text" class="form-control" name="j_k_kes" placeholder="Silahkan Mengisi Jumlah Kader Kesling"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Penyuluh Narkoba : </label>       
                <input type="text" class="form-control" name="j_k_nar" placeholder="Silahkan Mengisi Jumlah Kader Penyuluh Narkoba"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Phbs : </label>       
                <input type="text" class="form-control" name="j_k_phbs" placeholder="Silahkan Mengisi Jumlah Kader Phbs"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader KB : </label>       
                <input type="text" class="form-control" name="j_k_kb" placeholder="Silahkan Mengisi Jumlah Kader KB"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kesehatan Posyandu Jumlah : </label>       
                <input type="text" class="form-control" name="kp_jumlah" placeholder="Silahkan Mengisi Kesehatan Posyandu Jumlah"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kesehatan Posyandu Terintegrasi : </label>       
                <input type="text" class="form-control" name="kp_jumlah_i" placeholder="Silahkan Mengisi Kesehatan Posyandu Terintegrasi"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kesehatan Posyandu Lansia Jumlah Kelompok : </label>       
                <input type="text" class="form-control" name="kp_lan_jk" placeholder="Silahkan Mengisi Kesehatan Posyandu Lansia Jumlah Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kesehatan Posyandu Lansia Jumlah Anggota : </label>       
                <input type="text" class="form-control" name="kp_lan_ja" placeholder="Silahkan Mengisi Kesehatan Posyandu Lansia Jumlah Anggota"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kesehatan Posyandu Lansia Berobat Gratis : </label>       
                <input type="text" class="form-control" name="kp_lan_bg" placeholder="Silahkan Mengisi Kesehatan Posyandu Lansia Berobat Gratis"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Yang Memiliki Jamban : </label>       
                <input type="text" class="form-control" name="j_jamban" placeholder="Silahkan Mengisi Jumlah Rumah Yang Memiliki Jamban"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Yang Memiliki Spal : </label>       
                <input type="text" class="form-control" name="j_spal" placeholder="Silahkan Mengisi Jumlah Rumah Yang Memiliki Spal"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah : </label>       
                <input type="text" class="form-control" name="j_sampah" placeholder="Silahkan Mengisi Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah MCK : </label>       
                <input type="text" class="form-control" name="j_mck" placeholder="Silahkan Mengisi Jumlah MCK"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KRT Yang Menggunakan Sumur : </label>       
                <input type="text" class="form-control" name="j_k_pdam" placeholder="Silahkan Mengisi Jumlah KRT Yang Menggunakan Sumur"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KRT Yang Menggunakan Sumur : </label>       
                <input type="text" class="form-control" name="j_k_sumur" placeholder="Silahkan Mengisi Jumlah KRT Yang Menggunakan Sumur"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KRT Yang Menggunakan Sungai : </label>       
                <input type="text" class="form-control" name="j_k_sungai" placeholder="Silahkan Mengisi Jumlah KRT Yang Menggunakan Sungai"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KRT Yang Menggunakan Lain Lain : </label>       
                <input type="text" class="form-control" name="j_k_lain" placeholder="Silahkan Mengisi Jumlah KRT Yang Menggunakan Lain Lain"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Pus : </label>       
                <input type="text" class="form-control" name="j_pus" placeholder="Silahkan Mengisi Jumlah Pus"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Wus : </label>       
                <input type="text" class="form-control" name="j_wus" placeholder="Silahkan Mengisi Jumlah Wus"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Akseptor KB Laki Laki : </label>       
                <input type="text" class="form-control" name="ja_l" placeholder="Silahkan Mengisi Jumlah Akseptor KB Laki Laki"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Jumlah Akseptor KB Perempuan : </label>       
                <input type="text" class="form-control" name="ja_p" placeholder="Silahkan Mengisi Jumlah Akseptor KB Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KK Yang memiliki Tabungan : </label>       
                <input type="text" class="form-control" name="j_kk" placeholder="Silahkan Mengisi Jumlah KK Yang memiliki Tabungan"/>
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
                <label class="control-label" >Kecamatan : </label>         
                    <input type="text" class="form-control" id="kecamatan_edit" name="kecamatan" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Posyandu : </label>         
                    <input type="text" class="form-control" id="j_k_pos_edit" name="j_k_pos" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Gizi : </label>         
                    <input type="text" class="form-control" id="j_k_gizi_edit" name="j_k_gizi" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Kesling : </label>         
                    <input type="text" class="form-control" id="j_k_kes_edit" name="j_k_kes" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Penyuluh Narkoba : </label>         
                    <input type="text" class="form-control" id="j_k_nar_edit" name="j_k_nar" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Phbs : </label>         
                    <input type="text" class="form-control" id="j_k_phbs_edit" name="j_k_phbs" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader KB : </label>         
                    <input type="text" class="form-control" id="j_k_kb_edit" name="j_k_kb" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Kesehatan Posyandu Jumlah : </label>         
                    <input type="text" class="form-control" id="kp_jumlah_edit" name="kp_jumlah" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Kesehatan Posyandu Terintegrasi : </label>         
                    <input type="text" class="form-control" id="kp_jumlah_i_edit" name="kp_jumlah_i" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Kesehatan Posyandu Lansia Jumlah Kelompok : </label>         
                    <input type="text" class="form-control" id="kp_lan_jk_edit" name="kp_lan_jk" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Kesehatan Posyandu Lansia Jumlah Anggota : </label>         
                    <input type="text" class="form-control" id="kp_lan_ja_edit" name="kp_lan_ja" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Kesehatan Posyandu Lansia Berobat Gratis : </label>         
                    <input type="text" class="form-control" id="kp_lan_bg_edit" name="kp_lan_bg" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Yang Memiliki Jamban : </label>         
                    <input type="text" class="form-control" id="j_jamban_edit" name="j_jamban" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Yang Memiliki Spal : </label>         
                    <input type="text" class="form-control" id="j_spal_edit" name="j_spal" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Yang Memiliki Tempat Pembuangan Sampah : </label>         
                    <input type="text" class="form-control" id="j_sampah_edit" name="j_sampah" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah MCK : </label>         
                    <input type="text" class="form-control" id="j_mck_edit" name="j_mck" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KRT Yang Menggunakan Sumur : </label>         
                    <input type="text" class="form-control" id="j_k_pdam_edit" name="j_k_pdam" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KRT Yang Menggunakan Sumur : </label>         
                    <input type="text" class="form-control" id="j_k_sumur_edit" name="j_k_sumur" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KRT Yang Menggunakan Sungai : </label>         
                    <input type="text" class="form-control" id="j_k_sungai_edit" name="j_k_sungai" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KRT Yang Menggunakan Lain Lain : </label>         
                    <input type="text" class="form-control" id="j_k_lain_edit" name="j_k_lain" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Pus : </label>         
                    <input type="text" class="form-control" id="j_pus_edit" name="j_pus" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Wus : </label>         
                    <input type="text" class="form-control" id="j_wus_edit" name="j_wus" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Akseptor KB Laki Laki : </label>         
                    <input type="text" class="form-control" id="ja_l_edit" name="ja_l" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Akseptor KB Perempuan : </label>         
                    <input type="text" class="form-control" id="ja_p_edit" name="ja_p" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KK Yang memiliki Tabungan : </label>         
                    <input type="text" class="form-control" id="j_kk_edit" name="j_kk" />
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
          $("#kecamatan_edit").val($(this).attr('data-kecamatan'));
            $("#j_k_pos_edit").val($(this).attr('data-j_k_pos'));
            $("#j_k_gizi_edit").val($(this).attr('data-j_k_gizi'));
            $("#j_k_kes_edit").val($(this).attr('data-j_k_kes'));
            $("#j_k_nar_edit").val($(this).attr('data-j_k_nar'));
            $("#j_k_phbs_edit").val($(this).attr('data-j_k_phbs'));
            $("#j_k_kb_edit").val($(this).attr('data-j_k_kb'));
            $("#kp_jumlah_edit").val($(this).attr('data-kp_jumlah'));
            $("#kp_jumlah_i_edit").val($(this).attr('data-kp_jumlah_i'));
            $("#kp_lan_jk_edit").val($(this).attr('data-kp_lan_jk'));
            $("#kp_lan_ja_edit").val($(this).attr('data-kp_lan_ja'));
            $("#kp_lan_bg_edit").val($(this).attr('data-kp_lan_bg'));
            $("#j_jamban_edit").val($(this).attr('data-j_jamban'));
            $("#j_spal_edit").val($(this).attr('data-j_spal'));
            $("#j_sampah_edit").val($(this).attr('data-j_sampah'));
            $("#j_mck_edit").val($(this).attr('data-j_mck'));
            $("#j_k_pdam_edit").val($(this).attr('data-j_k_pdam'));
            $("#j_k_sumur_edit").val($(this).attr('data-j_k_sumur'));
            $("#j_k_sungai_edit").val($(this).attr('data-j_k_sungai'));
            $("#j_k_lain_edit").val($(this).attr('data-j_k_lain'));
            $("#j_pus_edit").val($(this).attr('data-j_pus'));
            $("#j_wus").val($(this).attr('data-j_wus'));
            $("#ja_l_edit").val($(this).attr('data-ja_l'));
            $("#ja_p_edit").val($(this).attr('data-ja_p'));
            $("#j_kk_edit").val($(this).attr('data-j_kk'));
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
