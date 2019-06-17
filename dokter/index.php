<?php
$menu = "Data";
$title = "Data Dokter"; ?>
<?php include_once('../templates/header.php'); ?>
<?php include_once('../templates/navbar.php'); ?>
<?php include_once('../templates/sidebar.php'); ?>
<?php require_once('../function/obat_function.php');

$dokter = select("SELECT * FROM tbl_dokter");

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
                    <a href="<?= base_url("dokter/add.php"); ?>" class="btn btn-success btn-sm "><i class="fa fa-fw fa-plus"></i> Tambah data dokter</a>
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
                                        <th>Nama Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Alamat</th>
                                        <th>Phone</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dokter as $dr) : ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="check[]" value="<?= $dr['id_dokter']; ?>" class="check"></td>
                                            <td><?= $i;
                                                $i++; ?></td>
                                            <td><?= $dr['nama_dokter']; ?></td>
                                            <td><?= $dr['spesialis']; ?></td>
                                            <td><?= $dr['alamat']; ?></td>
                                            <td><?= $dr['no_telp']; ?></td>
                                            <td><a href="update.php?id=<?= $dr['id_dokter']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a></td>
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