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

$master = "Siswa Seleksi";
$dba = "siswa";
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
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah
              </button>

            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                Tambah
              </button>
              <!-- /.box -->

              <div class="card radius-15">
                <div class="card-body">
                  <div class="card-title">
                    <h3 class="">Master Data <?php echo $master; ?></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>NISN</th>
                          <th>NIK</th>
                          <th>Nomor KK</th>
                          <th>Nomor Akta</th>
                          <th>Agama</th>
                          <th>Alamat</th>
                          <th>Nama Ibu</th>
                          <th>Nama Ayah</th>
                          <th>Kebutuhan Khusus</th>
                          <th>Hp</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_siswa` WHERE stat = 0 ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $data['nama'];?></td>
                          <td><?php echo $data['gender'];?></td>
                          <td><?php echo $data['nisn'];?></td>
                          <td><?php echo $data['nik'];?></td>
                          <td><?php echo $data['n_kk'];?></td>
                          <td><?php echo $data['n_akta'];?></td>
                          <td><?php echo $data['agama'];?></td>
                          <td><?php echo $data['alamat'];?></td>
                          <td><?php echo $data['nama_ibu'];?></td>
                          <td><?php echo $data['nama_ayah'];?></td>
                          <td><?php echo $data['k_khusus'];?></td>
                          <td><?php echo $data['hp'];?></td>
                          <td>
                            <button data-id="<?= $data['id'] ?>" data-nama="<?= $data['nama'] ?>"
                              data-gender="<?= $data['gender']?>" data-nisn="<?= $data['nisn']?>"
                              data-nik="<?= $data['nik']?>" data-n_kk="<?= $data['n_kk']?>"
                              data-n_akta="<?= $data['n_akta']?>" data-agama="<?= $data['agama']?>"
                              data-alamat="<?= $data['alamat']?>" data-nama_ibu="<?= $data['nama_ibu']?>"
                              data-nama_ayah="<?= $data['nama_ayah']?>" data-k_khusus="<?= $data['k_khusus']?>"
                              data-hp="<?= $data['hp']?>" type="button" class="btn btn-light btn_update"
                              data-toggle="modal">✎</button>
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
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>NISN</th>
                          <th>NIK</th>
                          <th>Nomor KK</th>
                          <th>Nomor Akta</th>
                          <th>Agama</th>
                          <th>Alamat</th>
                          <th>Nama Ibu</th>
                          <th>Nama Ayah</th>
                          <th>Kebutuhan Khusus</th>
                          <th>Hp</th>
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
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <label class="col-form-label">Nama :</label>
                    <input type="text" class="form-control" id="myInput" name="nama" placeholder="Silahkan isi nama" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Jenis Kelamin : </label>
                    <input type="text" class="form-control" name="gender"
                      placeholder="Silahkan Mengisi Jenis Kelamin" />
                    <small style="color:red;">* isi 1 untuk Laki - Laki, 2 untuk Perempuan</small>
                  </div>

                  <div class="form-group">
                    <label class="control-label">NISN : </label>
                    <input type="text" class="form-control" name="nisn" placeholder="Silahkan Mengisi NISN" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">NIK : </label>
                    <input type="text" class="form-control" name="nik" placeholder="Silahkan Mengisi NIK" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Nomor KK : </label>
                    <input type="text" class="form-control" name="n_kk" placeholder="Silahkan Mengisi Nomor KK" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Nomor Akta : </label>
                    <input type="text" class="form-control" name="n_akta" placeholder="Silahkan Mengisi Nomor akta" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Agama : </label>
                    <input type="text" class="form-control" name="agama" placeholder="Silahkan Mengisi Agama" />
                    <small style="color:red;">* 1. Islam, 2. Kristen, 3.Katolik, 4.Hindu, 5. Budha</small>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Alamat : </label>
                    <input type="text" class="form-control" name="alamat" placeholder="Silahkan Mengisi Alamat" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Nama Ibu : </label>
                    <input type="text" class="form-control" name="nama_ibu" placeholder="Silahkan Mengisi Nama Ibu" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Nama Ayah : </label>
                    <input type="text" class="form-control" name="nama_ayah" placeholder="Silahkan Mengisi Nama Ayah" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Kebutuhan Khusus : </label>
                    <input type="text" class="form-control" name="k_khusus"
                      placeholder="Silahkan Mengisi Kebutuhan Khusus" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Hp : </label>
                    <input type="text" class="form-control" name="hp" placeholder="Silahkan Mengisi Nomor Hp" />
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
                      <label class="control-label">Jenis Kelamin : </label>
                      <input type="text" class="form-control" id="gender_edit" name="gender" />
                      <small style="color:red;">* isi 1 untuk Laki - Laki, 2 untuk Perempuan</small>
                    </div>

                    <div class="form-group">
                      <label class="control-label">NISN : </label>
                      <input type="text" class="form-control" id="nisn_edit" name="nisn" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">NIK : </label>
                      <input type="text" class="form-control" id="nik_edit" name="nik" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Nomor KK : </label>
                      <input type="text" class="form-control" id="n_kk_edit" name="n_kk" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Nomor Akta : </label>
                      <input type="text" class="form-control" id="n_akta_edit" name="n_akta" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Agama : </label>
                      <input type="text" class="form-control" id="agama_edit" name="agama" />
                      <small style="color:red;">* 1. Islam, 2. Kristen, 3.Katolik, 4.Hindu, 5. Budha</small>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Alamat : </label>
                      <input type="text" class="form-control" id="alamat_edit" name="alamat" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Nama Ayah : </label>
                      <input type="text" class="form-control" id="nama_ayah_edit" name="nama_ayah" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Nama Ibu : </label>
                      <input type="text" class="form-control" id="nama_ibu_edit" name="nama_ibu" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Kebutuhan Khusus : </label>
                      <input type="text" class="form-control" id="k_khusus_edit" name="k_khusus" />
                    </div>

                    <div class="form-group">
                      <label class="control-label">Hp : </label>
                      <input type="text" class="form-control" id="hp_edit" name="hp" />
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
      url: "edit.php",
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
    $("#gender_edit").val($(this).attr('data-gender'));
    $("#nisn_edit").val($(this).attr('data-nisn'));
    $("#nik_edit").val($(this).attr('data-nik'));
    $("#n_kk_edit").val($(this).attr('data-n_kk'));
    $("#n_akta_edit").val($(this).attr('data-n_akta'));
    $("#agama_edit").val($(this).attr('data-agama'));
    $("#alamat_edit").val($(this).attr('data-alamat'));
    $("#nama_ayah_edit").val($(this).attr('data-nama_ayah'));
    $("#nama_ibu_edit").val($(this).attr('data-nama_ibu'));
    $("#k_khusus_edit").val($(this).attr('data-k_khusus'));
    $("#hp_edit").val($(this).attr('data-hp'));
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
  $('#example1').DataTable()
  $('#example2').DataTable({
    'paging': true,
    'lengthChange': false,
    'searching': false,
    'ordering': true,
    'info': true,
    'autoWidth': false
  })
})
</script>


</body>

</html>