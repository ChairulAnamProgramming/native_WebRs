<?php
$menu = "Data";
$title = "Add Pasien"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/pasien_function.php');

$kodeku = selectPasien("SELECT nomor_identitas FROM tbl_pasien ORDER by nomor_identitas DESC");
// jika $datakode
if ($kodeku) {
    $nilaikode = substr($kodeku[0]['nomor_identitas'], 8);
    $kode = (int)$nilaikode;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $kode_otomatis = "Pasien-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $kode_otomatis = "Pasien-001";
}



if (isset($_POST['submit'])) {
    if (insertPasien($_POST) > 0) {
        $pesan = "Data berhasil di tambahkan";
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
                        <a href="<?= base_url("pasien/index.php"); ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                    </div>

                    <!-- form start -->
                    <form role="form" method="post">
                        <div class="form-group">
                            <input type="text" readonly class="form-control mb-1" id="nomor_identitas" name="nomor_identitas" value="<?= $kode_otomatis ?>" placeholder="Nomor Identitas" required>
                            <input type="text" class="form-control mb-1" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" required>
                            <label for="jk">Jenis Kelamin :</label>
                            <div>
                                <label class="radio-inline"><input type="radio" name="jk" id="jk" value="L" required>Laki-laki</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="radio-inline"><input type="radio" name="jk" value="P">Perempuan</label>
                            </div>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat dokter" required></textarea>
                            <input type="number" class="form-control mb-1" id="phone" name="phone" placeholder="Phone" required>

                        </div>
                        <div class="row justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">create</button>
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