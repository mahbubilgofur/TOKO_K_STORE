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

                    <a href="<?= base_url('transaksi') ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            KEMBALI
                        </button>
                    </a>

                    <div class="card-body">
                        <div class="modal-body">
                            <!-- Your existing form -->
                            <form action="<?= base_url() ?>transaksi/Inputtransaksi" method="POST">
                                <div id="detail_transaksi">
                                    <!-- Detail transaksi -->
                                    <div class="detail">
                                        <label for="id_produk_0">ID PRODUK</label>
                                        <select class="form-control id_produk" name="id_produk[]" id="id_produk_0" required>
                                            <option value="">Pilih Produk</option>
                                            <?php foreach ($getproduk as $row) { ?>
                                                <option value="<?= $row->id_produk; ?>" data-harga="<?= $row->harga; ?>" data-variasiproduk="<?= $row->id_variasiproduk; ?>"><?= $row->nama; ?></option>
                                            <?php } ?>
                                        </select>

                                        <label for="harga_0">HARGA</label>
                                        <input type="text" class="form-control harga" name="harga[]" id="harga_0" placeholder="HARGA" readonly>

                                        <label for="jumlah_0">JUMLAH</label>
                                        <input type="number" class="form-control jumlah" name="jumlah[]" id="jumlah_0" placeholder="JUMLAH" required>

                                        <input type="hidden" class="form-control id_variasiproduk" name="id_variasiproduk[]" id="id_variasiproduk_0" value="">

                                        <label for="total_0">TOTAL</label>
                                        <input type="text" class="form-control total" name="total[]" id="total_0" placeholder="TOTAL" readonly>

                                        <button type="button" class="btn btn-danger remove_detail">Hapus Detail</button>
                                    </div>
                                </div>

                                <button type="button" id="add_detail" class="btn btn-primary">Tambah Detail</button>

                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>



                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th scope="col">ID TRANSAKSI</th>
                        <th scope="col">ID_DETAILTRANSAKSI</th>
                        <th scope="col">ID_USER</th>
                        <th scope="col">TGL</th>
                        <th scope="col">ID_PRODUK</th>
                        <th scope="col">VARIASI</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">JUMLAH</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_transaksi as $row) {
                        ?>
                            <tr>
                                <!-- ini tbl_transaksi dan tbl detail_transaksi-->
                                <td><?php echo $row->id_transaksi ?></td>
                                <td><?php echo $row->id_detailtransaksi ?></td>
                                <td><?php echo $row->nama_user ?></td>
                                <td><?php echo $row->tgl_transaksi ?></td>
                                <td><?php echo $row->id_produk ?></td>
                                <td><?php echo $row->variasi ?></td>
                                <td><?php echo $row->harga ?></td>
                                <td><?php echo $row->jumlah ?></td>
                                <td><?php echo $row->total ?></td>
                                <td>
                                    <a href="<?php echo base_url('transaksi/transaksidetail/') ?>" class="btn btn-warning">X</a>
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