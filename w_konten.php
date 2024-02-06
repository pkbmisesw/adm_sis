

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row" >

        <?php
       $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = 4 ORDER BY id DESC Limit 3");
       $sql->execute();
       while($data=$sql->fetch()) {
       ?>   


          <div class="col-lg-4" >
            <div class="icon-box">
              <i style="color:<?php echo $rowa['warna']; ?>;" class="<?php echo $data['kelas'];?>"></i>
              <h3><a href="post?p=<?php echo $data['id'];?>"><?php echo $data['nama'];?></a></h3>
              <p><?php echo $data['sdes'];?></p>
            </div>
          </div>

          <?php } ?>  

        </div>

      </div>
    </section>
    <!-- End Featured Section -->