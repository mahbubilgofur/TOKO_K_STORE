<div class="col-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
        echo $this->session->flashdata('pesan');
        echo '</h5></div>';
    } ?>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="1" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">ORDER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">DIKEMAS</a>
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
            <div class="tab-content" id="1">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table">
                        <tr>
                            <th class="li-product">No_order</th>
                            <th class="li-product">Tanggal</th>
                            <th class="li-product">Expedisi</th>
                            <th class="li-product">Total Bayar</th>
                            <th class="li-product">action</th>
                        </tr>
                        <tr>
                            <?php foreach ($belum_bayar as $value) { ?>
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
                                    <?php if ($value->status_bayar == 0) { ?>
                                        <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-xs btn-flat btn-primary">BAYAR</a>
                                    <?php } else { ?>

                                    <?php } ?>
                                </td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    2
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    3
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    4
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
</div>