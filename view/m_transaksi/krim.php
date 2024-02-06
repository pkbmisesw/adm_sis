
<?php
include '../../config.php';
error_reporting(0);

/* Halaman ini tidak dapat diakses jika belum ada yang login(masuk) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if( $_SESSION['level_id'] == "1" || $_SESSION['level_id'] == "2"){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "Pengiriman";
$dba = "kirim";
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

        Proses <?php echo $master; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables <?php echo $master; ?></a></li>
        <li class="active">Master Data <?php echo $master; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
 

<!-- Main content -->
<section class="content" id="sales">
  
  <div class="row">
  <form action="../../controller/<?php echo $dba;?>_controller.php?op=tambah" method="post"  enctype="multipart/form-data">
    <div class="col-xs-12 col-md-4">
      <div class="box box-widget">
        <div class="box-body table-responsive">
          <table class="table table-sm va-m mw-42">
            <tbody>
              <tr>
                <th>Tanggal</th>
                <td>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right tgl_sale" id="datepicker"  name="date" value="<?php echo date("d-m-Y"); ?>">
                  </div>
                </td>
              </tr>

              <tr>
                <th>Penanggung Jawab</th>
                <td>
                  <div class="input-group ">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control pull-right text-bold" id="user" name="user" value="<?php echo $_SESSION['nama']?>" readonly>
                  </div>
                </td>
              </tr>

              <input type="hidden" class="form-control pull-right text-bold" name="id_trx" value="<?php echo $_GET['id']?>">

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-md-4">
      <div class="box box-widget">
        <div class="box-body table-responsive">
          <table class="table table-sm va-m mw-42">
            <tbody>
              <tr>
                <th>Cari Barang</th>
                <td>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-barcode"></i>
                    </div>
                    <select class="form-control select2" style="width: 100%;" name="id">
                      <?php
                      $sql = $conn->prepare("SELECT * FROM t_penjualan WHERE id_trx = '".$_GET['id']."' ORDER BY id DESC");
                      $sql->execute();
                      while($data=$sql->fetch()) {
                      ?> 
                          <option value="<?php echo $data['id_brg'];?>"><?php echo $data['nama'];?> - Stok : <?php echo $data['stok'];?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                </td>
              </tr>

              <tr>
                <th>Jumlah</th>
                <td>
                  <div class="input-group ">
                    <div class="input-group-addon">
                      <i class="fa fa-sort-numeric-asc"></i>
                    </div>
                    <input type="number" class="form-control pull-right" id="qty" name="qty" value="1">
                  </div>
                </td>
              </tr>

              <tr>
                <th></th>
                <td>
                  <button class="btn btn-primary" type="submit" name="upload" type="button" class="btn btn-primary" >
                    <i class="fa fa-cart-plus"></i> Tambah
                  </button>
                  </form>
                  <a class="btn btn-warning" href="../m_product/">Edit</a>
                  <a class="btn btn-success" href="../m_transaksi/">Back</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    

    <div class="col-xs-12 col-md-4 mh-160">
      <div class="box box-widget ">
        <div class="box-body table-responsive">
          <table class="table table-sm va-m mw-42">
            <tbody>
              <tr>
                <th>Jumlah Barang</th>
                <td class="text-right text-bold">
                  <?php
                $sqla = "SELECT * FROM m_transaksi WHERE id_trx = '".$_GET['id']."'";
                $stmtb = $conn->prepare($sqla);
                $stmtb->execute();
                $rowb = $stmtb->fetch();
                echo $rowb['total_qty']." Item";
                ?>
                </td>
              </tr>

              <tr rowspan="2">
                <th colspan="2" class="text-right"><span class="total-bayar" id="total-bayar" >
               <h3 id="total_nilai">
               <?php
                        $sql = "SELECT SUM(qty) AS total FROM t_kirim WHERE stat = 0";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $total = $row['total'];
                        echo "Dikirim ".$total." Item";
                ?>
                </h3>
                </span></th>
              </tr>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir row -->

  <div class="row">
    <div class="col col-md-12">
      <div class="box box-widget">
        <div class="box-body table-responsive">
          <table class="table table-bordered table-striped" style="font-size:14px;" >
            <thead>
              <tr>
                <th>#</th>
                <th>Barang</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody >
            <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `t_kirim` WHERE stat='0' ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>
                <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $data['nama'];?> - <?php echo $data['satuan'];?></td>
                <td class="text-center"><?php echo $data['qty'];?></td>
                <td>
                  <!-- <button 
                      data-id="<?= $data['id'] ?>" 
                      data-nama="<?= $data['nama'] ?>" 
                      data-des="<?= $data['des']?>"
                      data-kategori_id="<?= $data['kategori_id']?>"
                      data-satuan_id="<?= $data['satuan_id']?>"
                      data-harga="<?= $data['harga']?>"
                      data-qty="<?= $data['qty']?>"
                      data-gambar="<?= $data['gambar']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button> -->
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id']; ?>&id_trx=<?php echo $data['id_trx']; ?>&qty=<?php echo $data['qty']; ?>&id_brg=<?php echo $data['id_brg']; ?>">❌</a>
                  </td>
                </tr>

                <?php
                $count=$count+1;
                } 
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir row -->

  <div class="row">
    
  <form action="../../controller/<?php echo $dba;?>_controller.php?op=selesai" method="post" enctype="multipart/form-data">
    

              <input type="hidden" class="form-control pull-right text-bold" name="supir_id" id="pelid" value="">
              <input type="hidden" class="form-control pull-right text-bold" name="nama" id="namaid" value="">
              <input type="hidden" class="form-control pull-right text-bold" name="id_trx" value="<?php echo $_GET['id']?>">
              <input type="hidden" class="form-control pull-right text-bold" name="userid" value="<?php echo $_SESSION['user_id']; ?>" >

              <?php
                        $sql = "SELECT SUM(qty) AS total FROM t_kirim WHERE stat = 0";
                        $result = $conn->prepare($sql); 
                        $result->execute();
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $total = $row['total'];
                        ?>
                       

              <input type="hidden" class="form-control pull-right text-bold" name="qty" value="<?php echo $total; ?>">
              
       

    <div class="col col-md-6">
      <div class="box box-widget">
        <div class="box-body table-responsive">
          <table class="table table-sm va-m mw-42">
            <tbody>
            <!-- <tr>
                <th>Sub Total</th>
                <td>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-money"></i>
                    </div>
                    <input type="text" class="form-control pull-right text-bold" value="0" readonly>
                  </div>
                </td>
              </tr> -->




              <tr class="s2">
                <th>Supir</th>
                <td>
                    <select class="form-control select2" style="width: 100%;" id="pelangganid" onchange="samapel()">
                      <?php
                      $sql = $conn->prepare("SELECT * FROM m_supir");
                      $sql->execute();
                      while($data=$sql->fetch()) {
                      ?> 
                          <option value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                      <?php } ?>
                    </select>

                      
                </td>
              </tr>


              <tr>
                <td>
                <button type="submit" id="selesai" class="btn btn-success btn-block" >Kirim</button>
          </form>
          <?php
          $sqlct = "SELECT * FROM m_transaksi ORDER BY id DESC";
          $stmtct = $conn->prepare($sqlct);
          $stmtct->execute();
          $rowct = $stmtct->fetch();
          ?>
          <a href="surat.php?id=<?php echo $rowct['id_trx']; ?>" class="btn btn-danger btn-block" >Cetak</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
              

  </div>
  <!-- akhir row -->

</section>



   <!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?php echo $master;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="../../controller/<?php echo $dba;?>_controller.php?op=tambah" method="post"  enctype="multipart/form-data">

          
          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" class="form-control" id="myInput" name="nama" placeholder="<?php echo $ketnama. " ".$master. " ..."; ?>" />
          </div>
          
          <div class="form-group">
            <label class="control-label" >Deskripsi : </label>       
				<input type="text" class="form-control" name="des" placeholder="Silahkan Mengisi <?php echo $ket. " ..."; ?>"/>
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" name="upload" type="button" class="btn btn-primary" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
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
                    <label class="control-label" >Nama : </label>        
    					<input type="text" class="form-control" id="nama_edit" name="nama" />
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label" >Deskripsi <?php echo $ket; ?> : </label>         
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
      $("body").addClass("sidebar-collapse");
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
