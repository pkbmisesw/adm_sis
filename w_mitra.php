<!-- ======= Mitra Section ======= -->
<section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2 style="color:<?php echo $rowa['warna']; ?>;">Mitra</h2>
          <p>Mitra kami</p>
        </div>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
          <?php
          $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = 6");
          $sql->execute();
          while($data=$sql->fetch()) {
          ?>  
            <div class="swiper-slide"><img src="images/<?php echo $data['gambar'];?>" class="img-fluid" alt=""></div>
          
          <?php } ?>  
          
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    <!-- End Mitra Section -->