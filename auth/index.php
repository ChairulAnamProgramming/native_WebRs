<?php require_once('../config/database.php'); ?>
<?php require_once('../config/autoload.php'); ?>

<?php
session_start();
$title = "Login"; ?>
<?php
if (isset($_SESSION['id'])) {
    header("location:../index.php");
}
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM tbl_user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        $_SESSION['id'] = $row['id_user'];
        header("location:../index.php");
    } else {
        $alert = "Password salah";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>dist/css/adminlte.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url("style.css") ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url("assets/template/") ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>RS Nagara</a>
        </div>

        <?php if (isset($alert) != "") : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?= isset($alert) ? $alert : "" ?>
            </div>
        <?php endif; ?>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign In untuk memulai</p>

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <label>Belum punya akun? <a href="register.php"> Buat</a></label>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    <!-- jQuery -->
    <script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>