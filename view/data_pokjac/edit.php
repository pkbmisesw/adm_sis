<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE data_pokjac SET 
	    nama_ling='".$_POST['nama_ling']."',
        j_k_pangan='".$_POST['j_k_pangan']."',
        j_k_sandang='".$_POST['j_k_sandang']."',
        j_k_ta_rt='".$_POST['j_k_ta_rt']."',
        p_mp_beras='".$_POST['p_mp_beras']."',
        p_mp_nberas='".$_POST['p_mp_nberas']."',
        p_pp_ternak='".$_POST['p_pp_ternak']."',
        p_pp_ikan='".$_POST['p_pp_ikan']."',
        p_pp_warung='".$_POST['p_pp_warung']."',
        p_pp_lumbung='".$_POST['p_pp_lumbung']."',
        p_pp_toga='".$_POST['p_pp_toga']."',
        p_pp_tkeras='".$_POST['p_pp_tkeras']."',
        ji_pangan='".$_POST['ji_pangan']."',
        ji_sandang='".$_POST['ji_sandang']."',
        ji_jasa='".$_POST['ji_jasa']."',
        jr_sehat='".$_POST['jr_sehat']."',
        jr_tsehat='".$_POST['jr_tsehat']."',
        ket='".$_POST['ket']."'
	    WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>