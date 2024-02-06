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
            <a href="#">Privacy</a>
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
             

<p><strong>Kebijakan Privasi Aplikasi PKK BITUNG DIGITAL</strong></p>

<p><strong>Terakhir Diperbarui: [Tanggal Terakhir Diperbarui]</strong></p>

<p>Selamat datang di PKK BITUNG DIGITAL! Kami menghargai kepercayaan Anda dalam menggunakan aplikasi kami untuk mengelola kegiatan, data anggota, serta informasi berita dan kegiatan PKK di Kota Bitung. Kami berkomitmen untuk melindungi privasi Anda, dan dalam kebijakan privasi ini, kami menjelaskan bagaimana kami mengumpulkan, menggunakan, mengungkapkan, dan melindungi informasi pribadi Anda.</p>

<p><strong>1. Informasi yang Kami Kumpulkan</strong></p>

<p>Kami dapat mengumpulkan informasi pribadi Anda, termasuk tetapi tidak terbatas pada:</p>

<ul>
	<li>Nama lengkap</li>
	<li>Alamat email</li>
	<li>Nomor telepon</li>
	<li>Data anggota PKK</li>
	<li>Informasi kegiatan PKK</li>
	<li>Informasi berita dan kegiatan PKK</li>
</ul>

<p><strong>2. Bagaimana Kami Menggunakan Informasi Anda</strong></p>

<p>Informasi pribadi yang kami kumpulkan dapat digunakan untuk:</p>

<ul>
	<li>Mengelola kegiatan dan data anggota PKK</li>
	<li>Menyediakan informasi berita dan kegiatan PKK yang relevan</li>
	<li>Menghubungi Anda untuk tujuan administratif atau pemberitahuan</li>
	<li>Meningkatkan layanan kami</li>
</ul>

<p><strong>3. Bagaimana Kami Melindungi Informasi Anda</strong></p>

<p>Kami mengambil langkah-langkah keamanan yang wajar untuk melindungi informasi pribadi Anda dari akses, penggunaan, atau pengungkapan yang tidak sah. Data Anda disimpan di lingkungan yang aman, dan kami hanya memberikan akses kepada pihak yang memerlukan informasi tersebut untuk tujuan yang sah.</p>

<p><strong>4. Bagaimana Anda Mengakses atau Memperbarui Informasi Anda</strong></p>

<p>Anda memiliki hak untuk mengakses atau memperbarui informasi pribadi Anda yang kami simpan. Anda dapat menghubungi kami melalui alamat email [alamat email kontak] untuk melakukan permintaan ini.</p>

<p><strong>5. Pengungkapan Informasi kepada Pihak Ketiga</strong></p>

<p>Kami tidak akan menjual, menyewakan, atau membagikan informasi pribadi Anda kepada pihak ketiga tanpa izin Anda, kecuali jika diwajibkan oleh hukum.</p>

<p><strong>6. Perubahan pada Kebijakan Privasi</strong></p>

<p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Kami akan memberitahu Anda tentang perubahan tersebut dengan mengirimkan pemberitahuan ke alamat email yang Anda berikan atau dengan mempublikasikan versi terbaru dari kebijakan ini di aplikasi kami.</p>

<p>Dengan menggunakan aplikasi &quot;PKK BITUNG DIGITAL,&quot; Anda setuju dengan kebijakan privasi ini dan pemrosesan data Anda sesuai dengan ketentuan di dalamnya.</p>

<p>Jika Anda memiliki pertanyaan atau kekhawatiran terkait kebijakan privasi ini, jangan ragu untuk menghubungi kami melalui [kontak yang tersedia].</p>

<p>Terima kasih telah menggunakan &quot;PKK BITUNG DIGITAL.&quot; Kami berharap Anda dapat memanfaatkan aplikasi kami dengan baik.</p>

              
              
              
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