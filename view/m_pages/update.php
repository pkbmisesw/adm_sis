<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_pages SET 
	    nama = '".$_POST['nama']."',
	    urut = '".$_POST['urut']."',
	    stat='".$_POST['stat']."',
	    url='".$_POST['url']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>