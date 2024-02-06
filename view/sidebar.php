<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background-image: linear-gradient(to right, #000000, #B51818);">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['nama']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['email']; ?></a><br>
        <a>ID KEL <?php echo $_SESSION['id_kel']; ?></a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <!-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->

      <li>
        <a href="../admin/">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-blue">home</small>
          </span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Master Pages</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../m_pages/"><i class="fa fa-circle-o"></i> Pages</a></li>
          <li><a href="../m_subpages/"><i class="fa fa-circle-o"></i> SubPages</a></li>
          <li><a href="../m_post/"><i class="fa fa-circle-o"></i> Post</a></li>
          <!--<li><a href="../m_post/web.php"><i class="fa fa-circle-o"></i> Web</a></li>-->
        </ul>
      </li>

      <?php if($_SESSION['level_id'] == "1" ){ ?>

      <!--<li class="treeview">-->
      <!--  <a href="#">-->
      <!--    <i class="fa fa-desktop"></i>-->
      <!--    <span>Master Data</span>-->
      <!--    <span class="pull-right-container">-->
      <!--      <i class="fa fa-angle-left pull-right"></i>-->
      <!--    </span>-->
      <!--  </a>-->
      <!--  <ul class="treeview-menu">-->
      <!--   <li><a href="../m_supplier/"><i class="fa fa-circle-o"></i> Master Supplier</a></li>-->
      <!--    <li><a href="../m_customer/"><i class="fa fa-circle-o"></i> Master Customer</a></li> -->
      <!--    <li><a href="../m_tukang/"><i class="fa fa-circle-o"></i> Master Pegawai Honor</a></li>-->
      <!--    <li><a href="../m_supir/"><i class="fa fa-circle-o"></i> Master Supir</a></li>-->
      <!--    <li><a href="../m_saran/"><i class="fa fa-circle-o"></i> Master Saran</a></li>-->
      <!--  </ul>-->
      <!--</li>-->

      <!--<li class="treeview">-->
      <!--  <a href="#">-->
      <!--    <i class="fa fa-pie-chart"></i>-->
      <!--    <span>Arus Kas</span>-->
      <!--    <span class="pull-right-container">-->
      <!--      <i class="fa fa-angle-left pull-right"></i>-->
      <!--    </span>-->
      <!--  </a>-->
      <!--  <ul class="treeview-menu">-->
      <!--    <li><a href="../m_kas/"><i class="fa fa-circle-o"></i> Kas Masuk</a></li>-->
      <!--    <li><a href="../m_kas/keluar.php"><i class="fa fa-circle-o"></i> Kas Keluar</a></li>-->
      <!--  </ul>-->
      <!--</li>-->

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../d_umum/"><i class="fa fa-circle-o"></i> Data Umum</a></li>
          <li><a href="../d_pokjaa/"><i class="fa fa-circle-o"></i> Data Pokja 1</a></li>
          <li><a href="../d_pokjab/"><i class="fa fa-circle-o"></i> Data Pokja 2</a></li>
          <li><a href="../d_pokjac/"><i class="fa fa-circle-o"></i> Data Pokja 3</a></li>
          <li><a href="../d_pokjad/"><i class="fa fa-circle-o"></i> Data Pokja 4</a></li>
          <li><a href="../d_rekap/"><i class="fa fa-circle-o"></i> Data Rekap</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Master Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../m_surat/"><i class="fa fa-circle-o"></i> Semua Surat</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Master Aset</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../m_bahan/"><i class="fa fa-circle-o"></i> Barang</a></li>
        </ul>
      </li>

      <!--<li class="treeview">-->
      <!--  <a href="#">-->
      <!--    <i class="fa fa-laptop"></i>-->
      <!--    <span>Master Sekolah</span>-->
      <!--    <span class="pull-right-container">-->
      <!--      <i class="fa fa-angle-left pull-right"></i>-->
      <!--    </span>-->
      <!--  </a>-->
      <!--  <ul class="treeview-menu">-->
      <!--    <li><a href="../m_sekolah/"><i class="fa fa-circle-o"></i> Sekolah</a></li>-->
      <!--    <li><a href="../m_siswa/"><i class="fa fa-circle-o"></i> Siswa</a></li>-->
      <!--    <li><a href="../m_guru/"><i class="fa fa-circle-o"></i> Guru dan Tendik</a></li>-->
      <!--  </ul>-->
      <!--</li>-->

      <!-- <li class="header">PROSES PRODUKSI</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Produksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../t_produksi/"><i class="fa fa-circle-o"></i> Produksi</a></li>
          </ul>
        </li> -->

      <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Master Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../m_kategori/"><i class="fa fa-circle-o"></i> Kategori</a></li>
            <li><a href="../m_product/"><i class="fa fa-circle-o"></i> Product</a></li>
            <li><a href="../m_product/add.php"><i class="fa fa-circle-o"></i> Add Product</a></li>
          </ul>
        </li> -->
      <?php } ?>


      <?php if($_SESSION['status_jabatan'] == "1"){ ?>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../data_rekapk/"><i class="fa fa-circle-o"></i> Data Rekap</a></li>
          <li><a href="../data_umum/"><i class="fa fa-circle-o"></i> Data Umum</a></li>
          <li><a href="../data_pokjaa/"><i class="fa fa-circle-o"></i> Data Pokja 1</a></li>
          <li><a href="../data_pokjab/"><i class="fa fa-circle-o"></i> Data Pokja 2</a></li>
          <li><a href="../data_pokjac/"><i class="fa fa-circle-o"></i> Data Pokja 3</a></li>
          <li><a href="../data_pokjad/"><i class="fa fa-circle-o"></i> Data Pokja 4</a></li>

        </ul>
      </li>

      <?php } ?>


      <?php if($_SESSION['status_jabatan'] == "2"){ ?>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../data_rekap/"><i class="fa fa-circle-o"></i> Data Rekap</a></li>
          <li><a href="../data_umum/"><i class="fa fa-circle-o"></i> Data Umum</a></li>
          <li><a href="../data_pokjaa/"><i class="fa fa-circle-o"></i> Data Pokja 1</a></li>
          <li><a href="../data_pokjab/"><i class="fa fa-circle-o"></i> Data Pokja 2</a></li>
          <li><a href="../data_pokjac/"><i class="fa fa-circle-o"></i> Data Pokja 3</a></li>
          <li><a href="../data_pokjad/"><i class="fa fa-circle-o"></i> Data Pokja 4</a></li>

        </ul>
      </li>

      <?php } ?>

      <!-- <li class="header">TRANSAKSI</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if($_SESSION['level_id'] == "1" ){ ?>
            <li><a href="../t_tbarang/"><i class="fa fa-circle-o"></i> Barang</a></li>
            <li><a href="../t_pembelian/"><i class="fa fa-circle-o"></i> Pembelian</a></li>
          <?php } ?>
            <li><a href="../t_penjualan/"><i class="fa fa-circle-o"></i> Penjualan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Master Kirim</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../m_transaksi/"><i class="fa fa-circle-o"></i> Belum</a></li>
            <li><a href="../t_pembelian/"><i class="fa fa-circle-o"></i> Selesai</a></li>
          </ul>
        </li> -->


      <?php if($_SESSION['level_id'] == "1" ){ ?>
      <!-- <li class="header">LAPORAN</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../laporan/"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
            <li><a href="../l_pembelian/"><i class="fa fa-circle-o"></i> Laporan Pembelian</a></li>
          </ul>
        </li> -->


      <li class="header">PENGATURAN</li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Master Pengguna</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../m_user/pengurus.php"><i class="fa fa-circle-o"></i> Pengurus</a></li>
          <li><a href="../m_user/"><i class="fa fa-circle-o"></i> Pengguna</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Master Admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../m_adminkota/"><i class="fa fa-circle-o"></i> Admin Kota</a></li>
          <li><a href="../m_adminkec/"><i class="fa fa-circle-o"></i> Admin Kecamatan</a></li>
          <li><a href="../m_adminkel/"><i class="fa fa-circle-o"></i> Admin Kelurahan</a></li>
        </ul>
      </li>


      <li>
        <a href="../pengaturan/">
          <i class="fa fa-gear"></i> <span>Pengaturan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <!-- <li>
          <a href="../sukubunga/">
            <i class="fa fa-gear"></i> <span>% Suku Bunga</span>
            <span class="pull-right-container">
            </span>
          </a> -->
      </li>
      <!-- <li>
          <a href="../s_ppn/">
            <i class="fa fa-money"></i> <span>PPN</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> -->

      <?php } ?>
      <li><a href="../../logout.php"><i class="fa fa-circle-o text-red"></i> <span>Log Out</span></a></li>

  </section>
  <!-- /.sidebar -->
</aside>