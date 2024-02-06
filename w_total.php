<!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row no-gutters">
            
            
        <?php
        $sql = "SELECT * FROM m_siswa";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        ?>    

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i style="color:<?php echo $rowa['warna']; ?>;" class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $count; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Total Siswa</strong> Siswa di Wilayah Gorut</p>
            </div>
          </div>
          
          
          <?php
        $sql = "SELECT * FROM m_sekolah";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        ?>    


          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i style="color:<?php echo $rowa['warna']; ?>;" class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $count; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Total Sekolah</strong> Sekolah di Wilayah Gorut</p>
            </div>
          </div>
          
           <?php
        $sql = "SELECT * FROM m_guru_tendik";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        ?> 

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i style="color:<?php echo $rowa['warna']; ?>;" class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $count; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Guru dan Tendik</strong> Guru dan Tendik di Wilayah Gorut</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i style="color:<?php echo $rowa['warna']; ?>;" class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Perpustakaan</strong> Total Perpustakaan</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Counts Section -->