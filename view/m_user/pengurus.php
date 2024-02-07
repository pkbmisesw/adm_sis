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

$master = "Pengurus";
$dba = "pengurus";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>

<?php
include '../headerNew.php';
include '../sidebarNew.php';
?>

<div class="content-wrapper">
  <div class="page-wrapper">
    <div class="page-content-wrapper">
      <!-- Content Wrapper. Contains page content -->
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
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah
              </button>
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
                          <th>Jabatan</th>
                          <th>Hp</th>
                          <th>Gambar</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $count = 1;

                        $sql = $conn->prepare("SELECT * FROM `m_user` WHERE level_id = 4 ORDER BY id DESC");
                        $sql->execute();
                        while ($data = $sql->fetch()) {
                        ?>

                          <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $data['nama']; ?> <?php echo $data['des']; ?></td>
                            <td><?php echo $data['jabatan']; ?></td>
                            <td><?php echo $data['hp']; ?></td>
                            <td><a href="../../images/<?php echo $data['gambar']; ?>">Lihat</a></td>
                            <td>
                              <button data-id="<?= $data['id'] ?>" data-nama="<?= $data['nama'] ?>" data-jabatan="<?= $data['jabatan'] ?>" data-hp="<?= $data['hp'] ?>" data-des="<?= $data['des'] ?>" type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
                              <a href="edits.php?id=<?php echo $data['id'] ?>">✍</a>
                              <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba; ?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>">❌</a>
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
                          <th>Jabatan</th>
                          <th>Hp</th>
                          <th>Gambar</th>

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
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <input type="text" class="form-control" name="nama" placeholder="<?php echo $ketnama . " " . $master . " ..."; ?>" />
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">Jabatan :</label>
                    <input type="text" class="form-control" name="jabatan" />
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">Hp :</label>
                    <input type="text" class="form-control" name="hp" placeholder="6280000000000" />
                    <small style="color:red;">* isi dimulai dari angka 62</small>
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
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
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
                      <label class="control-label">Jabatan : </label>
                      <input type="text" class="form-control" id="jabatan_edit" name="jabatan" />
                    </div>


                    <div class="form-group">
                      <label class="control-label">Hp : </label>
                      <input type="text" class="form-control" id="hp_edit" name="hp" placeholder="6280000000000" />
                      <small style="color:red;">* isi dimulai dari angka 62</small>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Description : </label>
                      <input type="text" class="form-control" id="des_edit" name="des" />
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
        url: "edit_peng.php",
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
      $("#jabatan_edit").val($(this).attr('data-jabatan'));
      $("#hp_edit").val($(this).attr('data-hp'));
      $("#des_edit").val($(this).attr('data-des'));
      $('#edit').modal('show');
    });
  });

  $(document).ready(function() {
    $('#tambah').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus');
    });

    $('#edit').on('shown.bs.modal', function() {
      $('#nik_edit').trigger('focus');
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