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

      <div class="col-lg-8 entries">

        <article class="entry entry-single">

          <div class="entry-img">
            <img src="images/<?php echo $rowp['gambar'];?>" alt="" class="img-fluid">
          </div>

          <h2 class="entry-title">
            <a href="#"><?php echo $rowp['nama']; ?></a>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?php echo $rowp['penulis']; ?></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?php echo $rowp['tgl']; ?>"><?php echo $rowp['tgl']; ?></time></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="#">Dilihat <?php echo $rowp['view']; ?> Kali</a></li>
            </ul>
          </div>

          <?php
          
          $view = $rowp['view'] + 1; 
          
          try {
              $sql = "UPDATE m_subpages SET 
                view = :view
                WHERE id = $p" 
              ;
    
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(':view', $view);
              $stmt->execute();
            }
            catch(PDOException $e) {
              echo $e->getMessage();
            }
	    
		
		
        
        if($stmt){		
// 			echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_post')</script>";
        echo "<script>alert('Data telah dirubah'); )</script>";
		}else{
			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_post')</script>";
		}
		
		?>

          <div class="entry-content">
          <?php echo $rowp['des']; ?>
          </div>

          <div class="entry-footer">
            <i class="bi bi-tags"></i>
            <ul class="tags">
              <li><a href="#">-</a></li>
            </ul>
          </div>

        </article><!-- End blog entry -->


      </div><!-- End blog entries list -->

      <div class="col-lg-4">

        <div class="sidebar">

          <h3 class="sidebar-title">Search</h3>
          <div class="sidebar-item search-form">
            <form action="">
              <input type="text">
              <button type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End sidebar search formn-->

         

          <?php
          include 'spost.php';
          ?>
          <!-- End sidebar recent posts-->

         

        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

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