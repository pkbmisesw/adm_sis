<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if( $_SESSION['level_id'] == "1" ){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "Index Web";
$dba = "post";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>

<?php
  include '../headernew.php';
  include '../sidebarnew.php';
  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="page-wrapper">
    <div class="page-content-wrapper">
      <div class="page-content">
        <!-- Content Header (Page header) -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Home</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"> </i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Table <?php echo $master; ?></li>
              </ol>
            </nav>
          </div>

        </div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- <a href="tambah.php"><button type="button" class="btn btn-primary" >
            Tambah
              </button></a> -->
              <!-- /.box -->

              <div class="card radius-15">
                <div class="card-body">
                  <div class="card-title">
                    <h3 class="box-title">Master Data <?php echo $master; ?></h3><br>
                    Status
                  </div>
                  <!-- /.box-header -->




                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Pos1</th>
                          <th>Pos2</th>
                          <th>Pos3</th>
                          <th>Pos4</th>
                          <th>Pos5</th>
                          <th>Pos6</th>
                          <th>Stat</th>
                          <th>No Urut</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = 8 ORDER BY no_urut ASC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $data['nama'];?></td>
                          <td><?php echo $data['gambar'];?></td>
                          <td><?php echo $data['penulis'];?></td>
                          <td><?php echo $data['tgl'];?></td>
                          <td><?php echo $data['sdes'];?></td>
                          <td><?php echo $data['kelas'];?></td>
                          <td><?php echo $data['stat'];?></td>
                          <td><?php echo $data['no_urut'];?></td>
                          <td>
                            <button data-id="<?= $data['id'] ?>" data-nama="<?= $data['nama'] ?>"
                              data-gambar="<?= $data['gambar']?>" data-penulis="<?= $data['penulis']?>"
                              data-tgl="<?= $data['tgl'] ?>" data-sdes="<?= $data['sdes']?>"
                              data-kelas="<?= $data['kelas']?>" data-stat="<?= $data['stat']?>"
                              data-no_urut="<?= $data['no_urut']?>" type="button" class="btn btn-light btn_update"
                              data-toggle="modal">✎</button>
                            <!-- <a class="btn btn-light" href="edit.php?id=<?php echo $data['id']?>">✎ Edit</a>
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>  -->
                          </td>
                        </tr>

                        <?php
            $count=$count+1;
            } 
            ?>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Pos1</th>
                          <th>Pos2</th>
                          <th>Pos3</th>
                          <th>Pos4</th>
                          <th>Pos5</th>
                          <th>Pos6</th>
                          <th>Stat</th>
                          <th>No Urut</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->










                </div>
              </div>

              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>

      <!-- Modal Tambah -->
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah <?php echo $master;?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../../controller/<?php echo $dba;?>_controller.php?op=tambah" method="post"
                enctype="multipart/form-data">

                <div class="form-group">
                  <label class="col-form-label">Title :</label>
                  <input type="text" class="form-control" id="myInput" name="nama"
                    placeholder="<?php echo $ketnama. " ".$master. " ..."; ?>" />
                </div>

                <div class="form-group">
                  <label class="control-label">Deskripsi : </label>
                  <input type="text" class="form-control" name="des"
                    placeholder="Silahkan Mengisi <?php echo $ket. " ..."; ?>" />
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="upload" type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Edit -->
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit </h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form-edit-transaksi-masuk">



            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="id_edit" name="id" />

                <h5 style="color:red;">Atur Posisi Ketika Tampilan Website Pertama Kali dibuka Copy Paste nama php warna
                  hitam dibagian bawah dan isi bagian tersebut sesuai keinginan</h5>
                <br>

                <a>1. Slide - </a>w_slide.php<br>
                <a>2. Konten - </a>w_konten.php<br>
                <a>3. Video - </a>w_video.php<br>
                <a>4. Tentang - </a>w_tentang.php<br>
                <a>5. Populer - </a>w_populer.php<br>
                <a>6. Berita - </a>w_berita.php<br>
                <a>7. Mitra - </a>w_mitra.php<br>
                <a>8. RunText - </a>w_run.php<br>
                <a>9. Berita2 - </a>w_beritab.php<br>
                <a>10. Total - </a>w_total.php<br>

                <br>
                <div class="form-group">
                  <label class="control-label">Pos1 : </label>
                  <input type="text" class="form-control" id="nama_edit" name="nama" />
                </div>

                <div class="form-group">
                  <label class="control-label">Pos2 : </label>
                  <input type="text" class="form-control" id="gambar_edit" name="gambar" />
                </div>

                <div class="form-group">
                  <label class="control-label">Pos3 : </label>
                  <input type="text" class="form-control" id="penulis_edit" name="penulis" />
                </div>

                <div class="form-group">
                  <label class="control-label">Pos4 : </label>
                  <input type="text" class="form-control" id="tgl_edit" name="tgl" />
                </div>

                <div class="form-group">
                  <label class="control-label">Pos5 : </label>
                  <input type="text" class="form-control" id="sdes_edit" name="sdes" />
                </div>

                <div class="form-group">
                  <label class="control-label">Pos6 </label>
                  <input type="text" class="form-control" id="kelas_edit" name="kelas" />
                </div>

                <div class="form-group">
                  <label class="control-label">Status </label>
                  <input type="text" class="form-control" id="stat_edit" name="stat" />
                  <small style="color:red;">* status default adalah 8 untuk mengatur posisi halaman</small>
                </div>

                <div class="form-group">
                  <label class="control-label">No Urut </label>
                  <input type="text" class="form-control" id="no_urut_edit" name="no_urut" />
                </div>


              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn-save-update">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
  include '../footer.php';
  ?>

<script type="text/javascript">
$(document).ready(function() {

  $('#btn-save-update').click(function() {
    $.ajax({
      url: "update.php",
      type: 'post',
      data: $('#form-edit-transaksi-masuk').serialize(),
      success: function(data) {
        var res = JSON.parse(data);
        if (res.code == 200) {
          alert('Success Update');
          location.reload();
        }
      }
    })
  });

  $(document).on('click', '.btn_update', function() {
    console.log("Masuk");
    $("#id_edit").val($(this).attr('data-id'));
    $("#nama_edit").val($(this).attr('data-nama'));
    $("#gambar_edit").val($(this).attr('data-gambar'));
    $("#penulis_edit").val($(this).attr('data-penulis'));
    $("#tgl_edit").val($(this).attr('data-tgl'));
    $("#sdes_edit").val($(this).attr('data-sdes'));
    $("#kelas_edit").val($(this).attr('data-kelas'));
    $("#stat_edit").val($(this).attr('data-stat'));
    $("#no_urut_edit").val($(this).attr('data-no_urut'));
    $('#edit').modal('show');
  });
});

$(document).ready(function() {
  $('#tambah').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus');
  });

  $('#edit').on('shown.bs.modal', function() {
    $('#nama_edit').trigger('focus');
  });


});
</script>



<script>
$(function() {
  $('#example1').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'scrollX': true,
    'autoWidth': false
  })
})
</script>


</body>

</html>