 <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

      <!-- ======= Promo Section ======= --> 
      <div class="section-title">
          <h2 style="color:<?php echo $rowa['warna']; ?>;">Berita Utama</h2>
          <p>Berita Utama dan Populer</p>
        </div>

      <?php
          $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = 3");
          $sql->execute();
          while($data=$sql->fetch()) {
          ?> 

      <div class="row">
      <div class="col-6 col-md-4 d-flex member">
           <img src="images/<?php echo $data['gambar'];?>" alt="">
      </div>
      <div class="col-12 col-md-8 d-flex member">
         <div class="member">
              <h4 align="left"><?php echo $data['nama'];?></h4>
              <span class="description" align="left">Penulis : <?php echo $data['penulis'];?> - <?php echo $data['tgl'];?></span>
              <p align="justify" style="color:black;">
                  <?php echo $data['sdes'];?>
              </p>
              <div align="left">
			          <a href="post?p=<?php echo $data['id'];?>" style="background-color:<?php echo $rowa['warna']; ?>;" class="btn btn-danger">Read More</a>
              </div>
        </div>
      </div>
      </div>

      <?php } ?> 

      <!-- End Promo Section -->