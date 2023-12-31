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

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        TAMBAH USER
                    </button>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Insert Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?= base_url() ?>user/Inputuser" method="POST">
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
                                </div>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID USER</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">password</th>
                                <th scope="col">level</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_user as $row) {

                                ?>
                                    <tr>
                                        <td><?php echo $row->id ?></td>
                                        <td><?php echo $row->nama ?></td>
                                        <td><?php echo $row->email ?></td>
                                        <td><?php echo $row->password ?></td>
                                        <td><?php echo $row->role_id ?></td>
                                        <td>
                                            <!-- <a href="<?php echo base_url('user/update/') . $row->id ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                                            <a href="<?php echo base_url('user/delete/') . $row->id ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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