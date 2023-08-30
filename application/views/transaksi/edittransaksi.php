<!-- C O N T E N T -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('welcome') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-info" role="alert">

                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">EDIT KELAS</h2>
                            <br>
                            <form class="form-sample" action="<?= base_url('transaksi/updatetransaksi') ?>" method="POST">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">ID TRANSAKSI</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?php echo $data_transaksi->id_transaksi ?>" disabled>
                                                <input type="hidden" name="id_transaksi" value="<?php echo $data_transaksi->id_transaksi ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">ID USER</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="id_user" value="<?php echo $data_transaksi->id_user ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">HARGA</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="harga" value="<?php echo $data_transaksi->harga ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">JUMLAH</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="jumlah" value="<?php echo $data_transaksi->jumlah ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">TOTAL</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="total" value="<?php echo $data_transaksi->total ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">TGL_TRANSAKSI</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tgl_transaksi" value="<?php echo $data_transaksi->tgl_transaksi ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-warning" href="<?= base_url() ?>transaksi" role="button">Kembali</a>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>