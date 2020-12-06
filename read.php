<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
	<h3>Data user</h3>
	<table border="1" class="table">
		<tr>
			<th>No.</th>
			<th>Id</th>
			<th>Nama</th>
			<th>Email</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$sql = mysqli_query($conn,"select * from user");
		$nomor = 1;
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['id_user']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['email']; ?></td>
		</tr>
		<?php } ?>
	</table>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>