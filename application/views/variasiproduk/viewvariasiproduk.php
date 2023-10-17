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
                            <!-- Di dalam view Anda -->
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" id="stok" placeholder="Stok" required>
                            </div>
                            <div class="form-group">
                                <label for="size">size</label>
                                <input type="text" class="form-control" id="size" placeholder="size" required>
                            </div>

                            <button type="button" class="btn btn-success" id="addSize">Tambah Ukuran</button>
                            <button type="button" class="btn btn-primary" id="saveButton">Simpan</button>

                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID VARIASIPRODUK</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">SIZE</th>
                                <th scope="col">STOK</th>
                                <th scope="col">DETAIL</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_variasiproduk as $row) {

                                ?>
                                    <tr>
                                        <td><?php echo $row->id_variasiproduk ?></td>
                                        <td><?php echo $row->nama ?></td>
                                        <td><?php echo $row->size ?></td>
                                        <td><?php echo $row->stok ?></td>
                                        <td>x
                                            <a href="<?php echo base_url('variasiproduk/update/') . $row->id_variasiproduk ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('variasiproduk/update/') . $row->id_variasiproduk ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url('variasiproduk/delete/') . $row->id_variasiproduk ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
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