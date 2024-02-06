<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE data_pokjaa SET 
	    nama_ling='".$_POST['nama_ling']."',
        j_pkbn='".$_POST['j_pkbn']."',
        j_pkdrt='".$_POST['j_pkdrt']."',
        pola='".$_POST['pola']."',
        p_pkbn_sim='".$_POST['p_pkbn_sim']."',
        p_pkbn_anggota='".$_POST['p_pkbn_anggota']."',
        p_pkdrt_sim='".$_POST['p_pkdrt_sim']."',
        p_pkdrt_anggota='".$_POST['p_pkdrt_anggota']."',
        pola_kel='".$_POST['pola_kel']."',
        pola_anggota='".$_POST['pola_anggota']."',
        lansia_kel='".$_POST['lansia_kel']."',
        lansia_anggota='".$_POST['lansia_anggota']."',
        g_jum_ker='".$_POST['g_jum_ker']."',
        g_jum_ruk='".$_POST['g_jum_ruk']."',
        g_jum_agama='".$_POST['g_jum_agama']."',
        g_jum_jimpit='".$_POST['g_jum_jimpit']."',
        g_jum_arisan='".$_POST['g_jum_arisan']."',
        ket='".$_POST['ket']."',
        status='".$_POST['status']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>