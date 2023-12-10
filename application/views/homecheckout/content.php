<!-- <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div> -->
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">

                </div>
            </div>
        </div>
        <div class="row">
            <?php
            echo validation_errors('<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i></h5></div>');
            ?>


            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Keranjang</h3>
                    <div class="your-order-table table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-thumbnail">GAMBAR</th>
                                    <th class="li-product-name">PRODUK</th>
                                    <th class="li-product-price">HARGA</th>
                                    <th class="li-product-subtotal">TOTAL HARGA</th>
                                </tr>
                                <?php $i = 1; ?>
                            </thead>
                            <tbody>
                                <?php $total_berat = 0;
                                foreach ($this->cart->contents() as $item) {
                                    $produk = $this->m_setting->detail_produk($item['id']);
                                    $berat = $item['qty'] * $produk->berat; // Menghitung berat produk dalam keranjang
                                    $total_berat += $berat; // Menambahkan berat produk ke total berat
                                ?>
                                    <tr>
                                        <td class="li-product-thumbnail">
                                            <a href="#">
                                                <img src="<?= base_url('gambarvariasi/' . $item['options']['gambar']); ?>" alt="" width="50" height="50">
                                            </a>
                                        </td>
                                        <td class="li-product-name">
                                            <p>Warna: <?= $item['options']['warna']; ?></p><br>
                                            <p>Ukuran: <?= $item['options']['ukuran']; ?></p>
                                        </td>
                                        <td class="li-product-name">
                                            <a href="#"><?= $item['name']; ?></a>
                                        </td>
                                        <td class="li-product-price">
                                            <span class="amount">Rp.<?php echo $this->cart->format_number($item['options']['harga']); ?></span>
                                        </td>
                                        <td class="li-product-subtotal">
                                            <span class="amount">
                                                <span class="subtotal">RP.<?php echo $this->cart->format_number($item['subtotal']); ?></span>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>TOTAL:</th>
                                    <td><span class="amount">RP.<?php echo $this->cart->format_number($this->cart->total()); ?></span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>BERAT:</th>
                                    <td><span class="amount"><?= $total_berat ?>GR</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>ONGKIR:</th>
                                    <td><span id="ongkir" class="amount"></span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>TOTAL BAYAR:</th>
                                    <td><span id="total_bayar" class="amount"></span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">


                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-6 col-12">
                <?php echo
                form_open('belanja/checkout');

                $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                ?>
                <div class="checkbox-form">
                    <h3>Tujuan</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="country-select clearfix">
                                <label>Provinsi <span class="required">*</span></label>
                                <select name="provinsi" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="country-select clearfix">
                                <label>Kota <span class="required">*</span></label>
                                <select name="kota" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="country-select clearfix">
                                <label>Exspedisi <span class="required">*</span></label>
                                <select name="exspedisi" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="country-select clearfix">
                                <label>Paket <span class="required">*</span></label>
                                <select name="paket" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Alamat<span class="required">*</span></label>
                                <input name="alamat" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Kode Pos<span class="required">*</span></label>
                                <input name="kode_pos" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Nama Penerima<span class="required">*</span></label>
                                <input name="nama_penerima" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Telepon Penerima<span class="required">*</span></label>
                                <input name="tlp_penerima" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>No Telepon<span class="required">*</span></label>
                                <input name="hp_penerima" placeholder="" required>
                            </div>
                        </div>

                    </div>
                </div>

                <input name="no_order" value="<?= $no_order ?>" hidden>
                <input name="estimasi" hidden>
                <input name="ongkir" hidden>
                <input name="berat" value="<?= $total_berat ?>" hidden>
                <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
                <input name="total_bayar" hidden>
                <?php
                $i = 1;
                foreach ($this->cart->contents() as $item) {
                    echo form_hidden('qty' . $i++, $item['qty']);
                }
                ?>
                <button type="submit" class="btn btn-primary">
                    proses checkout
                </button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            //data provinsi
            $.ajax({
                type: "POST",
                url: "<?= base_url('raja_ongkir/provinsi') ?>",
                success: function(hasil_provinsi) {
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            });

            //data kota
            $("select[name=provinsi]").on("change", function() {
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('raja_ongkir/kota') ?>",
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_kota) {
                        $("select[name=kota]").html(hasil_kota);
                    }
                });
            });

            //data exspedisi
            $("select[name=kota]").on("change", function() {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('raja_ongkir/exspedisi') ?>",
                    success: function(hasil_exspedisi) {
                        $("select[name=exspedisi]").html(hasil_exspedisi);
                    }
                });
            });

            //data paket
            $("select[name=exspedisi]").on("change", function() {
                //mendapatkan exspedisi terpillih
                var exspedisi_terpilih = $("select[name=exspedisi]").val();
                //mendapatkan kota tujuan
                var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
                //mengambil data berat
                var total_berat = <?= $total_berat ?>;
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('raja_ongkir/paket') ?>",
                    data: 'exspedisi=' + exspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                    success: function(hasil_paket) {
                        $("select[name=paket]").html(hasil_paket);
                    }
                });
            });

            function formatRupiah(angka) {
                var number_string = angka.toString();
                var split = number_string.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp. ' + rupiah;
            }

            $("select[name=paket]").on("change", function() {
                // alert(dataongkir);
                var dataongkir = $("option:selected", this).attr('ongkir');
                $("#ongkir").html(formatRupiah(dataongkir));


                var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
                $("#total_bayar").html(formatRupiah(data_total_bayar));



                //estimasi dan ongkir

                var estimasi = $("option:selected", this).attr('estimasi');
                $("input[name=estimasi]").val(estimasi);
                $("input[name=ongkir]").val(dataongkir);
                $("input[name=total_bayar]").val(data_total_bayar);
            });
        });
    </script>