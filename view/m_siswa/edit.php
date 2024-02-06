<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_siswa SET 
    	    nama = '".$_POST['nama']."',
            gender='".$_POST['gender']."',
            nisn='".$_POST['nisn']."',
            nik='".$_POST['nik']."',
            n_kk='".$_POST['n_kk']."',
            n_akta='".$_POST['n_akta']."',
            agama='".$_POST['agama']."',
            alamat='".$_POST['alamat']."',
            nama_ayah='".$_POST['nama_ayah']."',
            nama_ibu='".$_POST['nama_ibu']."',
            k_khusus='".$_POST['k_khusus']."',
            hp='".$_POST['hp']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>