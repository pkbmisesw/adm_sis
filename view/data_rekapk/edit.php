<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE data_rekap SET 
	    nama_ling = '".$_POST['nama_ling']."',
        j_rw='".$_POST['j_rw']."',
        j_rt='".$_POST['j_rt']."',
        j_dasawisma='".$_POST['j_dasawisma']."',
        j_krt='".$_POST['j_krt']."',
        j_kk='".$_POST['j_kk']."',
        j_a_total_l='".$_POST['j_a_total_l']."',
        j_a_total_p='".$_POST['j_a_total_p']."',
        j_a_balita_l='".$_POST['j_a_balita_l']."',
        j_a_balita_p='".$_POST['j_a_balita_p']."',
        j_a_pus='".$_POST['j_a_pus']."',
        j_a_wus='".$_POST['j_a_wus']."',
        j_a_hamil='".$_POST['j_a_hamil']."',
        j_a_susui='".$_POST['j_a_susui']."',
        j_a_lansia='".$_POST['j_a_lansia']."',
        j_a_blaki='".$_POST['j_a_blaki']."',
        j_a_bcwe='".$_POST['j_a_bcwe']."',
        j_a_bb='".$_POST['j_a_bb']."',
        kr_sehat='".$_POST['kr_sehat']."',
        kr_tdk_sehat='".$_POST['kr_tdk_sehat']."',
        jr_tsampah='".$_POST['jr_tsampah']."',
        jr_spal='".$_POST['jr_spal']."',
        jr_jamban='".$_POST['jr_jamban']."',
        jr_stiker='".$_POST['jr_stiker']."',
        sak_pdam='".$_POST['sak_pdam']."',
        sak_sumur='".$_POST['sak_sumur']."',
        sak_sungai='".$_POST['sak_sungai']."',
        sak_dll='".$_POST['sak_dll']."',
        mp_beras='".$_POST['mp_beras']."',
        mp_nonberas='".$_POST['mp_nonberas']."',
        jkk_tabung='".$_POST['jkk_tabung']."',
        k_upk='".$_POST['k_upk']."',
        kp_ternak='".$_POST['kp_ternak']."',
        kp_ikan='".$_POST['kp_ikan']."',
        kp_warung='".$_POST['kp_warung']."',
        kp_lumbung='".$_POST['kp_lumbung']."',
        kp_toga='".$_POST['kp_toga']."',
        kp_tanaman='".$_POST['kp_tanaman']."',
        i_pangan='".$_POST['i_pangan']."',
        i_sandang='".$_POST['i_sandang']."',
        i_jasa='".$_POST['i_jasa']."',
        kes_ling='".$_POST['kes_ling']."',
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