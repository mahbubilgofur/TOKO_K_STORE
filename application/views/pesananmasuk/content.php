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
                    <div class="col-12">
                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5>
                        </div>';
                        } ?>
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="1" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">ORDER</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">DIPROSES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">DIKIRIM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">SELESAI</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <?php foreach ($pesanan as $key => $value) { ?>
                                    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <tr>
                                                            <th>NAMA BANK</th>
                                                            <th>:</th>
                                                            <th><?= $value->nama_bank ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>NO REKENING</th>
                                                            <th>:</th>
                                                            <th><?= $value->no_rek ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>ATAS NAMA</th>
                                                            <th>:</th>
                                                            <th><?= $value->atas_nama ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>TOTAL BAYAR</th>
                                                            <th>:</th>
                                                            <th>Rp.<?= number_format($value->total_bayar, 0) ?></th>
                                                        </tr>
                                                    </table>
                                                    <img src="<?= base_url('file_bukti_pembayaran/' . $value->bukti_bayar) ?>" alt="" width="100%" height="100%" style="object-fit: cover;">
                                                </div>
                                                <!-- <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> -->
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php } ?>
                                <?php foreach ($pesanan_diproses as $key => $value) { ?>
                                    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>
                                                    <table class="table">
                                                        <tr>
                                                            <th>EXSPEDISI</th>
                                                            <th>:</th>
                                                            <th><?= $value->exspedisi ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>PAKET</th>
                                                            <th>:</th>
                                                            <th><?= $value->paket ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>ONGKIR</th>
                                                            <th>:</th>
                                                            <th>Rp.<?= number_format($value->ongkir, 0) ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>NO RESI</th>
                                                            <th>:</th>
                                                            <th> <input type="text" class="form-control" name="no_resi" placeholder="NO RESI" required></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">KIRIM</button>
                                                </div>
                                                <?php echo form_close() ?>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-content" id="cek<?= $value->id_transaksi ?>">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <!-- data di order -->
                                    <table class="table">
                                        <tr>
                                            <th class="li-product">No_order</th>
                                            <th class="li-product">Tanggal</th>
                                            <th class="li-product">Expedisi</th>
                                            <th class="li-product">Total Bayar</th>
                                            <th class="li-product"></th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($pesanan as $value) { ?>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <h5><?= $value->exspedisi ?></h5><br>
                                                    <?= $value->paket ?><br>
                                                    Rp.<?= number_format($value->ongkir, 0) ?><br>
                                                </td>
                                                <td>Rp.
                                                    <?= number_format($value->total_bayar, 0) ?><br>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <span class="badge badge-warning">BELUM BAYAR</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">SUDAH BAYAR</span> <br>
                                                        <span class="badge badge-primary">MENUGGU VERIFIKASI</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 1) { ?>
                                                        <button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">CEK BUKTI BAYAR</button>
                                                        <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">PROSES</a>
                                                    <?php } else { ?>

                                                    <?php } ?>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <!-- data di proses -->
                                    <table class="table">
                                        <tr>
                                            <th class="li-product">No_order</th>
                                            <th class="li-product">Tanggal</th>
                                            <th class="li-product">Expedisi</th>
                                            <th class="li-product">Total Bayar</th>
                                            <th class="li-product"></th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($pesanan_diproses as $value) { ?>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <h5><?= $value->exspedisi ?></h5><br>
                                                    <?= $value->paket ?><br>
                                                    Rp.<?= number_format($value->ongkir, 0) ?><br>
                                                </td>
                                                <td>Rp.
                                                    <?= number_format($value->total_bayar, 0) ?><br>
                                                    <span class="badge badge-primary">DIPROSES/DIKEMAS</span>
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 1) { ?>
                                                        <button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>">KIRIM</button>
                                                    <?php } ?>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    <table class="table">
                                        <tr>
                                            <th class="li-product">No_order</th>
                                            <th class="li-product">Tanggal</th>
                                            <th class="li-product">Expedisi</th>
                                            <th class="li-product">Total Bayar</th>
                                            <th class="li-product">No Resi</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($pesanan_dikirim as $value) { ?>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <h5><?= $value->exspedisi ?></h5><br>
                                                    <?= $value->paket ?><br>
                                                    Rp.<?= number_format($value->ongkir, 0) ?><br>
                                                </td>
                                                <td>Rp.
                                                    <?= number_format($value->total_bayar, 0) ?><br>
                                                    <span class="badge badge-success">DIKIRIM</span>
                                                </td>
                                                <td>
                                                    <h5><?= $value->no_resi ?></h5>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                    <table class="table">
                                        <tr>
                                            <th class="li-product">No_order</th>
                                            <th class="li-product">Tanggal</th>
                                            <th class="li-product">Expedisi</th>
                                            <th class="li-product">Total Bayar</th>
                                            <th class="li-product">No Resi</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($pesanan_diterima as $value) { ?>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <h5><?= $value->exspedisi ?></h5><br>
                                                    <?= $value->paket ?><br>
                                                    Rp.<?= number_format($value->ongkir, 0) ?><br>
                                                </td>
                                                <td>Rp.
                                                    <?= number_format($value->total_bayar, 0) ?><br>
                                                    <span class="badge badge-success">DITERIMA</span>
                                                </td>
                                                <td>
                                                    <h5><?= $value->no_resi ?></h5>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
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