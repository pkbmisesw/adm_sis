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

              <!-- /.box -->

              <div class="card radius-15">
                <div class="card-body">
                  <div class="card-title">
                    <h3 class="">Master Data <?php echo $master; ?></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" style="overflow: scroll;">
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
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Tahun Lahir</th>
                          <th>No Registrasi</th>
                          <th>Agama</th>
                          <th>Kebutuhan Khusus</th>
                          <th>Warga</th>
                          <th>Alamat</th>
                          <th>RT</th>
                          <th>RW</th>
                          <th>Nama Dusun</th>
                          <th>Kelurahan</th>
                          <th>Kecamatan</th>
                          <th>Kode pos</th>
                          <th>Lintang</th>
                          <th>Bujur</th>
                          <th>Tempat tinggal</th>
                          <th>Moda Transport</th>
                          <th>Anak Keberapa</th>
                          <th>Pekerjaan warga</th>
                          <th>Terima KIP</th>
                          <th>A M PIP</th>
                          <th>Nama Ayah</th>
                          <th>NIK Ayah</th>
                          <th>Tahun Lahir Ayah</th>
                          <th>Pendidikan Ayah</th>
                          <th>Pekerjaan Ayah</th>
                          <th>Penghasilan Ayah</th>
                          <th>Kebutuhan Khusus Ayah</th>
                          <th>Nama Ibu</th>
                          <th>NIK Ibu</th>
                          <th>Tahun Lahir Ibu</th>
                          <th>Pendidikan Ibu</th>
                          <th>Pekerjaan Ibu</th>
                          <th>Penghasilan Ibu</th>
                          <th>Kebutuhan Khusus Ibu</th>
                          <th>Nama Wali</th>
                          <th>NIK Wali</th>
                          <th>Pendidikan Wali</th>

                          <th>Penghasilan Wali</th>
                          <th>Telepon Rumah</th>
                          <th>Hp</th>
                          <th>Email</th>
                          <th>Tinggi</th>
                          <th>Berat</th>
                          <th>Lingkar Kepala</th>
                          <th>Jarak Tinggal</th>
                          <th>Sebutkan</th>
                          <th>Waktu Tempuh</th>
                          <th>Jumlah Saudara</th>
                          <th>Jenis Prestasi</th>
                          <th>Tingkat Prestasi</th>
                          <th>Nama Prestasi</th>
                          <th>Tahun Prestasi</th>
                          <th>Penyelenggara</th>
                          <th>Peringkat</th>
                          <th>Beasiswa</th>
                          <th>Keterangan</th>
                          <th>Mulai</th>
                          <th>Selesai</th>
                          <th>Jenis Kesejahteraan</th>
                          <th>No kartu</th>
                          <th>Nama Kartu</th>
                          <th>Keahlian</th>
                          <th>Pendaftaran</th>
                          <th>Nis</th>
                          <th>Kelas</th>
                          <th>Tanggal Masuk</th>
                          <th>Sekolah Asal</th>
                          <th>NO Peserta</th>
                          <th>No Seri Ijazah</th>
                          <th>No SKHUN</th>
                          <th>Keluar Karena</th>
                          <th>Tanggal Keluar</th>
                          <th>Alasan Keluar</th>
                          <th>Surat Keterangan</th>
                          <th>Status</th>

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
                          <td><?php echo $data['jenis_kelamin'];?></td>
                          <td><?php echo $data['nisn'];?></td>
                          <td><?php echo $data['nik'];?></td>
                          <td><?php echo $data['no_kk'];?></td>
                          <td><?php echo $data['no_akta'];?></td>
                          <td><?php echo $data['tempat_lahir'];?></td>
                          <td><?php echo $data['tanggal_lahir'];?></td>
                          <td><?php echo $data['tahun_lahir'];?></td>
                          <td><?php echo $data['no_reg'];?></td>
                          <td><?php echo $data['agama'];?></td>
                          <td><?php echo $data['warga'];?></td>
                          <td><?php echo $data['b_khusus'];?></td>
                          <td><?php echo $data['alamat'];?></td>
                          <td><?php echo $data['rt'];?></td>
                          <td><?php echo $data['rw'];?></td>
                          <td><?php echo $data['nama_dusun'];?></td>
                          <td><?php echo $data['kel'];?></td>
                          <td><?php echo $data['kec'];?></td>
                          <td><?php echo $data['kode_pos'];?></td>
                          <td><?php echo $data['lintang'];?></td>
                          <td><?php echo $data['bujur'];?></td>
                          <td><?php echo $data['tempat_tinggal'];?></td>
                          <td><?php echo $data['moda_transport'];?></td>
                          <td><?php echo $data['anak_keberapa'];?></td>
                          <td><?php echo $data['pekerjaan_warga'];?></td>
                          <td><?php echo $data['terima_kip'];?></td>
                          <td><?php echo $data['a_m_pip'];?></td>
                          <td><?php echo $data['nama_ayah_kandung'];?></td>
                          <td><?php echo $data['nik_ayah'];?></td>
                          <td><?php echo $data['tahun_lahir_ayah'];?></td>
                          <td><?php echo $data['pendidikan_ayah'];?></td>
                          <td><?php echo $data['pekerjaan_ayah'];?></td>
                          <td><?php echo $data['penghasilan_ayah'];?></td>
                          <td><?php echo $data['b_khusus_ayah'];?></td>
                          <td><?php echo $data['ibu_kandung'];?></td>
                          <td><?php echo $data['nik_ibu'];?></td>
                          <td><?php echo $data['tahun_lahir_ibu'];?></td>
                          <td><?php echo $data['pendidikan_ibu'];?></td>
                          <td><?php echo $data['pekerjaan_ibu'];?></td>

                          <td><?php echo $data['penghasilan_ibu'];?></td>
                          <td><?php echo $data['b_khusus_ibu'];?></td>
                          <td><?php echo $data['nama_wali'];?></td>
                          <td><?php echo $data['nik_wali'];?></td>
                          <td><?php echo $data['pendidikan_wali'];?></td>
                          <td><?php echo $data['penghasilan_wali'];?></td>
                          <td><?php echo $data['telepon_rumah'];?></td>
                          <td><?php echo $data['no_hp'];?></td>
                          <td><?php echo $data['email'];?></td>
                          <td><?php echo $data['tinggi'];?></td>
                          <td><?php echo $data['berat'];?></td>
                          <td><?php echo $data['lingkar_kepala'];?></td>
                          <td><?php echo $data['jarak_tinggal'];?></td>
                          <td><?php echo $data['sebutkan'];?></td>
                          <td><?php echo $data['waktu_tempuh'];?></td>
                          <td><?php echo $data['j_saudara'];?></td>
                          <td><?php echo $data['jenis_prestasi'];?></td>
                          <td><?php echo $data['tingkat_prestasi'];?></td>
                          <td><?php echo $data['nama_prestasi'];?></td>
                          <td><?php echo $data['tahun_prestasi'];?></td>
                          <td><?php echo $data['penyelenggara'];?></td>
                          <td><?php echo $data['peringkat'];?></td>
                          <td><?php echo $data['beasiswa'];?></td>
                          <td><?php echo $data['ket'];?></td>
                          <td><?php echo $data['mulai'];?></td>
                          <td><?php echo $data['selesai'];?></td>
                          <td><?php echo $data['jenis_kesejahteraan'];?></td>
                          <td><?php echo $data['no_kartu'];?></td>
                          <td><?php echo $data['nama_kartu'];?></td>
                          <td><?php echo $data['keahlian'];?></td>
                          <td><?php echo $data['pendaftaran'];?></td>
                          <td><?php echo $data['nis'];?></td>

                          <td><?php echo $data['kelas'];?></td>
                          <td><?php echo $data['tanggal_masuk'];?></td>
                          <td><?php echo $data['sekolah_asal'];?></td>
                          <td><?php echo $data['no_peserta'];?></td>
                          <td><?php echo $data['no_seri_ijazah'];?></td>
                          <td><?php echo $data['no_skhun'];?></td>
                          <td><?php echo $data['keluar_karena'];?></td>
                          <td><?php echo $data['tanggal_keluar'];?></td>
                          <td><?php echo $data['alasan_keluar'];?></td>
                          <td><?php echo $data['suket'];?></td>
                          <td><?php echo $data['stat'];?></td>

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
              <!-- <div class="modal-body">
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


              </div> -->

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
                    <label class="control-label">Tempat Lahir: </label>
                    <input type="text" class="form-control" name="tempat_lahir"
                      placeholder="Silahkan Mengisi Tempat Lahir" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tanggal Lahir: </label>
                    <input type="text" class="form-control" name="tanggal_lahir"
                      placeholder="Silahkan Mengisi Tanggal Lahir" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tahun Lahir: </label>
                    <input type="text" class="form-control" name="tahun_lahir"
                      placeholder="Silahkan Mengisi Tahun Lahir" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">No Registrasi: </label>
                    <input type="text" class="form-control" name="no_reg"
                      placeholder="Silahkan Mengisi No Registrasi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">No Registrasi: </label>
                    <input type="text" class="form-control" name="no_reg"
                      placeholder="Silahkan Mengisi No Registrasi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Agama : </label>
                    <input type="text" class="form-control" name="agama" placeholder="Silahkan Mengisi Agama" />
                    <small style="color:red;">* 1. Islam, 2. Kristen, 3.Katolik, 4.Hindu, 5. Budha</small>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kebutuhan Khusus : </label>
                    <input type="text" class="form-control" name="b_khusus"
                      placeholder="Silahkan Mengisi Kebutuhan Khusus" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Alamat : </label>
                    <input type="text" class="form-control" name="alamat" placeholder="Silahkan Mengisi Alamat" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">RT : </label>
                    <input type="text" class="form-control" name="rt" placeholder="Silahkan Mengisi RT" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">RW : </label>
                    <input type="text" class="form-control" name="rw" placeholder="Silahkan Mengisi RW" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">RW : </label>
                    <input type="text" class="form-control" name="rw" placeholder="Silahkan Mengisi RW" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nama Dusun : </label>
                    <input type="text" class="form-control" name="nama_dusun"
                      placeholder="Silahkan Mengisi Nama Dusun" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kelurahan : </label>
                    <input type="text" class="form-control" name="kel" placeholder="Silahkan Mengisi Kelurahan" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kecamatan : </label>
                    <input type="text" class="form-control" name="kec" placeholder="Silahkan Mengisi Kecamatan" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kode Pos : </label>
                    <input type="text" class="form-control" name="kode_pos" placeholder="Silahkan Mengisi Kode Pos" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Lintang : </label>
                    <input type="text" class="form-control" name="lintang" placeholder="Silahkan Mengisi Lintang" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Bujur : </label>
                    <input type="text" class="form-control" name="bujur" placeholder="Silahkan Mengisi Bujur" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tempat Tinggal : </label>
                    <input type="text" class="form-control" name="tempat_tinggal"
                      placeholder="Silahkan Mengisi Tempat Tinggal" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Moda Transportasi : </label>
                    <input type="text" class="form-control" name="moda_transport"
                      placeholder="Silahkan Mengisi Moda Transportasi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Anak Keberapa : </label>
                    <input type="text" class="form-control" name="anak_keberapa"
                      placeholder="Silahkan Mengisi Anak Keberapa" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Pekerjaan Warga : </label>
                    <input type="text" class="form-control" name="pekerjaan_warga"
                      placeholder="Silahkan Mengisi Pekerjaan Warga" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Terima KIP : </label>
                    <input type="text" class="form-control" name="terima_kip"
                      placeholder="Silahkan Mengisi Terima KIP (YA / TIDAK)" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">A M PIP : </label>
                    <input type="text" class="form-control" name="a_m_pip" placeholder="Silahkan Mengisi A M PIP" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nama Ayah : </label>
                    <input type="text" class="form-control" name="nama_ayah_kandung"
                      placeholder="Silahkan Mengisi Nama Ayah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">NIK Ayah : </label>
                    <input type="text" class="form-control" name="nik_ayah" placeholder="Silahkan Mengisi NIK Ayah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tahun Lahir Ayah : </label>
                    <input type="text" class="form-control" name="tahun_lahir_ayah"
                      placeholder="Silahkan Mengisi Tahun Lahir Ayah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Pendidikan Ayah : </label>
                    <input type="text" class="form-control" name="pendidikan_ayah"
                      placeholder="Silahkan Mengisi Pendidikan Ayah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Pekerjaan Ayah : </label>
                    <input type="text" class="form-control" name="pekerjaan_ayah"
                      placeholder="Silahkan Mengisi Pekerjaan Ayah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Penghasilan Ayah : </label>
                    <input type="text" class="form-control" name="penghasilan_ayah"
                      placeholder="Silahkan Mengisi Penghasilan Ayah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kebutuhan Khusus Ayah : </label>
                    <input type="text" class="form-control" name="b_khusus_ayah"
                      placeholder="Silahkan Mengisi Kebutuhan Khusus Ayah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nama Ibu : </label>
                    <input type="text" class="form-control" name="ibu_kandung"
                      placeholder="Silahkan Mengisi Nama Ibu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">NIK Ibu : </label>
                    <input type="text" class="form-control" name="nik_ibu" placeholder="Silahkan Mengisi NIK Ibu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tahun Lahir Ibu : </label>
                    <input type="text" class="form-control" name="tahun_lahir_ibu"
                      placeholder="Silahkan Mengisi Tahun Lahir Ibu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label"> Pendidikan Ibu : </label>
                    <input type="text" class="form-control" name="pendidikan_ibu"
                      placeholder="Silahkan Mengisi  Pendidikan Ibu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Penghasilan Ibu : </label>
                    <input type="text" class="form-control" name="penghasilan_ibu"
                      placeholder="Silahkan Mengisi Penghasilan Ibu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kebutuhan Khusus Ibu : </label>
                    <input type="text" class="form-control" name="b_khusus_ibu"
                      placeholder="Silahkan Mengisi Kebutuhan Khusus Ibu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nama Wali : </label>
                    <input type="text" class="form-control" name="nama_wali" placeholder="Silahkan Mengisi Nama Wali" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">NIK Wali : </label>
                    <input type="text" class="form-control" name="nik_wali" placeholder="Silahkan Mengisi NIK Wali" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Pendidikan Wali : </label>
                    <input type="text" class="form-control" name="pendidikan_wali"
                      placeholder="Silahkan Mengisi Pendidikan Wali" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Penghasilan Wali : </label>
                    <input type="text" class="form-control" name="penghasilan_wali"
                      placeholder="Silahkan Mengisi Penghasilan Wali" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Telepon Rumah : </label>
                    <input type="text" class="form-control" name="telepon_rumah"
                      placeholder="Silahkan Mengisi Telepon Rumah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">No HP : </label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Silahkan Mengisi No HP" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email : </label>
                    <input type="text" class="form-control" name="email" placeholder="Silahkan Mengisi Email" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tinggi : </label>
                    <input type="text" class="form-control" name="tinggi" placeholder="Silahkan Mengisi Tinggi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Berat : </label>
                    <input type="text" class="form-control" name="berat" placeholder="Silahkan Mengisi Berat" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Lingkar Kepala : </label>
                    <input type="text" class="form-control" name="lingkar_kepala"
                      placeholder="Silahkan Mengisi Lingkar Kepala" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Jarak Tinggal : </label>
                    <input type="text" class="form-control" name="jarak_tinggal"
                      placeholder="Silahkan Mengisi Jarak Tinggal" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Sebutkan : </label>
                    <input type="text" class="form-control" name="sebutkan" placeholder="Silahkan Mengisi Sebutkan" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Waktu Tempuh : </label>
                    <input type="text" class="form-control" name="waktu_tempuh"
                      placeholder="Silahkan Mengisi Waktu Tempuh" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Jumlah Saudara : </label>
                    <input type="text" class="form-control" name="j_saudara"
                      placeholder="Silahkan Mengisi Jumlah Saudara" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Jenis Prestasi : </label>
                    <input type="text" class="form-control" name="jenis_prestasi"
                      placeholder="Silahkan Mengisi Jenis Prestasi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tingkat Prestasi : </label>
                    <input type="text" class="form-control" name="tingkat_prestasi"
                      placeholder="Silahkan Mengisi Tingkat Prestasi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nama Prestasi : </label>
                    <input type="text" class="form-control" name="nama_prestasi"
                      placeholder="Silahkan Mengisi Nama Prestasi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tahun Prestasi : </label>
                    <input type="text" class="form-control" name="tahun_prestasi"
                      placeholder="Silahkan Mengisi Tahun Prestasi" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Penyelenggara : </label>
                    <input type="text" class="form-control" name="penyelenggara"
                      placeholder="Silahkan Mengisi Penyelenggara" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Peringkat : </label>
                    <input type="text" class="form-control" name="peringkat" placeholder="Silahkan Mengisi Peringkat" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Beasiswa : </label>
                    <input type="text" class="form-control" name="beasiswa" placeholder="Silahkan Mengisi Beasiswa" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Keterangan : </label>
                    <input type="text" class="form-control" name="ket" placeholder="Silahkan Mengisi Keterangan" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Mulai : </label>
                    <input type="text" class="form-control" name="mulai" placeholder="Silahkan Mengisi Mulai" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Selesai : </label>
                    <input type="text" class="form-control" name="selesai" placeholder="Silahkan Mengisi Selesai" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Jenis Kesejahteraan : </label>
                    <input type="text" class="form-control" name="jenis_kesejahteraan"
                      placeholder="Silahkan Mengisi Jenis Kesejahteraan" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">No Kartu : </label>
                    <input type="text" class="form-control" name="no_kartu" placeholder="Silahkan Mengisi No Kartu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nama Kartu : </label>
                    <input type="text" class="form-control" name="nama_kartu"
                      placeholder="Silahkan Mengisi Nama Kartu" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Keahlian : </label>
                    <input type="text" class="form-control" name="keahlian" placeholder="Silahkan Mengisi Keahlian" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Pendaftaran : </label>
                    <input type="text" class="form-control" name="pendaftaran"
                      placeholder="Silahkan Mengisi Pendaftaran" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">NIS : </label>
                    <input type="text" class="form-control" name="nis" placeholder="Silahkan Mengisi NIS" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Kelas : </label>
                    <input type="text" class="form-control" name="kelas" placeholder="Silahkan Mengisi Kelas" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tanggal Masuk : </label>
                    <input type="text" class="form-control" name="tanggal_masuk"
                      placeholder="Silahkan Mengisi Tanggal Masuk" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Sekolah Asal : </label>
                    <input type="text" class="form-control" name="sekolah_asal"
                      placeholder="Silahkan Mengisi Sekolah Asal" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nomor Peserta : </label>
                    <input type="text" class="form-control" name="no_peserta"
                      placeholder="Silahkan Mengisi Nomor Peserta" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nomor Seri Ijazah : </label>
                    <input type="text" class="form-control" name="no_seri_ijazah"
                      placeholder="Silahkan Mengisi Nomor Seri Ijazah" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nomor SKHUN : </label>
                    <input type="text" class="form-control" name="no_skhun"
                      placeholder="Silahkan Mengisi Nomor SKHUN" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Keluar Karena : </label>
                    <input type="text" class="form-control" name="keluar_karena"
                      placeholder="Silahkan Mengisi Keluar Karena" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tanggal Keluar : </label>
                    <input type="text" class="form-control" name="tanggal_keluar"
                      placeholder="Silahkan Mengisi Tanggal Keluar" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Alasan Keluar : </label>
                    <input type="text" class="form-control" name="alasan_keluar"
                      placeholder="Silahkan Mengisi Alasan Keluar" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Surat Keterangan : </label>
                    <input type="text" class="form-control" name="suket"
                      placeholder="Silahkan Mengisi Surat Keterangan" />
                  </div>
                  <!-- <div class="form-group">
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
                  </div> -->


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