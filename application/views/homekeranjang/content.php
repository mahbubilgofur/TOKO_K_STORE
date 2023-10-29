<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="active">KERANJANG</li>
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
                                    <th class="li-product-name">Berat</th>
                                    <th class="li-product-subtotal">TOTAL</th>
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
                                        <td class="li-product-remove"><a href="<?= base_url('belanja/hapus/' . $item['rowid']) ?>"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail">
                                            <a href="#">
                                                <img src="<?= base_url('gambarproduk/' . $item['options']['gambar1']); ?>" alt="" width="50" height="50">
                                            </a>
                                        </td>
                                        <td class="li-product-name">
                                            <a href="#"><?= $item['name']; ?></a>
                                        </td>
                                        <td class="li-product-price">
                                            <span class="amount">Rp.<?php echo $this->cart->format_number($item['price']); ?></span>
                                        </td>
                                        <td class="li-product-quantity">
                                            <input class="cart-quantity" data-row-id="<?= $item['rowid']; ?>" type="number" min="1" max="20" value="<?= $item['qty']; ?>">
                                        </td>
                                        <td class="li-product-name">
                                            <a href="#">Berat: <span class="berat" data-row-id="<?= $item['rowid']; ?>"><?= $produk->berat * $item['qty']; ?></span> gram</a>
                                        </td>

                                        <td class="li-product-subtotal">
                                            <span class="subtotal" data-row-id="<?= $item['rowid']; ?>">RP.<?= $this->cart->format_number($item['subtotal']); ?></span>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php } ?>
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
                                    <li>Berat:<span id="total-berat"><?= $total_berat; ?> gram</span></li>
                                    <li>Total Harga: <span id="total-keseluruhan">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></span></li>
                                </ul>
                                <a href="<?= base_url('belanja/checkout') ?>">checkout</a>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika nilai input jumlah berubah
        $('.cart-quantity').on('change', function() {
            var rowId = $(this).data('row-id');
            var newQty = $(this).val();

            // Kirim permintaan Ajax untuk memperbarui keranjang dengan jumlah yang baru
            $.ajax({
                type: 'POST',
                url: '<?= base_url('belanja/update_qty'); ?>',
                data: {
                    row_id: rowId,
                    new_qty: newQty
                },
                success: function(response) {
                    // Response berisi total harga dan total berat yang diperbarui
                    var data = JSON.parse(response);
                    $('span.subtotal[data-row-id="' + rowId + '"]').text('RP.' + data.total_harga);

                    // Perbarui total berat untuk setiap elemen
                    $('.berat[data-row-id="' + rowId + '"]').text(data.total_berat);

                    // Hitung total berat untuk semua produk dan perbarui elemen tampilan total berat
                    hitungTotalBerat();
                },
                error: function() {
                    alert('Terjadi kesalahan saat memperbarui jumlah produk.');
                }
            });
        });
    });
</script>