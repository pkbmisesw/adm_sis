<?php
error_reporting(0);
include 'config.php';

$sqla = "SELECT * FROM setting ORDER BY id DESC";
$stmta = $conn->prepare($sqla);
$stmta->execute();
$rowa = $stmta->fetch();



?>

  <?php 
  include 'head.php'; 
  include 'nav.php'; 
  ?>

<main id="main">

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

      <div class="col-lg-12 entries">

        <article class="entry entry-single">

          <div class="entry-img">
            <!--<img src="images/<?php echo $rowp['gambar'];?>" alt="" class="img-fluid">-->
          </div>

          <h2 class="entry-title">
            <a href="#">Berita</a>
          </h2>

          <div class="entry-meta">
            
          </div>

          <div class="entry-content" align="center">
              
             <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="row">
            
             <?php
          $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = 1 ORDER by id DESC LIMIT 9");
          $sql->execute();
          while($data=$sql->fetch()) {
          ?>  
          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div >
              <a href="post?p=<?php echo $data['id'];?>"><img src="images/<?php echo $data['gambar'];?>"  width="300px" height="300px" alt=""></a>
              </div>
              
              <h4><a href="post?p=<?php echo $data['id'];?>"><?php echo $data['nama'];?></a></h4>
              <span class="description">Penulis : <?php echo $data['penulis'];?> - <?php echo $data['tgl'];?> - Dilihat : <?php echo $data['view'];?> Kali</span>
              <p><?php echo $data['sdes'];?> ...</p>
            </div>
          </div>
          
           <?php } ?> 

         

        </div>

      </div>
    </section><!-- End Services Section -->
    
              
              
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


  <!-- ======= Footer ======= -->
  <footer id="footer">

  

    <div class="footer-top">
      <div class="container">
        <div class="row">

         <div class="col-lg-3 col-md-6 footer-links">
            <h4><?php echo $rowa['nama']; ?></h4>
            <img src="images/<?php echo $rowa['logo']; ?>" width="100px" height="100px">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Description</h4>
            <p>
            <?php echo $rowa['des']; ?>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
            <?php echo $rowa['alamat']; ?>
            <br>
            <br>
              <strong>Phone:</strong> <?php echo $rowa['wa']; ?><br>
              <strong>Email:</strong> <?php echo $rowa['email']; ?><br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About <?php echo $rowa['nama']; ?></h3>
            <p><?php echo $rowa['des']; ?></p>
            <div class="social-links mt-3">
            <?php foreach($datai as $datar) { ?>
              <a href="<?php echo $datar['sdes'];?>" ><i class="<?php echo $datar['kelas'];?>"></i></a>
            <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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