<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE d_pokjab SET 
	    no_urut = '".$_POST['no_urut']."',
	    kecamatan='".$_POST['kecamatan']."',
        j_wm='".$_POST['j_wm']."',
        j_a_bel='".$_POST['j_a_bel']."',
        j_a_wbel='".$_POST['j_a_wbel']."',
        j_b_bel='".$_POST['j_b_bel']."',
        j_b_wbel='".$_POST['j_b_wbel']."',
        j_c_bel='".$_POST['j_c_bel']."',
        j_c_wbel='".$_POST['j_c_wbel']."',
        j_kf_bel='".$_POST['j_kf_bel']."',
        j_kf_wbel='".$_POST['j_kf_wbel']."',
        j_paud_sjenis='".$_POST['j_paud_sjenis']."',
        j_tbm_per='".$_POST['j_tbm_per']."',
        j_bkb_kel='".$_POST['j_bkb_kel']."',
        j_bkb_ibu='".$_POST['j_bkb_ibu']."',
        j_bkb_ape='".$_POST['j_bkb_ape']."',
        j_bkb_sim='".$_POST['j_bkb_sim']."',
        j_kt_kf='".$_POST['j_kt_kf']."',
        j_kt_paud='".$_POST['j_kt_paud']."',
        j_k_bkb='".$_POST['j_k_bkb']."',
        j_k_kop='".$_POST['j_k_kop']."',
        j_k_ket='".$_POST['j_k_ket']."',
        j_kl_lpt='".$_POST['j_kl_lpt']."',
        j_kl_tpk='".$_POST['j_kl_tpk']."',
        j_kl_damas='".$_POST['j_kl_damas']."',
        p_kop_pem_kel='".$_POST['p_kop_pem_kel']."',
        p_kop_pem_pes='".$_POST['p_kop_pem_pes']."',
        p_kop_mad_kel='".$_POST['p_kop_mad_kel']."',
        p_kop_mad_pes='".$_POST['p_kop_mad_pes']."',
        p_kop_ut_kel='".$_POST['p_kop_ut_kel']."',
        p_kop_mut_pes='".$_POST['p_kop_mut_pes']."',
        p_kop_man_kel='".$_POST['p_kop_man_kel']."',
        p_kop_man_pes='".$_POST['p_kop_man_pes']."',
        k_j_kel='".$_POST['k_j_kel']."',
        k_j_pes='".$_POST['k_j_pes']."',
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