<?php
include 'config.php';

$nama = $_POST['nama'];
$gender = $_POST['gender'];
$nisn = $_POST['nisn'];
$nik = $_POST['nik'];
$n_kk = $_POST['n_kk'];
$n_akta = $_POST['n_akta'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$nama_ibu = $_POST['nama_ibu'];
$nama_ayah = $_POST['nama_ayah'];
$k_khusus = $_POST['k_khusus'];
$hp = $_POST['hp'];
$suket = $_POST['suket'];

$dir = "images/";
$proses_upload = move_uploaded_file($_FILES['suket']["tmp_name"], $dir.$_FILES['suket']["name"]);
$url = $_FILES['suket']["name"];

//Check if nik exists
         $sql = "SELECT COUNT(nik) AS num FROM m_siswa WHERE nik = :nik";
         $stmt = $conn->prepare($sql);

         $stmt->bindValue(':nik', $nik);
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         if($row['num'] > 0){
             echo "<script>alert('NIK already exists'); window.document.location.href='index.php';</script>";
         }else{
             
             
           
             
            $stmt = $conn->prepare("INSERT INTO m_siswa (
            nama, 
            gender, 
            nisn, 
            nik, 
            n_kk, 
            n_akta,
            agama,
            alamat,
            nama_ibu,
            nama_ayah,
            k_khusus,
            hp,
            suket
            ) 
            VALUES (
                :nama, 
                :gender, 
                :nisn, 
                :nik, 
                :n_kk, 
                :n_akta, 
                :agama, 
                :alamat, 
                :nama_ibu, 
                :nama_ayah, 
                :k_khusus, 
                :hp, 
                :suket 
                )");
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':nisn', $nisn);
            $stmt->bindParam(':nik', $nik);
            $stmt->bindParam(':n_kk', $n_kk);
            $stmt->bindParam(':n_akta', $n_akta);
            $stmt->bindParam(':agama', $agama);
            $stmt->bindParam(':alamat', $alamat);
            $stmt->bindParam(':nama_ibu', $nama_ibu);
            $stmt->bindParam(':nama_ayah', $nama_ayah);
            $stmt->bindParam(':k_khusus', $k_khusus);
            $stmt->bindParam(':hp', $hp);
            $stmt->bindParam(':suket', $url);
            
           if($stmt->execute()){
            echo '<script>alert("New account created.")</script>';
            //redirect to another page
            echo '<script>window.location.replace("index.php")</script>';
             
           }else{
               echo '<script>alert("An error occurred")</script>';
           }
             
             
             
             
            
         }

?>