<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
// $id = "133";
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO users VALUES(null, '$nama' , '$email' ,'user', '$password')";
mysqli_query($conn,$query);
// mysqli_query($conn,"INSERT INTO user VALUES('156', '123' , '123@gmail.com' , '123')");
 
header("location:user.php");
 
?>