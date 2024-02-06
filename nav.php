
<body>

  <!-- ======= Top Bar ======= -->
  <!--<section id="topbar" class="d-flex align-items-center" style="background-color:<?php echo $rowa['warna']; ?>;">-->
      
       <section id="topbar" class="d-flex align-items-center" style="background-image: linear-gradient(#00c3cb, #ff3c34);">
      <!--00c3cb ff3c34-->
      <!--background-image: linear-gradient(red, yellow);-->
     
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i style="color:black;" class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?php echo $rowa['email']; ?>"><?php echo $rowa['email']; ?></a></i>
        <i style="color:black;" class="bi bi-phone d-flex align-items-center ms-4"><span>+<?php echo $rowa['wa']; ?></span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center" >
        <?php foreach($datai as $datar) { ?>
        <a href="<?php echo $datar['sdes'];?>" style="color:white;" ><i class="<?php echo $datar['kelas'];?>"></i></a>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center" style="box-shadow: 5px 5px 2px <?php echo $rowa['neon']; ?>;">
    <div class="container d-flex justify-content-between align-items-center" >

      <div class="logo">
        <a href="./"><img src="images/logo.png?p=2" ></a>
        <!-- <h1><a href="index.html">Eterna</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar" >
        <ul>
          <li ><a style="color:<?php echo $rowa['warna']; ?>;" class="active" href="./">Home</a></li>
		  
		      <?php
                $sql = $conn->prepare("SELECT * FROM `m_pages` ORDER BY urut ASC");
                $sql->execute();
                while($data=$sql->fetch()) {
              ?>
			  
			  <?php
              if ($data['stat'] == 0){
              ?>
		  
          <li ><a href="<?php echo $data['url'];?><?php echo $data['id'];?>"><?php echo $data['nama'];?></a></li>
          
         
			  <?php    
              }elseif ($data['stat'] == 1){
              ?>
			  
			  <li class="dropdown"><a href="#"><span><?php echo $data['nama'];?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
			     <?php
                    $sqlz = $conn->prepare("SELECT * FROM `m_subpages` WHERE pages_id = '".$data['id']."'");
                    $sqlz->execute();
                    while($dataz=$sqlz->fetch()) {
                  ?>
				  
				  <?php
              if ($dataz['stat'] == 0){
              ?>
			
			
              <li><a href="<?php echo $dataz['url'];?><?php echo $dataz['id'];?>"><?php echo $dataz['nama'];?></a></li>
			  
			   <?php }elseif ($dataz['stat'] == 1){ ?>
              
			  
			  <li class="dropdown"><a href="#"><span><?php echo $dataz['nama'];?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
				
				<?php
                    $sqlza = $conn->prepare("SELECT * FROM `m_subpages` WHERE spages_id = '".$dataz['id']."'");
                    $sqlza->execute();
                    while($dataza=$sqlza->fetch()) {
                  ?>
				
				<?php
				if ($dataza['stat'] != 2){ ?>
                  <li><a href="<?php echo $dataza['url'];?><?php echo $dataza['id'];?>"><?php echo $dataza['nama'];?></a></li>
				<?php }elseif ($dataza['stat'] == 2){ ?>
				<li><a href="<?php echo $dataza['url'];?>"><?php echo $dataza['nama'];?></a></li>
				
				   <?php } ; ?>
				   <?php } ; ?>
				  
                </ul>
              </li>
              <?php }elseif ($dataz['stat'] == 2){ ?>
              
              <li><a href="<?php echo $dataz['url'];?>"><?php echo $dataz['nama'];?></a></li>
              
			  <?php } ; ?>
			  
			  <?php } ; ?>
              
			  
			
			  
            </ul>
          </li>
			  
			  
		  
		  <?php 
              }elseif ($data['stat'] == 2){
		  ?>
		  
		  <li><a href="<?php echo $data['url'];?>"><?php echo $data['nama'];?></a></li>
		  
		  
		  <?php } ; ?>
			  
			  <?php } ; ?>
		  
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


