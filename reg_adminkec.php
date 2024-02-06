<?php
include 'config.php';

if(isset($_POST['daftar'])) {

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$id_kec = $_POST['id_kec'];
$email = $_POST['email'];
$level_id = 5;
$status_jabatan = 1;
$status_aktif = 0;
$pass = $_POST['password'];
$pass = password_hash($pass, PASSWORD_BCRYPT);

$dir = "images/";
$proses_upload = move_uploaded_file($_FILES['ktp']["tmp_name"], $dir.$_FILES['ktp']["name"]);
$url = $_FILES['ktp']["name"];

//Check if nik exists
         $sql = "SELECT COUNT(id_kec) AS num FROM m_user WHERE id_kec = :id_kec";
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':id_kec', $id_kec);
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         if($row['num'] > 0){
             echo "<script>alert('Sudah Terdaftar Admin Kecamatan Tersebut'); window.document.location.href='index.php';</script>";
         }else{
             
            $stmt = $conn->prepare("INSERT INTO m_user (
            nik, 
            nama, 
            hp, 
            id_kec, 
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