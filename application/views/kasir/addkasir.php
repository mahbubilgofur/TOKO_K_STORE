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

                        <!-- Modal -->

                        <div class="modal-body">

                            <form action="<?= base_url() ?>kasir/inputaddkasir" method="POST">
                                <div class="form-group">
                                    <label>ID USER</label>
                                    <input type="text" class="form-control" name="id" placeholder="id" required>
                                </div>
                                <div class="form-group">
                                    <label>NAMA</label>
                                    <input type="text" class="form-control" name="nama" placeholder="NAMA" required>
                                </div>
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input type="text" class="form-control" name="email" placeholder="email" required>
                                </div>
                                <div class="form-group">
                                    <label>PASSWORD</label>
                                    <input type="text" class="form-control" name="password" placeholder="password" required>
                                </div>
                                <div class="form-group">
                                    <label>LEVEL</label>
                                    <input type="text" class="form-control" name="role_id" placeholder="level" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="sumbmit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID TRSANSAKSI</th>
                                <th scope="col">ID PRODUK</th>
                                <th scope="col">TGL</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">PEMBAYARAN</th>
                                <th scope="col">KEMBALIAN</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php $total_berat = 0;
                                foreach ($this->cart->contents() as $item) {
                                ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url('user/delete/') . $row->id ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                    <?php $i++; ?>
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