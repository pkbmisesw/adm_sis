
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

$master = "Pokja 2";
$dba = "dpokjabkel";
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
                <!--<thead>-->
                <!--<tr>-->
                <!--  <th>No</th>-->
                <!--  <th>Kecamatan</th>-->
                <!--    <th>Jumlah Warga Buta</th>-->
                <!--    <th>Jumlah Paket A Kelompok Belajar</th>-->
                <!--    <th>Jumlah Paket A Warga Belajar</th>-->
                <!--    <th>Jumlah Paket B Kelompok Belajar</th>-->
                <!--    <th>Jumlah Paket B Warga Belajar</th>-->
                <!--    <th>Jumlah Paket C Kelompok Belajar</th>-->
                <!--    <th>Jumlah Paket C Warga Belajar</th>-->
                <!--    <th>Jumlah KF</th>-->
                <!--    <th>Jumlah KF Warga Belajar</th>-->
                <!--    <th>Jumlah Paud Sejenis</th>-->
                <!--    <th>Jumlah Taman Baca Perpus</th>-->
                <!--    <th>Jumlah BKB Kelompok</th>-->
                <!--    <th>Jumlah BKB Ibu Peserta</th>-->
                <!--    <th>Jumlah BKB Ape</th>-->
                <!--    <th>Jumlah BKB Kelompok Simulasi</th>-->
                <!--    <th>Jumlah Kader Tutor KF</th>-->
                <!--    <th>Jumlah Kader Tutor Paud</th>-->
                <!--    <th>Jumlah Kader BKB</th>-->
                <!--    <th>Jumlah Kader Koperasi</th>-->
                <!--    <th>Jumlah Kader Keterampilan</th>-->
                <!--    <th>Jumlah Kader Latih LP3PKK</th>-->
                <!--    <th>Jumlah Kader Latih TPK3PKK</th>-->
                <!--    <th>Jumlah Kader Latih DAMAS PKK</th>-->
                <!--    <th>Pra Koperasi Usaha Pemula Jumlah Kelompok</th>-->
                <!--    <th>Pra Koperasi Usaha Pemula Jumlah Peserta</th>-->
                <!--    <th>Pra Koperasi Usaha Madya Jumlah Kelompok</th>-->
                <!--    <th>Pra Koperasi Usaha Madya Jumlah Peserta</th>-->
                <!--    <th>Pra Koperasi Usaha Utama Jumlah Kelompok</th>-->
                <!--    <th>Pra Koperasi Usaha Utama Jumlah Peserta</th>-->
                <!--    <th>Pra Koperasi Usaha Mandiri Jumlah Kelompok</th>-->
                <!--    <th>Pra Koperasi Usaha Mandiri Jumlah Peserta</th>-->
                <!--    <th>Koperasi Jumlah Kelompok</th>-->
                <!--    <th>Koperasi Jumlah Anggota</th>-->
                <!--    <th>Keterangan</th>-->
                <!--  <th>Aksi</th>-->
                <!--</tr>-->
                <!--</thead>-->
                
                
                
                 <thead class="rapi">
          <tr class="rapi">
            <th rowspan="4">No</th>
            <th rowspan="4">Kelurahan</th>
            <th colspan="23">Pendidikan dan keterampilan</th>
            <th colspan="10">Pengembangan kehidupan koperasi</th>
            <th rowspan="4">Keterangan</th>
            <th rowspan="4">Aksi</th>
          </tr>
          <tr class="rapi">
            <th rowspan="3">Jumlah warga yang masih 3 buta</th>
            <th colspan="9">Jumlah kelompok belajar</th>
            <th rowspan="3">Jumlah taman baca/perpustakaan</th>
            <th colspan="4">BKB</th>
            <th colspan="5">KADER khusus</th>
            <th colspan="3">Jumlah KADER yang sudah di latih</th>
            <th colspan="8">Pra KOPERASI/Usaha bersama/UP2K</th>
            <th colspan="2">KOPERASI Berbadan Hukum</th>
          </tr>
          <tr>
            <th colspan="2">Paket A</th>
            <th colspan="2">Paket B</th>
            <th colspan="2">Paket C</th>
            <th colspan="2">KF</th>
            <th rowspan="2">Paud Sejenis</th>
            <th rowspan="2">Jumlah Kelompok</th>
            <th rowspan="2">Jumlah Ibu Peserta</th>
            <th rowspan="2">Jumlah APE(SET)</th>
            <th rowspan="2">Jumlah Kelompok Simulasi BKB</th>
            <th colspan="2">Tutor</th>
            <th rowspan="2">BKB</th>
            <th rowspan="2">Koperasi</th>
            <th rowspan="2">keterampilan</th>
            <th rowspan="2">LP3PKK</th>
            <th rowspan="2">TP3PKK</th>
            <th rowspan="2">DAMAS PKK</th>
            <th colspan="2">Pemula</th>
            <th colspan="2">Madya</th>
            <th colspan="2">Utama</th>
            <th colspan="2">Mandiri</th>
            <th rowspan="2">Jumlah Kelompok</th>
            <th rowspan="2">Jumlah Anggota</th>
            
            
          </tr>
          <tr class="rapi">
            <th scope="col">Kelompok Belajar</th>
            <th scope="col">Warga Belajar</th>
            <th scope="col">Kelompok Belajar</th>
            <th scope="col">Warga Belajar</th>
            <th scope="col">Kelompok Belajar</th>
            <th scope="col">Warga Belajar</th>
            <th scope="col">Kelompok Belajar</th>
            <th scope="col">Warga Belajar</th>
            <th scope="col">KF</th>
            <th scope="col">PAUD Sejenis</th>
            <th scope="col">Jumlah Kelompok</th>
            <th scope="col">Jumlah Peserta</th>
            <th scope="col">Jumlah Kelompok</th>
            <th scope="col">Jumlah Peserta</th>
            <th scope="col">Jumlah Kelompok</th>
            <th scope="col">Jumlah Peserta</th>
            <th scope="col">Jumlah Kelompok</th>
            <th scope="col">Jumlah Peserta</th>
            

            
            
          </tr>
        </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `d_pokjab` WHERE id_kec = '" .$id_kec. "' AND status = '" .$stat. "'");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                    <td><?php echo $data['kecamatan'];?></td>
                    <td><?php echo $data['j_wm'];?></td>
                    <td><?php echo $data['j_a_bel'];?></td>
                    <td><?php echo $data['j_a_wbel'];?></td>
                	<td><?php echo $data['j_b_bel'];?></td>
                	<td><?php echo $data['j_b_wbel'];?></td>
                	<td><?php echo $data['j_c_bel'];?></td>
                	<td><?php echo $data['j_c_wbel'];?></td>
                	<td><?php echo $data['j_kf_bel'];?></td>
                	<td><?php echo $data['j_kf_wbel'];?></td>
                	<td><?php echo $data['j_paud_sjenis'];?></td>
                	<td><?php echo $data['j_tbm_per'];?></td>
                	<td><?php echo $data['j_bkb_kel'];?></td>
                	<td><?php echo $data['j_bkb_ibu'];?></td>
                	<td><?php echo $data['j_bkb_ape'];?></td>
                	<td><?php echo $data['j_bkb_sim'];?></td>
                	<td><?php echo $data['j_kt_kf'];?></td>
                	<td><?php echo $data['j_kt_paud'];?></td>
                	<td><?php echo $data['j_k_bkb'];?></td>
                	<td><?php echo $data['j_k_kop'];?></td>
                    <td><?php echo $data['j_k_ket'];?></td>
                    <td><?php echo $data['j_kl_lpt'];?></td>
                    <td><?php echo $data['j_kl_tpk'];?></td>
                    <td><?php echo $data['j_kl_damas'];?></td>
                    <td><?php echo $data['p_kop_pem_kel'];?></td>
                    <td><?php echo $data['p_kop_pem_pes'];?></td>
                    <td><?php echo $data['p_kop_mad_kel'];?></td>
                    <td><?php echo $data['p_kop_mad_pes'];?></td>
                    <td><?php echo $data['p_kop_ut_kel'];?></td>
                    <td><?php echo $data['p_kop_mut_pes'];?></td>
                    <td><?php echo $data['p_kop_man_kel'];?></td>
                    <td><?php echo $data['p_kop_man_pes'];?></td>
                    <td><?php echo $data['k_j_kel'];?></td>
                    <td><?php echo $data['k_j_pes'];?></td>
                    <td><?php echo $data['ket'];?></td>
                  <td>
                  <button 
                      data-id="<?= $data['id'] ?>" 
                      data-kecamatan="<?= $data['kecamatan']?>" 
                        data-j_wm="<?= $data['j_wm']?>"
                        data-j_a_bel="<?= $data['j_a_bel']?>"
                        data-j_a_wbel="<?= $data['j_a_wbel']?>"
                        data-j_b_bel="<?= $data['j_b_bel']?>"
                        data-j_b_wbel="<?= $data['j_b_wbel']?>"
                        data-j_c_bel="<?= $data['j_c_bel']?>"
                        data-j_c_wbel="<?= $data['j_c_wbel']?>"
                        data-j_kf_bel="<?= $data['j_kf_bel']?>"
                        data-j_kf_wbel="<?= $data['j_kf_wbel']?>"
                        data-j_paud_sjenis="<?= $data['j_paud_sjenis']?>"
                        data-j_tbm_per="<?= $data['j_tbm_per']?>"
                        data-j_bkb_kel="<?= $data['j_bkb_kel']?>"
                        data-j_bkb_ibu="<?= $data['j_bkb_ibu']?>"
                        data-j_bkb_ape="<?= $data['j_bkb_ape']?>"
                        data-j_bkb_sim="<?= $data['j_bkb_sim']?>"
                        data-j_kt_kf="<?= $data['j_kt_kf']?>"
                        data-j_kt_paud="<?= $data['j_kt_paud']?>"
                        data-j_k_bkb="<?= $data['j_k_bkb']?>"
                        data-j_k_kop="<?= $data['j_k_kop']?>"
                        data-j_k_ket="<?= $data['j_k_ket']?>"
                        data-j_kl_lpt="<?= $data['j_kl_lpt']?>"
                        data-j_kl_tpk="<?= $data['j_kl_tpk']?>"
                        data-j_kl_damas="<?= $data['j_kl_damas']?>"
                        data-p_kop_pem_kel="<?= $data['p_kop_pem_kel']?>"
                        data-p_kop_pem_pes="<?= $data['p_kop_pem_pes']?>"
                        data-p_kop_mad_kel="<?= $data['p_kop_mad_kel']?>"
                        data-p_kop_mad_pes="<?= $data['p_kop_mad_pes']?>"
                        data-p_kop_ut_kel="<?= $data['p_kop_ut_kel']?>"
                        data-p_kop_mut_pes="<?= $data['p_kop_mut_pes']?>"
                        data-p_kop_man_kel="<?= $data['p_kop_man_kel']?>"
                        data-p_kop_man_pes="<?= $data['p_kop_man_pes']?>"
                        data-k_j_kel="<?= $data['k_j_kel']?>"
                        data-k_j_pes="<?= $data['k_j_pes']?>"
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
                   <th>Kelurahan</th>
                    <th>Jumlah Warga Buta</th>
                    <th>Jumlah Paket A Kelompok Belajar</th>
                    <th>Jumlah Paket A Warga Belajar</th>
                    <th>Jumlah Paket B Kelompok Belajar</th>
                    <th>Jumlah Paket B Warga Belajar</th>
                    <th>Jumlah Paket C Kelompok Belajar</th>
                    <th>Jumlah Paket C Warga Belajar</th>
                    <th>Jumlah KF</th>
                    <th>Jumlah KF Warga Belajar</th>
                    <th>Jumlah Paud Sejenis</th>
                    <th>Jumlah Taman Baca Perpus</th>
                    <th>Jumlah BKB Kelompok</th>
                    <th>Jumlah BKB ApJumlah BKB Ibu Pesertae</th>
                    <th>Jumlah BKB Ape</th>
                    <th>Jumlah BKB Kelompok Simulasi</th>
                    <th>Jumlah Kader Tutor KF</th>
                    <th>Jumlah Kader Tutor Paud</th>
                    <th>Jumlah Kader BKB</th>
                    <th>Jumlah Kader Koperasi</th>
                    <th>Jumlah Kader Keterampilan</th>
                    <th>Jumlah Kader Latih LP3PKK</th>
                    <th>Jumlah Kader Latih TPK3PKK</th>
                    <th>Jumlah Kader Latih DAMAS PKK</th>
                    <th>Pra Koperasi Usaha Pemula Jumlah Kelompok</th>
                    <th>Pra Koperasi Usaha Pemula Jumlah Peserta</th>
                    <th>Pra Koperasi Usaha Madya Jumlah Kelompok</th>
                    <th>Pra Koperasi Usaha Madya Jumlah Peserta</th>
                    <th>Pra Koperasi Usaha Utama Jumlah Kelompok</th>
                    <th>Pra Koperasi Usaha Utama Jumlah Peserta</th>
                    <th>Pra Koperasi Usaha Mandiri Jumlah Kelompok</th>
                    <th>Pra Koperasi Usaha Mandiri Jumlah Peserta</th>
                    <th>Koperasi Jumlah Kelompok</th>
                    <th>Koperasi Jumlah Anggota</th>
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
            <label class="control-label" >Kelurahan : </label>       
                <input type="text" class="form-control" name="kecamatan" placeholder="Silahkan Mengisi Kelurahan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Warga Buta : </label>       
                <input type="text" class="form-control" name="j_wm" placeholder="Silahkan Mengisi Jumlah Warga Buta"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Paket A Kelompok Belajar : </label>       
                <input type="text" class="form-control" name="j_a_bel" placeholder="Silahkan Mengisi Jumlah Paket A Kelompok Belajar"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Paket A Warga Belajar : </label>       
                <input type="text" class="form-control" name="j_a_wbel" placeholder="Silahkan Mengisi Jumlah Paket A Warga Belajar"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Paket B Kelompok Belajar : </label>       
                <input type="text" class="form-control" name="j_b_bel" placeholder="Silahkan Mengisi Jumlah Paket B Kelompok Belajar"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Paket B Warga Belajar : </label>       
                <input type="text" class="form-control" name="j_b_wbel" placeholder="Silahkan Mengisi Jumlah Paket B Warga Belajar"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Paket C Kelompok Belajar : </label>       
                <input type="text" class="form-control" name="j_c_bel" placeholder="Silahkan Mengisi Jumlah Paket C Kelompok Belajar"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Paket C Warga Belajar : </label>       
                <input type="text" class="form-control" name="j_c_wbel" placeholder="Silahkan Mengisi Jumlah Paket C Warga Belajar"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KF : </label>       
                <input type="text" class="form-control" name="j_kf_bel" placeholder="Silahkan Mengisi Jumlah KF"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KF Warga Belajar : </label>       
                <input type="text" class="form-control" name="j_kf_wbel" placeholder="Silahkan Mengisi Jumlah KF Warga Belajar"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Paud Sejenis : </label>       
                <input type="text" class="form-control" name="j_paud_sjenis" placeholder="Silahkan Mengisi Jumlah Paud Sejenis"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Taman Baca Perpus : </label>       
                <input type="text" class="form-control" name="j_tbm_per" placeholder="Silahkan Mengisi Jumlah Taman Baca Perpus"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah BKB Kelompok : </label>       
                <input type="text" class="form-control" name="j_bkb_kel" placeholder="Silahkan Mengisi Jumlah BKB Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah BKB ApJumlah BKB Ibu Pesertae : </label>       
                <input type="text" class="form-control" name="j_bkb_ibu" placeholder="Silahkan Mengisi Jumlah BKB ApJumlah BKB Ibu Pesertae"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah BKB Ape : </label>       
                <input type="text" class="form-control" name="j_bkb_ape" placeholder="Silahkan Mengisi Jumlah BKB Ape"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah BKB Kelompok Simulasi : </label>       
                <input type="text" class="form-control" name="j_bkb_sim" placeholder="Silahkan Mengisi Jumlah BKB Kelompok Simulasi"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Tutor KF : </label>       
                <input type="text" class="form-control" name="j_kt_kf" placeholder="Silahkan Mengisi Jumlah Kader Tutor KF"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Tutor Paud : </label>       
                <input type="text" class="form-control" name="j_kt_paud" placeholder="Silahkan Mengisi Jumlah Kader Tutor Paud"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader BKB : </label>       
                <input type="text" class="form-control" name="j_k_bkb" placeholder="Silahkan Mengisi Jumlah Kader BKB"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Koperasi : </label>       
                <input type="text" class="form-control" name="j_k_kop" placeholder="Silahkan Mengisi Jumlah Kader Koperasi"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Keterampilan : </label>       
                <input type="text" class="form-control" name="j_k_ket" placeholder="Silahkan Mengisi Jumlah Kader Keterampilan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Latih LP3PKK : </label>       
                <input type="text" class="form-control" name="j_kl_lpt" placeholder="Silahkan Mengisi Jumlah Kader Latih LP3PKK"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Latih TPK3PKK : </label>       
                <input type="text" class="form-control" name="j_kl_tpk" placeholder="Silahkan Mengisi Jumlah Kader Latih TPK3PKK"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kader Latih DAMAS PKK : </label>       
                <input type="text" class="form-control" name="j_kl_damas" placeholder="Silahkan Mengisi Jumlah Kader Latih DAMAS PKK"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Pemula Jumlah Kelompok : </label>       
                <input type="text" class="form-control" name="p_kop_pem_kel" placeholder="Silahkan Mengisi Pra Koperasi Usaha Pemula Jumlah Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Pemula Jumlah Peserta : </label>       
                <input type="text" class="form-control" name="p_kop_pem_pes" placeholder="Silahkan Mengisi Pra Koperasi Usaha Pemula Jumlah Peserta"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Madya Jumlah Kelompok : </label>       
                <input type="text" class="form-control" name="p_kop_mad_kel" placeholder="Silahkan Mengisi Pra Koperasi Usaha Madya Jumlah Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Madya Jumlah Peserta : </label>       
                <input type="text" class="form-control" name="p_kop_mad_pes" placeholder="Silahkan Mengisi Pra Koperasi Usaha Madya Jumlah Peserta"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Utama Jumlah Kelompok : </label>       
                <input type="text" class="form-control" name="p_kop_ut_kel" placeholder="Silahkan Mengisi Pra Koperasi Usaha Utama Jumlah Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Utama Jumlah Peserta : </label>       
                <input type="text" class="form-control" name="p_kop_mut_pes" placeholder="Silahkan Mengisi Pra Koperasi Usaha Utama Jumlah Peserta"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Mandiri Jumlah Kelompok : </label>       
                <input type="text" class="form-control" name="p_kop_man_kel" placeholder="Silahkan Mengisi Pra Koperasi Usaha Mandiri Jumlah Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Pra Koperasi Usaha Mandiri Jumlah Peserta : </label>       
                <input type="text" class="form-control" name="p_kop_man_pes" placeholder="Silahkan Mengisi Pra Koperasi Usaha Mandiri Jumlah Peserta"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Koperasi Jumlah Kelompok : </label>       
                <input type="text" class="form-control" name="k_j_kel" placeholder="Silahkan Mengisi Koperasi Jumlah Kelompok"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Koperasi Jumlah Anggota : </label>       
                <input type="text" class="form-control" name="k_j_pes" placeholder="Silahkan Mengisi Koperasi Jumlah Anggota"/>
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
                <label class="control-label" >Kelurahan : </label>         
                    <input type="text" class="form-control" id="kecamatan_edit" name="kecamatan" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Warga Buta : </label>         
                    <input type="text" class="form-control" id="j_wm_edit" name="j_wm" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Paket A Kelompok Belajar : </label>         
                    <input type="text" class="form-control" id="j_a_bel_edit" name="j_a_bel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Paket A Warga Belajar : </label>         
                    <input type="text" class="form-control" id="j_a_wbel_edit" name="j_a_wbel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Paket B Kelompok Belajar : </label>         
                    <input type="text" class="form-control" id="j_b_bel_edit" name="j_b_bel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Paket B Warga Belajar : </label>         
                    <input type="text" class="form-control" id="j_b_wbel_edit" name="j_b_wbel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Paket C Kelompok Belajar : </label>         
                    <input type="text" class="form-control" id="j_c_bel_edit" name="j_c_bel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Paket C Warga Belajar : </label>         
                    <input type="text" class="form-control" id="j_c_wbel_edit" name="j_c_wbel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KF : </label>         
                    <input type="text" class="form-control" id="j_kf_bel_edit" name="j_kf_bel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KF Warga Belajar : </label>         
                    <input type="text" class="form-control" id="j_kf_wbel_edit" name="j_kf_wbel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Paud Sejenis : </label>         
                    <input type="text" class="form-control" id="j_paud_sjenis_edit" name="j_paud_sjenis" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Taman Baca Perpus : </label>         
                    <input type="text" class="form-control" id="j_tbm_per_edit" name="j_tbm_per" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah BKB Kelompok : </label>         
                    <input type="text" class="form-control" id="j_bkb_kel_edit" name="j_bkb_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah BKB ApJumlah BKB Ibu Pesertae : </label>         
                    <input type="text" class="form-control" id="j_bkb_ibu_edit" name="j_bkb_ibu" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah BKB Ape : </label>         
                    <input type="text" class="form-control" id="j_bkb_ape_edit" name="j_bkb_ape" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah BKB Kelompok Simulasi : </label>         
                    <input type="text" class="form-control" id="j_bkb_sim_edit" name="j_bkb_sim" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Tutor KF : </label>         
                    <input type="text" class="form-control" id="j_kt_kf_edit" name="j_kt_kf" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Tutor Paud : </label>         
                    <input type="text" class="form-control" id="j_kt_paud_edit" name="j_kt_paud" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader BKB : </label>         
                    <input type="text" class="form-control" id="j_k_bkb_edit" name="j_k_bkb" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Koperasi : </label>         
                    <input type="text" class="form-control" id="j_k_kop_edit" name="j_k_kop" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Keterampilan : </label>         
                    <input type="text" class="form-control" id="j_k_ket_edit" name="j_k_ket" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Latih LP3PKK : </label>         
                    <input type="text" class="form-control" id="j_kl_lpt_edit" name="j_kl_lpt" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Latih TPK3PKK : </label>         
                    <input type="text" class="form-control" id="j_kl_tpk_edit" name="j_kl_tpk" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kader Latih DAMAS PKK : </label>         
                    <input type="text" class="form-control" id="j_kl_damas_edit" name="j_kl_damas" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Pemula Jumlah Kelompok : </label>         
                    <input type="text" class="form-control" id="p_kop_pem_kel_edit" name="p_kop_pem_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Pemula Jumlah Peserta : </label>         
                    <input type="text" class="form-control" id="p_kop_pem_pes_edit" name="p_kop_pem_pes" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Madya Jumlah Kelompok : </label>         
                    <input type="text" class="form-control" id="p_kop_mad_kel_edit" name="p_kop_mad_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Madya Jumlah Peserta : </label>         
                    <input type="text" class="form-control" id="p_kop_mad_pes_edit" name="p_kop_mad_pes" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Utama Jumlah Kelompok : </label>         
                    <input type="text" class="form-control" id="p_kop_ut_kel_edit" name="p_kop_ut_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Utama Jumlah Peserta : </label>         
                    <input type="text" class="form-control" id="p_kop_mut_pes_edit" name="p_kop_mut_pes" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Mandiri Jumlah Kelompok : </label>         
                    <input type="text" class="form-control" id="p_kop_man_kel_edit" name="p_kop_man_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Pra Koperasi Usaha Mandiri Jumlah Peserta : </label>         
                    <input type="text" class="form-control" id="p_kop_man_pes_edit" name="p_kop_man_pes" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Koperasi Jumlah Kelompok : </label>         
                    <input type="text" class="form-control" id="k_j_kel_edit" name="k_j_kel" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Koperasi Jumlah Anggota : </label>         
                    <input type="text" class="form-control" id="k_j_pes_edit" name="k_j_pes" />
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
            $("#j_wm_edit").val($(this).attr('data-j_wm'));
            $("#j_a_bel_edit").val($(this).attr('data-j_a_bel'));
            $("#j_a_wbel_edit").val($(this).attr('data-j_a_wbel'));
            $("#j_b_bel_edit").val($(this).attr('data-j_b_bel'));
            $("#j_b_wbel_edit").val($(this).attr('data-j_b_wbel'));
            $("#j_c_bel_edit").val($(this).attr('data-j_c_bel'));
            $("#j_c_wbel_edit").val($(this).attr('data-j_c_wbel'));
            $("#j_kf_bel_edit").val($(this).attr('data-j_kf_bel'));
            $("#j_kf_wbel_edit").val($(this).attr('data-j_kf_wbel'));
            $("#j_paud_sjenis_edit").val($(this).attr('data-j_paud_sjenis'));
            $("#j_tbm_per_edit").val($(this).attr('data-j_tbm_per'));
            $("#j_bkb_kel_edit").val($(this).attr('data-j_bkb_kel'));
            $("#j_bkb_ibu_edit").val($(this).attr('data-j_bkb_ibu'));
            $("#j_bkb_ape_edit").val($(this).attr('data-j_bkb_ape'));
            $("#j_bkb_sim_edit").val($(this).attr('data-j_bkb_sim'));
            $("#j_kt_kf_edit").val($(this).attr('data-j_kt_kf'));
            $("#j_kt_paud_edit").val($(this).attr('data-j_kt_paud'));
            $("#j_k_bkb_edit").val($(this).attr('data-j_k_bkb'));
            $("#j_k_kop_edit").val($(this).attr('data-j_k_kop'));
            $("#j_k_ket_edit").val($(this).attr('data-j_k_ket'));
            $("#j_kl_lpt_edit").val($(this).attr('data-j_kl_lpt'));
            $("#j_kl_tpk_edit").val($(this).attr('data-j_kl_tpk'));
            $("#j_kl_damas_edit").val($(this).attr('data-j_kl_damas'));
            $("#p_kop_pem_kel_edit").val($(this).attr('data-p_kop_pem_kel'));
            $("#p_kop_pem_pes_edit").val($(this).attr('data-p_kop_pem_pes'));
            $("#p_kop_mad_kel_edit").val($(this).attr('data-p_kop_mad_kel'));
            $("#p_kop_mad_pes_edit").val($(this).attr('data-p_kop_mad_pes'));
            $("#p_kop_ut_kel_edit").val($(this).attr('data-p_kop_ut_kel'));
            $("#p_kop_mut_pes_edit").val($(this).attr('data-p_kop_mut_pes'));
            $("#p_kop_man_kel_edit").val($(this).attr('data-p_kop_man_kel'));
            $("#p_kop_man_pes_edit").val($(this).attr('data-p_kop_man_pes'));
            $("#k_j_kel_edit").val($(this).attr('data-k_j_kel'));
            $("#k_j_pes_edit").val($(this).attr('data-k_j_pes'));
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
