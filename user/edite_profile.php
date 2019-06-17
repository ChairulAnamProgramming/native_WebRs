<?php
$menu = "User";
$title = "Edite Profile"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/user_function.php');


if (isset($_POST['submit'])) {
    if (updateUser($_POST) > 0) {
        echo "<script>alert('Profile berhasil di update');document.location='index.php';</script>";
    } else {
        echo "<script>alert('Profile berhasil di update');document.location='edite_profile.php';</script>";
    }
}



?>


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
                        <li class="breadcrumb-item"><a href="#"><?= $menu; ?></a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-6">

                    <?php if (isset($pesan) != "") : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= isset($pesan) ? $pesan : "" ?>
                        </div>
                    <?php endif; ?>
                    <div class="row justify-content-end">
                        <a href="" class="btn btn-default btn-sm mb-2 mr-1"><i class="fa fa-fw fa-refresh"></i></a>
                        <a href="<?= base_url("user/index.php"); ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                    </div>

                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="text-center mb-4">
                                <img class="profile-user-img img-fluid img-circle" style="height:100px;" src="<?= base_url("assets/img/profile/") . $session['img']; ?>">
                            </div>
                            <input type="hidden" class="form-control mb-1" id="id_user" name="id_user" placeholder="id_user" value="<?= $session['id_user'] ?>" readonly required>
                            <input type="hidden" class="form-control mb-1" id="image_old" name="image_old" placeholder="image_old" value="<?= $session['img'] ?>" readonly required>
                            <input type="text" class="form-control mb-1" id="username" name="username" placeholder="Username" value="<?= $session['username'] ?>" readonly required>
                            <label for="jk">Nama :</label>
                            <input type="text" class="form-control mb-1" id="nama" name="nama" value="<?= $session['nama'] ?>" placeholder="Nomor Identitas" required>
                            <label for="jk">Alamat :</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" placeholder="Alamat" required><?= $session['alamat']; ?></textarea>
                            <label for="jk">Image :</label>
                            <input type="file" class="form-control mb-1" id="img" name="img" placeholder="img">

                        </div>
                        <div class="row justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../templates/footer.php') ?>