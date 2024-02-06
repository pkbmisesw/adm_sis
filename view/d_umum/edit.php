<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE d_umum SET 
	    no_urut = '".$_POST['no_urut']."',
	    kecamatan = '".$_POST['kecamatan']."',
        kelurahan='".$_POST['kelurahan']."',
        ling='".$_POST['ling']."',
        p_rw='".$_POST['p_rw']."',
        p_rt='".$_POST['p_rt']."',
        dasa='".$_POST['dasa']."',
        k_rumah='".$_POST['k_rumah']."',
        kk='".$_POST['kk']."',
        j_laki='".$_POST['j_laki']."',
        j_perempuan='".$_POST['j_perempuan']."',
        a_laki='".$_POST['a_laki']."',
        a_perempuan='".$_POST['a_perempuan']."',
        u_laki='".$_POST['u_laki']."',
        u_perempuan='".$_POST['u_perempuan']."',
        k_laki='".$_POST['k_laki']."',
        k_perempuan='".$_POST['k_perempuan']."',
        h_laki='".$_POST['h_laki']."',
        h_perempuan='".$_POST['h_perempuan']."',
        b_laki='".$_POST['b_laki']."',
        b_perempuan='".$_POST['b_perempuan']."',
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