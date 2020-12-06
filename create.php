<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
	<div class="header-dark">
		<div class="row register-form">
			<div class="col-md-8 offset-md-2">
				<form class="custom-form bg-dark" action="insert.php" method="post">
					<h1 class="text-white">Tambah User</h1>
					<div class="form-row form-group">
						<div class="col-sm-4 label-column text-white">
							<label class="col-form-label" for="name-input-field">Nama </label>
						</div>
						<div class="col-sm-6 input-column">
							<input class="form-control" type="text" name="nama">
					</div>
					</div>
					<div class="form-row form-group ">
						<div class="col-sm-4 label-column text-white">
							<label class="col-form-label" for="email-input-field">Email </label>
						</div>
						<div class="col-sm-6 input-column">
							<input class="form-control" type="text" name="email">
					</div>
					</div>
					<div class="form-row form-group">
						<div class="col-sm-4 label-column text-white">
							<label class="col-form-label" for="pawssword-input-field">Password </label>
						</div>
						<div class="col-sm-6 input-column">
							<input class="form-control" type="text" name="password">
						</div>
					</div>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-primary" value="Simpan"></td>					
						</tr>	
					<!-- <button class="btn btn-light submit-button" type="button">Simpan</button> -->
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>