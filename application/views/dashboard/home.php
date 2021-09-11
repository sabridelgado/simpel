<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><?= ucwords($nama); ?> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">





        <!-- tombol -->
        <div class="container-fluid">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#simulasi" data-whatever="">Simulasi Antrian</button>
            <button type="button" class="btn btn-danger"><a style="text-decoration: none; color: white;" href="<?= base_url('Dashboard') ?>">Reset Data</a></button>
        </div>

        <!-- Parameter -->
        <div class="container-fluid mt-4">
            <h6>Parameter</h6>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3></h3>
                            <p>Jumlah Antrian</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3></h3>
                            <p>Teler</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3></h3>
                            <p>Laju Antrian</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3></h3>
                            <p>Laju Pelayanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
            </div>
        </div>

        <!-- Hasil Simulasi -->
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

                            <p>Menunggu Dilayani (Lq)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->





<!-- Form Input -->

<div class="modal fade" id="simulasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Simulasi Antrian </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Dashboard/input'); ?>" method="POST">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Laju Antrian</label>
                            <input type="number" class="form-control" id="i_lamda" name="i_lamda" placeholder="1234">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Laju Pelayanan</label>
                            <input type="number" class="form-control" id="i_miu" name="i_miu" placeholder="1234">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Jumlah Antrian</label>
                        <input type="number" class="form-control" id="i_jumlah" name="i_jumlah" placeholder="1234">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Teler</label>
                        <input type="number" class="form-control" id="i_teler" name="i_teler" placeholder="1234">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Durasi</label>
                        <input type="number" class="form-control" id="" placeholder="1234">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Mulai Simulasi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ./col -->
</div>