<?php
include '../../config.php';
// error_reporting(0);
session_start();

if(!(isset($_SESSION['email']))){
    header("Location: ../../");
}

$master = "Users";
$dba = "user";
$ket = "";
$ketnama = "Silahkan mengisi nama";
?>

<?php
include '../head.php';
include '../sidebar.php';
include '../header.php';
?>
    <!--page-wrapper-->
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Master</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Master <?php echo $master; ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Settings</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Level ID</th>
                                    <th>Email</th>
                                    <th>Status Aktif</th>
                                    <th>Hp</th>
                                    <th>Ktp</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 1;

                                $sql = $conn->prepare("SELECT * FROM m_user ORDER BY ID DESC");
                                $sql->execute();
                                while($data_user = $sql->fetch()){
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_user['nik']; ?></td>
                                    <td><?php echo $data_user['nama']; ?></td>
                                    <td><?php echo $data_user['level_id']; ?></td>
                                    <td><?php echo $data_user['email']; ?></td>
                                    <td><?php echo $data_user['status_aktif']; ?></td>
                                    <td><?php echo $data_user['hp']; ?></td>
                                    <td><a href="../../images/<?php echo $data_user['ktp']; ?>">Lihat</a></td>
                                    <td><button data-id="<?= $data_user['id'] ?>" data-nik="<?= $data_user['nik'] ?>"
                                                data-nama="<?= $data_user['nama'] ?>"
                                                data-level_id="<?= $data_user['level_id'] ?>"
                                                data-email="<?= $data_user['email'] ?>"
                                                data-status_aktif="<?= $data_user['status_aktif'] ?>"
                                                data-hp="<?= $data_user['hp'] ?>" data-ktp="<?= $data_user['ktp'] ?>"
                                                type="button" class="btn btn-light-warning p-1 icon-color-4 btn_update"
                                                data-bs-toggle="modal">✎</button>
                                        <a class="btn btn-light-danger p-1"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                           href="../../controller/<?php echo $dba; ?>_controller.php?op=hapus&id=<?php echo $data_user['id']; ?>">❌</a></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Level ID</th>
                                    <th>Email</th>
                                    <th>Status Aktif</th>
                                    <th>Hp</th>
                                    <th>Ktp</th>
                                    <th>Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
    <!--end page-wrapper-->
    <!--start overlay-->
    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                    </div>
                    <div class="row">
                        <form id="form-edit-transaksi-masuk">
                        <input type="hidden" id="id_edit" name="id" />
                                <div class="mb-3">
                                    <label for="example1" class="form-label">Nik : </label>
                                    <input type="text" class="form-control" id="nik_edit"
                                           name="nik" />
                                </div>

                                <div class="mb-3">
                                    <label for="example2" class="form-label">Nama :</label>
                                    <input type="text" class="form-control" id="nama_edit"
                                           name="nama" />
                                </div>

                            <div class="mb-3">
                                <label for="example3" class="form-label">Level_id :</label>
                                <input type="text" class="form-control" id="level_id_edit"
                                       name="level_id" />
                            </div>


                            <div class="mb-3">
                                <label for="example3" class="form-label">Email : </label>
                                <input type="email" class="form-control" id="email_edit"
                                       name="email" />
                            </div>

                                <div class="mb-3">
                                    <label for="example2" class="form-label">Status_aktif
                                        :</label>
                                    <input type="text" class="form-control"
                                           id="status_aktif_edit" name="status_aktif" />
                                </div>
                                <div class="mb-3">
                                    <label for="example2" class="form-label">HP :</label>
                                    <input type="text" class="form-control" id="hp_edit"
                                           name="hp" />
                                </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btn-save-update" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<?php
include '../footer.php';
?>

<!-- JavaScript -->
<!-- Bootstrap JS -->
<script src="../../assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../../assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Data Tables js-->
<script src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        //Modal Edit
        $(document).on('click', '.btn_update', function () {
            console.log("Masuk");
            $("#id_edit").val($(this).attr('data-id'));
            $("#nik_edit").val($(this).attr('data-nik'));
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#level_id_edit").val($(this).attr('data-level_id'));
            $("#email_edit").val($(this).attr('data-email'));
            $("#status_aktif_edit").val($(this).attr('data-status_aktif'));
            $("#hp_edit").val($(this).attr('data-hp'));
            $("#ktp_edit").val($(this).attr('data-ktp'));
            $('#edit').modal('show');
        });

        //Modal Edit Save Button Handler
        $('#btn-save-update').click(function () {
            $.ajax({
                url: "edit-pengguna.php",
                type: 'post',
                data: $('#form-edit-transaksi-masuk').serialize(),
                success: function (data) {
                    var res = JSON.parse(data);
                    if (res.code == 200) {
                        alert('Success Update');
                        location.reload();
                    }
                }
            })
        });

        //Default data table
        $('#example').DataTable();
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- App JS -->
<script src="../../assets/js/app.js"></script>
</body>

</html>