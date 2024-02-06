<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE d_pokjad SET 
	    kecamatan='".$_POST['kecamatan']."',
        j_k_pos='".$_POST['j_k_pos']."',
        j_k_gizi='".$_POST['j_k_gizi']."',
        j_k_kes='".$_POST['j_k_kes']."',
        j_k_nar='".$_POST['j_k_nar']."',
        j_k_phbs='".$_POST['j_k_phbs']."',
        j_k_kb='".$_POST['j_k_kb']."',
        kp_jumlah='".$_POST['kp_jumlah']."',
        kp_jumlah_i='".$_POST['kp_jumlah_i']."',
        kp_lan_jk='".$_POST['kp_lan_jk']."',
        kp_lan_ja='".$_POST['kp_lan_ja']."',
        kp_lan_bg='".$_POST['kp_lan_bg']."',
        j_jamban='".$_POST['j_jamban']."',
        j_spal='".$_POST['j_spal']."',
        j_sampah='".$_POST['j_sampah']."',
        j_mck='".$_POST['j_mck']."',
        j_k_pdam='".$_POST['j_k_pdam']."',
        j_k_sumur='".$_POST['j_k_sumur']."',
        j_k_sungai='".$_POST['j_k_sungai']."',
        j_k_lain='".$_POST['j_k_lain']."',
        j_pus='".$_POST['j_pus']."',
        j_wus='".$_POST['j_wus']."',
        ja_l='".$_POST['ja_l']."',
        ja_p='".$_POST['ja_p']."',
        j_kk='".$_POST['j_kk']."',
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