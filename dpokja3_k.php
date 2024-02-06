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
                <th rowspan="3">Kelurahan</th>
                <th colspan="3">Jumlah Kader</th>
                <th colspan="8">Pangan</th>
                <th colspan="3">Jumlah Industri Rumah tangga</th>
                <th colspan="2">Jumlah Rumah</th>
                <th rowspan="3">Keterangan</th>
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
        				   
                           $sql = $conn->prepare("SELECT * FROM `d_pokjac` WHERE id_kec = '" .$id_kec. "' AND status = '" .$stat. "'");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                        ?>
                
                    <tr class="rapi">
                     <td><?php echo $count; ?></td>
                    <td><?php echo $data['kecamatan'];?></td>
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