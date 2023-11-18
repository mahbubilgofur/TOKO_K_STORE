<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="active"><?= $produk['nama']; ?></li>
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
            echo form_hidden('price', $produk['harga']);
            echo form_hidden('name', $produk['nama']);
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
            echo form_close();
            ?>
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                    <img src="<?= base_url('gambarproduk/' . $produk['gambar1']); ?>" alt="product image thumb">
                                </a>
                            </div>
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                    <img src="<?= base_url('gambarproduk/' . $produk['gambar2']); ?>" alt="product image">
                                </a>
                            </div>
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                    <img src="<?= base_url('gambarproduk/' . $produk['gambar3']); ?>" alt="product image">
                                </a>
                            </div>
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                    <img src="<?= base_url('gambarproduk/' . $produk['gambar4']); ?>" alt="product image">
                                </a>
                            </div>
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                    <img src="<?= base_url('gambarproduk/' . $produk['gambar5']); ?>" alt="product image">
                                </a>
                            </div>

                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar1']); ?>" alt="product image thumb"></div>
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar2']); ?>" alt="product image thumb"></div>
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar3']); ?>" alt="product image thumb"></div>
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar4']); ?>" alt="product image thumb"></div>
                            <div class="sm-image"><img src="<?= base_url('gambarproduk/' . $produk['gambar5']); ?>" alt="product image thumb"></div>

                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2><?= $produk['nama']; ?></h2>
                            <span class="product-details-ref">Reference: demo_15</span>
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="review-item"><a href="#">Read Review</a></li>
                                    <li class="review-item"><a href="#">Write Review</a></li>
                                </ul>
                            </div>
                            <div class="price-box pt-20">
                                <span class="new-price new-price-2">RP.<?= number_format($produk['harga']); ?></span>
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span><?= $produk['deskripsi']; ?>
                                    </span>
                                </p>
                            </div>
                            <div class="flex rY0UiC j9be9C">
                                <div class="flex flex-column">
                                    <!-- Tampilan warna -->
                                    <section class="flex items-center" style="margin-bottom: 24px; align-items: baseline;">
                                        <h3 class="oN9nMU">Warna</h3>
                                        <div class="flex items-center bR6mEk">
                                            <?php $unique_colors = array_unique(array_column($variasi_produk, 'warna')); ?>
                                            <?php foreach ($unique_colors as $color) : ?>
                                                <?php $first_variation = current(array_filter($variasi_produk, function ($variasi) use ($color) {
                                                    return $variasi->warna == $color;
                                                })); ?>
                                                <button type="button" class="hUWqqt warna-btn" aria-label="<?= $color ?>" aria-disabled="false" data-warna="<?= $color ?>">
                                                    <img class="I2jugL" src="<?= base_url() ?>gambarvariasi/<?= $first_variation->gambar ?>">
                                                    <?= $color ?>
                                                </button>
                                            <?php endforeach; ?>
                                        </div>
                                    </section>

                                    <!-- Tampilan ukuran -->
                                    <section class="flex items-center" style="margin-bottom: 24px; align-items: baseline;">
                                        <h3 class="oN9nMU">Ukuran</h3>
                                        <div class="flex items-center bR6mEk">
                                            <?php $unique_sizes = array_unique(array_column($variasi_produk, 'ukuran')); ?>
                                            <?php foreach ($unique_sizes as $size) : ?>
                                                <button type="button" class="hUWqqt ukuran-btn" aria-label="<?= $size ?>" aria-disabled="false" data-ukuran="<?= $size ?>">
                                                    <?= $size ?>
                                                </button>
                                            <?php endforeach; ?>
                                        </div>
                                    </section>

                                    <!-- Tampilan stok -->
                                    <section class="flex items-center" style="margin-bottom: 24px; align-items: baseline;">
                                        <h3 class="oN9nMU">Stok</h3>
                                        <div class="flex items-center bR6mEk">
                                            <span class="stok-label">STOK: 0</span>
                                        </div>
                                    </section>

                                    <!-- Skrip jQuery -->
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                    <!-- Skrip JavaScript -->
                                    <script>
                                        var warnaButtons = document.querySelectorAll('.warna-btn');
                                        var ukuranButtons = document.querySelectorAll('.ukuran-btn');

                                        // Variabel untuk menyimpan pilihan warna dan ukuran
                                        var warnaTerpilih = null;
                                        var ukuranTerpilih = null;

                                        // Fungsi untuk menangani klik pada tombol warna
                                        function handleWarnaClick(event) {
                                            event.preventDefault();

                                            // Menghapus centang dari tombol warna yang sebelumnya dipilih
                                            if (warnaTerpilih !== null) {
                                                document.querySelector('.warna-btn[data-warna="' + warnaTerpilih + '"]').classList.remove('selected');
                                            }

                                            warnaTerpilih = event.currentTarget.getAttribute('data-warna');
                                            updateStok();

                                            // Menambah centang pada tombol warna yang baru dipilih
                                            event.currentTarget.classList.add('selected');
                                        }

                                        // Fungsi untuk menangani klik pada tombol ukuran
                                        function handleUkuranClick(event) {
                                            event.preventDefault();

                                            // Menghapus centang dari tombol ukuran yang sebelumnya dipilih
                                            if (ukuranTerpilih !== null) {
                                                document.querySelector('.ukuran-btn[data-ukuran="' + ukuranTerpilih + '"]').classList.remove('selected');
                                            }

                                            ukuranTerpilih = event.currentTarget.getAttribute('data-ukuran');
                                            updateStok();

                                            // Menambah centang pada tombol ukuran yang baru dipilih
                                            event.currentTarget.classList.add('selected');
                                        }

                                        // Fungsi untuk memperbarui tampilan stok sesuai dengan pilihan warna dan ukuran
                                        function updateStok() {
                                            if (warnaTerpilih !== null && ukuranTerpilih !== null) {
                                                // Menggunakan Ajax untuk mengambil stok dari server
                                                $.ajax({
                                                    url: '<?= base_url('home/get_stok') ?>', // Sesuaikan dengan URL controller Anda
                                                    type: 'POST',
                                                    data: {
                                                        warna: warnaTerpilih,
                                                        ukuran: ukuranTerpilih
                                                    },
                                                    dataType: 'json',
                                                    success: function(response) {
                                                        // Memperbarui tampilan stok di halaman
                                                        console.log('Stok Terpilih:', response.stok);
                                                        $('.stok-label').text('STOK: ' + response.stok);
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error('Error:', error);
                                                    }
                                                });
                                            }
                                        }

                                        // Event listener untuk setiap tombol warna
                                        warnaButtons.forEach(function(button) {
                                            button.addEventListener('click', handleWarnaClick);
                                        });

                                        // Event listener untuk setiap tombol ukuran
                                        ukuranButtons.forEach(function(button) {
                                            button.addEventListener('click', handleUkuranClick);
                                        });
                                    </script>


                                </div>

                            </div>
                            <div class="single-add-to-cart">
                                <form action="#" class="cart-quantity">
                                    <h6>JUMLAH</h6>
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="number" id="qty" value="1" min="1">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>

                                    <div class="product-additional-info " style="margin-left: 20px;">
                                        <div class="product-social-sharing pt-25">
                                            <ul>


                                                <li class="button1" style="width: 250px; height: 40px; line-height: 40px; border-radius: 10px; background-color: white; border: 1px solid orange;">
                                                    <a id="addToCartButton" href="<?= base_url('belanja/add/' . $produk['id_produk']) ?>">
                                                        <i class="fa fa-cart-shopping" style="color: orange;"></i>
                                                        <span style="color: orange;">Tambahkan ke keranjang</span>
                                                    </a>
                                                </li>


                                                <li class="button1" style=" margin-left: 40px; width: 250px; height: 40px; line-height: 40px; border-radius: 10px; background-color: orange;">
                                                    <a id="checkoutButton" href="<?= base_url('belanja/add/' . $produk['id_produk']) ?>" style="font-size: 15px;">
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
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Security policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Delivery policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p> Return policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                        <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                        <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span>The best is yet to come! Give your walls a voice with a framed poster. This aesthethic, optimistic poster will look great in your desk or in an open-space office. Painted wooden frame with passe-partout for more depth.</span>
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    <a href="#">
                        <img src="<?= base_url() ?>template/images/product-details/1.jpg" alt="Product Manufacturer Image">
                    </a>
                    <p><span>Reference</span> demo_7</p>
                    <p><span>Reference</span> demo_7</p>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="comment-review">
                            <span>Grade</span>
                            <ul class="rating">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                        <div class="comment-author-infos pt-25">
                            <span>HTML 5</span>
                            <em>01-12-18</em>
                        </div>
                        <div class="comment-details">
                            <h4 class="title-block">Demo</h4>
                            <p>Plaza</p>
                        </div>
                        <div class="review-btn">
                            <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                        </div>
                        <!-- Begin Quick View | Modal Area -->
                        <div class="modal fade modal-wrapper" id="mymodal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="review-page-title">Write Your Review</h3>
                                        <div class="modal-inner-area row">
                                            <div class="col-lg-6">
                                                <div class="li-review-product">
                                                    <img src="<?= base_url() ?>template/images/product/large-size/3.jpg" alt="Li's Product">
                                                    <div class="li-review-product-desc">
                                                        <p class="li-product-name">Today is a good day Framed poster</p>
                                                        <p>
                                                            <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="li-review-content">
                                                    <!-- Begin Feedback Area -->
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                            <h3 class="feedback-title">Our Feedback</h3>
                                                            <form action="#">
                                                                <p class="your-opinion">
                                                                    <label>Your Rating</label>
                                                                    <span>
                                                                        <select class="star-rating">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </span>
                                                                </p>
                                                                <p class="feedback-form">
                                                                    <label for="feedback">Your Review</label>
                                                                    <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                </p>
                                                                <div class="feedback-input">
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">Name<span class="required">*</span>
                                                                        </label>
                                                                        <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                                                    </p>
                                                                    <p class="feedback-form-author feedback-form-email">
                                                                        <label for="email">Email<span class="required">*</span>
                                                                        </label>
                                                                        <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                        <span class="required"><sub>*</sub> Required fields</span>
                                                                    </p>
                                                                    <div class="feedback-btn pb-15">
                                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                        <a href="#">Submit</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Feedback Area End Here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Quick View | Modal Area End Here -->
                    </div>
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
        border: 2px solid #4CAF50;
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
        border: 1px solid #ccc;
        /* Garis tepi tombol */
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
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Tombol Tambahkan ke Keranjang
        $('#addToCartButton').on('click', function() {
            addToCart(false); // false menunjukkan bahwa ini bukan checkout
        });

        // Tombol Checkout
        $('#checkoutButton').on('click', function() {
            addToCart(true); // true menunjukkan bahwa ini checkout
        });

        function addToCart(isCheckout) {
            var role_id = <?php echo $this->session->userdata('role_id'); ?>;
            if (role_id !== 2) {
                // Jika pengguna belum login atau rolenya tidak sesuai, arahkan ke halaman login_user
                window.location.href = '<?= base_url('login_user'); ?>';
                return;
            }

            var qty = $("#qty").val(); // Mengambil nilai qty dari elemen input

            $.ajax({
                url: '<?= base_url('belanja/add/' . $produk['id_produk']) ?>',
                method: "POST",
                data: {
                    qty: qty,
                    is_checkout: isCheckout // Menambahkan properti is_checkout ke dalam data
                },
                success: function(response) {
                    if (isCheckout) {
                        // Redirect ke halaman belanja jika itu checkout
                        window.location.href = '<?= base_url('belanja'); ?>';
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Produk Ditambahkan ke Keranjang',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            location.reload(); // Refresh halaman setelah 1.5 detik
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    });
                }
            });
        }
    });
</script>
<!-- <script>
    var warnaButtons = document.querySelectorAll('.warna-btn');
    var ukuranButtons = document.querySelectorAll('.ukuran-btn');

    // Variable untuk menyimpan pilihan warna dan ukuran
    var warnaTerpilih = null;
    var ukuranTerpilih = null;

    // Function untuk menangani klik pada tombol warna
    function handleWarnaClick(event) {
        event.preventDefault();

        warnaTerpilih = event.currentTarget.getAttribute('aria-label');
        updateStok();
    }

    // Function untuk menangani klik pada tombol ukuran
    function handleUkuranClick(event) {
        event.preventDefault();

        ukuranTerpilih = event.currentTarget.getAttribute('data-ukuran');
        updateStok();
    }

    // Function untuk memperbarui tampilan stok sesuai dengan pilihan warna dan ukuran
    function updateStok() {
        if (warnaTerpilih !== null && ukuranTerpilih !== null) {
            // TODO: Lakukan tindakan selanjutnya, seperti memperbarui stok sesuai warnaTerpilih dan ukuranTerpilih
            // Misalnya, memanggil fungsi AJAX untuk mengambil stok dari server
            // dan memperbarui tampilan stok di halaman
            console.log('Warna Terpilih:', warnaTerpilih);
            console.log('Ukuran Terpilih:', ukuranTerpilih);
        }
    }

    // Tambahkan event listener untuk setiap tombol warna
    warnaButtons.forEach(function(button) {
        button.addEventListener('click', handleWarnaClick);
    });

    // Tambahkan event listener untuk setiap tombol ukuran
    ukuranButtons.forEach(function(button) {
        button.addEventListener('click', handleUkuranClick);
    });
</script> -->