<?php
include 'koneksi.php';

$sql = mysqli_query($conn, "SELECT * FROM gps_log  order by id desc limit 1");

if ($sql->num_rows > 0) {
    while($row = $sql->fetch_assoc()){
        header('content-type:application/json');
        echo json_encode($row);
    }
} else {
    echo "0";
}