<?php
include 'config.php';

$nama = $_POST['nama'];
$des = $_POST['des'];

$stmt = $conn->prepare("INSERT INTO m_saran (nama, des) 
VALUES (:nama, :des)");

$stmt->bindParam(':nama', $nama);
$stmt->bindParam(':des', $des);

if($stmt->execute()){
    echo '<script>alert("Saran Sudah Terkirim.")</script>';
    //redirect to another page
    echo '<script>window.location.replace("index.php")</script>';
 
}else{
   echo '<script>alert("Gagal Mengirim Saran")</script>';
}