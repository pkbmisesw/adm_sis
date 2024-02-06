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
            <a href="#">Data Pengurus</a>
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
             
                      
<?php	
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM m_user WHERE level_id = 4 AND nama LIKE :keyword';
	
	// dibawah ini kalau mau cari semua baik nama sdes dll,,
// 	$sql = 'SELECT * FROM m_post WHERE stat = 1 AND nama LIKE :keyword OR sdes LIKE :keyword OR created_at LIKE :keyword ORDER BY id DESC ';
	
	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $conn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
				}
			}
		}
		$per_page_html .= "</div>";
	}
	
	$query = $sql.$limit;
	$pdo_statement = $conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>

 <div class="row">
      <div class="col-lg-12 col-md-12 mb-8 mb-lg-0">
                  <div class="row">
                      
<form name='frmSearch' action='' method='post'>
<div style='text-align:right;margin:20px 0px;'><input type='text' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'></div>
<table class='tbl-qa' >
  <thead>
	<tr>
	    
	  <th class='table-header' width='50%'>Foto Pengurus</th>
	  <th class='table-header' width='50%'>Nama</th>
	</tr>
  </thead>
  <tbody id='table-body'>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class='table-row'>
	    <td><img src="images/<?php echo $row['gambar']; ?>" width="100%" height="100%"></td>
		<td>
		<b><?php echo $row['nama']; ?></b><br>
		<a><?php echo $row['jabatan']; ?></a>
		<a href="https://api.whatsapp.com/send?phone=<?php echo $row['hp']; ?>&text=Saya ingin bertanya tentang layanan ?">Hubungi WA</a>
		</td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>

  </div>
              </div>
              
               </div>
<?php echo $per_page_html; ?>
</form>
                      
                      
   
            
                       
                         
               </div>
              </div>
              
               </div>
      </div>
      
</section>    
              
              
              
              
              
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