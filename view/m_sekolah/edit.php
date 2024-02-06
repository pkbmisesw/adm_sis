<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_sekolah SET 
    	    nama = '".$_POST['nama']."',
            npsn='".$_POST['npsn']."',
            pendidikan='".$_POST['pendidikan']."',
            status='".$_POST['status']."',
            kecamatan='".$_POST['kecamatan']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>