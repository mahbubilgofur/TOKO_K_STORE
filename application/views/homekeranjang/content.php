<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <?php if ($this->cart->total_items() > 0) : ?>
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
                                    <th class="li-product-remove">HAPUS</th>
                                    <th class="li-product-thumbnail">GAMBAR</th>
                                    <th class="li-product-thumbnail">VARIASI</th>
                                    <th class="li-product-name">PRODUK</th>
                                    <th class="li-product-price">HARGA</th>
                                    <th class="li-product-quantity">JUMLAH</th>
                                    <th class="li-product-name">BERAT</th>
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
                                                <img src="<?= base_url('gambarvariasi/' . $item['options']['gambar']); ?>" alt="" width="50" height="50">
                                            </a>
                                        </td>
                                        <td class="li-product-name">
                                            <?php
                                            if ($item['options']['warna'] !== 0 && !empty($item['options']['warna'])) {
                                                echo '<p>Warna: ' . $item['options']['warna'] . '</p><br>';
                                            }
                                            ?>

                                            <p>Ukuran: <?= $item['options']['ukuran']; ?></p>
                                        </td>

                                        <td class="li-product-name">
                                            <a href="#"><?= $item['name']; ?></a>
                                        </td>
                                        <td class="li-product-price">
                                            <?php
                                            $price = $item['options']['harga'];
                                            $formattedPrice = 'Rp. ' . number_format($price, 0, ',', '.');
                                            ?>
                                            <span class="amount"><?= $formattedPrice; ?></span>
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
                                    <li>Berat:<span id="hitungTotalBerat"><?= $total_berat; ?> gram</span></li>
                                    <li>Total Harga: <span id="total-keseluruhan">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></span></li>
                                </ul>
                                <!-- Tampilkan daftar produk dalam keranjang -->
                                <!-- ... kode HTML untuk menampilkan produk ... -->

                                <!-- Tampilkan tombol checkout jika keranjang tidak kosong -->
                                <a href="<?= base_url('belanja/checkout') ?>">Checkout</a>
                            <?php else : ?>


                                <div class="static-top-wrap">
                                    <div class="container12" style="padding-bottom: 120px; display: flex; align-items: center; justify-content: center;">
                                        <div class="row">
                                            <div class="col-lg-122" style="text-align: center;display: flex; align-items: center; justify-content: center; flex-direction: column; 	margin-top: 100px;">
                                                <h2>Keranjang belanja Anda kosong</h2>
                                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= base_url('home') ?>">Belanja Sekarang</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5>KAMU MUNGKIN JUGA SUKA</h5>

                                <section class="py-5">
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div class="row gx-4 gx-lg-5 ">
                                            <?php foreach ($data_produk as $row) { ?>
                                                <div class="col-lg-3 col-md-4 col-sm-6 mb-5"> <!-- Ubah jumlah kolom untuk tampilan hp -->
                                                    <div class="card h-100" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                                                        <!-- Product image-->
                                                        <div class="card-img-container">
                                                            <a href="<?= base_url('home/detail/' . $row->id_produk); ?>">
                                                                <img class="card-img-top img-fluid" src="<?= base_url('gambarproduk/' . $row->gambar1); ?>" alt="Product Image" />
                                                            </a>
                                                        </div>
                                                        <!-- Product details-->
                                                        <div class="card-body p-4">
                                                            <div class="text-center">
                                                                <!-- Product name-->
                                                                <h5 class="fw-bolder"><?php echo $row->nama ?></h5>
                                                                <!-- Product price-->
                                                                RP.<?= number_format($row->harga, 0) ?>
                                                            </div>
                                                        </div>
                                                        <!-- Product actions-->
                                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= base_url('home/detail/' . $row->id_produk); ?>">View options</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </section>
                                <!-- Tampilkan pesan keranjang kosong jika keranjang kosong -->

                            <?php endif; ?>

                            <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener for quantity change
        $('.cart-quantity').on('change', function() {
            var rowId = $(this).data('row-id');
            var newQty = $(this).val();

            // Ajax request to update cart quantity
            $.ajax({
                type: 'POST',
                url: 
                data: {
                    row_id: rowId,
                    new_qty: newQty
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    // Update specific elements based on the response
                    $('span.subtotal[data-row-id="' + rowId + '"]').text('Rp.' + data.total_harga);

                    // Update weight for the specific row
                    $('.berat[data-row-id="' + rowId + '"]').text(data.total_berat);

                    // Call the function to update total weight and total price
                    updateTotals();
                },
                error: function() {
                    alert('Terjadi kesalahan saat memperbarui jumlah produk.');
                }
            });
        });

        // Function to update total weight and total price
        function updateTotals() {
            // Calculate and update total weight for all products
            var totalBerat = 0;
            $('.berat').each(function() {
                var beratValue = parseFloat($(this).text());
                totalBerat += !isNaN(beratValue) ? beratValue : 0;
            });
            $('#hitungTotalBerat').text(totalBerat + ' gram');

            // Calculate and update total price for all products
            var totalPrice = 0;
            $('span.subtotal').each(function() {
                var subtotalText = $(this).text().replace('Rp.', '').replace(',', '');
                var subtotalValue = parseFloat(subtotalText);
                totalPrice += !isNaN(subtotalValue) ? subtotalValue : 0;
            });
            $('#total-keseluruhan').text('Rp.' + totalPrice.toFixed(2));
        }
    });
</script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener for quantity change
        $('.cart-quantity').on('change', function() {
            var rowId = $(this).data('row-id');
            var newQty = $(this).val();

            // Ajax request to update cart quantity
            $.ajax({
                type: 'POST',
                url: '<?= base_url('belanja/update_qty'); ?>',
                data: {
                    row_id: rowId,
                    new_qty: newQty
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    // Update specific elements based on the response
                    $('span.subtotal[data-row-id="' + rowId + '"]').text('Rp.' + data.total_harga);

                    // Update weight for the specific row
                    $('.berat[data-row-id="' + rowId + '"]').text(data.total_berat);

                    // Call the function to update total weight and total price
                    updateTotals();
                },
                error: function() {
                    alert('Terjadi kesalahan saat memperbarui jumlah produk.');
                }
            });
        });

        function updateTotals() {
            var totalBerat = 0;
            $('.berat').each(function() {
                var beratValue = parseFloat($(this).text());
                totalBerat += !isNaN(beratValue) ? beratValue : 0;
            });
            $('#hitungTotalBerat').text(totalBerat + ' gram');
            // Ajax request to get updated total from the server
            $.ajax({
                type: 'GET', // or 'POST' depending on your backend implementation
                url: '<?= base_url('belanja/get_total'); ?>',
                dataType: 'json',
                success: function(response) {
                    // Update total price element
                    var formattedTotal = formatRupiah(response.total, 'Rp. ');
                    $('#total-keseluruhan').text(formattedTotal);
                },
                error: function() {
                    alert('Terjadi kesalahan saat memperbarui total harga.');
                }
            });
        }

        // Call the function to initially update totals
        updateTotals();

        // Function to format number as Indonesian Rupiah
        function formatRupiah(angka, prefix) {
            var numberString = angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return prefix + numberString;
        }
    });
</script>