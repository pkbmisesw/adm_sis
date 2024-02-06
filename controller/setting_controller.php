<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$nama = $_POST['nama'];
		$des = $_POST['des'];
        
        try {
          $sql = "INSERT INTO m_satuan SET
          nama = :nama,
          des = :des"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':des', $des);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_satuan')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_satuan')</script>";
		}
	
	}else if($op == "daftar"){
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
		$logo = $_POST['logo'];
		$nama = $_POST['nama'];
        $des = $_POST['des']; 
		$alamat = $_POST['alamat']; 
        $run_text = $_POST['run_text']; 
        $wa = $_POST['wa']; 
		$kata_wa = $_POST['kata_wa']; 
        $seo = $_POST['seo']; 
		$email = $_POST['email']; 
		$yt = $_POST['yt']; 
		$warna = $_POST['warna'];
		$neon = $_POST['neon'];
		$skin = $_POST['skin']; 
		
		$s_satu = $_POST['s_satu']; 
		$s_dua = $_POST['s_dua']; 
		$s_tiga = $_POST['s_tiga']; 
		$s_empat = $_POST['s_empat']; 
		$s_lima = $_POST['s_lima']; 
		$s_enam = $_POST['s_enam']; 

		// ambil data file
		$namaFile = $_FILES['berkas']['name'];
		$namaSementara = $_FILES['berkas']['tmp_name'];

		// tentukan lokasi file akan dipindahkan
		$dirUpload = "../images/";

		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		// if ($terupload) {
		// 	echo "Upload berhasil!<br/>";
		// 	echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
		// } else {
		// 	echo "Upload Gagal!";
		// }

	
        try {
          $sql = "UPDATE setting SET 
            logo = :logo, 
            nama = :nama, 
            des = :des, 
			alamat = :alamat, 
            run_text = :run_text,
            wa = :wa,
			kata_wa = :kata_wa,
            seo = :seo,
			email = :email ,
			yt = :yt,
			warna = :warna,
			neon = :neon,
			skin = :skin,
			s_satu = :s_satu,
			s_dua = :s_dua,
			s_tiga = :s_tiga,
			s_empat = :s_empat,
			s_lima = :s_lima,
			s_enam = :s_enam
            WHERE id = $id" 
             
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':logo', $logo);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':des', $des);
		  $stmt->bindParam(':alamat', $alamat);
          $stmt->bindParam(':run_text', $run_text);
          $stmt->bindParam(':wa', $wa);
		  $stmt->bindParam(':kata_wa', $kata_wa);
          $stmt->bindParam(':seo', $seo);
		  $stmt->bindParam(':email', $email);
		  $stmt->bindParam(':yt', $yt);
		  $stmt->bindParam(':warna', $warna);
		  $stmt->bindParam(':neon', $neon);
		  $stmt->bindParam(':skin', $skin);
		  $stmt->bindParam(':s_satu', $s_satu);
		  $stmt->bindParam(':s_dua', $s_dua);
		  $stmt->bindParam(':s_tiga', $s_tiga);
		  $stmt->bindParam(':s_empat', $s_empat);
		  $stmt->bindParam(':s_lima', $s_lima);
		  $stmt->bindParam(':s_enam', $s_enam);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Data telah dirubah'); document.location.href=('../view/pengaturan')</script>";
		}else{
			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/pengaturan')</script>";
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
		
		$sql = "DELETE FROM m_satuan WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_satuan/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_satuan/')</script>";
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