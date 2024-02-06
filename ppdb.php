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

    
    <h2 style="color:<?php echo $rowa['warna']; ?>;">PPDB</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-8 entries">

        <article class="entry entry-single">
        <!-- ======= Isian PPDB ======= -->
        <form action="reg_ppdb.php" method="post" class="user" enctype="multipart/form-data">
        <h2 class="entry-title">
            <a href="#">Sistem PPDB Silahkan di input</a>
          </h2>
        
        
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" name="gender" >
                      <option value="1">Laki - Laki</option>
                      <option value="2">Perempuan</option>
                    </select>
            </div>
            <br>
            
            <div class="form-group">
                <label for="">NISN</label>
                <input type="text" name="nisn" class="form-control" placeholder="NISN" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" name="nik" class="form-control" placeholder="Nik" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Nomor Kartu Keluarga</label>
                <input type="text" name="n_kk" class="form-control" placeholder="Nomor Kartu Keluarga" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Nomor Akta Kelahiran</label>
                <input type="text" name="n_akta" class="form-control" placeholder="Nomor Akta Kelahiran" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Agama</label>
                <select class="form-control" name="agama" >
                      <option value="1">Islam</option>
                      <option value="2">Kristen</option>
                      <option value="3">Katolik</option>
                      <option value="4">Hindu</option>
                      <option value="5">Budha</option>
                    </select>
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Kebutuhan Khusus</label>
                <select class="form-control" name="k_khusus" >
                      <option value="0">Tidak</option>
                      <option value="1">Netra (A)</option>
                      <option value="2">Rungu (B)</option>
                      <option value="3">Grahita ringan ( C )</option>
                      <option value="4">Grahita Sedang (C1)</option>
                      <option value="5">Daksa Ringan (D)</option>
                      <option value="6">Daksa Sedang (D1)</option>
                      <option value="7">Wicara (F)</option>
                      <option value="8">Tuna ganda (G)</option>
                      <option value="9">Hiper aktif (H)</option>
                      <option value="10">Cerdas Istimewa (i)</option>
                      <option value="11">Bakat Istimewa (J)</option>
                      <option value="12">Kesulitan Belajar (K)</option>
                      <option value="13">Indigo (O)</option>
                      <option value="14">Down Sindrome (P)</option>
                      <option value="15">Autis (Q)</option>
                    </select>
            </div>
            <br>
            
            <div class="form-group">
                <label for="">Hp / Wa</label>
                <input type="text" name="hp" class="form-control" placeholder="Nomor Hp/wa" required >
            </div>
            <br>
            
            <div class="form-group">
                <label for="inputSuket"><a style="color:red;">* Upload Surat Keterangan Lulus</a></label>
                <input type="file" name="suket" class="form-control" placeholder="Surat Ketarangan Lulus" required >
            </div>
            <br>

          
          <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
        </form>
          
          
          <!-- ======= end PPDB ======= -->

         

         

        </article><!-- End blog entry -->


      </div><!-- End blog entries list -->

      <div class="col-lg-4">

        <div class="sidebar">

          <h3 class="sidebar-title">Search</h3>
          <div class="sidebar-item search-form">
            <form action="">
              <input type="text">
              <button style="background-color:<?php echo $rowa['warna']; ?>;" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End sidebar search formn-->

         

         
          <!-- End sidebar recent posts-->

         

        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>
</section><!-- End Blog Single Section -->

</main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">


      
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