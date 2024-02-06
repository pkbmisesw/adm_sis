<?php


$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

$dirUpload = "terupload/";
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);


?>