 <!-- ======= About Section ======= -->
 <section id="about" class="about">
      <div class="container">

      <div class="section-title">
          <h2 style="color:<?php echo $rowa['warna']; ?>;">Tentang Kami</h2>
          <p>Tentang Kami</p>
        </div>
   
      <?php 
        $sql = "SELECT * FROM `m_post` WHERE stat = 5 ORDER BY id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        ?>

        <div class="row">
          <div class="col-lg-6 " align="center">
            <img src="images/<?php echo $row['gambar'];?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3><?php echo $row['nama'];?></h3>
            <?php echo $row['des'];?>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->