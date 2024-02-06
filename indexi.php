
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


                <?php
                
                if ($rowa['s_satu'] == ""){
                    
                }else{
                    $pos1 = $rowa['s_satu'];
                    include "$pos1";
                }
                
                if ($rowa['s_dua'] == ""){
                    
                }else{
                    $pos2 = $rowa['s_dua'];
                    include "$pos2";
                }
                
                if ($rowa['s_tiga'] == ""){
                    
                }else{
                    $pos3 = $rowa['s_tiga'];
                    include "$pos3";
                }
                
                if ($rowa['s_empat'] == ""){
                    
                }else{
                    $pos4 = $rowa['s_empat'];
                    include "$pos4";
                }
                
                if ($rowa['s_lima'] == ""){
                    
                }else{
                    $pos5 = $rowa['s_lima'];
                    include "$pos5";
                }
                
                if ($rowa['s_enam'] == ""){
                    
                }else{
                    $pos6 = $rowa['s_enam'];
                    include "$pos6";
                }

                ?>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    

    <div class="footer-top" >
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4><?php echo $rowa['nama']; ?></h4>
            <img src="images/favicon.png" width="100px" height="100px">
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

    <div class="container" >
      
    </div>
  </footer><!-- End Footer -->

  <a style="background-color:<?php echo $rowa['warna']; ?>;" href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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