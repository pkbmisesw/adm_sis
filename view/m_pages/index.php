<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if (isset($_SESSION['email']) == 0) {
  header('Location: ../../index.php');
}

if ($_SESSION['level_id'] == "1") {
} else {
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "Pages";
$dba = "pages";
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
      <!-- Content Header (Page header) -->

      <div class="page-content">
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
                    <h3 class="">Master Data <?php echo $master; ?></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Urut</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $count = 1;

                        $sql = $conn->prepare("SELECT * FROM `m_pages` ORDER BY urut ASC");
                        $sql->execute();
                        while ($data = $sql->fetch()) {
                        ?>

                          <tr>
                            <td><?php echo $count; ?></td>
                            <?php if ($data['stat'] == 1) { ?>
                              <td><?php echo $data['nama']; ?> <a href="tambah_sub.php?id=<?php echo $data['id']; ?>">➕ </a><br />


                                <?php
                                $sqlz = $conn->prepare("SELECT * FROM `m_subpages` WHERE pages_id = '" . $data['id'] . "'");
                                $sqlz->execute();
                                while ($dataz = $sqlz->fetch()) {
                                ?>
                                  <?php if ($dataz['stat'] == 0) { ?>
                                    &nbsp &nbsp 🡪 <?php echo $dataz['nama']; ?> &nbsp
                                    <a href="edit_sub.php?id=<?php echo $dataz['id'] ?>">✍</a>&nbsp

                                    <a onclick="return confirm('are you want deleting data')" href="../../controller/subpages_controller.php?op=hapusd&id=<?php echo $dataz['id']; ?>">❌</a>
                                    <br>
                                  <?php } elseif ($dataz['stat'] == 1) { ?>

                                    &nbsp &nbsp 🡪 <?php echo $dataz['nama']; ?>

                                    <a href="tambah_subs.php?id=<?php echo $dataz['id']; ?>">➕</a>

                                    &nbsp
                                    <a href="edit_sub.php?id=<?php echo $dataz['id'] ?>">✍</a>&nbsp

                                    <a onclick="return confirm('are you want deleting data')" href="../../controller/subpages_controller.php?op=hapusd&id=<?php echo $dataz['id']; ?>">❌</a>
                                    <br>


                                    <?php
                                    $sqlza = $conn->prepare("SELECT * FROM `m_subpages` WHERE spages_id = '" . $dataz['id'] . "'");
                                    $sqlza->execute();
                                    while ($dataza = $sqlza->fetch()) {
                                    ?>



                                      <?php if ($dataza['stat'] == 2) { ?>
                                        &nbsp &nbsp &nbsp &nbsp 🠮 &nbsp <?php echo $dataza['nama']; ?> &nbsp <b>🡪 Memiliki Link</b>
                                      <?php } else { ?>
                                        &nbsp &nbsp &nbsp &nbsp 🠮 &nbsp <?php echo $dataza['nama']; ?> &nbsp
                                      <?php } ?>
                                      <a href="edit_sub.php?id=<?php echo $dataza['id'] ?>">✍</a>&nbsp

                                      <a onclick="return confirm('are you want deleting data')" href="../../controller/subpages_controller.php?op=hapusd&id=<?php echo $dataza['id']; ?>">❌</a>
                                      <br>


                                    <?php }; ?>



                                  <?php } elseif ($dataz['stat'] == 2) { ?>
                                    &nbsp &nbsp 🡪 <?php echo $dataz['nama']; ?> &nbsp <b>🡪 Memiliki Link</b>
                                    <a href="edit_sub.php?id=<?php echo $dataz['id'] ?>">✍</a>&nbsp

                                    <a onclick="return confirm('are you want deleting data')" href="../../controller/subpages_controller.php?op=hapusd&id=<?php echo $dataz['id']; ?>">❌</a>
                                    <br>
                                  <?php }; ?>


                                <?php }; ?>

                              </td>
                            <?php } elseif ($data['stat'] == 2) { ?>
                              <td><?php echo $data['nama']; ?> <b>🡪 Memiliki Link</b></td>
                            <?php } else { ?>
                              <td><?php echo $data['nama']; ?> </td>
                            <?php } ?>
                            <td><?php echo $data['urut']; ?></td>
                            <td>
                              <button data-id="<?= $data['id'] ?>" data-nama="<?= $data['nama'] ?>" data-urut="<?= $data['urut'] ?>" data-stat="<?= $data['stat'] ?>" data-url="<?= $data['url'] ?>" type="button" class="btn btn-light btn_update" data-toggle="modal"><i class="lni lni-pencil"></i></button>
                              <a class="btn btn-light" href="edit.php?id=<?php echo $data['id'] ?>"><i class="lni lni-pencil-alt trash"></i> Edit</a>
                              <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba; ?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>"><i class="lni lni-trash" style="color: red;"></i> </a>
                            </td>
                          </tr>

                        <?php
                          $count = $count + 1;
                        }
                        ?>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Urut</th>
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

      <div class="col">

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?php echo $master; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="../../controller/<?php echo $dba; ?>_controller.php?op=tambah" method="post" enctype="multipart/form-data">


                  <div class="form-group">
                    <label class="col-form-label">Nama :</label>
                    <input type="text" class="form-control" id="myInput" name="nama" placeholder="<?php echo $ketnama . " " . $master . " ..."; ?>" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Deskripsi : </label>
                    <input type="text" class="form-control" name="des" placeholder="Silahkan Mengisi <?php echo $ket . " ..."; ?>" />
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
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <label class="control-label">Urut : </label>
                      <input type="text" class="form-control" id="urut_edit" name="urut" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Status <?php echo $ket; ?> : </label>
                      <input type="text" class="form-control" id="stat_edit" name="stat" />
                      <small style="color:red;">* mengubah status menjadi 1 membuat halaman memiliki sub halaman, mengubah menjadi 2 membuat halaman diarahkan ke halaman lain</small>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Url : </label>
                      <input type="text" class="form-control" id="url_edit" name="url" />
                    </div>
                    <small style="color:red;">* url default adalah "pages?p="</small>


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

      <!-- Modal Edit -->
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
      $("#urut_edit").val($(this).attr('data-urut'));
      $("#stat_edit").val($(this).attr('data-stat'));
      $("#url_edit").val($(this).attr('data-url'));
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


<!--Data Tables js-->
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

<script>
  $('#exampleVaryingModalContent').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  });
</script>