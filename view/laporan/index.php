
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

$master = "Penjualan";
$dba = "transaksi";
$ket = "";
$ketnama = "Silahkan mengisi nama";

?>
 
  <?php
  include '../header.php';
  include '../sidebar.php';
  ?>

<link rel="stylesheet" href="../../public/bower_components/select2/dist/css/select2.min.css">


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Laporan
<small>Laporan Penjualan</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-bar-chart"></i> Laporan Penjualan</a></li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header" style="padding-bottom:5px; padding-top:5px;">
              <h4 class="m-0">Filter Data</h4>
              <div class="box-tools pull-right">
                <button  type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body row">
              <form action="#" method="GET">

                <div class="col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value=""> 
                  </div>
                </div>

                <div class="col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="sd">s/d</label>
                    <input type="date" class="form-control" id="sd" name="sd" value=""> 
                  </div>
                </div>

                <div class="col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="pelanggan">Pelanggan</label>
                    <select class="form-control select2" style="width: 100%;" id="id_customer" name="pelanggan">
                      <option selected="selected" value="">Semua</option>
                      <?php
                      $sql = $conn->prepare("SELECT * FROM m_customer");
                      $sql->execute();
                      while($data=$sql->fetch()) {
                      ?> 
                          <option value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                      <?php } ?>
                    </select> 
                  </div>
                </div>

                <div class="col-md-3 col-xs-12">
                  <div class="form-group">
                    
                  </div>
                </div>

                
                <!-- <div class="col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="invoice">Invoice</label>
                    <select class="form-control select2" style="width: 100%;" id="invoice2" name="invoice">
                      <option selected="selected" value="">Semua</option>
                          <?php
                          $sql = $conn->prepare("SELECT * FROM m_transaksi");
                          $sql->execute();
                          while($data=$sql->fetch()) {
                          ?> 
                          <option value="<?php echo $data['id_trx'];?>"><?php echo $data['id_trx'];?></option>
                          <?php } ?>
                          
                                                   
                    </select> 
                  </div>
                </div> -->

                <div class="col-md-12 col-xs-12 ">
                  <button type="submit" name="filter" value="print" id="print" class="btn btn-success btn-xs" onclick="$('form').attr('target', '_blank');">
                    <i class="fa fa-print"></i>
                    Cetak
                  </button>
                  <button type="submit" class=" btn-xs btn-primary" name="filter" value="filter" >
                    <i class="fa fa-filter"></i>
                    Filter
                  </button>
                  <!-- <button type="submit" class="pull-right btn btn-xs btn-primary" name="filter" value="filter" >
                    <i class="fa fa-filter"></i>
                    Filter
                  </button> -->
                  <!-- <a class="pull-right mr-2 btn btn-xs btn-default" href="#">Reset</a> -->
                </div>

              </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box box-primary">
            <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Nama Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Profit</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
                   if($_GET['pelanggan'] == ""){
                    $sql = $conn->prepare("SELECT * FROM `m_transaksi` WHERE DATE(`created_at`) BETWEEN '".date("Y-m-d",strtotime($_GET['tanggal']))."' AND '".date("Y-m-d",strtotime($_GET['sd']))."' ORDER BY id DESC");
                    $sql->execute();
                    while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $data['id_trx'];?></td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['created_at'];?></td>
                  <td><?php echo "Rp. ".number_format($data['total'],0).",-";?></td>
                  <td><?php echo "Rp. ".number_format($data['total_untung'],0).",-";?></td>
                  <td>
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapuslap&id=<?php echo $data['id']; ?>">❌</a>
                  </td>
                </tr>

                <?php

                $totals += $data['total'];
                $profits += $data['total_untung']; 

                $count=$count+1;
                  } 


                  
                ?>
                Total Seluruh = <?= "Rp. ".number_format($totals,0).",-" ?><br>
                Keuntungan Bersih = <?= "Rp. ".number_format($profits,0).",-" ?>
                <?php
                }else if($_GET['pelanggan'] != ""){
                  $sql = $conn->prepare("SELECT * FROM `m_transaksi` WHERE DATE(`created_at`) BETWEEN '".date("Y-m-d",strtotime($_GET['tanggal']))."' AND '".date("Y-m-d",strtotime($_GET['sd']))."' AND customer_id = '".$_GET['pelanggan']."' ORDER BY id DESC");
                  $sql->execute();
                  while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $data['id_trx'];?></td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['created_at'];?></td>
                  <td><?php echo "Rp. ".number_format($data['total'],0).",-";?></td>
                  <td><?php echo "Rp. ".number_format($data['total_untung'],0).",-";?></td>
                  <td>
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapuslap&id=<?php echo $data['id']; ?>">❌</a>
                  </td>
                </tr>

                <?php
                $totals += $data['total'];
                $profits += $data['total_untung']; 


                $count=$count+1;
                  } 
                ?>
                Total Seluruh = <?= "Rp. ".number_format($totals,0).",-" ?><br>
                Keuntungan Bersih = <?= "Rp. ".number_format($profits,0).",-" ?>

                <?php
                }
                ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Nama Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Profit</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- /.content -->







   
  
  <?php
  include '../footer.php';
  ?>



<script src="../../public/bower_components/select2/dist/js/select2.full.min.js"></script>

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
            $('#edit').modal('show');
        });
    });
    </script>


<script>

    $(document).ready(function() {
      $('#tambah').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus');
      });

      $('#edit').on('shown.bs.modal', function() {
        $('#nama_edit').trigger('focus');
      });

      // $("#sidebar-collapse").trigger('click')
      // $("body").addClass("sidebar-collapse");
      document.getElementById('selesai').disabled = true;
      document.getElementById('pelid').value = document.getElementById('pelangganid').value;

      var sel = document.getElementById("pelangganid");
      var text = sel.options[sel.selectedIndex].text;
      document.getElementById('namaid').value = text;
      

    });
  </script> 


<script>
function samapel(){
  document.getElementById('pelid').value = document.getElementById('pelangganid').value;
  var sel = document.getElementById("pelangganid");
  var text = sel.options[sel.selectedIndex].text;
  document.getElementById('namaid').value = text;
}
</script>
  
    

  <script>
  $(function () {
    $('.select2').select2()
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
