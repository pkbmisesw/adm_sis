<?php
error_reporting(0);
include 'config.php';

$sqla = "SELECT * FROM setting ORDER BY id DESC";
$stmta = $conn->prepare($sqla);
$stmta->execute();
$rowa = $stmta->fetch();

$p = $_GET['p'];
$sqlp = "SELECT * FROM m_subpages WHERE id = $p";
$stmtp = $conn->prepare($sqlp);
$stmtp->execute();
$rowp = $stmtp->fetch();

?>

  <?php 
  include 'head.php'; 
  include 'nav.php'; 
  ?>

<main id="main">
    
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

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    
    <h2><?php echo $rowp['nama']; ?></h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <!--<div class="col-lg-12 entries">-->

      <!--  <article class="entry entry-single">-->

      <!--    <div class="entry-img">-->
      <!--      <img src="images/<?php echo $rowp['gambar'];?>" alt="" class="img-fluid">-->
      <!--    </div>-->

      <!--    <h2 class="entry-title">-->
      <!--      <a href="#">Data Umum</a>-->
      <!--    </h2>-->

      <!--    <div class="entry-meta">-->
      <!--      <ul>-->
      <!--        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?php echo $rowp['penulis']; ?></a></li>-->
      <!--        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?php echo $rowp['tgl']; ?>"><?php echo $rowp['tgl']; ?></time></a></li>-->
      <!--      </ul>-->
      <!--    </div>-->

          <div class="entry-content">
              <!-- Isi -->
              
              <table style="border:1px solid black;" class="table table-bordered">
                   <thead class="rapi">
          <tr class="rapi">
            <th rowspan="4">No</th>
            <th rowspan="4">Kecamatan</th>
            <th colspan="23">Pendidikan dan keterampilan</th>
            <th colspan="10">Pengembangan kehidupan koperasi</th>
            <th rowspan="4">Keterangan</th>
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
        				   
                           $sql = $conn->prepare("SELECT * FROM `d_pokjab` WHERE status = 1 ORDER BY no_urut ASC");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                        ?>
                
                    <tr class="rapi">
                     <td><?php echo $count; ?></td>
                    <td><a href="dpokja2_k?p=<?php echo $data['id'];?>&s=2&kec=<?php echo $data['kecamatan'];?>"><?php echo $data['kecamatan'];?></a></td>
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
                    </tr>
                    
                    <?php
                $count=$count+1;
                } 
                ?>
                  </tbody>
                   <tfoot>
                      <?php
                           $sql = $conn->prepare("SELECT * FROM `d_pokjab` WHERE status = 3");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                            ?>
                      <tr>
                          <td colspan="2"><?php echo $data['kecamatan'];?></td>
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
                      </tr>
                      <?php } ?>
                  </tfoot>
                </table>
              
              
              
              
              <!-- END ISI -- >
              
              
              
              
              
              
          
          </div>

          <div class="entry-footer">
            <i class="bi bi-tags"></i>
            <ul class="tags">
              <li><a href="#">-</a></li>
            </ul>
          </div>

        </article><!-- End blog entry -->


      </div><!-- End blog entries list -->
      
      <div class="entry-img">
            <img src="images/<?php echo $rowp['gambar'];?>" alt="" class="img-fluid">
          </div>

     

    </div>

  </div>
</section><!-- End Blog Single Section -->

</main><!-- End #main -->





  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>