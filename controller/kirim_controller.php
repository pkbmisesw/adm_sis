<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$id = $_POST['id'];
		$cekqty = $_POST['qty'];
		$id_trx = $_POST['id_trx'];

		$sql = "SELECT * FROM m_product WHERE id = $id";
		$stmta = $conn->prepare($sql);
		$stmta->execute();
		$row = $stmta->fetch();
		$qty = $row['qty'];

		$sqla = "SELECT * FROM m_kirim ORDER BY id DESC";
        $stmtb = $conn->prepare($sqla);
        $stmtb->execute();
        $rowb = $stmtb->fetch();
		$id_krm = date("Ymd").$rowb['id'];

		$sqlb = "SELECT * FROM t_penjualan WHERE id_brg = $id AND id_trx = $id_trx";
		$stmtc = $conn->prepare($sqlb);
		$stmtc->execute();
		$rowc = $stmtc->fetch();
		$stok = $rowc['stok'];
		$id_brg = $rowc['id_brg'];

		if ($cekqty > $stok){
			echo "<script>alert('Stok tidak cukup'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
		}elseif($cekqty <= $stok){
			if($cekqty > $qty){
				echo "<script>alert('QTY di product tidak cukup'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
			}elseif($cekqty <= $qty){
				$nama = $row['nama'];
				$sisaqty = $qty - $cekqty;
				$sisastok = $stok - $cekqty;
				$satuan = $row['satuan'];
				
				try {
					$sql = "INSERT INTO t_kirim SET
					nama = :nama,
					id_brg = :id_brg,
					id_trx = :id_trx,
					id_krm = :id_krm,
					satuan = :satuan,
					qty = :qty
					"
					;

					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':nama', $nama);
					$stmt->bindParam(':id_brg', $id_brg);
					$stmt->bindParam(':id_trx', $id_trx);
					$stmt->bindParam(':id_krm', $id_krm);
					$stmt->bindParam(':satuan', $satuan);
					$stmt->bindParam(':qty', $cekqty);
					$stmt->execute();

					$sql = "UPDATE m_product SET 
					qty = :qty WHERE id = $id";
		
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':qty', $sisaqty);
					$stmt->execute();

					$sql = "UPDATE t_penjualan SET 
					stok = :stok WHERE id_brg = $id AND id_trx = $id_trx";
		
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':stok', $sisastok);
					$stmt->execute();
				}


				catch(PDOException $e) {
				echo $e->getMessage();
				}
				
				if($stmt){		
					echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
				}else{
					echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
				}
			}
		}
	}if($op == "selesai"){
		$user_id = $_SESSION['user_id'];
		$pic = $_SESSION['nama'];
		$supir_id =  $_POST['supir_id'];
		$nama =  $_POST['nama'];
		$id_trx = $_POST['id_trx'];
		$qty = $_POST['qty'];

		$sqla = "SELECT * FROM m_kirim ORDER BY id DESC";
		$stmtb = $conn->prepare($sqla);
		$stmtb->execute();
		$rowb = $stmtb->fetch();
		$id_krm = date("Ymd").$rowb['id'];

		$sqlb = "UPDATE t_kirim SET 
		stat = 1 WHERE id_trx = $id_trx";
		$stmtc = $conn->prepare($sqlb);
		$stmtc->execute();
        
        try {
          $sql = "INSERT INTO m_kirim SET
		  id_trx = :id_trx,
		  id_krm = :id_krm,
          user_id = :user_id,
		  pic = :pic,
		  qty = :qty,
		  supir_id = :supir_id,
		  nama = :nama"
          ;

          $stmt = $conn->prepare($sql);
		  $stmt->bindParam(':id_trx', $id_trx);
		  $stmt->bindParam(':id_krm', $id_krm);
		  $stmt->bindParam(':user_id', $user_id);
		  $stmt->bindParam(':pic', $pic);
		  $stmt->bindParam(':qty', $qty);
		  $stmt->bindParam(':supir_id', $supir_id);
		  $stmt->bindParam(':nama', $nama);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Selesai Transaksi'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
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
		$cekqty = $_GET['qty'];
		$id_trx = $_GET['id_trx'];
		$id_brg = $_GET['id_brg'];

		$sql = "SELECT * FROM m_product WHERE id = $id_brg";
		$stmta = $conn->prepare($sql);
		$stmta->execute();
		$row = $stmta->fetch();
		$qty = $row['qty'];

		$sqlb = "SELECT * FROM t_penjualan WHERE id_brg = $id_brg AND id_trx = $id_trx";
		$stmtc = $conn->prepare($sqlb);
		$stmtc->execute();
		$rowc = $stmtc->fetch();
		$stok = $rowc['stok'];

		$sisaqty = $qty + $cekqty;
		$sisastok = $stok + $cekqty;

		$sql = "UPDATE m_product SET 
		qty = :qty WHERE id = $id_brg";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':qty', $sisaqty);
		$stmt->execute();

		$sql = "UPDATE t_penjualan SET 
		stok = :stok WHERE id_brg = $id_brg AND id_trx = $id_trx";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':stok', $sisastok);
		$stmt->execute();
		
		$sql = "DELETE FROM t_kirim WHERE id = :id AND id_trx = :id_trx";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':id_trx', $id_trx);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_transaksi/krim.php?id=$id_trx')</script>";
		}

	}else if($op == "hapusdet"){
		$id = $_GET['id'];
		$id_trx = $_GET['id_trx'];
		
		$sql = "DELETE FROM m_kirim WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		$sql = "DELETE FROM t_kirim WHERE id_trx = :id_trx";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id_trx', $id_trx);
		$stmt->execute();

		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_transaksi/dkirim.php?id=$id_trx')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_transaksi/dkirim.php?id=$id_trx')</script>";
		}

	}else if($op == "hapuslap"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM m_transaksi WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/laporan/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/laporan/')</script>";
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