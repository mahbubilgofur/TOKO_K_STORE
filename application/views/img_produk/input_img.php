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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
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

                    <div class="card-body">
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>ID GAMBAR</label>
                                    <input type="text" class="form-control" name="id_gambar" placeholder="ID KATEGORI" readonly>
                                </div>
                                <div class="form-group">
                                    <label>GAMBAR</label>
                                    <input type="text" class="form-control" name="gambar" placeholder="gambar" required>
                                </div>
                                <div class="form-group">
                                    <label>JUMLAH</label>
                                    <input type="text" class="form-control" name="gambar" placeholder="gambar" required>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('gambar') ?>"><button type="button" class="btn btn-primary">
                                            KEMBALI
                                        </button>
                                    </a>
                                    <button type="sumbmit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>