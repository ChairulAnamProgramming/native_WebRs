<?php
$menu = "Rekam";
$title = "Rekam Medis"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/rm_function.php');

$pasien = selectRm("SELECT * FROM tbl_rekammedis INNER JOIN tbl_pasien ON tbl_rekammedis.id_pasien = tbl_pasien.id_pasien 
                                                     INNER JOIN tbl_dokter ON tbl_rekammedis.id_dokter = tbl_dokter.id_dokter");


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
    <section class="content" style="align:center">
        <!-- /.row -->
        <div class="row justify-content-center">
            <div class="col-12  mb-2">
                <div class="row justify-content-end">
                    <a href="" class="btn btn-default btn-sm mr-1"><i class="fa fa-fw fa-refresh"></i></a>
                    <a href="<?= base_url("rekam_medis/add.php"); ?>" class="btn btn-success btn-sm "><i class="fa fa-fw fa-plus"></i> Tambah Rekam Medis</a>
                </div>
            </div>

            <div class="col-12">

                <form method="post" name="proses">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <center><input type="checkbox" id="check_all"></center>
                                        </th>
                                        <th>#</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Nama Dokter</th>
                                        <th>Obat</th>
                                        <th>Tanggal Periksa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pasien as $psien) : ?>
                                        <?php $id_obt = $psien['id_rm']; ?>
                                        <?php if ($psien['jk'] == "L") {
                                            $jk = "Laki-laki";
                                        } else {
                                            $jk = "Perempuan";
                                        } ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="check[]" value="<?= $psien['id_rm']; ?>" class="check"></td>
                                            <td><?= $i;
                                                $i++; ?></td>
                                            <td><?= $psien['nama_pasien']; ?></td>
                                            <td><?= $psien['keluhan']; ?></td>
                                            <td><?= $psien['nama_dokter'] ?></td>
                                            <?php $obat = selectRm("SELECT * FROM tbl_obat_rekammedis JOIN tbl_obat ON tbl_obat_rekammedis.id_obat = tbl_obat.id_obat WHERE id_rm= '$id_obt'"); ?>
                                            <td>
                                                <ul>
                                                    <?php foreach ($obat as $obt) : ?>
                                                        <li><?= $obt['nama_obat']; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </td>
                                            <td><?= tgl($psien['tgl_periksa']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

            </div>
            </form>
            <div class="col-11">
                <div class="row ">
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

        $('#example1').DataTable();


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


        $('#check_all').on('click', function() {
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
            if ($(".check:checked").length == $(".check").length) {
                $('#check_all').prop('checked', true);
            } else {
                $('#check_all').prop('checked', false);

            }
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