<div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">

    <div class="container">
        <?php
        // Notifikasi form kosong
        echo validation_errors(' <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i>', '</div>');


        // Notifikasi gagal upload gambar
        if (isset($error_upload)) {
            echo '  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i>' . $error_upload . '</div>';
        }

        ?>
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    <h5 class="contact-page-title">NO REKENING</h5>
                    <p class="contact-page-message mb-25">SILAHKAN TRANSFER UANG KEPADA NO REKENING DI BAWAH INI SEBESAR: <br>
                    <h1 class="btn">Rp.<?= number_format($pesanan->total_bayar, 0) ?>,-</h1>
                    </p>
                    <div class="single-contact-block">
                        <table class="table">
                            <tr>
                                <th>BANK</th>
                                <th>NO REKENING</th>
                                <th>ATAS NAMA</th>
                                <th>ACTION</th>
                            </tr>
                            <?php foreach ($rekening as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->nama_bank ?></td>
                                    <td><?= $value->no_rek ?></td>
                                    <td><?= $value->atas_nama ?></td>
                                    <td><?= $value->nama_bank ?></td>

                                </tr>
                            <?php  } ?>
                        </table>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Phone</h4>
                        <p>Mobile: (08) 123 456 789</p>
                        <p>Hotline: 1009 678 456</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <p>yourmail@domain.com</p>
                        <p>support@hastech.company</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content pt-sm-55 pt-xs-55">
                    <h3 class="contact-page-title">UPLOAD BUKTI PEMBAYARAN</h3>
                    <div class="contact-form">
                        <?php echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi); ?>
                        <div class="form-group">
                            <label>ATAS NAMA<span class="required">*</span></label>
                            <input type="text" name="atas_nama" required>
                        </div>
                        <div class="form-group">
                            <label>NAMA BANK<span class="required">*</span></label>
                            <input type="text" name="nama_bank" required>
                        </div>
                        <div class="form-group">
                            <label>NO REKENING</label>
                            <input type="text" name="no_rek" required>
                        </div>
                        <div class="form-group">
                            <label>BUKTI BAYAR</label>
                            <input type="file" name="bukti_bayar" required>
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('pesanan_saya') ?>" type="submit" value="submit" id="submit" class="li-btn-3" name="submit">KEMBALI</a>
                            <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">BAYAR</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>