<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$id_kec = $_SESSION['id_kec'];
	    $id_kel = $_SESSION['id_kel'];
		$nama_ling = $_POST['nama_ling'];
        $j_k_pangan = $_POST['j_k_pangan'];
        $j_k_sandang = $_POST['j_k_sandang'];
        $j_k_ta_rt = $_POST['j_k_ta_rt'];
        $p_mp_beras = $_POST['p_mp_beras'];
        $p_mp_nberas = $_POST['p_mp_nberas'];
        $p_pp_ternak = $_POST['p_pp_ternak'];
        $p_pp_ikan = $_POST['p_pp_ikan'];
        $p_pp_warung = $_POST['p_pp_warung'];
        $p_pp_lumbung = $_POST['p_pp_lumbung'];
        $p_pp_toga = $_POST['p_pp_toga'];
        $p_pp_tkeras = $_POST['p_pp_tkeras'];
        $ji_pangan = $_POST['ji_pangan'];
        $ji_sandang = $_POST['ji_sandang'];
        $ji_jasa = $_POST['ji_jasa'];
        $jr_sehat = $_POST['jr_sehat'];
        $jr_tsehat = $_POST['jr_tsehat'];
        $ket = $_POST['ket'];
        
        try {
          $sql = "INSERT INTO data_pokjac SET
          id_kec = :id_kec,
            id_kel = :id_kel,
            nama_ling = :nama_ling,
            j_k_pangan = :j_k_pangan,
            j_k_sandang = :j_k_sandang,
            j_k_ta_rt = :j_k_ta_rt,
            p_mp_beras = :p_mp_beras,
            p_mp_nberas = :p_mp_nberas,
            p_pp_ternak = :p_pp_ternak,
            p_pp_ikan = :p_pp_ikan,
            p_pp_warung = :p_pp_warung,
            p_pp_lumbung = :p_pp_lumbung,
            p_pp_toga = :p_pp_toga,
            p_pp_tkeras = :p_pp_tkeras,
            ji_pangan = :ji_pangan,
            ji_sandang = :ji_sandang,
            ji_jasa = :ji_jasa,
            jr_sehat = :jr_sehat,
            jr_tsehat = :jr_tsehat,
            ket = :ket"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':id_kec', $id_kec);
            $stmt->bindParam(':id_kel', $id_kel);
            $stmt->bindParam(':nama_ling', $nama_ling);
            $stmt->bindParam(':j_k_pangan', $j_k_pangan);
            $stmt->bindParam(':j_k_sandang', $j_k_sandang);
            $stmt->bindParam(':j_k_ta_rt', $j_k_ta_rt);
            $stmt->bindParam(':p_mp_beras', $p_mp_beras);
            $stmt->bindParam(':p_mp_nberas', $p_mp_nberas);
            $stmt->bindParam(':p_pp_ternak', $p_pp_ternak);
            $stmt->bindParam(':p_pp_ikan', $p_pp_ikan);
            $stmt->bindParam(':p_pp_warung', $p_pp_warung);
            $stmt->bindParam(':p_pp_lumbung', $p_pp_lumbung);
            $stmt->bindParam(':p_pp_toga', $p_pp_toga);
            $stmt->bindParam(':p_pp_tkeras', $p_pp_tkeras);
            $stmt->bindParam(':ji_pangan', $ji_pangan);
            $stmt->bindParam(':ji_sandang', $ji_sandang);
            $stmt->bindParam(':ji_jasa', $ji_jasa);
            $stmt->bindParam(':jr_sehat', $jr_sehat);
            $stmt->bindParam(':jr_tsehat', $jr_tsehat);
            $stmt->bindParam(':ket', $ket);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
// 			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/d_pokjac')</script>";
			echo "<script>alert('Berhasil Tambah'); window.history.back();</script>";
		}else{
// 			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/d_pokjac')</script>";
			echo "<script>alert('Gagal Tambah'); window.history.back();</script>";
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
		
		$sql = "DELETE FROM data_pokjac WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
// 			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/d_pokjac/')</script>";
			echo "<script>alert('Berhasil Hapus'); window.history.back();</script>";
		}else{
// 			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/d_pokjac/')</script>";
			echo "<script>alert('Gagal Hapus'); window.history.back();</script>";
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