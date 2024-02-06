 <!-- ======= Berita Section ======= --> 

 <section id="team" class="team">
<div class="container">

       <div class="section-title">
          <h2 style="color:<?php echo $rowa['warna']; ?>;">Berita</h2>
          <p>Berita Terbaru</p>
        </div>

        <div class="row">
          <?php
          $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = 1 ORDER by id DESC LIMIT 3");
          $sql->execute();
          while($data=$sql->fetch()) {
          ?>  

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="box-shadow: 2px 2px 2px <?php echo $rowa['neon']; ?>;">
            <div class="member">
              <a href="post?p=<?php echo $data['id'];?>"><img src="images/<?php echo $data['gambar'];?>" alt="" ></a>
              <span class="description">Penulis : <?php echo $data['penulis'];?> - <?php echo $data['tgl'];?> - Dilihat : <?php echo $data['view'];?> Kali</span>
              <a style="color:black;" href="post?p=<?php echo $data['id'];?>"><h4 align="left"><?php echo $data['nama'];?></h4></a>
              <p align="justify" style="color:black;">
                  <?php echo $data['sdes'];?> ...
              </p>
			          <a style="background-color:<?php echo $rowa['warna']; ?>;" href="post?p=<?php echo $data['id'];?>" class="btn btn-danger">Read More</a>
            </div>
          </div>

          <?php } ?>  
           

        </div>

      </div>
    </section>
    <!-- End Berita Section -->