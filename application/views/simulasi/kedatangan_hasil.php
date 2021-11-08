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
    <section class="content mb-3">

        <?= $this->session->flashdata('message') ?>

    </section>


    <!-- Parameter -->

    <?php

    if ($data != null) {
    ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex">
                            <p class="mr-3">Lamda = <span style="color:red"><?= $lamda ?></span></p>
                            <p>Durasi = <span style="color:red"><?= $durasi ?></span></p>
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>



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
                                            <th>IWK dalam menit</th>
                                            <th>WK dalam menit</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php

                                        foreach ($s_kedatangan as $tampil) :
                                        ?>
                                            <tr>
                                                <td><?= $tampil['kedatangan'] ?></td>
                                                <td><?= $tampil['bilAcak'] ?></td>
                                                <td><?= $tampil['iwk'] ?></td>
                                                <td><?= $tampil['wk'] ?></td>

                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Kedatangan</th>
                                            <th>Bilangan Acak</th>
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
    <?php
    } ?>
    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Form Input -->

<div class="modal fade" id="simulasikedatangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Simulasi Antrian </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('simulasi/hitung_kedatangan'); ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Laju Antrian:</label>
                        <input type="numerik" name="lamda" class="form-control" placeholder="laju antrian/satuan waktu" value="<?= set_value('lamda') ?>">
                        <?php echo form_error('lamda', '<small class="text-danger mt-1">', '</small>'); ?>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Durasi:</label>
                        <input type="numerik" name="durasi" class="form-control" placeholder="Waktu Simulasi/ jam" value="<?= set_value('durasi') ?>">
                        <?php echo form_error('durasi', '<small class="text-danger mt-1">', '</small>'); ?>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Mulai Simulasi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ./col -->
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->