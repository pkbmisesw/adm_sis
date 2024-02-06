<?php
error_reporting(0);
include 'config.php';

$sqla = "SELECT * FROM setting ORDER BY id DESC";
$stmta = $conn->prepare($sqla);
$stmta->execute();
$rowa = $stmta->fetch();

$p = $_GET['p'];
$sqlp = "SELECT * FROM m_subpages WHERE id = $p";
$stmtp = $conn->prepare($sqlp);
$stmtp->execute();
$rowp = $stmtp->fetch();


?>

  <?php 
  include 'head.php'; 
  include 'nav.php'; 
  ?>

<main id="main">
    
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid black;
}

th, td {
  padding: 8px;
  text-align: center;
  vertical-align: middle;
  border: 1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
    
    
<style>
    .rapi{
        text-align: center;
        vertical-align: middle;
    }
</style>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    
    <h2><?php echo $rowp['nama']; ?></h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">
        
        <h4 class="entry-title">
            <a href="#" style="color:black;">REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA</a><br>
            <a href="#" style="color:black;">TAHUN 2022</a>
          </h4>

            <br>
          <div class="entry-content">
              <!-- Isi -->
              
              <table style="border:1px solid black;" class="table table-bordered">
              <thead class="rapi">
                  <tr class="rapi">
                    <th rowspan="3">No</th>
                    <th rowspan="3">Kecamatan</th>
                    <th rowspan="3">Jumlah Kelurahan</th>
                    <th rowspan="3">Jumlah Lingkungan</th>
                    <th rowspan="3">Jumlah RW</th>
                    <th rowspan="3">Jumlah RT</th>
                    <th rowspan="3">Jumlah Dasar Wisma</th>
                    <th rowspan="3">Jumlah Kepala Rumah Tangga</th>
                    <th rowspan="3">Jumlah KK</th>
                    <th colspan="12" class="rapi">Jumlah Anggota Keluarga</th>
                    <th colspan="2">Kreteria Rumah</th>
                    <th colspan="4">Jumlah Rumah</th>
                    <th colspan="4">Sumber Air Keluarga</th>
                    <th colspan="2">Makanan Pokok</th>
                    <th rowspan="3">Jumlah KK yang memiliki tabungan</th>
                    <th colspan="11">Keluarga Mengikuti Kegiatan</th>
                    <th rowspan="3">Keterangan</th>
                  </tr>
                  <tr class="rapi">
                    <th colspan="2">Total</th>
                    <th colspan="2">Balita</th>
                    <th rowspan="2">PUS</th>
                    <th rowspan="2">WUS</th>
                    <th rowspan="2">Ibu Hamil</th>
                    <th rowspan="2">Ibu Menyusui</th>
                    <th rowspan="2">Lansia</th>
                    <th colspan="2">3 Buta</th>
                    <th rowspan="2">Berkebutuhan Khusus</th>
                    <th rowspan="2">Sehat</th>
                    <th rowspan="2">Tidak Sehat</th>
                    <th rowspan="2">Memiliki Tempat Pembuangan Sampah</th>
                    <th rowspan="2">Memiliki SPAL</th>
                    <th rowspan="2">Memiliki Jamban Keluarga</th>
                    <th rowspan="2">Memiliki Stiker P4K</th>
                    <th rowspan="2">PDAM</th>
                    <th rowspan="2">Sumur</th>
                    <th rowspan="2">Sungai</th>
                    <th rowspan="2">DLL</th>
                    <th rowspan="2">Beras</th>
                    <th rowspan="2">Non Beras</th>
                    <th rowspan="2">UP3K</th>
                    <th colspan="6">Pemamfaatan Tanah Pekarangan</th>
                    <th colspan="3">Industri Rumah Tangga</th>
                    <th rowspan="2">Kesehatan Lingkugan</th>
                  </tr>
                  <tr class="rapi">
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">Peternakan</th>
                    <th scope="col">Perikanan</th>
                    <th scope="col">Warung Hidup</th>
                    <th scope="col">Lumbung Hidup</th>
                    <th scope="col">Toga</th>
                    <th scope="col">Tanaman Keras</th>
                    <th scope="col">Pangan</th>
                    <th scope="col">Sandang</th>
                    <th scope="col">Jasa</th>
                  </tr>
                </thead>
                  <tbody>
                      
                      <?php
                           $count = 1;
        				   
                           $sql = $conn->prepare("SELECT * FROM `d_rekap` WHERE status = 1");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                        ?>
                
                    <tr class="rapi">
                     <td><?php echo $count; ?></td>
                     <td><a href="drekap_k?p=<?php echo $data['id'];?>&s=2&kec=<?php echo $data['kecamatan'];?>"><?php echo $data['kecamatan'];?></a></td>
                    <td><?php echo $data['j_kel'];?></td>
                    <td><?php echo $data['j_ling'];?></td>
                    <td><?php echo $data['j_rw'];?></td>
                    <td><?php echo $data['j_rt'];?></td>
                	<td><?php echo $data['j_dasawisma'];?></td>
                	<td><?php echo $data['j_krt'];?></td>
                	<td><?php echo $data['j_kk'];?></td>
                	<td><?php echo $data['j_a_total_l'];?></td>
                	<td><?php echo $data['j_a_total_p'];?></td>
                	<td><?php echo $data['j_a_balita_l'];?></td>
                	<td><?php echo $data['j_a_balita_p'];?></td>
                	<td><?php echo $data['j_a_pus'];?></td>
                	<td><?php echo $data['j_a_wus'];?></td>
                	<td><?php echo $data['j_a_hamil'];?></td>
                	<td><?php echo $data['j_a_susui'];?></td>
                	<td><?php echo $data['j_a_lansia'];?></td>
                	<td><?php echo $data['j_a_blaki'];?></td>
                	<td><?php echo $data['j_a_bcwe'];?></td>
                	<td><?php echo $data['j_a_bb'];?></td>
                	<td><?php echo $data['kr_sehat'];?></td>
                	<td><?php echo $data['kr_tdk_sehat'];?></td>
                    <td><?php echo $data['jr_tsampah'];?></td>
                    <td><?php echo $data['jr_spal'];?></td>
                    <td><?php echo $data['jr_jamban'];?></td>
                    <td><?php echo $data['jr_stiker'];?></td>
                    <td><?php echo $data['sak_pdam'];?></td>
                    <td><?php echo $data['sak_sumur'];?></td>
                    <td><?php echo $data['sak_sungai'];?></td>
                    <td><?php echo $data['sak_dll'];?></td>
                    <td><?php echo $data['mp_beras'];?></td>
                    <td><?php echo $data['mp_nonberas'];?></td>
                    <td><?php echo $data['jkk_tabung'];?></td>
                    <td><?php echo $data['k_upk'];?></td>
                    <td><?php echo $data['kp_ternak'];?></td>
                    <td><?php echo $data['kp_ikan'];?></td>
                    <td><?php echo $data['kp_warung'];?></td>
                    <td><?php echo $data['kp_lumbung'];?></td>
                    <td><?php echo $data['kp_toga'];?></td>
                    <td><?php echo $data['kp_tanaman'];?></td>
                    <td><?php echo $data['i_pangan'];?></td>
                    <td><?php echo $data['i_sandang'];?></td>
                    <td><?php echo $data['i_jasa'];?></td>
                    <td><?php echo $data['kes_ling'];?></td>
                    <td><?php echo $data['ket'];?></td>
                    </tr>
                    
                    <?php
                $count=$count+1;
                } 
                ?>
                  </tbody>
                  <tfoot>
                      <?php
                           $sql = $conn->prepare("SELECT * FROM `d_rekap` WHERE status = 3");
                           $sql->execute();
                           while($data=$sql->fetch()) {
                            ?>
                      <tr>
                          <td colspan="2"><?php echo $data['kecamatan'];?></td>
                          <td><?php echo $data['j_kel'];?></td>
                            <td><?php echo $data['j_ling'];?></td>
                            <td><?php echo $data['j_rw'];?></td>
                            <td><?php echo $data['j_rt'];?></td>
                        	<td><?php echo $data['j_dasawisma'];?></td>
                        	<td><?php echo $data['j_krt'];?></td>
                        	<td><?php echo $data['j_kk'];?></td>
                        	<td><?php echo $data['j_a_total_l'];?></td>
                        	<td><?php echo $data['j_a_total_p'];?></td>
                        	<td><?php echo $data['j_a_balita_l'];?></td>
                        	<td><?php echo $data['j_a_balita_p'];?></td>
                        	<td><?php echo $data['j_a_pus'];?></td>
                        	<td><?php echo $data['j_a_wus'];?></td>
                        	<td><?php echo $data['j_a_hamil'];?></td>
                        	<td><?php echo $data['j_a_susui'];?></td>
                        	<td><?php echo $data['j_a_lansia'];?></td>
                        	<td><?php echo $data['j_a_blaki'];?></td>
                        	<td><?php echo $data['j_a_bcwe'];?></td>
                        	<td><?php echo $data['j_a_bb'];?></td>
                        	<td><?php echo $data['kr_sehat'];?></td>
                        	<td><?php echo $data['kr_tdk_sehat'];?></td>
                            <td><?php echo $data['jr_tsampah'];?></td>
                            <td><?php echo $data['jr_spal'];?></td>
                            <td><?php echo $data['jr_jamban'];?></td>
                            <td><?php echo $data['jr_stiker'];?></td>
                            <td><?php echo $data['sak_pdam'];?></td>
                            <td><?php echo $data['sak_sumur'];?></td>
                            <td><?php echo $data['sak_sungai'];?></td>
                            <td><?php echo $data['sak_dll'];?></td>
                            <td><?php echo $data['mp_beras'];?></td>
                            <td><?php echo $data['mp_nonberas'];?></td>
                            <td><?php echo $data['jkk_tabung'];?></td>
                            <td><?php echo $data['k_upk'];?></td>
                            <td><?php echo $data['kp_ternak'];?></td>
                            <td><?php echo $data['kp_ikan'];?></td>
                            <td><?php echo $data['kp_warung'];?></td>
                            <td><?php echo $data['kp_lumbung'];?></td>
                            <td><?php echo $data['kp_toga'];?></td>
                            <td><?php echo $data['kp_tanaman'];?></td>
                            <td><?php echo $data['i_pangan'];?></td>
                            <td><?php echo $data['i_sandang'];?></td>
                            <td><?php echo $data['i_jasa'];?></td>
                            <td><?php echo $data['kes_ling'];?></td>
                            <td><?php echo $data['ket'];?></td>
                      </tr>
                      <?php } ?>
                  </tfoot>
                </table>
              
              
              
              
              <!-- END ISI -- >
              
              
              
              
              
              
          
          </div>

          <div class="entry-footer">
            <i class="bi bi-tags"></i>
            <ul class="tags">
              <li><a href="#">-</a></li>
            </ul>
          </div>

        </article><!-- End blog entry -->


      </div><!-- End blog entries list -->
      
      <div class="entry-img">
            <img src="images/<?php echo $rowp['gambar'];?>" alt="" class="img-fluid">
          </div>

     

    </div>

  </div>
</section><!-- End Blog Single Section -->

</main><!-- End #main -->





  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>