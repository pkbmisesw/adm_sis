<?php
include 'config.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$pass = $_POST['password'];
$pass = password_hash($pass, PASSWORD_BCRYPT);

$dir = "images/";
$proses_upload = move_uploaded_file($_FILES['ktp']["tmp_name"], $dir.$_FILES['ktp']["name"]);
$url = $_FILES['ktp']["name"];

//Check if nik exists
         $sql = "SELECT COUNT(nik) AS num FROM m_user WHERE nik = :nik";
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':nik', $nik);
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         if($row['num'] > 0){
             echo "<script>alert('NIK already exists'); window.document.location.href='index.php';</script>";
         }else{
             
             
           
             
            $stmt = $conn->prepare("INSERT INTO m_user (nik, nama, hp, email, password, ktp) 
            VALUES (:nik, :nama, :hp, :email, :password, :ktp)");
            $stmt->bindParam(':nik', $nik);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':hp', $hp);
            $stmt->bindParam(':email', $email);
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

?>