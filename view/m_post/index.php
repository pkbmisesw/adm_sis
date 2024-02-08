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

$master = "Post";
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
          <div class="ms-auto">
            <div class="btn-group">
              <a href="tambah.php"><button type="button" class="btn btn-primary">
                  Tambah
                </button></a>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">


              <!-- /.box -->

              <div class="card radius-15">
                <div class="card-body">
                  <div class="card-title">
                    <h3 class="">Master Data <?php echo $master; ?></h3><br>
                    Status
                    <br>
                    <a href="index.php" class="btn btn-default">Normal</a>
                    <a href="index.php?stat=1" class="btn btn-primary">Aktif</a>
                    <a href="index.php?stat=2" class="btn btn-warning">Slide</a>
                    <a href="index.php?stat=3" class="btn btn-success">Berita Utama</a>
                    <a href="index.php?stat=4" class="btn btn-info">Konten</a>
                    <a href="index.php?stat=5" class="btn btn-primary">Utama</a>
                    <a href="index.php?stat=6" class="btn btn-warning">Mitra</a>
                    <a href="index.php?stat=7" class="btn btn-success">Icon</a>
                    <a href="index.php?stat=8" class="btn btn-primary">Web</a>
                    <a href="index.php?stat=9" class="btn btn-danger">Gambar</a>
                    <a href="../m_pages/" class="btn btn-danger">
                      << Back</a>

                        <br>
                        Mobile - Data PKK
                        <br>
                        <a href="index.php?stat=10" class="btn btn-primary">Catatan Data</a>
                        <a href="index.php?stat=11" class="btn btn-warning">Data Umum</a>
                        <a href="index.php?stat=12" class="btn btn-success">Data Pokja 1</a>
                        <a href="index.php?stat=13" class="btn btn-info">Data Pokja 2</a>
                        <a href="index.php?stat=14" class="btn btn-primary">Data Pokja 3</a>
                        <a href="index.php?stat=15" class="btn btn-warning">Data Pokja 4</a>

                        <br>
                        Mobile - Menu Tambahan
                        <br>
                        <a href="index.php?stat=16" class="btn btn-primary">Capaian</a>
                        <a href="index.php?stat=17" class="btn btn-warning">Prestasi</a>
                        <a href="index.php?stat=18" class="btn btn-success">Struktur</a>
                  </div>

                  <!-- /.box-header -->

                  <?php 
                if ($_GET['stat'] >= 1 ){
                ?>


                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Gambar</th>
                          <th>Penulis</th>
                          <th>Tgl</th>
                          <th>Stat</th>
                          <th>No Urut</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_post` WHERE stat = '".$_GET['stat']."' ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                   ?>

                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $data['nama'];?></td>
                          <td><a href="../../images/<?php echo $data['gambar'];?>">Lihat</a></td>
                          <td><?php echo $data['penulis'];?></td>
                          <td><?php echo $data['tgl'];?></td>
                          <td><?php echo $data['stat'];?></td>
                          <td><?php echo $data['no_urut'];?></td>
                          <td>
                            <button data-id="<?= $data['id'] ?>" data-nama="<?= $data['nama'] ?>"
                              data-gambar="<?= $data['gambar']?>" data-penulis="<?= $data['penulis']?>"
                              data-tgl="<?= date("d-m-Y h:i:s A",strtotime($data['created_at'])) ?>"
                              data-sdes="<?= $data['sdes']?>" data-kelas="<?= $data['kelas']?>"
                              data-stat="<?= $data['stat']?>" data-no_urut="<?= $data['no_urut']?>" type="button"
                              class="btn btn-light btn_update" data-toggle="modal">✎</button>
                            <a class="btn btn-light" href="edit.php?id=<?php echo $data['id']?>">✎ Edit</a>
                            <a class="btn btn-light" onclick="return confirm('are you want deleting data')"
                              href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>
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
                          <th>Title</th>
                          <th>Gambar</th>
                          <th>Penulis</th>
                          <th>Tgl</th>
                          <th>Stat</th>
                          <th>No Urut</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->

                  <?php 
                    } else {
                    ?>

                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Gambar</th>
                          <th>Penulis</th>
                          <th>Tgl</th>
                          <th>Stat</th>
                          <th>No Urut</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_post` ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                     ?>

                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $data['nama'];?></td>
                          <td><a href="../../images/<?php echo $data['gambar'];?>">Lihat</a></td>
                          <td><?php echo $data['penulis'];?></td>
                          <td><?php echo $data['tgl'];?></td>
                          <td><?php echo $data['stat'];?></td>
                          <td><?php echo $data['no_urut'];?></td>
                          <td>
                            <button data-id="<?= $data['id'] ?>" data-nama="<?= $data['nama'] ?>"
                              data-gambar="<?= $data['gambar']?>" data-penulis="<?= $data['penulis']?>"
                              data-tgl="<?= date("d-m-Y h:i:s A",strtotime($data['created_at'])) ?>"
                              data-sdes="<?= $data['sdes']?>" data-view="<?= $data['view']?>"
                              data-kelas="<?= $data['kelas']?>" data-stat="<?= $data['stat']?>"
                              data-no_urut="<?= $data['no_urut']?>" type="button" class="btn btn-light btn_update"
                              data-toggle="modal">✎</button>
                            <a class="btn btn-light" href="edit.php?id=<?php echo $data['id']?>">✎ Edit</a>
                            <a class="btn btn-light" onclick="return confirm('are you want deleting data')"
                              href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>
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
                          <th>Title</th>
                          <th>Gambar</th>
                          <th>Penulis</th>
                          <th>Tgl</th>
                          <th>Stat</th>
                          <th>No Urut</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>


                  <?php 
                  } 
                  ?>






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
      <div class="col">

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

                    <div class="form-group">
                      <label class="control-label">Nama : </label>
                      <input type="text" class="form-control" id="nama_edit" name="nama" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Gambar : </label>
                      <input type="text" class="form-control" id="gambar_edit" name="gambar" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Penulis : </label>
                      <input type="text" class="form-control" id="penulis_edit" name="penulis" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tgl : </label>
                      <input type="text" class="form-control" id="tgl_edit" name="tgl" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Sdes / Link : </label>
                      <textarea class="form-control" id="sdes_edit" name="sdes"
                        placeholder="Berisi Sdes/Link untuk icon"></textarea>
                    </div>

                    <div class="form-group">
                      <label class="control-label">View / DiLihat </label>
                      <input type="text" class="form-control" id="view_edit" name="view" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Class Kontent </label>
                      <input type="text" class="form-control" id="kelas_edit" name="kelas" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Status </label>
                      <input type="text" class="form-control" id="stat_edit" name="stat" />
                    </div>

                    <a>1. Aktif</a><br>
                    <a>2. Slide</a><br>
                    <a>3. Berita Utama</a><br>
                    <a>4. Konten</a><br>
                    <a>5. Utama</a><br>
                    <a>6. Mitra</a><br>
                    <a>7. Icon</a><br>
                    <a>8. Web</a><br>
                    <a>9. Gambar</a><br>

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
    $("#view_edit").val($(this).attr('data-view'));
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

<script src="../../assetsNew/plugins/datatable/js/jquery.dataTables.min.js"></script>


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