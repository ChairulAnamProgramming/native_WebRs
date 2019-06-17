<?php

$menu = "Data";
$title = "Update Poliklinik"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/poli_function.php');

if (isset($_POST['submit'])) {
    if (updatePoli($_POST) > 0) {
        $pesan = "Data berhasil di tambahkan";
        echo "
				<script>
						alert('Data berhasil di ubah')
							document.location.href = 'index.php'
				</script>
		";
    } else {
        $pesan = "Data gagal di tambahkan";
        echo "
				<script>
						alert('Data gagal di ubah')
							document.location.href = 'generet.php'
				</script>
		";
    }
}

$check = $_POST['check'];
if (!isset($check)) {
    echo '<script> alert("Belum ada yang di checklis!"); window.location="index.php" </script>';
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
                        <a href="<?= base_url("obat/index.php"); ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                    </div>

                    <!-- form start -->
                    <form role="form" method="post">
                        <div class="form-group">
                            <table class="table ">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Poli</th>
                                    <th>Gedung</th>
                                </tr>
                                <input type="hidden" class="form-control" name="total" value="<?= $_POST['count'] ?>" required>
                                <?php foreach ($check as $c) : ?>
                                    <?php $result = selectPoli("SELECT * FROM tbl_poliklinik WHERE id_poli = '$c'")[0]; ?>
                                    <tr>
                                        <td></td>
                                        <input type="hidden" class="form-control" name="id_poli[]" value="<?= $result['id_poli']; ?>" required>
                                        <td> <input type="text" class="form-control" name="nama_poli[]" value="<?= $result['nama_poli']; ?>" required> </td>
                                        <td><input type="text" class="form-control" name="gedung[]" value="<?= $result['gedung']; ?>" required></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="row justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">update</button>
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