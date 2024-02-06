<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_bahan SET 
	    nama = '".$_POST['nama']."',
	    des='".$_POST['des']."',
		satuan='".$_POST['satuan']."',
		qty='".$_POST['qty']."',
		harga_beli='".$_POST['harga_beli']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>