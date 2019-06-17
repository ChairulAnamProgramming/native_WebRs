<div class="wrapper">


    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Profile -->
            <li class="nav-item dropdown show">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                    <img src="<?= base_url("assets/img/profile/") . $session['img']; ?>" width="30" height="30" class="img-circle" alt="User Image">
                    <?= $session['nama'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                    <span class="dropdown-item dropdown-header">My Profile</span>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url("user/index.php"); ?>" class="dropdown-item text-center">
                        <i class="fa fa-user mr-2"></i>Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url("auth/logout.php"); ?>" class="dropdown-item text-center">
                        <i class="fa fa-sign-out mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->