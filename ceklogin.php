<?php 
// mengaktifkan session php
// menghubungkan dengan koneksi
include 'koneksi.php';
session_start();

// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($conn,"select * from users where email='$email' and password='$password'");

// menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($data);
 
if($data->num_rows > 0){
    while($row = $data->fetch_assoc()){
        $_SESSION = $row;
    }
    header("location:index.php");
}else{
    header("location:login.php");
}

?>