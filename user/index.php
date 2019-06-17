<?php
$menu = "User";
$title = "My Profile"; ?>
<?php require_once('../config/database.php'); ?>
<?php require_once('../config/autoload.php'); ?>
<?php require_once('../templates/header.php') ?>
<?php require_once('../templates/navbar.php') ?>
<?php require_once('../templates/sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $menu ?> </a></li>
                        <li class="breadcrumb-item active"><?= $title ?> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-6">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url("assets/img/profile/") . $session['img']; ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $session['nama']; ?></h3>

                        <p class="text-muted text-center"><?= $session['alamat']; ?></p>

                        <a href="edite_profile.php" class="btn btn-primary btn-block"><b>Edite Profile</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section> <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../templates/footer.php') ?>