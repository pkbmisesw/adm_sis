<?php
include("../../config.php");
$response = [];
if (isset($_POST['id'])){
    $query = "UPDATE m_user SET 
	    nik='".$_POST['nik']."',
		nama='".$_POST['nama']."',
		level_id='".$_POST['level_id']."',
		email='".$_POST['email']."',
		status_aktif='".$_POST['status_aktif']."',
		hp='".$_POST['hp']."',
		ktp='".$_POST['ktp']."'
	    WHERE id = ".$_POST['id'];

    if ($conn->query($query)){
        $response['code'] = 200;
    }else{
        $response['code'] = 505;
    }
}
echo json_encode($response);

// nip='".$_POST['nip']."',
// 	pangkat='".$_POST['pangkat']."',
// 	jabatan='".$_POST['jabatan']."',


?>