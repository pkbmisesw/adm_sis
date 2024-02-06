
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

$master = "Transaksi";
$dba = "transaksi";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>
 
  <?php
  include '../header.php';
  include '../sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

        Master Data <?php echo $master; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables <?php echo $master; ?></a></li>
        <li class="active">Master Data <?php echo $master; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Master Data <?php echo $master; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Total Barang</th>
                  <th>Terkirim</th>
                  <th>Persentase</th>
                  <th>Created</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_transaksi` WHERE stat = 1 ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['total_qty'];?> Item</td>
                  <td>
                    <?php
                        $id_trx = $data['id_trx'];
                        $sqla = "SELECT SUM(qty) AS total FROM t_kirim WHERE id_trx = $id_trx";
                        $res = $conn->prepare($sqla); 
                        $res->execute();
                        $row = $res->fetch(PDO::FETCH_ASSOC);
                        $total = $row['total'];
                        echo $total
                        ?>
                  </td>
                  <td>
                    <?php
                    $total_qty = $data['total_qty'];
                    $persen = 100 / $total_qty * $total;
                    echo $persen." %";
                    ?>

                  </td>
                  <td><?php echo $data['created_at'];?></td>
                  <td>
                    <a class="btn btn-primary" onclick="return confirm('yakin akan mengirim')" href="krim.php?id=<?php echo $data['id_trx']; ?>">Proses Pengiriman</a>
                    <a class="btn btn-success" href="dkirim.php?id_trx=<?php echo $data['id_trx']; ?>">Detail Kirim</a>
                    <a class="btn btn-light" href="../../controller/<?php echo $dba;?>_controller.php?op=aktif&id=<?php echo $data['id']; ?>&id_trx=<?php echo $data['id_trx']; ?>">✅</a>
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapusm&id=<?php echo $data['id']; ?>&id_trx=<?php echo $data['id_trx']; ?>">❌</a>
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
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  


  
  <?php
  include '../footer.php';
  ?>

<script type="text/javascript">
     $(document).ready(function(){
        
        $('#btn-save-update').click(function(){
           $.ajax({
               url: "edit.php",
               type : 'post',
               data : $('#form-edit-transaksi-masuk').serialize(),
               success: function(data){
                   var res = JSON.parse(data);
                   if (res.code == 200){
                       alert('Success Update');
                       location.reload();
                   }
               }
           }) 
        });
        
        $(document).on('click','.btn_update',function(){
            console.log("Masuk");
            $("#id_edit").val($(this).attr('data-id'));
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#des_edit").val($(this).attr('data-des'));
            $("#satuan_edit").val($(this).attr('data-satuan'));
            $("#qty_edit").val($(this).attr('data-qty'));
            $("#harga_beli_edit").val($(this).attr('data-harga_beli'));
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
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'scrollX'     : true,
      'autoWidth'   : false
    })
  })
</script>


</body>
</html>
