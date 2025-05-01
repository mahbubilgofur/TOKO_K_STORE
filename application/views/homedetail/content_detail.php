<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="active"><?= $produk['namakategori']; ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <form action="" method="post">
            <?php
            echo form_open('belanja/add', 'id="addToCartForm"'); // Form action akan mengarahkan ke metode 'add' pada controller 'belanja'.
            echo form_hidden('id', $produk['id_produk']);
            echo form_hidden('name', $produk['nama']);
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));

            // Tambahkan input tersembunyi untuk menyimpan informasi gambar warna dan ukuran yang dipilih
            echo form_hidden('gambar', ''); // Menyimpan gambar yang dipilih
            echo form_hidden('warna', ''); // Menyimpan warna yang dipilih
            echo form_hidden('ukuran', ''); // Menyimpan ukuran yang dipilih
            echo form_hidden('harga', ''); // Harga akan diupdate secara dinamis

            echo form_close();
            ?>




            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            <div class="lg-image">

                                <img src="<?= base_url('gambarproduk/' . $produk['gambar1']); ?>" alt="product image thumb">
                            </div>
                            <div class="lg-image">

                                <img src="<?= base_url('gambarproduk/' . $produk['gambar2']); ?>" alt="product image">
                            </div>
                            <div class="lg-image">

                                <img src="<?= base_url('gambarproduk/' . $produk['gambar3']); ?>" alt="product image">
                            </div>
                            <div class="lg-image">

                                <img src="<?= base_url('gambarproduk/' . $produk['gambar4']); ?>" alt="product image">
                            </div>
                            <?php if ($produk['gambar5'] != 0) : ?>
                                <div class="lg-image">
                                    <img src="<?= base_url('gambarproduk/' . $produk['gambar5']); ?>" alt="product image">
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar1']); ?>" alt="product image thumb"></div>
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar2']); ?>" alt="product image thumb"></div>
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar3']); ?>" alt="product image thumb"></div>
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar4']); ?>" alt="product image thumb"></div>
                            <?php if ($produk['gambar5'] != 0) : ?>
                                <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar5']); ?>" alt="product image thumb"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2 style="color: black; font-size: 25px;"><?= $produk['nama']; ?></h2>
                            <!-- <span class="product-details-ref">Terjual: </span> -->
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><a href="#">Terjual:</a>.</li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li><a href="#">(Rating)</a></li>
                                </ul>
                            </div>
                            <div class="price-box pt-20">
                                <span style="font-size: 30px; color: black;" class="new-price new-price-2" id="hargaLabel" class="new-price new-price-2">Rp.<?= $produk['harga']; ?></span>
                            </div>
                            <div class="product-descc" id="productDescription">

                            </div>

                            <div class="flex rY0UiC j9be9C">
                                <div class="flex flex-column">

                                    <?php
                                    $warnaTerpilih = isset($warnaTerpilih) ? $warnaTerpilih : null;

                                    // Kode PHP lainnya di sini
                                    $unique_colors = array_unique(array_column($variasi_produk, 'warna'));
                                    // Cek apakah ada warna dengan nilai 0
                                    $hasColorZero = in_array('0', $unique_colors);

                                    // Tampilkan elemen <h3> hanya jika tidak ada warna dengan nilai 0
                                    if (!$hasColorZero) {
                                        echo '<h3 class="oN9nMU">Warna</h3>';
                                    }
                                    ?>

                                    <section class="flex items-center" style="margin-bottom: 24px; align-items: baseline;">
                                        <div class="flex items-center bR6mEk">
                                            <?php
                                            foreach ($unique_colors as $color) :
                                                // Filter variasi dengan warna yang sesuai
                                                $variasi_warna = array_filter($variasi_produk, function ($variasi) use ($color) {
                                                    return $variasi->warna == $color;
                                                });

                                                // Ambil variasi pertama (mungkin perlu disesuaikan sesuai kebutuhan)
                                                $first_variation = reset($variasi_warna);
                                            ?>
                                                <button type="button" class="hUWqqt warna-btn <?= $color === '0' && $color === $warnaTerpilih ? 'selected' : ''; ?>" aria-label="<?= $color ?>" aria-disabled="false" data-warna="<?= $color ?>">
                                                    <!-- Pastikan $first_variation->gambar memberikan URL gambar yang valid -->
                                                    <img class="I2jugL" src="<?= base_url() ?>gambarvariasi/<?= $first_variation->gambar ?>" alt="<?= $color ?>">
                                                    <?= $color ?>
                                                </button>
                                            <?php endforeach; ?>
                                        </div>
                                    </section>

                                    <!-- Tampilan ukuran -->
                                    <section class="flex items-center" style="margin-bottom: 24px; align-items: baseline;">
                                        <?php
                                        // Cek apakah terdapat pilihan ukuran
                                        $unique_sizes = array_unique(array_column($variasi_produk, 'ukuran'));
                                        if (!empty($unique_sizes)) :
                                        ?>
                                            <h3 class="oN9nMU">Ukuran</h3>
                                            <div class="flex items-center bR6mEk">
                                                <?php foreach ($unique_sizes as $size) : ?>
                                                    <button type="button" class="hUWqqt ukuran-btn" aria-label="<?= $size ?>" aria-disabled="false" data-ukuran="<?= $size ?>">
                                                        <?= $size ?>
                                                    </button>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </section>

                                    <!-- Tampilan stok -->
                                    <section class="flex items-center" style="margin-bottom: 24px; align-items: baseline;">
                                        <?php
                                        // Cek apakah terdapat data stok di tabel variasi produk
                                        $hasStokData = !empty($variasi_produk);
                                        if ($hasStokData) :
                                        ?>
                                            <h3 class="oN9nMU">Stok</h3>
                                            <div class="flex items-center bR6mEk">
                                                <span style="color: black;" class="stok-label" id="stokLabel"></span>
                                            </div>
                                        <?php endif; ?>
                                    </section>


                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Fungsi untuk mengatur pilihan warna dan ukuran secara otomatis
                                            // Fungsi untuk mengatur pilihan warna dan ukuran secara otomatis
                                            function setDefaultVariations() {
                                                // Cek apakah terdapat pilihan warna
                                                var warnaButtons = document.querySelectorAll('.warna-btn');
                                                if (warnaButtons.length > 0) {
                                                    // Periksa apakah ada warna dengan nilai 0
                                                    var warnaZero = document.querySelector('.warna-btn[data-warna="0"]');
                                                    if (warnaZero) {
                                                        // Sembunyikan warna dengan nilai 0
                                                        warnaZero.style.display = 'none';

                                                        // Periksa apakah warna 0 sudah terpilih otomatis
                                                        if (warnaZero.classList.contains('selected')) {
                                                            // Sembunyikan seluruh bagian warna
                                                            var warnaSection = document.querySelector('.flex.items-center[aria-label="Warna"]');
                                                            if (warnaSection) {
                                                                warnaSection.style.display = 'none';
                                                            }
                                                            var warnaHeader = document.querySelector('.oN9nMU');
                                                            if (warnaHeader) {
                                                                warnaHeader.style.display = 'none';
                                                            }
                                                            // Pilih warna dengan nilai 0
                                                            warnaTerpilih = "0";
                                                            updateStokHarga();
                                                        } else {
                                                            // Jika tidak terpilih, tampilkan dan pilih warna pertama
                                                            warnaButtons[0].click();
                                                        }
                                                    }
                                                }

                                                // Cek apakah terdapat pilihan ukuran
                                                var ukuranButtons = document.querySelectorAll('.ukuran-btn');
                                                if (ukuranButtons.length > 0) {
                                                    // Pilih ukuran pertama
                                                    ukuranButtons[0].click();
                                                }

                                                // Periksa apakah ada data di tabel variasi produk
                                                var hasVariations = <?php echo json_encode(!empty($variasi_produk)); ?>;
                                                if (!hasVariations) {
                                                    // Sembunyikan tampilan pilihan warna dan ukuran
                                                    var warnaSection = document.querySelector('.flex.items-center[aria-label="Warna"]');
                                                    if (warnaSection) {
                                                        warnaSection.style.display = 'none';
                                                    }
                                                    var warnaHeader = document.querySelector('.oN9nMU');
                                                    if (warnaHeader) {
                                                        warnaHeader.style.display = 'none';
                                                    }

                                                    var ukuranSection = document.querySelector('.flex.items-center[aria-label="Ukuran"]');
                                                    if (ukuranSection) {
                                                        ukuranSection.style.display = 'none';
                                                    }

                                                    // Sembunyikan tampilan stok
                                                    var stokSection = document.querySelector('.flex.items-center[aria-label="Stok"]');
                                                    if (stokSection) {
                                                        stokSection.style.display = 'none';
                                                    }
                                                }

                                            }


                                            // Variabel untuk menyimpan pilihan warna dan ukuran
                                            var warnaTerpilih = null;
                                            var ukuranTerpilih = null;

                                            // Fungsi untuk menangani klik pada tombol warna
                                            function handleWarnaClick(event) {
                                                event.preventDefault();

                                                if (warnaTerpilih !== null) {
                                                    document.querySelector('.warna-btn[data-warna="' + warnaTerpilih + '"]').classList.remove('selected');
                                                }

                                                warnaTerpilih = event.currentTarget.getAttribute('data-warna');
                                                updateStokHarga();

                                                // Pilih gambar dari variasi yang dipilih
                                                var selectedGambar = event.currentTarget.getAttribute('data-gambar');
                                                $('input[name="gambar"]').val(selectedGambar);

                                                event.currentTarget.classList.add('selected');
                                            }

                                            // Fungsi untuk menangani klik pada tombol ukuran
                                            function handleUkuranClick(event) {
                                                event.preventDefault();

                                                if (ukuranTerpilih !== null) {
                                                    document.querySelector('.ukuran-btn[data-ukuran="' + ukuranTerpilih + '"]').classList.remove('selected');
                                                }

                                                ukuranTerpilih = event.currentTarget.getAttribute('data-ukuran');
                                                updateStokHarga();

                                                // Pilih ukuran dari variasi yang dipilih
                                                var selectedUkuran = ukuranTerpilih;
                                                $('input[name="ukuran"]').val(selectedUkuran);

                                                event.currentTarget.classList.add('selected');
                                            }


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

                                            function updateStokHarga() {
                                                if (warnaTerpilih !== null && ukuranTerpilih !== null) {
                                                    $.ajax({
                                                        url: '<?= base_url('home/get_stok_harga') ?>',
                                                        type: 'POST',
                                                        data: {
                                                            id_produk: '<?= $produk['id_produk'] ?>',
                                                            warna: warnaTerpilih,
                                                            ukuran: ukuranTerpilih
                                                        },
                                                        dataType: 'json',
                                                        success: function(response) {
                                                            if (response.variasi_tersedia) {
                                                                // Jika variasi produk tersedia, update stok dan harga
                                                                $('#stokLabel').text('STOK: ' + response.stok);
                                                                $('input[name="harga"]').val(response.harga);
                                                                $('#hargaLabel').text(formatRupiah(response.harga));
                                                            } else {
                                                                // Jika variasi produk tidak tersedia, tampilkan pesan
                                                                $('#stokLabel').text('Varian produk tidak tersedia');
                                                                $('input[name="harga"]').val('');
                                                                $('#hargaLabel').text('');
                                                            }
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.error('Error:', error);
                                                        }
                                                    });
                                                }
                                            }


                                            var warnaButtons = document.querySelectorAll('.warna-btn');
                                            var ukuranButtons = document.querySelectorAll('.ukuran-btn');

                                            warnaButtons.forEach(function(button) {
                                                button.addEventListener('click', handleWarnaClick);
                                            });

                                            ukuranButtons.forEach(function(button) {
                                                button.addEventListener('click', handleUkuranClick);
                                            });

                                            // Memanggil fungsi setDefaultVariations() saat halaman dimuat
                                            setDefaultVariations();

                                            // Memanggil fungsi updateStokHarga() saat halaman dimuat
                                            updateStokHarga();

                                            function handleQtyChange() {
                                                var qtyInput = document.getElementById('qty');
                                                var maxStok = parseInt($('#stokLabel').text().replace('STOK: ', ''));
                                                var qtyErrorMessage = document.getElementById('qtyErrorMessage');

                                                // Memastikan bahwa qty tidak melebihi stok maksimum
                                                if (parseInt(qtyInput.value) > maxStok) {
                                                    qtyInput.value = maxStok;
                                                    showErrorMessage('Jumlah produk maksimum telah dicapai.');
                                                } else {
                                                    hideErrorMessage();
                                                }
                                            }

                                            // Fungsi untuk menampilkan pesan kesalahan
                                            function showErrorMessage(message) {
                                                var qtyErrorMessage = document.getElementById('qtyErrorMessage');
                                                qtyErrorMessage.textContent = message;
                                                qtyErrorMessage.style.display = 'block';
                                                // Tambahan: Tambahkan fungsionalitas untuk menyorot input atau elemen lain jika diperlukan.
                                            }

                                            // Fungsi untuk menyembunyikan pesan kesalahan
                                            function hideErrorMessage() {
                                                var qtyErrorMessage = document.getElementById('qtyErrorMessage');
                                                qtyErrorMessage.textContent = '';
                                                qtyErrorMessage.style.display = 'none';
                                            }

                                            // Menambahkan event listener untuk perubahan nilai pada input quantity
                                            document.getElementById('qty').addEventListener('change', handleQtyChange);

                                        });

                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Tombol Tambahkan ke Keranjang
                                            document.getElementById('addToCartButton').addEventListener('click', function(event) {
                                                event.preventDefault(); // Mencegah aksi default dari tautan
                                                addToCart(false); // false menunjukkan bahwa ini bukan checkout
                                            });

                                            // Tombol Checkout
                                            document.getElementById('checkoutButton').addEventListener('click', function(event) {
                                                event.preventDefault(); // Mencegah aksi default dari tautan
                                                addToCart(true); // true menunjukkan bahwa ini checkout
                                            });

                                            function addToCart(isCheckout) {
                                                // Mengambil nilai role_id dari data attribute tombol
                                                var role_id = $('#addToCartButton').data('role-id');

                                                // Jika role_id tidak sesuai (belum login atau bukan role_id 2), arahkan ke halaman login_user
                                                if (role_id !== 2) {
                                                    window.location.href = '<?= base_url('login_user'); ?>';
                                                    return;
                                                }

                                                // Pengguna sudah login dan role_id adalah 2, lanjutkan dengan logika untuk menambahkan ke keranjang atau checkout
                                                var qty = $("#qty").val();
                                                var selectedColor = $('.warna-btn.selected').data('warna');
                                                var selectedSize = $('.ukuran-btn.selected').data('ukuran');
                                                var selectedGambar = $('[name="gambar"]').val();
                                                var Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                                                if (selectedColor == '0' && !selectedSize) {
                                                    // Warna 0, dan ukuran belum dipilih

                                                    Toast.fire({
                                                        icon: 'error',
                                                        title: 'Harap pilih ukuran terlebih dahulu.'
                                                    })
                                                }

                                                if (!selectedSize) {
                                                    // Jika warna bukan 0, namun ukuran belum dipilih

                                                    Toast.fire({
                                                        icon: 'error',
                                                        title: 'Harap pilih ukuran terlebih dahulu.'
                                                    })
                                                    return;
                                                }

                                                if (selectedColor != '0' && !selectedColor) {
                                                    // Jika warna tidak 0, namun warna belum dipilih
                                                    Toast.fire({
                                                        icon: 'error',
                                                        title: 'Harap pilih warna terlebih dahulu.'
                                                    })
                                                    return;
                                                }
                                                if ($('#stokLabel').text() === 'Varian produk tidak tersedia') {

                                                    Toast.fire({
                                                        icon: 'error',
                                                        title: 'Maaf, varian produk yang Anda pilih tidak tersedia.'
                                                    })
                                                    return;
                                                }
                                                // Masukkan data produk ke dalam cart
                                                $.ajax({
                                                    url: '<?= base_url('belanja/add/' . $produk['id_produk']) ?>',
                                                    method: "POST",
                                                    data: {
                                                        qty: qty,
                                                        is_checkout: isCheckout,
                                                        selected_color: selectedColor,
                                                        selected_size: selectedSize,
                                                        selected_gambar: selectedGambar,
                                                    },
                                                    success: function(response) {
                                                        console.log(response); // Log the response to the console
                                                        if (isCheckout) {
                                                            window.location.href = '<?= base_url('belanja'); ?>';
                                                        } else {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Produk Ditambahkan ke Keranjang',
                                                                showConfirmButton: false,
                                                                timer: 1500
                                                            }).then(function() {
                                                                location.reload();
                                                            });
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error('XHR:', xhr);
                                                        console.error('Status:', status);
                                                        console.error('Error:', error);

                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Oops...',
                                                            text: 'Something went wrong!',
                                                            footer: '<a href="">Why do I have this issue?</a>'
                                                        }).then(function() {
                                                            location.reload();
                                                        });
                                                    }
                                                });
                                            }
                                        });



                                        function toggleDescription() {
                                            var shortDesc = document.querySelector('.product-descc .short-descc');
                                            var fullDesc = document.querySelector('.product-descc .full-descc');
                                            var link = document.querySelector('.product-descc .toggle-link');

                                            if (shortDesc.style.display === 'none') {
                                                shortDesc.style.display = 'block';
                                                fullDesc.style.display = 'none';
                                                link.innerHTML = 'Lihat Selengkapnya';
                                            } else {
                                                shortDesc.style.display = 'none';
                                                fullDesc.style.display = 'block';
                                                link.innerHTML = 'Lihat Lebih Sedikit';
                                            }
                                        }
                                    </script>


                                </div>

                            </div>
                            <div class="single-add-to-cart">
                                <form action="#" class="cart-quantity">
                                    <h6 style="margin-top: 10px; ">JUMLAH</h6>
                                    <div class="quantity">
                                        <div class="cart-plus-minus1">
                                            <input class="cart-plus-minus-box" type="number" id="qty" value="1" min="1" style="width: 100px;">
                                        </div>
                                        <div id="qtyErrorMessage" class="error-message"></div>
                                    </div>


                                    <div class="product-additional-info">
                                        <div class=" product-social-sharing1 pt-25">
                                            <ul class="ull">
                                                <li class="button1" style="margin-right: 30px; width: 250px; height: 40px; line-height: 40px; border-radius: 10px; background-color: white; border: 1px solid orange;display: flex;justify-content: center;align-items: center;">
                                                    <a id="addToCartButton" href="#" data-role-id="<?= $this->session->userdata('role_id'); ?>">
                                                        <i class="fa fa-cart-shopping" style="color: orange;"></i>
                                                        <span class="span1" style="color: orange;">
                                                            Tambahkan ke keranjang
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="button1" style="display: flex;justify-content: center;align-items: center; width: 250px; height: 40px; line-height: 40px; border-radius: 10px; background-color: orange;">
                                                    <a id="checkoutButton" href="#" data-role-id="<?= $this->session->userdata('role_id'); ?>">
                                                        <i></i>
                                                        <span style="color: white;">CHECKOUT</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Deskripsi</span></a></li>

                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <style>
                    .product-description11 {
                        font-family: Arial, sans-serif;
                        border: 1px solid #e0e0e0;
                        border-radius: 8px;
                        padding: 20px;
                        margin: 20px 0;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        background-color: #f9f9f9;
                        /* Warna latar belakang untuk kontras */
                    }

                    .product-description11 p {
                        margin-bottom: 15px;
                        /* Memberikan jarak antar paragraf */
                        line-height: 1.6;
                        /* Jarak antar baris untuk legibility */
                    }
                </style>

                <div class="product-description11">
                    <?= nl2br($produk['deskripsi']); ?>
                </div>

            </div>


        </div>
           
    </div>
</div>
<!-- ini css untuk Warna -->
<style>
    .color-options {
        display: flex;
        flex-direction: column;
        margin-bottom: 24px;
    }

    .color-title {
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 8px;
    }

    .color-buttons {
        display: flex;
        flex-wrap: wrap;
    }

    /* Gaya untuk gambar ikon */
    img.I2jugL {
        width: 24px;
        /* Sesuaikan ukuran gambar ikon sesuai kebutuhan Anda */
        height: 24px;
        /* Sesuaikan ukuran gambar ikon sesuai kebutuhan Anda */
    }



    .color-option {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px;
        margin-right: 8px;
        margin-bottom: 8px;
        cursor: pointer;
        transition: border-color 0.3s, background-color 0.3s;
    }

    .color-option:hover {
        border-color: #333;
    }

    .color-sample {
        width: 24px;
        height: 24px;
        margin-right: 8px;
    }
</style>


<!-- ini css untuk Ukuran -->
<style>
    /* Gaya centang pada tombol warna dan ukuran yang dipilih */
    .hUWqqt.selected {
        border: 3px solid #ffc54d;
        background-color: #333;
        color: white;
        border-radius: 10px;
        /* Ganti dengan warna border yang diinginkan */
    }

    /* Gaya untuk section */
    section.flex.items-center {
        margin-bottom: 24px;
        align-items: center;
    }

    /* Gaya untuk judul 'Ukuran' */
    h3.oN9nMU {
        font-size: 18px;
        /* Sesuaikan ukuran font sesuai kebutuhan Anda */
        margin-right: 16px;
        /* Jarak antara judul dan tombol-tombol */
    }

    /* Gaya untuk div kontainer tombol */
    div.flex.items-center.bR6mEk {
        display: flex;
        flex-wrap: wrap;
        /* Membungkus tombol dalam beberapa baris jika diperlukan */
        gap: 8px;
        /* Jarak antara tombol */
    }

    /* Gaya untuk tombol-tombol */
    button.hUWqqt {
        padding: 8px 16px;
        /* Sesuaikan ukuran padding sesuai kebutuhan Anda */
        border: 1px solid #000;
        /* Garis tepi tombol */
        border-radius: 10px;

        background-color: #fff;
        /* Warna latar belakang tombol */
        color: #333;
        /* Warna teks tombol */
        cursor: pointer;
        transition: background-color 0.2s, color 0.2s;
    }

    /* Efek hover pada tombol */
    button.hUWqqt:hover {
        background-color: #333;
        /* Warna latar belakang tombol saat dihover */
        color: #fff;
        /* Warna teks tombol saat dihover */
    }

    .flex {
        display: flex;
    }

    .items-center {
        align-items: center;
    }

    .bR6mEk {
        margin-right: 10px;
    }

    .hUWqqt {
        cursor: pointer;
        margin-right: 5px;
    }

    .stok-label {
        margin-right: 10px;
    }

    .selected {
        border: 2px solid #00f;
    }

    .hUWqqt {
        /* Gaya tombol normal */
        background-color: #e0e0e0;
        /* Ganti dengan warna latar belakang default */
        color: #000;
        /* Ganti dengan warna teks default */
        transition: background-color 0.3s, color 0.3s;
        /* Efek transisi untuk perubahan warna */

        /* Gaya tombol saat di-hover */
        &:hover {
            background-color: #ccc;
            /* Ganti dengan warna latar belakang saat di-hover */
            color: #fff;
            /* Ganti dengan warna teks saat di-hover */
        }

        /* Gaya tombol saat diklik */
        &:active {
            background-color: #999;
            /* Ganti dengan warna latar belakang saat diklik */
            color: #fff;
            /* Ganti dengan warna teks saat diklik */
        }

        /* Menambahkan style ketika tombol dalam keadaan aktif */
        &.active {
            background-color: rgb(61, 61, 61);
            color: white;
        }
    }

    .product-descc {
        max-width: 500px;
        margin: 20px 0;
        font-family: 'Arial', sans-serif;
    }

    .product-descc p {
        margin: 0;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        position: relative;

    }

    .short-descc,
    .full-descc {
        display: block;
        color: #333;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .full-descc {
        display: none;
    }

    .toggle-link {
        position: absolute;
        bottom: 10px;
        right: 10px;
        text-decoration: none;
        color: #007bff;
        cursor: pointer;
        font-size: 12px;
        transition: color 0.3s ease;
    }

    .toggle-link:hover {
        color: #004080;
    }
</style>