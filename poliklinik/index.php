<?php

$menu = "Data";
$title = "Data Poliklinik"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/obat_function.php');

// $obat = select("SELECT * FROM tbl_poliklinik");

$perhalaman = 6;
$jumlahData = count(select("SELECT * FROM tbl_poliklinik"));
$jumlahHalaman = ceil($jumlahData / $perhalaman);
$aktif = (isset($_GET['page'])) ?  $_GET['page'] : 1;

$awal = ($perhalaman * $aktif) - $perhalaman;
$obat = select("SELECT * FROM tbl_poliklinik LIMIT $awal,$perhalaman");

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
    <section class="content" style="align:center">
        <!-- /.row -->
        <div class="row justify-content-center">
            <div class="col-12  mb-2">
                <div class="row justify-content-end">
                    <a href="" class="btn btn-default btn-sm mr-1"><i class="fa fa-fw fa-refresh"></i></a>
                    <a href="<?= base_url("poliklinik/generet.php"); ?>" class="btn btn-success btn-sm "><i class="fa fa-fw fa-plus"></i> Tambah <?= $title; ?></a>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" name="proses">
                        <div class="table-search">
                            <div class="card-body table-responsive p-0 ">
                                <table class="table table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Poli</th>
                                        <th>Gedung</th>
                                        <th>
                                            <center><input type="checkbox" id="checkd_all"></center>
                                        </th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php if (count($obat) > 0) : ?>
                                        <?php foreach ($obat as $obt) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <th><?= $obt['nama_poli']; ?></th>
                                                <td><?= $obt['gedung']; ?></td>
                                                <td align="center">
                                                    <input type="checkbox" name="check[]" value="<?= $obt['id_poli']; ?>" class="check">
                                                </td>
                                            </tr>
                                            <?php $i++ ?>

                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="4" align="center">Data Kosong</td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </form>

                    <!-- /.card-body -->
                </div>

            </div>

            <div class="col-11 mb-4">
                <div class="row justify-content-end">
                    <?php if ($aktif > 1) : ?>
                        <a href="?page=<?= $aktif - 1; ?>" class="btn btn-primary"> <i class="fa fa-angle-double-left"></i></a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $aktif) : ?>
                            <div class="btn-group">
                                <a href="?page=<?= $i; ?>" class="btn btn-info"> <?= $i; ?></a>
                            </div>
                        <?php else : ?>
                            <div class="btn-group">
                                <a href="?page=<?= $i; ?>" class="btn btn-primary"> <?= $i; ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($aktif < $jumlahHalaman) : ?>
                        <a href="?page=<?= $aktif + 1; ?>" class="btn btn-primary"> <i class="fa fa-angle-double-right"></i></a>
                    <?php endif; ?>
                    <!-- /.card -->
                </div>
            </div>
            <div class="col-11">
                <div class="row justify-content-end">
                    <button class="btn btn-warning btn-sm mr-2" id="update"> <i class="fa fa-edit fa-fw"></i> Update</button>
                    <button class="btn btn-danger btn-sm" id="hapus"> <i class="fa fa-trash fa-fw"></i> Delete</button>

                </div>
            </div>
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../templates/footer.php') ?>
<script>
    $(document).ready(function() {


        $('#search').on('input', function() {
            const search = $('#search').val()
            $.ajax({
                url: "search.php",
                data: 'search=' + search,
                success: function(data) {
                    $('.table-search').html(data)
                }
            });
        });

        $('.btn-delete').on('click', function() {
            alert('Ok')
        });

        $('#checkd_all').on('click', function() {
            if (this.checked) {
                $('.check').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.check').on('click', function() {
            if ($('.check:checked').length == $('.check').length) {
                $('#checkd_all').prop('checked', true);
            } else {
                $('#checkd_all').prop('checked', false);

            }
        });

        $('#update').on('click', function() {
            document.proses.action = 'update.php';
            document.proses.submit();
        });

        $('#hapus').on('click', function() {
            const conf = confirm("Apakah anda yakin ingin menghapus?");
            if (conf) {
                document.proses.action = 'delete.php';
                document.proses.submit();
            }
        });



    });
</script>