  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        <?php 
        // $sql = "SELECT * FROM `m_post` WHERE stat = 2 ORDER BY id ASC";
        $sql = "SELECT * FROM `m_post` WHERE stat = 2 LIMIT 1";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        ?>

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(images/<?php echo $row['gambar'];?>)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><?php echo $row['nama'];?></h2>
                <p class="animate__animated animate__fadeInUp"><?php echo $row['sdes'];?></p>
                <?php
                if ($row['nama'] == ""){
                ?>
                
                
                <?php
                } else {
                ?>
                <a style="background-color:<?php echo $rowa['warna']; ?>;" href="post?p=<?php echo $row['id'];?>" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                <?php
                }
                ?>
                
              </div>
            </div>
          </div>

		
          <?php
            $sql = $conn->prepare("SELECT * FROM m_post WHERE stat = 2 AND id NOT IN (SELECT MAX(id) FROM m_post) ORDER BY id DESC");
            $sql->execute();
            while($data=$sql->fetch()) {
          ?>

          <!-- Slide Lanjutan  -->
          <div class="carousel-item" style="background-image: url(images/<?php echo $data['gambar'];?>)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><?php echo $data['nama'];?></h2>
                <p class="animate__animated animate__fadeInUp"><?php echo $data['sdes'];?></p>
                
                <?php
                if ($data['nama']==""){
                ?>
                
                <?php
                } else {
                ?>
                <a href="post?p=<?php echo $data['id'];?>" class="btn-get-started animate__animated animate__fadeInUp" style="background-color:<?php echo $rowa['warna']; ?>;">Read More</a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>

          <?php } ?>
               


        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section>
  <!-- End Hero -->