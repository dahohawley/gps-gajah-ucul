<div class="container"><a class="navbar-brand" href="index.php">Pelacakan Gajah</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav ml-auto">
            <?php if($_SESSION['role'] == 'admin'): ?>
                <li class="nav-item" role="presentation"><a class="nav-link" href="user.php">User</a></li>
            <?php endif; ?>
        </ul>
        <a class="btn btn-secondary" href="Login.php">LOGOUT</a>
    </div>
</div>