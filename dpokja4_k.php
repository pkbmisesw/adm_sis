<?php
error_reporting(0);
include 'config.php';

$sqla = "SELECT * FROM setting ORDER BY id DESC";
$stmta = $conn->prepare($sqla);
$stmta->execute();
$rowa = $stmta->fetch();

$stat = $_GET['s'];
$id_kec = $_GET['p'];

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

          <div class="entry-content">
              <!-- Isi -->
              
              <table style="border:1px solid black;" class="table table-bordered">
             <thead class="rapi">
            <tr class="rapi">
                <th rowspan="4">No</th>
                <th rowspan="4">Kecamatan</th>
                <th colspan="6">Jumlah Kader</th>
                <th colspan="5">Kesehatan</th>
                <th colspan="8">Kelestarian Lingkungan Hidup</th>
                <th colspan="5">Perencanaan Sehat</th>
                <th rowspan="4">Keterangan</th>
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
                
                    <tr class="rapi">
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
                    </tr>
                    
                    <?php
                $count=$count+1;
                } 
                ?>
                  </tbody>
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