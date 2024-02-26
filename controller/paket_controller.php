<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];
if($op == "tambah"){
    $characters = '0123456789';

    $id_jabatan = $_POST['id_jabatan'];
    $nama = $_POST['nama'];
    $des = $_POST['des'];
    $codx = "gen2023102";

    for($i = 0; $i < 10; $i++){
        $index = rand(0, strlen($characters)-1);
        $codx .= $characters[$index];
    }

    try{
        $sql = $conn->prepare("INSERT INTO m_paket SET 
                                     codx = :codx,
                                     id_jabatan = :id_jabatan,
                                     nama = :nama,
                                     des = :des");
        $stmt = $sql->execute([':codx' => $codx, ':id_jabatan' => $id_jabatan,':nama' => $nama, ':des' => $des]);
    } catch(PDOException $e){
        echo $e->getMessage();
    }

    if($stmt){
        echo "<script>alert('Berhasil Tambah');window.history.back();</script>";
    }else{
        echo "<script>alert('Gagal Tambah');window.history.back();</script>";
    }
} else if($op == "hapus") {
    $id = $_GET['id'];

    $sql = "DELETE FROM m_paket WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt) {
        echo "<script>alert('Berhasil Menghapus'); window.history.back();</script>";
// 			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_user/')</script>";
    } else {
        echo "<script>alert('Gagal Menghapus'); window.history.back();</script>";
// 			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_user/')</script>";
    }
}