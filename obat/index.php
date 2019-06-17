<?php
$menu = "Data";
$title = "Data Obat"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/obat_function.php');

$obat = select("SELECT * FROM tbl_obat");

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
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content" style="align:center">
        <!-- /.row -->
        <div class="row justify-content-center">
            <div class="col-12  mb-2">
                <div class="row justify-content-end">
                    <a href="" class="btn btn-default btn-sm mr-1"><i class="fa fa-fw fa-refresh"></i></a>
                    <a href="<?= base_url("obat/add.php"); ?>" class="btn btn-success btn-sm "><i class="fa fa-fw fa-plus"></i> Tambah data obat</a>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body  ">
                        <table class="table table-hover" id="table_obat">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>Keterangan</th>
                                    <th style="width:200px;"><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($obat as $obt) : ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <th><?= $obt['nama_obat']; ?></th>
                                        <td><?= $obt['ket_obat']; ?></td>
                                        <td>
                                            <a href="update.php?id=<?= $obt['id_obat']; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i></a>
                                            <a href="delete.php?id=<?= $obt['id_obat']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-remove"></i></a></td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../templates/footer.php') ?>
<script>
    $(document).ready(function() {
        $('#table_obat').DataTable();
        $('.btn-delete').on('click', function() {
            alert('Ok')
        });
    });
</script>