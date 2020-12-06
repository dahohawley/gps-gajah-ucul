<?php
// include database connection file
include_once("koneksi.php");

$id = $_POST['id'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$password=$_POST['password'];

// update user data
$query  = "UPDATE users SET nama='$nama',email='$email',password='$password' WHERE id='$id'";
$sql = mysqli_query($conn,$query);

// Redirect to homepage to display updated user in list
header("Location: user.php");

?>
