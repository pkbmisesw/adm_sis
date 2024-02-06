<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
	    $status = $_POST['status'];
	    $id_kec = $_POST['id_kec'];
		$kecamatan = $_POST['kecamatan'];
        $j_pkbn = $_POST['j_pkbn'];
        $j_pkdrt = $_POST['j_pkdrt'];
        $pola = $_POST['pola'];
        $p_pkbn_sim = $_POST['p_pkbn_sim'];
        $p_pkbn_anggota = $_POST['p_pkbn_anggota'];
        $p_pkdrt_sim = $_POST['p_pkdrt_sim'];
        $p_pkdrt_anggota = $_POST['p_pkdrt_anggota'];
        $pola_kel = $_POST['pola_kel'];
        $pola_anggota = $_POST['pola_anggota'];
        $lansia_kel = $_POST['lansia_kel'];
        $lansia_anggota = $_POST['lansia_anggota'];
        $g_jum_ker = $_POST['g_jum_ker'];
        $g_jum_ruk = $_POST['g_jum_ruk'];
        $g_jum_agama = $_POST['g_jum_agama'];
        $g_jum_jimpit = $_POST['g_jum_jimpit'];
        $g_jum_arisan = $_POST['g_jum_arisan'];
        $ket = $_POST['ket'];
        
        try {
          $sql = "INSERT INTO d_pokjaa SET
          status = :status,
          id_kec = :id_kec,
          kecamatan = :kecamatan,
            j_pkbn = :j_pkbn,
            j_pkdrt = :j_pkdrt,
            pola = :pola,
            p_pkbn_sim = :p_pkbn_sim,
            p_pkbn_anggota = :p_pkbn_anggota,
            p_pkdrt_sim = :p_pkdrt_sim,
            p_pkdrt_anggota = :p_pkdrt_anggota,
            pola_kel = :pola_kel,
            pola_anggota = :pola_anggota,
            lansia_kel = :lansia_kel,
            lansia_anggota = :lansia_anggota,
            g_jum_ker = :g_jum_ker,
            g_jum_ruk = :g_jum_ruk,
            g_jum_agama = :g_jum_agama,
            g_jum_jimpit = :g_jum_jimpit,
            g_jum_arisan = :g_jum_arisan,
            ket = :ket"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':status', $status);
          $stmt->bindParam(':id_kec', $id_kec);
          $stmt->bindParam(':kecamatan', $kecamatan);
            $stmt->bindParam(':j_pkbn', $j_pkbn);
            $stmt->bindParam(':j_pkdrt', $j_pkdrt);
            $stmt->bindParam(':pola', $pola);
            $stmt->bindParam(':p_pkbn_sim', $p_pkbn_sim);
            $stmt->bindParam(':p_pkbn_anggota', $p_pkbn_anggota);
            $stmt->bindParam(':p_pkdrt_sim', $p_pkdrt_sim);
            $stmt->bindParam(':p_pkdrt_anggota', $p_pkdrt_anggota);
            $stmt->bindParam(':pola_kel', $pola_kel);
            $stmt->bindParam(':pola_anggota', $pola_anggota);
            $stmt->bindParam(':lansia_kel', $lansia_kel);
            $stmt->bindParam(':lansia_anggota', $lansia_anggota);
            $stmt->bindParam(':g_jum_ker', $g_jum_ker);
            $stmt->bindParam(':g_jum_ruk', $g_jum_ruk);
            $stmt->bindParam(':g_jum_agama', $g_jum_agama);
            $stmt->bindParam(':g_jum_jimpit', $g_jum_jimpit);
            $stmt->bindParam(':g_jum_arisan', $g_jum_arisan);
            $stmt->bindParam(':ket', $ket);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/d_pokjaa/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/d_pokjaa/kel?p=$id_kec&s=$status&kec=$kecamatan')</script>";
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
		
		$sql = "DELETE FROM d_pokjaa WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/d_pokjaa/kel?p=$id_kec&s=$status&kec=$kec')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/d_pokjaa/kel?p=$id_kec&s=$status&kec=$kec')</script>";
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