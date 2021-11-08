<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url('assets/'); ?>dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">




            </ul>
            <ul class="navbar-nav">
                <li class="dropdown user-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="<?= base_url('assets/'); ?>dist/img/default.png" class="user-image" alt="User Image">
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>


                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url('assets/dist/img/') . $user['image']; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?= $user['username'] ?>
                                <small>Member since Nov. 2021</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?= base_url('Auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>



                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-info elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('assets/'); ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Simulasi Antrian</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/dist/img/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?= $user['username'] ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' ? 'active '  : '' ?>" href="<?= base_url(''); ?>dashboard/">
                                <i class=" nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(2) == 'kedatangan'  | $this->uri->segment(2) == 'pelayanan' | $this->uri->segment(2) == 'hasil' ? ' menu-open '  : '' ?>">
                            <a class="nav-link <?= $this->uri->segment(2) == 'kedatangan'  | $this->uri->segment(2) == 'pelayanan' | $this->uri->segment(2) == 'hasil' ? ' active '  : '' ?> ">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Simulasi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->uri->segment(2) == 'kedatangan'  ? ' active '  : '' ?> " href="<?= base_url(''); ?>simulasi/kedatangan">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simulasi Kedatangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(''); ?>simulasi/pelayanan" class="nav-link <?= $this->uri->segment(2) == 'pelayanan'  ? ' active '  : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simulasi Pelayanan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(''); ?>dashboard/hasil" class="nav-link <?= $this->uri->segment(2) == 'hasil'  ? ' active '  : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simulasi Hasil</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>