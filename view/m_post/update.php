<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_post SET 
	    nama = '".$_POST['nama']."',
		gambar='".$_POST['gambar']."',
		penulis='".$_POST['penulis']."',
		tgl='".$_POST['tgl']."',
		sdes='".$_POST['sdes']."',
		view='".$_POST['view']."',
		kelas='".$_POST['kelas']."',
	    stat='".$_POST['stat']."',
		no_urut='".$_POST['no_urut']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>