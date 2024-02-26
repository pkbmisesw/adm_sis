<?php
include("../../config.php");
$response = [];
if (isset($_POST['id'])){
    $query = "UPDATE m_jabatan SET 
        id_kelas='".$_POST['id_kelas']."',
	    nama='".$_POST['nama']."',
		des='".$_POST['des']."'
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