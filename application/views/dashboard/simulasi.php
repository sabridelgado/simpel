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

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h6>Hasil Simulasi</h6>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>5<sup style="font-size: 20px">%</sup></h3>
                            <p>Probabilitas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>5<sup style="font-size: 20px">'</sup>5<sup style="font-size: 20px">"</sup></h3>
                            <p>Waktu Tunggu (Wq)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>1</h3>

                            <p>Jumlah Pelanggan (Lq)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
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
                                        <th>Kedatangan</th>
                                        <th>Bilangan Acak</th>
                                        <th>IWK</th>
                                        <th>WK</th>
                                        <th>IWK dalam menit</th>
                                        <th>WK dalam menit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($jumlah); $i++) { ?>
                                        <tr>
                                            <td> <?= $jumlah[$i][0] ?> </td>
                                            <td> <?= $jumlah[$i][1] ?> </td>
                                            <td><?= $jumlah[$i][2] ?></td>
                                            <td><?= $jumlah[$i][3] ?></td>
                                            <td><?= $jumlah[$i][4] . '&nbsp' . ':' . '&nbsp', $jumlah[$i][5] ?></td>
                                            <td><?= $jumlah[$i][6] . '&nbsp' . ':' . '&nbsp', $jumlah[$i][7] ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kedatangan</th>
                                        <th>Bilangan Acak</th>
                                        <th>IWK</th>
                                        <th>WK</th>
                                        <th>IWK dalam menit</th>
                                        <th>WK dalam menit</th>
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