
<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if( $_SESSION['status_jabatan'] == "1" ){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "Rekapitulasi Kecamatan";
$dba = "datarekap";
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

        Master Data - <?php echo $master; ?>
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
        <li class="active">Master Data - <?php echo $master; ?></li>
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
            <th rowspan="3">Nama Kelurahan</th>
            <th rowspan="3">Jumlah Lingkungan</th>
            <th rowspan="3">Jumlah RW</th>
            <th rowspan="3">Jumlah RT</th>
            <th rowspan="3">Jumlah Dasar Wisma</th>
            <th rowspan="3">Jumlah Kepala Rumah Tangga</th>
            <th rowspan="3">Jumlah KK</th>
            <th colspan="12" class="rapi">Jumlah Anggota Keluarga</th>
            <th colspan="2">Kreteria Rumah</th>
            <th colspan="4">Jumlah Rumah</th>
            <th colspan="4">Sumber Air Keluarga</th>
            <th colspan="2">Makanan Pokok</th>
            <th rowspan="3">Jumlah KK yang memiliki tabungan</th>
            <th colspan="11">Keluarga Mengikuti Kegiatan</th>
            <th rowspan="3">Keterangan</th>
            <th rowspan="3">Aksi</th>
          </tr>
          <tr class="rapi">
            <th colspan="2">Total</th>
            <th colspan="2">Balita</th>
            <th rowspan="2">PUS</th>
            <th rowspan="2">WUS</th>
            <th rowspan="2">Ibu Hamil</th>
            <th rowspan="2">Ibu Menyusui</th>
            <th rowspan="2">Lansia</th>
            <th colspan="2">3 Buta</th>
            <th rowspan="2">Berkebutuhan Khusus</th>
            <th rowspan="2">Sehat</th>
            <th rowspan="2">Tidak Sehat</th>
            <th rowspan="2">Memiliki Tempat Pembuangan Sampah</th>
            <th rowspan="2">Memiliki SPAL</th>
            <th rowspan="2">Memiliki Jamban Keluarga</th>
            <th rowspan="2">Memiliki Stiker P4K</th>
            <th rowspan="2">PDAM</th>
            <th rowspan="2">Sumur</th>
            <th rowspan="2">Sungai</th>
            <th rowspan="2">DLL</th>
            <th rowspan="2">Beras</th>
            <th rowspan="2">Non Beras</th>
            <th rowspan="2">UP3K</th>
            <th colspan="6">Pemamfaatan Tanah Pekarangan</th>
            <th colspan="3">Industri Rumah Tangga</th>
            <th rowspan="2">Kesehatan Lingkungan</th>
          </tr>
          <tr class="rapi">
            <th scope="col">L</th>
            <th scope="col">P</th>
            <th scope="col">L</th>
            <th scope="col">P</th>
            <th scope="col">L</th>
            <th scope="col">P</th>
            <th scope="col">Peternakan</th>
            <th scope="col">Perikanan</th>
            <th scope="col">Warung Hidup</th>
            <th scope="col">Lumbung Hidup</th>
            <th scope="col">Toga</th>
            <th scope="col">Tanaman Keras</th>
            <th scope="col">Pangan</th>
            <th scope="col">Sandang</th>
            <th scope="col">Jasa</th>
          </tr>
        </thead>
                <tbody>

                <?php
                   $count = 1;
				   
				//   SELECT * FROM m_kelurahan INNER JOIN data_rekap ON m_kelurahan.id = data_rekap.id_kel WHERE data_rekap.id_kec = 8 ORDER BY m_kelurahan.id ASC;
				   
				   
                //   $sql = $conn->prepare("SELECT * FROM `data_rekap` WHERE id_kec = '".$_SESSION['id_kec']."'");
                $sql = $conn->prepare("SELECT * FROM m_kelurahan INNER JOIN data_rekap ON m_kelurahan.id = data_rekap.id_kel WHERE data_rekap.id_kec = '".$_SESSION['id_kec']."' GROUP BY m_kelurahan.nama ORDER BY m_kelurahan.id ASC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                   <td><?php echo $data['nama'];?></td>
                   <td>
                   <?php 
                    $sqla = "SELECT * FROM data_rekap WHERE id_kel = '".$data['id_kel']."'";
                    $stmta = $conn->prepare($sqla);
                    $stmta->execute();
                    $counta = $stmta->rowCount();
                    echo $counta;
                   ?>
                   </td>
                    <td><?php echo $data['j_rw'];?></td>
                    <td><?php echo $data['j_rt'];?></td>
                	<td><?php echo $data['j_dasawisma'];?></td>
                	<td><?php echo $data['j_krt'];?></td>
                	<td><?php echo $data['j_kk'];?></td>
                	<td><?php echo $data['j_a_total_l'];?></td>
                	<td><?php echo $data['j_a_total_p'];?></td>
                	<td><?php echo $data['j_a_balita_l'];?></td>
                	<td><?php echo $data['j_a_balita_p'];?></td>
                	<td><?php echo $data['j_a_pus'];?></td>
                	<td><?php echo $data['j_a_wus'];?></td>
                	<td><?php echo $data['j_a_hamil'];?></td>
                	<td><?php echo $data['j_a_susui'];?></td>
                	<td><?php echo $data['j_a_lansia'];?></td>
                	<td><?php echo $data['j_a_blaki'];?></td>
                	<td><?php echo $data['j_a_bcwe'];?></td>
                	<td><?php echo $data['j_a_bb'];?></td>
                	<td><?php echo $data['kr_sehat'];?></td>
                	<td><?php echo $data['kr_tdk_sehat'];?></td>
                    <td><?php echo $data['jr_tsampah'];?></td>
                    <td><?php echo $data['jr_spal'];?></td>
                    <td><?php echo $data['jr_jamban'];?></td>
                    <td><?php echo $data['jr_stiker'];?></td>
                    <td><?php echo $data['sak_pdam'];?></td>
                    <td><?php echo $data['sak_sumur'];?></td>
                    <td><?php echo $data['sak_sungai'];?></td>
                    <td><?php echo $data['sak_dll'];?></td>
                    <td><?php echo $data['mp_beras'];?></td>
                    <td><?php echo $data['mp_nonberas'];?></td>
                    <td><?php echo $data['jkk_tabung'];?></td>
                    <td><?php echo $data['k_upk'];?></td>
                    <td><?php echo $data['kp_ternak'];?></td>
                    <td><?php echo $data['kp_ikan'];?></td>
                    <td><?php echo $data['kp_warung'];?></td>
                    <td><?php echo $data['kp_lumbung'];?></td>
                    <td><?php echo $data['kp_toga'];?></td>
                    <td><?php echo $data['kp_tanaman'];?></td>
                    <td><?php echo $data['i_pangan'];?></td>
                    <td><?php echo $data['i_sandang'];?></td>
                    <td><?php echo $data['i_jasa'];?></td>
                    <td><?php echo $data['kes_ling'];?></td>
                    <td><?php echo $data['ket'];?></td>
                  <td>
                      
                      
                  <!--<button -->
                  <!--    data-id="<?= $data['id'] ?>" -->
                  <!--   data-nama_ling="<?= $data['nama_ling'] ?>" -->
                  <!--  data-j_rw="<?= $data['j_rw']?>"-->
                  <!--  data-j_rt="<?= $data['j_rt']?>"-->
                  <!--  data-j_dasawisma="<?= $data['j_dasawisma']?>"-->
                  <!--  data-j_krt="<?= $data['j_krt']?>"-->
                  <!--  data-j_kk="<?= $data['j_kk']?>"-->
                  <!--  data-j_a_total_l="<?= $data['j_a_total_l']?>"-->
                  <!--  data-j_a_total_p="<?= $data['j_a_total_p']?>"-->
                  <!--  data-j_a_balita_l="<?= $data['j_a_balita_l']?>"-->
                  <!--  data-j_a_balita_p="<?= $data['j_a_balita_p']?>"-->
                  <!--  data-j_a_pus="<?= $data['j_a_pus']?>"-->
                  <!--  data-j_a_wus="<?= $data['j_a_wus']?>"-->
                  <!--  data-j_a_hamil="<?= $data['j_a_hamil']?>"-->
                  <!--  data-j_a_susui="<?= $data['j_a_susui']?>"-->
                  <!--  data-j_a_lansia="<?= $data['j_a_lansia']?>"-->
                  <!--  data-j_a_blaki="<?= $data['j_a_blaki']?>"-->
                  <!--  data-j_a_bcwe="<?= $data['j_a_bcwe']?>"-->
                  <!--  data-j_a_bb="<?= $data['j_a_bb']?>"-->
                  <!--  data-kr_sehat="<?= $data['kr_sehat']?>"-->
                  <!--  data-kr_tdk_sehat="<?= $data['kr_tdk_sehat']?>"-->
                  <!--  data-jr_tsampah="<?= $data['jr_tsampah']?>"-->
                  <!--  data-jr_spal="<?= $data['jr_spal']?>"-->
                  <!--  data-jr_jamban="<?= $data['jr_jamban']?>"-->
                  <!--  data-jr_stiker="<?= $data['jr_stiker']?>"-->
                  <!--  data-sak_pdam="<?= $data['sak_pdam']?>"-->
                  <!--  data-sak_sumur="<?= $data['sak_sumur']?>"-->
                  <!--  data-sak_sungai="<?= $data['sak_sungai']?>"-->
                  <!--  data-sak_dll="<?= $data['sak_dll']?>"-->
                  <!--  data-mp_beras="<?= $data['mp_beras']?>"-->
                  <!--  data-mp_nonberas="<?= $data['mp_nonberas']?>"-->
                  <!--  data-jkk_tabung="<?= $data['jkk_tabung']?>"-->
                  <!--  data-k_upk="<?= $data['k_upk']?>"-->
                  <!--  data-kp_ternak="<?= $data['kp_ternak']?>"-->
                  <!--  data-kp_ikan="<?= $data['kp_ikan']?>"-->
                  <!--  data-kp_warung="<?= $data['kp_warung']?>"-->
                  <!--  data-kp_lumbung="<?= $data['kp_lumbung']?>"-->
                  <!--  data-kp_toga="<?= $data['kp_toga']?>"-->
                  <!--  data-kp_tanaman="<?= $data['kp_tanaman']?>"-->
                  <!--  data-i_pangan="<?= $data['i_pangan']?>"-->
                  <!--  data-i_sandang="<?= $data['i_sandang']?>"-->
                  <!--  data-i_jasa="<?= $data['i_jasa']?>"-->
                  <!--  data-kes_ling="<?= $data['kes_ling']?>"-->
                  <!--  data-ket="<?= $data['ket']?>"-->
                  <!--  data-status="<?= $data['status']?>"-->
                  <!--    type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>-->
                  <!--  <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>-->
                  -
                  
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
                    <th>Nama Kelurahan</th>
                    <th>Jumlah Lingkungan</th>
                    <th>Jumlah RW</th>
                    <th>Jumlah RT</th>
                    <th>Jumlah Dasa Wisma</th>
                    <th>Jumlah Kepala Rumah Tangga</th>
                    <th>Jumlah KK</th>
                    <th>Jumlah Anggota Keluarga Total Laki Laki</th>
                    <th>Jumlah Anggota Keluarga Total Perempuan</th>
                    <th>Jumlah Balita Keluarga Total Laki Laki</th>
                    <th>Jumlah Balita Keluarga Total Perempuan</th>
                    <th>Jumlah Anggota Keluarga PUS</th>
                    <th>Jumlah Anggota Keluarga WUS</th>
                    <th>Jumlah Anggota Keluarga Ibu Hamil</th>
                    <th>Jumlah Anggota Keluarga Ibu Menyusui</th>
                    <th>Jumlah Anggota Keluarga Lansia</th>
                    <th>Jumlah Anggota Keluarga 3 Buta Laki</th>
                    <th>Jumlah Anggota Keluarga 3 Buta Perempuan</th>
                    <th>Jumlah Anggota Keluarga Berkebutuhan Khusus</th>
                    <th>Kriteria Rumah Sehat</th>
                    <th>Kriteria Rumah Tidak Sehat</th>
                    <th>Jumlah Rumah Memiliki Tj_rw Pemb Sampah</th>
                    <th>Jumlah Rumah Memiliki SPAL</th>
                    <th>Jumlah Rumah Memiliki Jamban Keluarga</th>
                    <th>Jumlah Rumah Menempel Stiker P4K</th>
                    <th>Sumber Air Keluarga PDAM</th>
                    <th>Sumber Air Keluarga Sumur</th>
                    <th>Sumber Air Keluarga Sungai</th>
                    <th>Sumber Air Keluarga Dll</th>
                    <th>Makanan Pokok Beras</th>
                    <th>Makanan Pokok Non Beras</th>
                    <th>Jumlah KK yang Memiliki Tabungan</th>
                    <th>Keluarga Mengikuti Kegiatan UP2K</th>
                    <th>Keluarga Mengikuti Kegiatan Pemanfaatan Peternakan</th>
                    <th>Keluarga Mengikuti Kegiatan Pemanfaatan Perikanan</th>
                    <th>Keluarga Mengikuti Kegiatan Pemanfaatan Warung Hidup</th>
                    <th>Keluarga Mengikuti Kegiatan Pemanfaatan Lumbung Hidup</th>
                    <th>Keluarga Mengikuti Kegiatan Pemanfaatan Toga</th>
                    <th>Keluarga Mengikuti Kegiatan Tanaman Keras</th>
                    <th>Keluarga Mengikuti Kegiatan Industri Pangan</th>
                    <th>Keluarga Mengikuti Kegiatan Industri Sandang</th>
                    <th>Keluarga Mengikuti Kegiatan Industri Jasa</th>
                    <th>Keluarga Mengikuti Kegiatan Kesehatan Lingkungan</th>
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
            <label class="col-form-label">Nama Lingkungan :</label>
            <input type="text" class="form-control" id="myInput" name="nama_ling" placeholder="Silahkan Masukan Nama Lingkungan" />
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah RW : </label>       
                <input type="text" class="form-control" name="j_rw" placeholder="Silahkan Mengisi Jumlah RW"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah RT : </label>       
                <input type="text" class="form-control" name="j_rt" placeholder="Silahkan Mengisi Jumlah RT"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Dasa Wisma : </label>       
                <input type="text" class="form-control" name="j_dasawisma" placeholder="Silahkan Mengisi Jumlah Dasa Wisma"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Kepala Rumah Tangga : </label>       
                <input type="text" class="form-control" name="j_krt" placeholder="Silahkan Mengisi Jumlah Kepala Rumah Tangga"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KK : </label>       
                <input type="text" class="form-control" name="j_kk" placeholder="Silahkan Mengisi Jumlah KK"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga Total Laki Laki : </label>       
                <input type="text" class="form-control" name="j_a_total_l" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga Total Laki Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga Total Perempuan : </label>       
                <input type="text" class="form-control" name="j_a_total_p" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga Total Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Balita Keluarga Total Laki Laki : </label>       
                <input type="text" class="form-control" name="j_a_balita_l" placeholder="Silahkan Mengisi Jumlah Balita Keluarga Total Laki Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Balita Keluarga Total Perempuan : </label>       
                <input type="text" class="form-control" name="j_a_balita_p" placeholder="Silahkan Mengisi Jumlah Balita Keluarga Total Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga PUS : </label>       
                <input type="text" class="form-control" name="j_a_pus" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga PUS"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga WUS : </label>       
                <input type="text" class="form-control" name="j_a_wus" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga WUS"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga Ibu Hamil : </label>       
                <input type="text" class="form-control" name="j_a_hamil" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga Ibu Hamil"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga Ibu Menyusui : </label>       
                <input type="text" class="form-control" name="j_a_susui" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga Ibu Menyusui"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga Lansia : </label>       
                <input type="text" class="form-control" name="j_a_lansia" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga Lansia"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga 3 Buta Laki : </label>       
                <input type="text" class="form-control" name="j_a_blaki" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga 3 Buta Laki"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga 3 Buta Perempuan : </label>       
                <input type="text" class="form-control" name="j_a_bcwe" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga 3 Buta Perempuan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Anggota Keluarga Berkebutuhan Khusus : </label>       
                <input type="text" class="form-control" name="j_a_bb" placeholder="Silahkan Mengisi Jumlah Anggota Keluarga Berkebutuhan Khusus"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kriteria Rumah Sehat : </label>       
                <input type="text" class="form-control" name="kr_sehat" placeholder="Silahkan Mengisi Kriteria Rumah Sehat"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Kriteria Rumah Tidak Sehat : </label>       
                <input type="text" class="form-control" name="kr_tdk_sehat" placeholder="Silahkan Mengisi Kriteria Rumah Tidak Sehat"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Memiliki Tj_rw Pemb Sampah : </label>       
                <input type="text" class="form-control" name="jr_tsampah" placeholder="Silahkan Mengisi Jumlah Rumah Memiliki Tj_rw Pemb Sampah"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Memiliki SPAL : </label>       
                <input type="text" class="form-control" name="jr_spal" placeholder="Silahkan Mengisi Jumlah Rumah Memiliki SPAL"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Memiliki Jamban Keluarga : </label>       
                <input type="text" class="form-control" name="jr_jamban" placeholder="Silahkan Mengisi Jumlah Rumah Memiliki Jamban Keluarga"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah Rumah Menempel Stiker P4K : </label>       
                <input type="text" class="form-control" name="jr_stiker" placeholder="Silahkan Mengisi Jumlah Rumah Menempel Stiker P4K"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Sumber Air Keluarga PDAM : </label>       
                <input type="text" class="form-control" name="sak_pdam" placeholder="Silahkan Mengisi Sumber Air Keluarga PDAM"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Sumber Air Keluarga Sumur : </label>       
                <input type="text" class="form-control" name="sak_sumur" placeholder="Silahkan Mengisi Sumber Air Keluarga Sumur"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Sumber Air Keluarga Sungai : </label>       
                <input type="text" class="form-control" name="sak_sungai" placeholder="Silahkan Mengisi Sumber Air Keluarga Sungai"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Sumber Air Keluarga Dll : </label>       
                <input type="text" class="form-control" name="sak_dll" placeholder="Silahkan Mengisi Sumber Air Keluarga Dll"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Makanan Pokok Beras : </label>       
                <input type="text" class="form-control" name="mp_beras" placeholder="Silahkan Mengisi Makanan Pokok Beras"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Makanan Pokok Non Beras : </label>       
                <input type="text" class="form-control" name="mp_nonberas" placeholder="Silahkan Mengisi Makanan Pokok Non Beras"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Jumlah KK yang Memiliki Tabungan : </label>       
                <input type="text" class="form-control" name="jkk_tabung" placeholder="Silahkan Mengisi Jumlah KK yang Memiliki Tabungan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan UP2K : </label>       
                <input type="text" class="form-control" name="k_upk" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan UP2K"/>
            </div>
            
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Peternakan : </label>       
                <input type="text" class="form-control" name="kp_ternak" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Pemanfaatan Peternakan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Perikanan : </label>       
                <input type="text" class="form-control" name="kp_ikan" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Pemanfaatan Perikanan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Warung Hidup : </label>       
                <input type="text" class="form-control" name="kp_warung" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Pemanfaatan Warung Hidup"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Lumbung Hidup : </label>       
                <input type="text" class="form-control" name="kp_lumbung" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Pemanfaatan Lumbung Hidup"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Toga : </label>       
                <input type="text" class="form-control" name="kp_toga" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Pemanfaatan Toga"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Tanaman Keras : </label>       
                <input type="text" class="form-control" name="kp_tanaman" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Tanaman Keras"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Industri Pangan : </label>       
                <input type="text" class="form-control" name="i_pangan" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Industri Pangan"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Industri Sandang : </label>       
                <input type="text" class="form-control" name="i_sandang" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Industri Sandang"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Industri Jasa : </label>       
                <input type="text" class="form-control" name="i_jasa" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Industri Jasa"/>
            </div>
            
            <div class="form-group">
            <label class="control-label" >Keluarga Mengikuti Kegiatan Kesehatan Lingkungan : </label>       
                <input type="text" class="form-control" name="kes_ling" placeholder="Silahkan Mengisi Keluarga Mengikuti Kegiatan Kesehatan Lingkungan"/>
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
                    <input type="text" class="form-control" id="nama_ling_edit" name="nama_ling" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah RW : </label>         
                    <input type="text" class="form-control" id="j_rw_edit" name="j_rw" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah RT : </label>         
                    <input type="text" class="form-control" id="j_rt_edit" name="j_rt" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Dasa Wisma : </label>         
                    <input type="text" class="form-control" id="j_dasawisma_edit" name="j_dasawisma" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Kepala Rumah Tangga : </label>         
                    <input type="text" class="form-control" id="j_krt_edit" name="j_krt" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KK : </label>         
                    <input type="text" class="form-control" id="j_kk_edit" name="j_kk" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga Total Laki Laki : </label>         
                    <input type="text" class="form-control" id="j_a_total_l_edit" name="j_a_total_l" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga Total Perempuan : </label>         
                    <input type="text" class="form-control" id="j_a_total_p_edit" name="j_a_total_p" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Balita Keluarga Total Laki Laki : </label>         
                    <input type="text" class="form-control" id="j_a_balita_l_edit" name="j_a_balita_l" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Balita Keluarga Total Perempuan : </label>         
                    <input type="text" class="form-control" id="j_a_balita_p_edit" name="j_a_balita_p" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga PUS : </label>         
                    <input type="text" class="form-control" id="j_a_pus_edit" name="j_a_pus" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga WUS : </label>         
                    <input type="text" class="form-control" id="j_a_wus_edit" name="j_a_wus" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga Ibu Hamil : </label>         
                    <input type="text" class="form-control" id="j_a_hamil_edit" name="j_a_hamil" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga Ibu Menyusui : </label>         
                    <input type="text" class="form-control" id="j_a_susui_edit" name="j_a_susui" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga Lansia : </label>         
                    <input type="text" class="form-control" id="j_a_lansia_edit" name="j_a_lansia" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga 3 Buta Laki : </label>         
                    <input type="text" class="form-control" id="j_a_blaki_edit" name="j_a_blaki" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga 3 Buta Perempuan : </label>         
                    <input type="text" class="form-control" id="j_a_bcwe_edit" name="j_a_bcwe" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Anggota Keluarga Berkebutuhan Khusus : </label>         
                    <input type="text" class="form-control" id="j_a_bb_edit" name="j_a_bb" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Kriteria Rumah Sehat : </label>         
                    <input type="text" class="form-control" id="kr_sehat_edit" name="kr_sehat" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Kriteria Rumah Tidak Sehat : </label>         
                    <input type="text" class="form-control" id="kr_tdk_sehat_edit" name="kr_tdk_sehat" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Memiliki Tj_rw Pemb Sampah : </label>         
                    <input type="text" class="form-control" id="jr_tsampah_edit" name="jr_tsampah" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Memiliki SPAL : </label>         
                    <input type="text" class="form-control" id="jr_spal_edit" name="jr_spal" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Memiliki Jamban Keluarga : </label>         
                    <input type="text" class="form-control" id="jr_jamban_edit" name="jr_jamban" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah Rumah Menempel Stiker P4K : </label>         
                    <input type="text" class="form-control" id="jr_stiker_edit" name="jr_stiker" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Sumber Air Keluarga PDAM : </label>         
                    <input type="text" class="form-control" id="sak_pdam_edit" name="sak_pdam" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Sumber Air Keluarga Sumur : </label>         
                    <input type="text" class="form-control" id="sak_sumur_edit" name="sak_sumur" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Sumber Air Keluarga Sungai : </label>         
                    <input type="text" class="form-control" id="sak_sungai_edit" name="sak_sungai" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Sumber Air Keluarga Dll : </label>         
                    <input type="text" class="form-control" id="sak_dll_edit" name="sak_dll" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Makanan Pokok Beras : </label>         
                    <input type="text" class="form-control" id="mp_beras_edit" name="mp_beras" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Makanan Pokok Non Beras : </label>         
                    <input type="text" class="form-control" id="mp_nonberas_edit" name="mp_nonberas" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Jumlah KK yang Memiliki Tabungan : </label>         
                    <input type="text" class="form-control" id="jkk_tabung_edit" name="jkk_tabung" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan UP2K : </label>         
                    <input type="text" class="form-control" id="k_upk_edit" name="k_upk" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Peternakan : </label>         
                    <input type="text" class="form-control" id="kp_ternak_edit" name="kp_ternak" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Perikanan : </label>         
                    <input type="text" class="form-control" id="kp_ikan_edit" name="kp_ikan" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Warung Hidup : </label>         
                    <input type="text" class="form-control" id="kp_warung_edit" name="kp_warung" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Lumbung Hidup : </label>         
                    <input type="text" class="form-control" id="kp_lumbung_edit" name="kp_lumbung" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Pemanfaatan Toga : </label>         
                    <input type="text" class="form-control" id="kp_toga_edit" name="kp_toga" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Tanaman Keras : </label>         
                    <input type="text" class="form-control" id="kp_tanaman_edit" name="kp_tanaman" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Industri Pangan : </label>         
                    <input type="text" class="form-control" id="i_pangan_edit" name="i_pangan" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Industri Sandang : </label>         
                    <input type="text" class="form-control" id="i_sandang_edit" name="i_sandang" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Industri Jasa : </label>         
                    <input type="text" class="form-control" id="i_jasa_edit" name="i_jasa" />
                </div>
                
                <div class="form-group">
                <label class="control-label" >Keluarga Mengikuti Kegiatan Kesehatan Lingkungan : </label>         
                    <input type="text" class="form-control" id="kes_ling_edit" name="kes_ling" />
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
            $("#nama_ling_edit").val($(this).attr('data-nama_ling'));
            $("#j_rw_edit").val($(this).attr('data-j_rw'));
            $("#j_rt_edit").val($(this).attr('data-j_rt'));
            $("#j_dasawisma_edit").val($(this).attr('data-j_dasawisma'));
            $("#j_krt_edit").val($(this).attr('data-j_krt'));
            $("#j_kk_edit").val($(this).attr('data-j_kk'));
            $("#j_a_total_l_edit").val($(this).attr('data-j_a_total_l'));
            $("#j_a_total_p_edit").val($(this).attr('data-j_a_total_p'));
            $("#j_a_balita_l_edit").val($(this).attr('data-j_a_balita_l'));
            $("#j_a_balita_p_edit").val($(this).attr('data-j_a_balita_p'));
            $("#j_a_pus_edit").val($(this).attr('data-j_a_pus'));
            $("#j_a_wus_edit").val($(this).attr('data-j_a_wus'));
            $("#j_a_hamil_edit").val($(this).attr('data-j_a_hamil'));
            $("#j_a_susui_edit").val($(this).attr('data-j_a_susui'));
            $("#j_a_lansia_edit").val($(this).attr('data-j_a_lansia'));
            $("#j_a_blaki_edit").val($(this).attr('data-j_a_blaki'));
            $("#j_a_bcwe_edit").val($(this).attr('data-j_a_bcwe'));
            $("#j_a_bb_edit").val($(this).attr('data-j_a_bb'));
            $("#kr_sehat_edit").val($(this).attr('data-kr_sehat'));
            $("#kr_tdk_sehat_edit").val($(this).attr('data-kr_tdk_sehat'));
            $("#jr_tsampah_edit").val($(this).attr('data-jr_tsampah'));
            $("#jr_spal_edit").val($(this).attr('data-jr_spal'));
            $("#jr_jamban_edit").val($(this).attr('data-jr_jamban'));
            $("#jr_stiker_edit").val($(this).attr('data-jr_stiker'));
            $("#sak_pdam_edit").val($(this).attr('data-sak_pdam'));
            $("#sak_sumur_edit").val($(this).attr('data-sak_sumur'));
            $("#sak_sungai_edit").val($(this).attr('data-sak_sungai'));
            $("#sak_dll_edit").val($(this).attr('data-sak_dll'));
            $("#mp_beras_edit").val($(this).attr('data-mp_beras'));
            $("#mp_nonberas_edit").val($(this).attr('data-mp_nonberas'));
            $("#jkk_tabung_edit").val($(this).attr('data-jkk_tabung'));
            $("#k_upk_edit").val($(this).attr('data-k_upk'));
            $("#kp_ternak_edit").val($(this).attr('data-kp_ternak'));
            $("#kp_ikan_edit").val($(this).attr('data-kp_ikan'));
            $("#kp_warung_edit").val($(this).attr('data-kp_warung'));
            $("#kp_lumbung_edit").val($(this).attr('data-kp_lumbung'));
            $("#kp_toga_edit").val($(this).attr('data-kp_toga'));
            $("#kp_tanaman_edit").val($(this).attr('data-kp_tanaman'));
            $("#i_pangan_edit").val($(this).attr('data-i_pangan'));
            $("#i_sandang_edit").val($(this).attr('data-i_sandang'));
            $("#i_jasa_edit").val($(this).attr('data-i_jasa'));
            $("#kes_ling_edit").val($(this).attr('data-kes_ling'));
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
