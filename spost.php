<h3 class="sidebar-title">Recent Posts</h3>
          <div class="sidebar-item recent-posts">

          <?php
          $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = 1 ORDER BY id DESC LIMIT 5 ");
          $sql->execute();
          while($data=$sql->fetch()) {
          ?>  
            <div class="post-item clearfix">
              <img src="images/<?php echo $data['gambar'];?>" alt="">
              <h4><a href="post?p=<?php echo $data['id'];?>"><?php echo $data['nama'];?></a></h4>
              <time datetime="<?php echo $data['tgl'];?>"><?php echo $data['tgl'];?></time>
            </div>
          <?php } ?>

          </div>