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
                        <th rowspan="3">No</th>
                        <th rowspan="3">Kecamatan</th>
                        <th colspan="3">Jumlah Kader</th>
                        <th colspan="8">Penghayatan dan pengamalan pancasila</th>
                        <th colspan="5">Gotong royong</th>
                        <th rowspan="3">Keterangan</th>
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
        				   
                           $sql = $conn->prepare("SELECT * FROM `d_pokjaa` WHERE status = 1 ORDER BY no_urut ASC");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                        ?>
                
                    <tr class="rapi">
                    <td><?php echo $count; ?></td>
                  <td><a href="dpokja1_k?p=<?php echo $data['id'];?>&s=2&kec=<?php echo $data['kecamatan'];?>"><?php echo $data['kecamatan'];?></a></td>
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
                    </tr>
                    
                    <?php
                $count=$count+1;
                } 
                ?>
                  </tbody>
                  
                   <tfoot>
                      <?php
                           $sql = $conn->prepare("SELECT * FROM `d_pokjaa` WHERE status = 3");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                            ?>
                      <tr>
                          <td colspan="2"><?php echo $data['kecamatan'];?></td>
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