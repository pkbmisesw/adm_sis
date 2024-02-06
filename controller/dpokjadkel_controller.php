<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
	    $status = $_POST['status'];
	    $id_kec = $_POST['id_kec'];
		$kecamatan = $_POST['kecamatan'];
        $j_k_pos = $_POST['j_k_pos'];
        $j_k_gizi = $_POST['j_k_gizi'];
        $j_k_kes = $_POST['j_k_kes'];
        $j_k_nar = $_POST['j_k_nar'];
        $j_k_phbs = $_POST['j_k_phbs'];
        $j_k_kb = $_POST['j_k_kb'];
        $kp_jumlah = $_POST['kp_jumlah'];
        $kp_jumlah_i = $_POST['kp_jumlah_i'];
        $kp_lan_jk = $_POST['kp_lan_jk'];
        $kp_lan_ja = $_POST['kp_lan_ja'];
        $kp_lan_bg = $_POST['kp_lan_bg'];
        $j_jamban = $_POST['j_jamban'];
        $j_spal = $_POST['j_spal'];
        $j_sampah = $_POST['j_sampah'];
        $j_mck = $_POST['j_mck'];
        $j_k_pdam = $_POST['j_k_pdam'];
        $j_k_sumur = $_POST['j_k_sumur'];
        $j_k_sungai = $_POST['j_k_sungai'];
        $j_k_lain = $_POST['j_k_lain'];
        $j_pus = $_POST['j_pus'];
        $j_wus = $_POST['j_wus'];
        $ja_l = $_POST['ja_l'];
        $ja_p = $_POST['ja_p'];
        $j_kk = $_POST['j_kk'];
        $ket = $_POST['ket'];
        
        try {
          $sql = "INSERT INTO d_pokjad SET
          status = :status,
          id_kec = :id_kec,
          kecamatan = :kecamatan,
            j_k_pos = :j_k_pos,
            j_k_gizi = :j_k_gizi,
            j_k_kes = :j_k_kes,
            j_k_nar = :j_k_nar,
            j_k_phbs = :j_k_phbs,
            j_k_kb = :j_k_kb,
            kp_jumlah = :kp_jumlah,
            kp_jumlah_i = :kp_jumlah_i,
            kp_lan_jk = :kp_lan_jk,
            kp_lan_ja = :kp_lan_ja,
            kp_lan_bg = :kp_lan_bg,
            j_jamban = :j_jamban,
            j_spal = :j_spal,
            j_sampah = :j_sampah,
            j_mck = :j_mck,
            j_k_pdam = :j_k_pdam,
            j_k_sumur = :j_k_sumur,
            j_k_sungai = :j_k_sungai,
            j_k_lain = :j_k_lain,
            j_pus = :j_pus,
            j_wus = :j_wus,
            ja_l = :ja_l,
            ja_p = :ja_p,
            j_kk = :j_kk,
            ket = :ket"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':status', $status);
          $stmt->bindParam(':id_kec', $id_kec);
          $stmt->bindParam(':kecamatan', $kecamatan);
            $stmt->bindParam(':j_k_pos', $j_k_pos);
            $stmt->bindParam(':j_k_gizi', $j_k_gizi);
            $stmt->bindParam(':j_k_kes', $j_k_kes);
            $stmt->bindParam(':j_k_nar', $j_k_nar);
            $stmt->bindParam(':j_k_phbs', $j_k_phbs);
            $stmt->bindParam(':j_k_kb', $j_k_kb);
            $stmt->bindParam(':kp_jumlah', $kp_jumlah);
            $stmt->bindParam(':kp_jumlah_i', $kp_jumlah_i);
            $stmt->bindParam(':kp_lan_jk', $kp_lan_jk);
            $stmt->bindParam(':kp_lan_ja', $kp_lan_ja);
            $stmt->bindParam(':kp_lan_bg', $kp_lan_bg);
            $stmt->bindParam(':j_jamban', $j_jamban);
            $stmt->bindParam(':j_spal', $j_spal);
            $stmt->bindParam(':j_sampah', $j_sampah);
            $stmt->bindParam(':j_mck', $j_mck);
            $stmt->bindParam(':j_k_pdam', $j_k_pdam);
            $stmt->bindParam(':j_k_sumur', $j_k_sumur);
            $stmt->bindParam(':j_k_sungai', $j_k_sungai);
            $stmt->bindParam(':j_k_lain', $j_k_lain);
            $stmt->bindParam(':j_pus', $j_pus);
            $stmt->bindParam(':j_wus', $j_wus);
            $stmt->bindParam(':ja_l', $ja_l);
            $stmt->bindParam(':ja_p', $ja_p);
            $stmt->bindParam(':j_kk', $j_kk);
            $stmt->bindParam(':ket', $ket);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/d_pokjad/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/d_pokjad/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
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
		$status = $_GET['s'];
		$id_kec = $_GET['p'];
		$kec = $_GET['kec'];
		
		$sql = "DELETE FROM d_pokjad WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/d_pokjad/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/d_pokjad/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
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