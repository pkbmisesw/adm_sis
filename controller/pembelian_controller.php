<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$id = $_POST['id'];
		$cekqty = $_POST['qty'];
		$harga = $_POST['harga'];

		$sql = "SELECT * FROM m_product WHERE id = $id";
		$stmta = $conn->prepare($sql);
		$stmta->execute();
		$row = $stmta->fetch();
		
		$qty = $row['qty'];
		$nama = $row['nama'];
		$satuan = $row['satuan'];
		$total = $cekqty * $harga;

		$sqla = "SELECT * FROM m_pembelian ORDER BY id DESC";
        $stmtb = $conn->prepare($sqla);
        $stmtb->execute();
        $rowb = $stmtb->fetch();
		$id_trx = date("Ymd").$rowb['id'];
		$sisaqty = $qty + $cekqty;
			
			try {
				$sql = "INSERT INTO t_pembelian SET
				nama = :nama,
				id_brg = :id_brg,
				id_trx = :id_trx,
				satuan = :satuan,
				qty = :qty,
				harga = :harga,
				total = :total
				"
				;

				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':nama', $nama);
				$stmt->bindParam(':id_brg', $id);
				$stmt->bindParam(':id_trx', $id_trx);
				$stmt->bindParam(':satuan', $satuan);
				$stmt->bindParam(':qty', $cekqty);
				$stmt->bindParam(':harga', $harga);
				$stmt->bindParam(':total', $total);
				$stmt->execute();

				$sql = "UPDATE m_product SET 
				qty = :qty WHERE id = $id";
	
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':qty', $sisaqty);
				$stmt->execute();
			}


			catch(PDOException $e) {
			echo $e->getMessage();
			}
			
			if($stmt){		
				echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/t_pembelian')</script>";
			}else{
				echo "<script>alert('Gagal Tambah'); document.location.href=('../view/t_pembelian')</script>";
			}
	}if($op == "selesai"){
		$user_id = $_SESSION['user_id'];
		$total = $_POST['total'];
		$bayar = $_POST['bayar'];
		$kembali = $_POST['kembali'];

		$sqla = "SELECT * FROM m_pembelian ORDER BY id DESC";
        $stmtb = $conn->prepare($sqla);
        $stmtb->execute();
        $rowb = $stmtb->fetch();
		$id_trx = date("Ymd").$rowb['id'];

		$sqlb = "UPDATE t_pembelian SET 
		stat = 1 WHERE id_trx = $id_trx";
		$stmtc = $conn->prepare($sqlb);
		$stmtc->execute();
        
        try {
          $sql = "INSERT INTO m_pembelian SET
		  id_trx = :id_trx,
          user_id = :user_id,
		  total = :total,
		  bayar = :bayar,
          kembali = :kembali"
          ;

          $stmt = $conn->prepare($sql);
		  $stmt->bindParam(':id_trx', $id_trx);
		  $stmt->bindParam(':user_id', $user_id);
          $stmt->bindParam(':total', $total);
          $stmt->bindParam(':bayar', $bayar);
		  $stmt->bindParam(':kembali', $kembali);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Selesai Transaksi'); document.location.href=('../view/t_pembelian/')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/t_pembelian')</script>";
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
		$id_brg = $_GET['id_brg'];

		$sql = "SELECT * FROM m_product WHERE id = $id_brg";
		$stmta = $conn->prepare($sql);
		$stmta->execute();
		$row = $stmta->fetch();
		$qty = $row['qty'];

		$sisaqty = $qty - $cekqty;

		$sql = "UPDATE m_product SET 
		qty = :qty WHERE id = $id_brg";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':qty', $sisaqty);
		$stmt->execute();
		
		$sql = "DELETE FROM t_pembelian WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/t_pembelian/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/t_pembelian/')</script>";
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