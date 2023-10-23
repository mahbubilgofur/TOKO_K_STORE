<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
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
            <div class="col-lg-6 col-12">
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
                                <label>Jasa Pengiriman <span class="required">*</span></label>
                                <select class="nice-select wide">
                                    <option data-display="Bangladesh">Bangladesh</option>
                                    <option value="uk">London</option>
                                    <option value="rou">Romania</option>
                                    <option value="fr">French</option>
                                    <option value="de">Germany</option>
                                    <option value="aus">Australia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="country-select clearfix">
                                <label>Ekspedisi <span class="required">*</span></label>
                                <select class="nice-select wide">
                                    <option data-display="Bangladesh">Bangladesh</option>
                                    <option value="uk">London</option>
                                    <option value="rou">Romania</option>
                                    <option value="fr">French</option>
                                    <option value="de">Germany</option>
                                    <option value="aus">Australia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Nama Penerima<span class="required">*</span></label>
                                <input placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Kode Pos<span class="required">*</span></label>
                                <input placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Nomer Telepon</label>
                                <input placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
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
                                    <th class="li-product-quantity">JUMLAH</th>
                                    <th class="li-product-subtotal">TOTAL HARGA</th>
                                </tr>
                                <?php $i = 1; ?>
                            </thead>
                            <tbody>

                                <?php foreach ($this->cart->contents() as $item) : ?>

                                    <?php echo form_hidden($i . '[rowid]', $item['rowid']); ?>
                                    <tr>
                                        <td class="li-product-thumbnail">
                                            <a href="#">
                                                <img src="<?= base_url('gambarproduk/' . $item['options']['gambar']); ?>" alt="<?= $item['name']; ?>" width="50" height="50">
                                            </a>
                                        </td>
                                        <td class="li-product-name">
                                            <a href="#"><?= $item['name']; ?></a>
                                        </td>
                                        <td class="li-product-price">
                                            <span class="amount">Rp.<?php echo $this->cart->format_number($item['price']); ?></span>
                                        </td>
                                        <td>
                                            <span class="amount" id="total-jumlah-produk"></span>
                                        </td>
                                        <td class="li-product-subtotal">
                                            <span class="amount">
                                                <span class="subtotal">RP.<?php echo $this->cart->format_number($item['subtotal']); ?></span>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>TOTAL:</th>
                                    <td><span class="amount">RP.<?php echo $this->cart->format_number($item['subtotal']); ?></span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>TOTAL BAYAR:</th>
                                    <td><span class="amount">0</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>ONGKIR:</th>
                                    <td><span class="amount">0</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>TOTAL BAYAR</th>
                                    <td><strong><span class="amount">0</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">

                            <div class="order-button-payment">
                                <li class="button1" style="display:flex;justify-content: center; align-items: center; margin-left: 40px; width: 250px; height: 40px; line-height: 40px; border-radius: 10px; background-color: orange;">
                                    <a href="#" style="font-size: 15px;">
                                        <i></i>
                                        <span style="color: white;">PROSES CHECKOUT</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-6 col-12">
        <div class="your-order">
            <h3>Keranjang</h3>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('raja_ongkir/provinsi') ?>",
                        success: function(hasil_provinsi) {
                            $("select[name=provinsi]").html(hasil_provinsi);
                        }
                    });
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
                });
            </script>

            </body>

            </html>