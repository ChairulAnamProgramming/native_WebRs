<?php
$menu = "Data";
$title = "Update Dokter"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/dokter_function.php');
$id = $_GET['id'];
$drById = selectDr("SELECT * FROM tbl_dokter WHERE id_dokter = $id")[0];

if (isset($_POST['submit'])) {
    if (updateDr($_POST) > 0) {
        echo "
        <script>
                alert('data berhasil ubah')
                    document.location.href = 'index.php'
        </script>
";
    } else {
        $pesan = "Data gagal di ubah";
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

        <?php if (isset($pesan) != "") : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?= isset($pesan) ? $pesan : "" ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-6">
                    <div class="row justify-content-end">
                        <a href="" class="btn btn-default btn-sm mb-2 mr-1"><i class="fa fa-fw fa-refresh"></i></a>
                        <a href="<?= base_url("obat/index.php"); ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                    </div>

                    <!-- form start -->
                    <form role="form" method="post">
                        <div class="form-group">
                            <input type="hidden" class="form-control mb-1" id="id_dokter" name="id_dokter" value="<?= $drById['id_dokter'] ?> "> <input type=" text " class=" form-control mb-1" id="nama_dokter" name="nama_dokter" value="<?= $drById['nama_dokter'] ?> " placeholder="NamaDokter">
                            <input type="text" class="form-control   mb-1" id="spesialis" name="spesialis" value="<?= $drById['spesialis'] ?> " placeholder="Spesialis">
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat dokter"><?= $drById['alamat'] ?></textarea>
                            <input type="number" class=" form-control  mb-1" id="phone" name="phone" placeholder="Phone" value="<?= $drById['no_telp'] ?> ">

                        </div>
                        <div class="row justify-content-end">
                            <button type="submit" name="submit" class=" btn btn-primary btn-sm">update</button>
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