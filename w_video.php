<!-- ======= Video Section ======= -->
<section class="about" >
      <div class="container" >

      <div class="section-title">
          <h2 style="color:<?php echo $rowa['warna']; ?>;">Video Company</h2>
          <p>Informasi Video</p>
        </div>
   
      <?php 
        $sql = "SELECT * FROM `setting` WHERE id = 1 ORDER BY id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        ?>

       
          <div class="d-flex justify-content-center" >
          <div class="member">
            <div class="embed-responsive embed-responsive-16by9" >
              <iframe class="embed-responsive-item" width="520" height="315" src="https://www.youtube.com/embed/<?php echo $row['yt'];?>"> </iframe>
              </div>
          </div>
          </div>

      </div>
    </section>
    <!-- End Video Section -->