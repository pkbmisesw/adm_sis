<?php
ini_set('display_errors', 0);
include "../config.php";
session_start();

$op = $_GET['op'];
if($op == "tambah"){
    $nama = $_POST['nama'];
    $des = $_POST['des'];

    try{
        $sql = $conn->prepare("INSERT INTO m_kelas SET 
                                     nama = :nama,
                                     des = :des");
        $stmt = $sql->execute([':nama' => $nama, ':des' => $des]);
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

    $sql = "DELETE FROM m_kelas WHERE id = :id";
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