<!-- ======= Suku Bunga Section ======= --> 
<section id="team" class="team">
      <div class="container">

      <div class="section-title">
          <h2>Suku Bunga</h2>
          <p>BPR Prisma Dana</p>
        </div>


                <?php
                $sql = "SELECT * FROM sukubunga ORDER BY id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch();
                ?>

    <div class="row">
      <div class="col-6 member" >
            <div class="form-group row">
              <label style="text-align:left" class="col-sm-4 col-form-label">LPS BPR Rate</label>
              <div class="col-sm-8">
              <input type="text" style="text-align:right" class="form-control"  placeholder="%" value="<?php echo $row['bpr_rate']; ?>">
              </div>
            </div>
      </div>
      <div class="col-6 member">
            <div style="background-color:#FCF0DD;" class="form-group row">
              <label style="text-align:left" class="col-sm-4 col-form-label">Tabungan</label>
              <div class="col-sm-8">
              <input type="text" style="text-align:right" class="form-control"  placeholder="%" value="<?php echo $row['tabungan']; ?>">
              </div>
            </div>
            <br>

            <div style="background-color:#FCF0DD;" class="form-group row">
              <label style="text-align:left" class="col-sm-4 col-form-label">Simpanan Berjangka</label>
              <div class="col-sm-8">
              <input type="text" style="text-align:right" class="form-control"  placeholder="%" value="<?php echo $row['simpanan']; ?>">
              </div>
            </div>
            <br>

            <div style="background-color:#DDFCF8;" class="form-group row">
              <label style="text-align:left" class="col-sm-4 col-form-label">Deposito 1 Bulan</label>
              <div class="col-sm-8">
              <input type="text" style="text-align:right" class="form-control"  placeholder="%" value="<?php echo $row['depo1']; ?>">
              </div>
            </div>
            <br>

            <div style="background-color:#DDFCF8;" class="form-group row">
              <label style="text-align:left" class="col-sm-4 col-form-label">Deposito 3 Bulan</label>
              <div class="col-sm-8">
              <input type="text" style="text-align:right" class="form-control"  placeholder="%" value="<?php echo $row['depo3']; ?>">
              </div>
            </div>
            <br>

            <div style="background-color:#DDFCF8;" class="form-group row">
              <label style="text-align:left" class="col-sm-4 col-form-label">Deposito 12 Bulan</label>
              <div class="col-sm-8">
              <input type="text" style="text-align:right" class="form-control"  placeholder="%" value="<?php echo $row['depo12']; ?>">
              </div>
            </div>
            <br>

            <div class="form-group row">
              <label style="text-align:left" class="col-sm-4 col-form-label">Kredit</label>
              <div class="col-sm-8">
              <input type="text" style="text-align:right" class="form-control"  placeholder="%" value="<?php echo $row['kredit']; ?>">
              </div>
            </div>


      </div>
    </div>

    </div>
    </section>

    <!-- End Suku Bunga Section -->