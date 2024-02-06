<?php
error_reporting(0);
define("ROW_PER_PAGE",4);
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


<style>
.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
#keyword{border: #CCC 1px solid; border-radius: 4px; padding: 7px;background:url("demo-search-icon.png") no-repeat center right 7px;}
.btn-page{margin-right:10px;padding:5px 10px; border: #CCC 1px solid; background:#FFF; border-radius:4px;cursor:pointer;}
.btn-page:hover{background:#F0F0F0;}
.btn-page.current{background:#F0F0F0;}
</style> 


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
            <a href="#">Help</a>
          </h2>

          <div class="entry-meta">
            
          </div>

          <div class="entry-content" align="center">
              
             <!-- ======= Services Section ======= -->
  
    
    
    
     <section id="main-container" class="main-container">
  <div class="container">
   

    <div class="row">
      <div class="col-lg-12 col-md-12 mb-8 mb-lg-0">
                  <div class="row">
             

<p><strong>Kebijakan Akun di Aplikasi PKK BITUNG DIGITAL</strong></p>

<p>Dalam aplikasi PKK Bitung Digital, terdapat kebijakan yang menyatakan bahwa akun pengguna yang tidak digunakan selama kurang lebih 90 hari dapat dihapus. Kebijakan ini diterapkan dengan tujuan untuk menjaga kebersihan dan efisiensi dalam penggunaan aplikasi, sehingga akun-akun yang tidak aktif dalam jangka waktu yang lama tidak akan membebani sistem. Penghapusan otomatis ini juga bertujuan untuk mendorong pengguna aktif dalam memanfaatkan layanan yang disediakan oleh PKK Bitung Digital, sehingga penggunaan aplikasi ini tetap optimal dan bermanfaat bagi seluruh anggota komunitas.</p>

<p>Bagi pengguna, penting untuk diingat bahwa untuk mempertahankan akun mereka, mereka perlu secara rutin masuk dan berinteraksi dengan aplikasi. Dengan demikian, mereka dapat terus menikmati manfaat dari PKK Bitung Digital tanpa khawatir kehilangan akses ke akun mereka. Penghapusan akun yang tidak aktif selama 90 hari adalah langkah yang diambil untuk menjaga keamanan dan efisiensi aplikasi serta memastikan bahwa layanan yang disediakan selalu berfungsi dengan baik bagi seluruh pengguna.</p>


              
              
              
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