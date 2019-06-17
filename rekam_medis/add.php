<?php
$menu = "Rekam";
$title = "Add Rekam Medis"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/rm_function.php');

if (isset($_POST['submit'])) {
    if (insertRm($_POST) > 0) {
        echo "<script>alert('Data berhasil di buat'); window.location='index.php';</script>";
    } else {
        $pesan = "Data gagal di tambahkan";
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
                        <a href="<?= base_url("rekam_medis/index.php"); ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                    </div>

                    <!-- form start -->
                    <form role="form" method="post">
                        <?php $pasien = selectRm("SELECT * FROM tbl_pasien"); ?>
                        <?php $dokter = selectRm("SELECT * FROM tbl_dokter"); ?>
                        <?php $poliklinik = selectRm("SELECT * FROM tbl_poliklinik"); ?>
                        <?php $obat = selectRm("SELECT * FROM tbl_obat"); ?>
                        <div class="form-group">
                            <select name="id_pasien" id="id_pasien" class="form-control">
                                <option value="">- Nama Pasien -</option>
                                <?php foreach ($pasien as $psien) : ?>
                                    <option value="<?= $psien['id_pasien']; ?>"><?= $psien['nama_pasien']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="id_dokter" id="id_dokter" class="form-control">
                                <option value="">- Nama Dokter -</option>
                                <?php foreach ($dokter as $dok) : ?>
                                    <option value="<?= $dok['id_dokter']; ?>"><?= $dok['nama_dokter']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="id_poli" id="id_poli" class="form-control">
                                <option value="">- Nama Poliklinik -</option>
                                <?php foreach ($poliklinik as $poli) : ?>
                                    <option value="<?= $poli['id_poli']; ?>"><?= $poli['nama_poli']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="keluhan" required placeholder="Keluhan" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="diagnosa" id="diagnosa" class="form-control" cols="30" rows="10" placeholder="Diagnosa" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <select multiple="" name="obat[]" class="form-control">
                                <?php foreach ($obat as $ob) : ?>
                                    <option value="<?= $ob['id_obat']; ?>"><?= $ob['nama_obat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Periksa</label>
                            <input type="date" class="form-control mb-1" id="date" name="date" value="<?= date('Y-m-d') ?>" placeholder="date" required>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">create</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>

    </section>
</div>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../templates/footer.php') ?>