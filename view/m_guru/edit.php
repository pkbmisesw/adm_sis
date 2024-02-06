<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_guru_tendik SET 
    	    sekolah = '".$_POST['sekolah']."',
            npsn='".$_POST['npsn']."',
            nama='".$_POST['nama']."',
            alamat='".$_POST['alamat']."',
            nik='".$_POST['nik']."',
            gender='".$_POST['gender']."',
            ttl='".$_POST['ttl']."',
            agama='".$_POST['agama']."',
            nuptk='".$_POST['nuptk']."',
            status='".$_POST['status']."',
            nip='".$_POST['nip']."',
            tmt_cpns='".$_POST['tmt_cpns']."',
            tmt_pns='".$_POST['tmt_pns']."',
            p_gol='".$_POST['p_gol']."',
            m_kerja='".$_POST['m_kerja']."',
            t_tambah='".$_POST['t_tambah']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>