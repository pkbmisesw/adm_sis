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

      <h2 class="entry-title">
            <a href="#" style="color:black;">Data Umum - Kelurahan</a>
          </h2>

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
                      <th scope="col" rowspan="3">No</th>
                      <th scope="col" rowspan="3">Kecamatan</th>
                      <th scope="col" colspan="5" class="rapi">Jumlah Kelompok</th>
                      <th scope="col" colspan="2" class="rapi">Jumlah</th>
                      <th scope="col" colspan="2">Jumlah Jiwa</th>
                      <th scope="col" colspan="6">Jumlah Kader</th>
                      <th scope="col" colspan="4">Jumlah Tenaga Sekertariat</th>
                      <th scope="col" rowspan="3">Keterangan</th>
                    </tr>
                    <tr class="rapi">
                      <th scope="col" rowspan="2">Kelurahan</th>
                      <th scope="col" rowspan="2">Lingkungan</th>
                      <th scope="col" rowspan="2">PKK RW</th>
                      <th scope="col" rowspan="2">PKK RT</th>
                      <th scope="col" rowspan="2">Dasawisma</th>
                      <th scope="col" rowspan="2">Kepala Rumah Tangga</th>
                      <th scope="col" rowspan="2">Kepala Keluarga</th>
                      <th scope="col" rowspan="2">L</th>
                      <th scope="col" rowspan="2">P</th>
                      <th scope="col" colspan="2">Anggota TP PKK</th>
                      <th scope="col" colspan="2">Umum</th>
                      <th scope="col" colspan="2">Khusus</th>
                      <th scope="col" colspan="2">Honorer</th>
                      <th scope="col" colspan="2">Bantuan</th>
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
        				   
                           $sql = $conn->prepare("SELECT * FROM `d_umum` WHERE id_kec = '" .$id_kec. "' AND status = '" .$stat. "'");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                        ?>
                
                    <tr class="rapi">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['kecamatan'];?></td>
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