<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>



<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <?php echo form_open('belanja/update'); ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">DELETE</th>
                                    <th class="li-product-thumbnail">GAMBAR</th>
                                    <th class="li-product-name">PRODUK</th>
                                    <th class="li-product-price">HARGA</th>
                                    <th class="li-product-quantity">JUMLAH</th>
                                    <th class="li-product-subtotal">TOTAL</th>
                                </tr>
                                <?php $i = 1; ?>
                            </thead>
                            <tbody>

                                <?php foreach ($this->cart->contents() as $item) : ?>

                                    <?php echo form_hidden($i . '[rowid]', $item['rowid']); ?>
                                    <tr>
                                        <td class="li-product-remove"><a href="<?= base_url('belanja/hapus/' . $item['rowid']) ?>"><i class="fa fa-times"></i></a></td>
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
                                        <td class="quantity">
                                            <input class="cart-quantity" data-product-id="<?= $item['rowid']; ?>" value="<?= $item['qty']; ?>" type="number" min="1" max="20">
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
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="delete">
                                    <!-- <button class="delete-button" id="hapusDataDicentang">Delete</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Total Harga: <span id="total-keseluruhan">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></span></li>
                                    <li>Jumlah Produk: <span id="total-jumlah-produk"></span></li>
                                </ul>
                                <a href="#">checkout</a>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>