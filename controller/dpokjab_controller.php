<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$kecamatan = $_POST['kecamatan'];
        $j_wm = $_POST['j_wm'];
        $j_a_bel = $_POST['j_a_bel'];
        $j_a_wbel = $_POST['j_a_wbel'];
        $j_b_bel = $_POST['j_b_bel'];
        $j_b_wbel = $_POST['j_b_wbel'];
        $j_c_bel = $_POST['j_c_bel'];
        $j_c_wbel = $_POST['j_c_wbel'];
        $j_kf_bel = $_POST['j_kf_bel'];
        $j_kf_wbel = $_POST['j_kf_wbel'];
        $j_paud_sjenis = $_POST['j_paud_sjenis'];
        $j_tbm_per = $_POST['j_tbm_per'];
        $j_bkb_kel = $_POST['j_bkb_kel'];
        $j_bkb_ibu = $_POST['j_bkb_ibu'];
        $j_bkb_ape = $_POST['j_bkb_ape'];
        $j_bkb_sim = $_POST['j_bkb_sim'];
        $j_kt_kf = $_POST['j_kt_kf'];
        $j_kt_paud = $_POST['j_kt_paud'];
        $j_k_bkb = $_POST['j_k_bkb'];
        $j_k_kop = $_POST['j_k_kop'];
        $j_k_ket = $_POST['j_k_ket'];
        $j_kl_lpt = $_POST['j_kl_lpt'];
        $j_kl_tpk = $_POST['j_kl_tpk'];
        $j_kl_damas = $_POST['j_kl_damas'];
        $p_kop_pem_kel = $_POST['p_kop_pem_kel'];
        $p_kop_pem_pes = $_POST['p_kop_pem_pes'];
        $p_kop_mad_kel = $_POST['p_kop_mad_kel'];
        $p_kop_mad_pes = $_POST['p_kop_mad_pes'];
        $p_kop_ut_kel = $_POST['p_kop_ut_kel'];
        $p_kop_mut_pes = $_POST['p_kop_mut_pes'];
        $p_kop_man_kel = $_POST['p_kop_man_kel'];
        $p_kop_man_pes = $_POST['p_kop_man_pes'];
        $k_j_kel = $_POST['k_j_kel'];
        $k_j_pes = $_POST['k_j_pes'];
        $ket = $_POST['ket'];
        
        try {
          $sql = "INSERT INTO d_pokjab SET
          kecamatan = :kecamatan,
            j_wm = :j_wm,
            j_a_bel = :j_a_bel,
            j_a_wbel = :j_a_wbel,
            j_b_bel = :j_b_bel,
            j_b_wbel = :j_b_wbel,
            j_c_bel = :j_c_bel,
            j_c_wbel = :j_c_wbel,
            j_kf_bel = :j_kf_bel,
            j_kf_wbel = :j_kf_wbel,
            j_paud_sjenis = :j_paud_sjenis,
            j_tbm_per = :j_tbm_per,
            j_bkb_kel = :j_bkb_kel,
            j_bkb_ibu = :j_bkb_ibu,
            j_bkb_ape = :j_bkb_ape,
            j_bkb_sim = :j_bkb_sim,
            j_kt_kf = :j_kt_kf,
            j_kt_paud = :j_kt_paud,
            j_k_bkb = :j_k_bkb,
            j_k_kop = :j_k_kop,
            j_k_ket = :j_k_ket,
            j_kl_lpt = :j_kl_lpt,
            j_kl_tpk = :j_kl_tpk,
            j_kl_damas = :j_kl_damas,
            p_kop_pem_kel = :p_kop_pem_kel,
            p_kop_pem_pes = :p_kop_pem_pes,
            p_kop_mad_kel = :p_kop_mad_kel,
            p_kop_mad_pes = :p_kop_mad_pes,
            p_kop_ut_kel = :p_kop_ut_kel,
            p_kop_mut_pes = :p_kop_mut_pes,
            p_kop_man_kel = :p_kop_man_kel,
            p_kop_man_pes = :p_kop_man_pes,
            k_j_kel = :k_j_kel,
            k_j_pes = :k_j_pes,
            ket = :ket"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':kecamatan', $kecamatan);
            $stmt->bindParam(':j_wm', $j_wm);
            $stmt->bindParam(':j_a_bel', $j_a_bel);
            $stmt->bindParam(':j_a_wbel', $j_a_wbel);
            $stmt->bindParam(':j_b_bel', $j_b_bel);
            $stmt->bindParam(':j_b_wbel', $j_b_wbel);
            $stmt->bindParam(':j_c_bel', $j_c_bel);
            $stmt->bindParam(':j_c_wbel', $j_c_wbel);
            $stmt->bindParam(':j_kf_bel', $j_kf_bel);
            $stmt->bindParam(':j_kf_wbel', $j_kf_wbel);
            $stmt->bindParam(':j_paud_sjenis', $j_paud_sjenis);
            $stmt->bindParam(':j_tbm_per', $j_tbm_per);
            $stmt->bindParam(':j_bkb_kel', $j_bkb_kel);
            $stmt->bindParam(':j_bkb_ibu', $j_bkb_ibu);
            $stmt->bindParam(':j_bkb_ape', $j_bkb_ape);
            $stmt->bindParam(':j_bkb_sim', $j_bkb_sim);
            $stmt->bindParam(':j_kt_kf', $j_kt_kf);
            $stmt->bindParam(':j_kt_paud', $j_kt_paud);
            $stmt->bindParam(':j_k_bkb', $j_k_bkb);
            $stmt->bindParam(':j_k_kop', $j_k_kop);
            $stmt->bindParam(':j_k_ket', $j_k_ket);
            $stmt->bindParam(':j_kl_lpt', $j_kl_lpt);
            $stmt->bindParam(':j_kl_tpk', $j_kl_tpk);
            $stmt->bindParam(':j_kl_damas', $j_kl_damas);
            $stmt->bindParam(':p_kop_pem_kel', $p_kop_pem_kel);
            $stmt->bindParam(':p_kop_pem_pes', $p_kop_pem_pes);
            $stmt->bindParam(':p_kop_mad_kel', $p_kop_mad_kel);
            $stmt->bindParam(':p_kop_mad_pes', $p_kop_mad_pes);
            $stmt->bindParam(':p_kop_ut_kel', $p_kop_ut_kel);
            $stmt->bindParam(':p_kop_mut_pes', $p_kop_mut_pes);
            $stmt->bindParam(':p_kop_man_kel', $p_kop_man_kel);
            $stmt->bindParam(':p_kop_man_pes', $p_kop_man_pes);
            $stmt->bindParam(':k_j_kel', $k_j_kel);
            $stmt->bindParam(':k_j_pes', $k_j_pes);
            $stmt->bindParam(':ket', $ket);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/d_pokjab')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/d_pokjab')</script>";
		}
	
	} if($op == "daftar"){
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$stat = mysqli_real_escape_string($link, $_POST['stat']);
		$gender = mysqli_real_escape_string($link, $_POST['gender']);
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$des = mysqli_real_escape_string($link, $_POST['des']);
		$codx = mysqli_real_escape_string($link, $_POST['codx']);
		$dt = date("d/m/Y");
		$mt = date("m");
		$yr = date("Y");
		$dir = "../up/";
		$proses_upload = move_uploaded_file($_FILES['file']["tmp_name"], $dir.$_FILES['file']["name"]);
	  	$url = $_FILES['file']["name"];
		
		if ($url == null){
			$url = "#";
		} else {
			$url = $_FILES['file']["name"];
		}
		
		$coba = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM pengguna ORDER BY id DESC"));
		$id_user = $coba['id'] + 1;

			$INSERT = mysqli_query($link,"INSERT INTO pengguna (id,id_user,name,stat,gender,nmr_hp,username,password,des,dt,mt,yr,pic,codx) VALUES ('$id_user','$id_user','$name','1','$gender','$nmr_hp','$username','$password','$des','$dt','$mt','$yr','$url','$codx') ");
			if($INSERT){		
				echo "<script>alert('Berhasil Tambah'); document.location.href=('../index.php')</script>";
			}else{
				echo "<script>alert('Gagal Tambah'); document.location.href=('../index.php')</script>";
			}
	}else if($op == "edit"){
		
		$id = $_POST['id'];
		$nama = $_POST['nama'];
        $alamat = $_POST['alamat']; 
        $nomor_hp = $_POST['nomor_hp'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $deskripsi = $_POST['deskripsi'];
        $photo = $_FILES['photo']['name'];
        $user_id = $_SESSION['user_id'];


        if(empty($_FILES['photo']['name'])){

        		  	
        try {
          $sql = "UPDATE m_datun SET 
            nama = :nama, 
            alamat = :alamat, 
            nomor_hp = :nomor_hp, 
            email = :email, 
            title = :title, 
            deskripsi = :deskripsi WHERE id = $id" 
             
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':alamat', $alamat);
          $stmt->bindParam(':nomor_hp', $nomor_hp);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':title', $title);
          $stmt->bindParam(':deskripsi', $deskripsi);
          
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Data telah dirubah'); document.location.href=('../view/datun')</script>";
		}else{
			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/datun')</script>";
		}

        	}else{
        
        $dir = "../../images/";
		$proses_upload = move_uploaded_file($_FILES['photo']["tmp_name"], $dir.$_FILES['photo']["name"]);
	  	$url = $_FILES['photo']["name"];
	  	
        try {
          $sql = "UPDATE m_datun SET 
            nama = :nama, 
            alamat = :alamat, 
            nomor_hp = :nomor_hp, 
            email = :email, 
            title = :title, 
            deskripsi = :deskripsi, 
            photo = :photo WHERE id = $id"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':alamat', $alamat);
          $stmt->bindParam(':nomor_hp', $nomor_hp);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':title', $title);
          $stmt->bindParam(':deskripsi', $deskripsi);
          $stmt->bindParam(':photo', $photo);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Data telah dirubah'); document.location.href=('../view/datun')</script>";
		}else{
			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/datun')</script>";
		}
		}
	}else if($op == "aktif"){
		
			$UPDATE = mysqli_query($link,"UPDATE pengguna SET status_aktif='1' WHERE codx = '".$_GET['codx']."' ");
			if($UPDATE){
			echo "<script>alert('Berhasil Aktif'); document.location.href=('../in/user.php')</script>";
			}else{
				echo "<script>alert('Gagal Aktif'); document.location.href=('../in/user.php')</script>";
			}

	}else if($op == "tidakaktif"){
		
			$UPDATE = mysqli_query($link,"UPDATE pengguna SET status_aktif='0' WHERE codx = '".$_GET['codx']."' ");
			if($UPDATE){
			echo "<script>alert('Berhasil Tidak Aktif'); document.location.href=('../in/user.php')</script>";
			}else{
				echo "<script>alert('Gagal Tidak Aktif'); document.location.href=('../in/user.php')</script>";
			}

	}else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM d_pokjab WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/d_pokjab/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/d_pokjab/')</script>";
		}

	}else if($op=="cek_extensi"){
		$fileName =  $_GET['nama_file'];
		 
		$valid_ext = array('jpg','JPG','jpeg','JPEG','PNG','png','xls', 'gif', 'doc', 'docx', 'xlsx', 'zip','pdf');
		$ext = explode('.', $fileName);
		$extensi = $ext[count($ext) - 1];
		$cek_extensi = in_array($extensi, $valid_ext);

		if($cek_extensi > 0){
			echo "ok";
		}else{
			echo "no";
		}
	} else if($op=="hapus_gambar"){
	    
	    unlink('../../images/PENULIS.png');
	    
		echo "<script>alert('Berhasil Menghapus Gambar'); document.location.href=('../view/barang/')</script>";
	}
?>