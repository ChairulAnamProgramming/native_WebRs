<?php
$menu = "Data";
$title = "Add Poliklinik"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/poli_function.php');

if (isset($_POST['submit'])) {
    if (insertPoli($_POST) > 0) {
        $pesan = "Data berhasil di tambahkan";
        echo "
				<script>
						alert('Data berhasil di tambahkan')
							document.location.href = 'index.php'
				</script>
		";
    } else {
        $pesan = "Data gagal di tambahkan";
        echo "
				<script>
						alert('Data gagal di tambahkan')
							document.location.href = 'generet.php'
				</script>
		";
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
                                <?php for ($i = 1; $i <= $_POST['count']; $i++) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td> <input type="text" class="form-control" name="nama_poli-<?= $i; ?>" required> </td>
                                        <td><input type="text" class="form-control" name="gedung-<?= $i; ?>" required></td>
                                    </tr>
                                <?php endfor; ?>
                            </table>
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