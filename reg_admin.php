<?php
include 'config.php';

if(isset($_POST['daftar'])) {

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$id_kel = $_POST['id_kel'];
$email = $_POST['email'];
$level_id = 2;
$status_jabatan = 2;
$status_aktif = 0;
$pass = $_POST['password'];
$pass = password_hash($pass, PASSWORD_BCRYPT);

$dir = "images/";
$proses_upload = move_uploaded_file($_FILES['ktp']["tmp_name"], $dir.$_FILES['ktp']["name"]);
$url = $_FILES['ktp']["name"];


//check id kecamatan
$sql = "SELECT * FROM m_kelurahan WHERE id = :id_kel";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id_kel', $id_kel);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$id_kec = $row['id_kec'];

//Check if nik exists
         $sql = "SELECT COUNT(id_kel) AS num FROM m_user WHERE id_kel = :id_kel";
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':id_kel', $id_kel);
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         if($row['num'] > 0){
             echo "<script>alert('Sudah Ada Admin Kelurahan Tersebut'); window.document.location.href='index.php';</script>";
         }else{
             
            $stmt = $conn->prepare("INSERT INTO m_user (
            nik, 
            nama, 
            hp, 
            id_kec,
            id_kel, 
            email, 
            level_id, 
            status_jabatan,
            status_aktif, 
            password, 
            ktp
            ) 
            VALUES (
                :nik, 
                :nama, 
                :hp, 
                :id_kec,
                :id_kel, 
                :email,
                :level_id, 
                :status_jabatan,
                :status_aktif,
                :password, 
                :ktp
                )");
            $stmt->bindParam(':nik', $nik);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':hp', $hp);
            $stmt->bindParam(':id_kec', $id_kec);
            $stmt->bindParam(':id_kel', $id_kel);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':level_id', $level_id);
            $stmt->bindParam(':status_jabatan', $status_jabatan);
            $stmt->bindParam(':status_aktif', $status_aktif);
            $stmt->bindParam(':password', $pass);
            $stmt->bindParam(':ktp', $url);
            
           if($stmt->execute()){
            echo '<script>alert("New account created.")</script>';
            //redirect to another page
            echo '<script>window.location.replace("index.php")</script>';
             
           }else{
               echo '<script>alert("An error occurred")</script>';
           }
             
            
         }
}

?>