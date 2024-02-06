
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

$master = "Product";
$dba = "product";
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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahb">
            Tambah Banyak
              </button>
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
                  <th>Nama</th>
                  <th>Satuan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT * FROM `m_product` ORDER BY id DESC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>

                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['satuan'];?></td>
                  <td>
                  <button 
                      data-id="<?= $data['id'] ?>" 
                      data-nama="<?= $data['nama'] ?>" 
                      data-des="<?= $data['des']?>"
                      data-kategori_id="<?= $data['kategori_id']?>"
                      data-satuan="<?= $data['satuan']?>"
                      data-qty="<?= $data['qty']?>"
                      data-harga_beli="<?= $data['harga_beli']?>"
                      data-harga_jual="<?= $data['harga_jual']?>"
                      data-gambar="<?= $data['gambar']?>"
                      type="button" class="btn btn-light btn_update" data-toggle="modal">✎</button>
                    <a class="btn btn-light" onclick="return confirm('are you want deleting data')" href="../../controller/<?php echo $dba;?>_controller.php?op=hapusb&id=<?php echo $data['id']; ?>">❌</a>
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
                  <th>Satuan</th>
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

          <div class="form-group">
            <label class="col-form-label">Kategori :</label>
            <select style="width: 100%;" class="form-control" name="kategori_id" >
                <?php
                $sql = $conn->prepare("SELECT * FROM m_kategori ORDER BY id DESC");
                $sql->execute();
                while($data=$sql->fetch()) {
                ?>  
                <option value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                <?php } ?> 
            </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Satuan :</label>
            <input type="text" class="form-control" name="satuan" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Qty :</label>
              <input type="text" class="form-control" name="qty" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Harga Beli :</label>
              <input type="text" class="form-control" name="harga_beli" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Harga Jual :</label>
              <input type="text" class="form-control" name="harga_jual" />
          </div>

          <div class="form-group">
              <label class="col-form-label">Gambar :</label>
              <input type="text" class="form-control" name="gambar" />
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


 <!-- Modal Tambah Banyak -->
 <div class="modal fade" id="tambahb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?php echo $master;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="../../controller/<?php echo $dba;?>_controller.php?op=tambahb" method="post"  enctype="multipart/form-data">

          
          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" class="form-control" id="namas" name="nama" placeholder="<?php echo $ketnama. " ".$master. " ..."; ?>" />
          </div>

          <div class="form-group">
            <label class="col-form-label">Satuan :</label>
            <input type="text" class="form-control" name="satuan" value="pcs" />
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" name="upload" type="button" class="btn btn-primary" >Save changes</button>
        <a class="btn btn-success" href="../t_pembelian/">Pembelian</a>
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

                  <div class="form-group">
                  <label class="col-form-label">Kategori :</label>
                  <select style="width: 100%;" class="form-control" id="kategori_id_edit" name="kategori_id" >
                  <option value="999" >-- Pilih -- </option>
                  <?php
                      $sql = $conn->prepare("SELECT * FROM m_kategori ORDER BY id DESC");
                      $sql->execute();
                      while($data=$sql->fetch()) {
                      ?>  
                      <option value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                      <?php } ?> 
                  </select>
                </div>

                  <!-- <div class="form-group">
                      <label class="control-label" >Kategori_Id : </label>        
                      <input type="text" class="form-control" id="kategori_id_edit" name="kategori_id" />
                  </div> -->

                <div class="form-group">
                      <label class="control-label" >Satuan: </label>        
                      <input type="text" class="form-control" id="satuan_edit" name="satuan" />
                </div>

                <div class="form-group">
                      <label class="control-label" >Qty : </label>        
                      <input type="text" class="form-control" id="qty_edit" name="qty" />
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Harga Beli : </label>        
                      <input type="text" class="form-control" id="harga_beli_edit" name="harga_beli" />
                  </div>

                  <div class="form-group">
                      <label class="control-label" >Harga Jual : </label>        
                      <input type="text" class="form-control" id="harga_jual_edit" name="harga_jual" />
                  </div>

                  

                  <div class="form-group">
                      <label class="control-label" >Gambar : </label>        
                      <input type="text" class="form-control" id="gambar_edit" name="gambar" />
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
            // $("#kategori_id_edit").val($(this).attr('data-kategori_id'));
            $("#kategori_id_edit option:selected").val($(this).attr('data-kategori_id'));
            // $("#katesama option:selected").text($(this).attr('data-kategori_id'));
            // $("#satuan_id_edit").val($(this).attr('data-satuan_id'));
            $("#satuan_edit").val($(this).attr('data-satuan'));
            $("#harga_beli_edit").val($(this).attr('data-harga_beli'));
            $("#harga_jual_edit").val($(this).attr('data-harga_jual'));
            $("#qty_edit").val($(this).attr('data-qty'));
            $("#gambar_edit").val($(this).attr('data-gambar'));
            $('#edit').modal('show');
        });
    });

    $(document).ready(function() {
      $('#tambahb').modal('show');
      $('#tambahb').on('shown.bs.modal', function() {
        $('#namas').trigger('focus');
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
