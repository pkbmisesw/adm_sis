<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){

		$harga_beli = $_POST['harga_beli'];
		$harga_jual = $_POST['harga_jual'];
		$harga_untung = $harga_jual - $harga_beli;

	    $query = "UPDATE m_product SET 
	    nama = '".$_POST['nama']."',
	    des='".$_POST['des']."',
		kategori_id='".$_POST['kategori_id']."',
		satuan='".$_POST['satuan']."',
		harga_beli='".$_POST['harga_beli']."',
		harga_jual='".$_POST['harga_jual']."',
		harga_untung='".$harga_untung."',
		qty='".$_POST['qty']."',
		gambar='".$_POST['gambar']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>