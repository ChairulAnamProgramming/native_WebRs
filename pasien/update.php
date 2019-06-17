<?php
$menu = "Data";
$title = "Update Pasien"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/pasien_function.php');
$id = $_GET['id'];
$drById = selectPasien("SELECT * FROM tbl_pasien WHERE id_pasien = $id")[0];

if (isset($_POST['submit'])) {
    if (updatePasien($_POST) > 0) {
        echo "
        <script>
                alert('Data berhasil ubah')
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
                        <a href="<?= base_url("pasien/index.php"); ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                    </div>

                    <!-- form start -->
                    <form role="form" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control mb-1" id="id_pasien" name="id_pasien" value="<?= $drById['id_pasien'] ?> ">
                            <input type="text" readonly class="form-control mb-1" id="nomor_identitas" name="nomor_identitas" value="<?= $drById['nomor_identitas'] ?> ">
                            <input type=" text " class=" form-control mb-1" id="nama_pasien" name="nama_pasien" value="<?= $drById['nama_pasien'] ?> " placeholder="Nama Pasien">

                            <label for="jk">Jenis Kelamin :</label>
                            <div>
                                <label class="radio-inline"><input type="radio" name="jk" id="jk" value="L" <?php if ($drById['jk'] == "L") : ?>checked<?php endif; ?>>Laki-laki</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="radio-inline"><input type="radio" name="jk" value="P" <?php if ($drById['jk'] == "P") : ?>checked<?php endif; ?>>Perempuan</label>
                            </div>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat Pasien"><?= $drById['alamat'] ?></textarea>
                            <input type="text" class=" form-control  mb-1" id="phone" name="phone" placeholder="Phone" value="<?= $drById['no_telp'] ?> ">

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