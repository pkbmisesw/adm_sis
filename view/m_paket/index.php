<?php
include '../../config.php';
error_reporting(0);
session_start();

if(!(isset($_SESSION['email']))){
    header("Location: ../../");
}

$master = "Paket Soal";
$dba = "paket";
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
                        <button type="button" class="btn btn-primary" id="btn-tambah">Tambah Data</button>
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
                                    <th>Jenjang</th>
                                    <th>Nama</th>
                                    <th>Des</th>
                                    <th>Jumlah Soal</th>
                                    <th>Aksi</th>
                                    <th>Hapus All</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 1;

                                $sql = $conn->prepare("SELECT m_paket.id, m_paket.codx, m_paket.nama, m_paket.des, m_jabatan.nama as nama_jabatan FROM m_paket INNER JOIN m_jabatan ON m_paket.id_jabatan = m_jabatan.codx ORDER BY m_paket.id DESC");
                                $sql->execute();
                                while($data = $sql->fetch()){
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data['nama_jabatan']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['des']; ?></td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-light-primary p-1"
                                           href="soal?pid=<?php echo $data['codx']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                                        <button data-id="<?= $data['id'] ?>" data-nama="<?= $data['nama'] ?>"
                                                data-des="<?= $data['des'] ?>"
                                                type="button" class="btn btn-light-warning p-1 icon-color-4 btn_update"
                                                data-bs-toggle="modal"><i class="bx bx-pencil"></i></button>
                                        <a class="btn btn-light-danger p-1"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                           href="../../controller/<?php echo $dba; ?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>"><i class="bx bx-x"></i></a>
                                    </td>
                                </tr>
                                <?php $count++; } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jenjang</th>
                                    <th>Nama</th>
                                    <th>Des</th>
                                    <th>Jumlah Soal</th>
                                    <th>Aksi</th>
                                    <th>Hapus All</th>
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../controller/<?php echo $dba; ?>_controller.php?op=tambah" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="text-center mb-4">
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="example1" class="form-label">Kelas : </label>
                            <select class="form-select" name="id_jabatan">
                                <?php
                                $sql_jabatan = $conn->prepare("SELECT * FROM m_jabatan ORDER BY ID DESC");
                                $sql_jabatan->execute();
                                while($data_jabatan = $sql_jabatan->fetch()){
                                    ?>
                                    <option value="<?php echo $data_jabatan['codx']; ?>"><?php echo $data_jabatan['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="example1" class="form-label">Nama : </label>
                            <input type="text" class="form-control"
                                   name="nama" required/>
                        </div>

                        <div class="mb-3">
                            <label for="example2" class="form-label">Des :</label>
                            <input type="text" class="form-control"
                                   name="des" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                                    <label for="example1" class="form-label">Nama : </label>
                                    <input type="text" class="form-control" id="nama_edit"
                                           name="nama" />
                                </div>

                                <div class="mb-3">
                                    <label for="example2" class="form-label">Des :</label>
                                    <input type="text" class="form-control" id="des_edit"
                                           name="des" />
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
            const id_kelas = $(this).attr('data-id_kelas');

            $("#id_edit").val($(this).attr('data-id'));
            $(`#kelas_edit option[value=${id_kelas}]`).prop('selected', true)
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#des_edit").val($(this).attr('data-des'));
            $('#edit').modal('show');
        });

        $("#btn-tambah").click(function(){
           $('#tambah').modal('show');
        });

        //Modal Edit Save Button Handler
        $('#btn-save-update').click(function () {
            $.ajax({
                url: "edit.php",
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