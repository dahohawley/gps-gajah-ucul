<!DOCTYPE html>
<html>

<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">`
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="header-dark">
        <nav class="navbar fixed-top navbar-dark navbar-expand-lg navbar-light bg-dark">
            <?php include('./navbar.php') ?>
        </nav>
    </div>
    <div class="container">
        <div class="bd-example">
            <div class="table-responsive-lg">
                <div>
                    <h3>Data user</h3>
                    <a  href="create.php" class="btn btn-primary mb-2 float-right">Tambah User</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                            include "koneksi.php";
                            $sql = mysqli_query($conn, "select * from users WHERE role='user'");
                            $nomor = 1;
                        ?>
                        <?php while ($data = mysqli_fetch_array($sql)) : ?>
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><a class="edit" href="edit1.php?id=<?php echo $data['id']; ?>">Edit</a> | <a class="hapus" href="delete.php?id=<?php echo $data['id']; ?>">Hapus</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/Profile-Edit-Form.js"></script>
    </div>
    </div>
</body>

</html>