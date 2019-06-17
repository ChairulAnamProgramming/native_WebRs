<?php
require_once('../function/obat_function.php');

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url("assets/template/") ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RS Nagara</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url("assets/img/profile/") . $session['img']; ?>" style="width:40px; height:40px;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url("user") ?>" class="d-block"><?= $session['nama']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item rm">
                    <?php if ($title == "Dashboard") : ?>
                        <a href="<?= base_url("Dashboard") ?>" class="nav-link active ">
                        <?php else : ?>
                            <a href="<?= base_url("Dashboard") ?>" class="nav-link ">
                            <?php endif; ?>
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                </li>

                <li class="nav-item">
                    <?php if ($title == "Rekam Medis") : ?>
                        <a href="<?= base_url("rekam_medis") ?>" class="nav-link active ">
                        <?php else : ?>
                            <a href="<?= base_url("rekam_medis") ?>" class="nav-link ">
                            <?php endif; ?>
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Rekam Medis
                            </p>
                        </a>
                </li>
                <?php if ($menu == "Data") : ?>
                    <li class="nav-item has-treeview menu-open">
                    <?php else : ?>
                    <li class="nav-item has-treeview ">
                    <?php endif; ?>

                    <?php if ($menu == "Data") : ?>
                        <a href="#" class="nav-link active">
                        <?php else : ?>
                            <a href="#" class="nav-link ">
                            <?php endif; ?>
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                Data
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <?php if ($title == "Data Dokter") : ?>
                                    <a href="<?= base_url("dokter/index.php") ?>" class="nav-link active">
                                    <?php else : ?>
                                        <a href="<?= base_url("dokter/index.php") ?>" class="nav-link ">
                                        <?php endif; ?>
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Data Dokter</p>
                                    </a>
                            </li>
                            <li class="nav-item ">
                                <?php if ($title == "Data Obat") : ?>
                                    <a href="<?= base_url("obat/index.php") ?>" class="nav-link active">
                                    <?php else : ?>
                                        <a href="<?= base_url("obat/index.php") ?>" class="nav-link ">
                                        <?php endif; ?>
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Data Obat</p>
                                    </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($title == "Data Pasien") : ?>
                                    <a href="<?= base_url("pasien/index.php") ?>" class="nav-link active">
                                    <?php else : ?>
                                        <a href="<?= base_url("pasien/index.php") ?>" class="nav-link ">
                                        <?php endif; ?>
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Data Pasien</p>
                                    </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($title == "Data Poliklinik") : ?>
                                    <a href="<?= base_url("poliklinik/index.php") ?>" class="nav-link active">
                                    <?php else : ?>
                                        <a href="<?= base_url("poliklinik/index.php") ?>" class="nav-link ">
                                        <?php endif; ?>
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Data Poliklinik</p>
                                    </a>
                            </li>
                        </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("auth/logout.php") ?>" class="nav-link ">
                        <i class="nav-icon fa  fa-sign-out"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>