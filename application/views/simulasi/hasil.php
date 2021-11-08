<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0"> Simulasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= ucwords($nama1); ?></a></li>
                        <li class="breadcrumb-item active"> <?= ucwords($nama); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <?= $this->session->flashdata('message') ?>
    <!-- tombol -->




    <!-- Parameter -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nasabah</th>
                                        <th>Waktu Datang</th>
                                        <th>Waktu Mulai</th>
                                        <th>Lama Layanan</th>
                                        <th>Waktu Selesai</th>
                                        <th>Waktu Tunggu</th>
                                        <th>Waku Tunggu Sys</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    foreach ($s_layan as $tampil) :
                                    ?>
                                        <tr>
                                            <td><?= $tampil['id'] ?></td>
                                            <td><?= $tampil['w_datang'] ?></td>
                                            <td><?= $tampil['w_mulai'] ?></td>
                                            <td><?= $tampil['w_layan'] ?></td>
                                            <td><?= $tampil['w_selesai'] ?></td>
                                            <td><?= $tampil['w_tunggu'] ?></td>
                                            <td><?= $tampil['w_tunggusys'] ?></td>

                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Pelayanan</th>
                                        <th>Bilangan Acak</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Waktu Tunggu</th>
                                        <th>Waku Tunggu Sys</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->