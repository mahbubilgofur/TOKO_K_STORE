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
                    <!-- /.card -->
                    <a href="<?= base_url('transaksi') ?>">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Kembali
                        </button>
                    </a>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID_DETAILTRANSAKSI</th>
                                <th scope="col">ID_PRODUK</th>
                                <th scope="col">VARIASI</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">JUMLAH</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_detailtransaksi as $row) {

                                ?>
                                    <tr>
                                        <td><?php echo $row->id_detailtransaksi ?></td>
                                        <td><?php echo $row->id_produk ?></td>
                                        <td><?php echo $row->variasi ?></td>
                                        <td><?php echo $row->harga ?></td>
                                        <td><?php echo $row->jumlah ?></td>
                                        <td><?php echo $row->total ?></td>
                                        <td>
                                            <a href="<?php echo base_url('transaksi/update/') . $row->id_transaksi ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url('transaksi/delete/') . $row->id_transaksi ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
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