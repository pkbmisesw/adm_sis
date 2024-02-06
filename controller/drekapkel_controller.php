<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
	    $status = $_POST['status'];
	    $id_kec = $_POST['id_kec'];
		$kecamatan = $_POST['kecamatan'];
        $j_kel = $_POST['j_kel'];
        $j_ling = $_POST['j_ling'];
        $j_rw = $_POST['j_rw'];
        $j_rt = $_POST['j_rt'];
        $j_dasawisma = $_POST['j_dasawisma'];
        $j_krt = $_POST['j_krt'];
        $j_kk = $_POST['j_kk'];
        $j_a_total_l = $_POST['j_a_total_l'];
        $j_a_total_p = $_POST['j_a_total_p'];
        $j_a_balita_l = $_POST['j_a_balita_l'];
        $j_a_balita_p = $_POST['j_a_balita_p'];
        $j_a_pus = $_POST['j_a_pus'];
        $j_a_wus = $_POST['j_a_wus'];
        $j_a_hamil = $_POST['j_a_hamil'];
        $j_a_susui = $_POST['j_a_susui'];
        $j_a_lansia = $_POST['j_a_lansia'];
        $j_a_blaki = $_POST['j_a_blaki'];
        $j_a_bcwe = $_POST['j_a_bcwe'];
        $j_a_bb = $_POST['j_a_bb'];
        $kr_sehat = $_POST['kr_sehat'];
        $kr_tdk_sehat = $_POST['kr_tdk_sehat'];
        $jr_tsampah = $_POST['jr_tsampah'];
        $jr_spal = $_POST['jr_spal'];
        $jr_jamban = $_POST['jr_jamban'];
        $jr_stiker = $_POST['jr_stiker'];
        $sak_pdam = $_POST['sak_pdam'];
        $sak_sumur = $_POST['sak_sumur'];
        $sak_sungai = $_POST['sak_sungai'];
        $sak_dll = $_POST['sak_dll'];
        $mp_beras = $_POST['mp_beras'];
        $mp_nonberas = $_POST['mp_nonberas'];
        $jkk_tabung = $_POST['jkk_tabung'];
        $k_upk = $_POST['k_upk'];
        $kp_ternak = $_POST['kp_ternak'];
        $kp_ikan = $_POST['kp_ikan'];
        $kp_warung = $_POST['kp_warung'];
        $kp_lumbung = $_POST['kp_lumbung'];
        $kp_toga = $_POST['kp_toga'];
        $kp_tanaman = $_POST['kp_tanaman'];
        $i_pangan = $_POST['i_pangan'];
        $i_sandang = $_POST['i_sandang'];
        $i_jasa = $_POST['i_jasa'];
        $kes_ling = $_POST['kes_ling'];
        $ket = $_POST['ket'];
        
        try {
          $sql = "INSERT INTO d_rekap SET
          status = :status,
          id_kec = :id_kec,
         kecamatan = :kecamatan,
            j_kel = :j_kel,
            j_ling = :j_ling,
            j_rw = :j_rw,
            j_rt = :j_rt,
            j_dasawisma = :j_dasawisma,
            j_krt = :j_krt,
            j_kk = :j_kk,
            j_a_total_l = :j_a_total_l,
            j_a_total_p = :j_a_total_p,
            j_a_balita_l = :j_a_balita_l,
            j_a_balita_p = :j_a_balita_p,
            j_a_pus = :j_a_pus,
            j_a_wus = :j_a_wus,
            j_a_hamil = :j_a_hamil,
            j_a_susui = :j_a_susui,
            j_a_lansia = :j_a_lansia,
            j_a_blaki = :j_a_blaki,
            j_a_bcwe = :j_a_bcwe,
            j_a_bb = :j_a_bb,
            kr_sehat = :kr_sehat,
            kr_tdk_sehat = :kr_tdk_sehat,
            jr_tsampah = :jr_tsampah,
            jr_spal = :jr_spal,
            jr_jamban = :jr_jamban,
            jr_stiker = :jr_stiker,
            sak_pdam = :sak_pdam,
            sak_sumur = :sak_sumur,
            sak_sungai = :sak_sungai,
            sak_dll = :sak_dll,
            mp_beras = :mp_beras,
            mp_nonberas = :mp_nonberas,
            jkk_tabung = :jkk_tabung,
            k_upk = :k_upk,
            kp_ternak = :kp_ternak,
            kp_ikan = :kp_ikan,
            kp_warung = :kp_warung,
            kp_lumbung = :kp_lumbung,
            kp_toga = :kp_toga,
            kp_tanaman = :kp_tanaman,
            i_pangan = :i_pangan,
            i_sandang = :i_sandang,
            i_jasa = :i_jasa,
            kes_ling = :kes_ling,
            ket = :ket"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':status', $status);
          $stmt->bindParam(':id_kec', $id_kec);
          $stmt->bindParam(':kecamatan', $kecamatan);
            $stmt->bindParam(':j_kel', $j_kel);
            $stmt->bindParam(':j_ling', $j_ling);
            $stmt->bindParam(':j_rw', $j_rw);
            $stmt->bindParam(':j_rt', $j_rt);
            $stmt->bindParam(':j_dasawisma', $j_dasawisma);
            $stmt->bindParam(':j_krt', $j_krt);
            $stmt->bindParam(':j_kk', $j_kk);
            $stmt->bindParam(':j_a_total_l', $j_a_total_l);
            $stmt->bindParam(':j_a_total_p', $j_a_total_p);
            $stmt->bindParam(':j_a_balita_l', $j_a_balita_l);
            $stmt->bindParam(':j_a_balita_p', $j_a_balita_p);
            $stmt->bindParam(':j_a_pus', $j_a_pus);
            $stmt->bindParam(':j_a_wus', $j_a_wus);
            $stmt->bindParam(':j_a_hamil', $j_a_hamil);
            $stmt->bindParam(':j_a_susui', $j_a_susui);
            $stmt->bindParam(':j_a_lansia', $j_a_lansia);
            $stmt->bindParam(':j_a_blaki', $j_a_blaki);
            $stmt->bindParam(':j_a_bcwe', $j_a_bcwe);
            $stmt->bindParam(':j_a_bb', $j_a_bb);
            $stmt->bindParam(':kr_sehat', $kr_sehat);
            $stmt->bindParam(':kr_tdk_sehat', $kr_tdk_sehat);
            $stmt->bindParam(':jr_tsampah', $jr_tsampah);
            $stmt->bindParam(':jr_spal', $jr_spal);
            $stmt->bindParam(':jr_jamban', $jr_jamban);
            $stmt->bindParam(':jr_stiker', $jr_stiker);
            $stmt->bindParam(':sak_pdam', $sak_pdam);
            $stmt->bindParam(':sak_sumur', $sak_sumur);
            $stmt->bindParam(':sak_sungai', $sak_sungai);
            $stmt->bindParam(':sak_dll', $sak_dll);
            $stmt->bindParam(':mp_beras', $mp_beras);
            $stmt->bindParam(':mp_nonberas', $mp_nonberas);
            $stmt->bindParam(':jkk_tabung', $jkk_tabung);
            $stmt->bindParam(':k_upk', $k_upk);
            $stmt->bindParam(':kp_ternak', $kp_ternak);
            $stmt->bindParam(':kp_ikan', $kp_ikan);
            $stmt->bindParam(':kp_warung', $kp_warung);
            $stmt->bindParam(':kp_lumbung', $kp_lumbung);
            $stmt->bindParam(':kp_toga', $kp_toga);
            $stmt->bindParam(':kp_tanaman', $kp_tanaman);
            $stmt->bindParam(':i_pangan', $i_pangan);
            $stmt->bindParam(':i_sandang', $i_sandang);
            $stmt->bindParam(':i_jasa', $i_jasa);
            $stmt->bindParam(':kes_ling', $kes_ling);
            $stmt->bindParam(':ket', $ket);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/d_rekap/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/d_rekap/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
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
		
		$sql = "DELETE FROM d_rekap WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/d_rekap/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/d_rekap/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
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