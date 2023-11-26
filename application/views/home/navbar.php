<body>


    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header class="li-header-4" style="background-color: #006494;">
            <!-- Begin Header Top Area -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Top Left Area -->
                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <!-- <li>
                                    <span>Ikuti Kami</span>&nbsp;
                                    <a href="https://www.facebook.com/">
                                        <i class="fab fa-facebook" style="color: white;"></i>
                                    </a>&nbsp;&nbsp;
                                    <a href="<?= base_url('ig') ?>">
                                        <i class="fa-brands fa-instagram" style="color: white; margin-right: 20px;"></i>
                                    </a>

                                    <td>
                                        <a href="<?= base_url('wa') ?>" style="color: white; text-decoration: none;">
                                            Hubungi Kami
                                            <i class="fa-brands fa-whatsapp" style="color: white; margin-left: 5px;"></i>
                                        </a>
                                    </td>

                                </li> -->
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <marquee behavior="scroll" direction="left">
                                        ShopEasy adalah online shop yang memudahkan anda berbelanja dari rumah
                                        dengan menjual berbagai produk fashion seperti baju, celana, topi, dan juga sepatu.
                                    </marquee>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0" style="margin-right: 30px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 text-center"> <!-- Tambahkan kelas 'text-center' di sini -->
                            <div class="logo pb-sm-30 pb-xs-10 d-flex justify-content-center">
                                <a href="<?= base_url('home') ?>">
                                    <img src="<?= base_url() ?>assets/gambar_icon/logoo.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15" style="margin-top:20px;">
                            <form action="<?= base_url('home/search') ?>" method="get" class="hm-searchbox">
                                <input type="text" name="keyword" placeholder="CARI PRODUK ...">
                                <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>

                            <!-- Header Middle Searchbox Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <li class="hm-minicart">
                                        <?php if ($this->session->userdata('role_id') == 2) : ?>
                                            <div class="hm-minicart-trigger">
                                                <i class="fas fa-sign-in-alt"></i> <span class="item-text">
                                                    <?php echo $this->session->userdata('nama'); ?>
                                                </span>
                                            </div>
                                            <span></span>

                                            <div class="minicart">

                                                <div class="minicart-button">
                                                    <!-- <a href="shopping-cart.html" class="li-button li-button-fullwidth">
                                                        <span>Profil</span>
                                                    </a> -->
                                                    <a href="<?= base_url('pesanan_saya') ?>" class="li-button li-button-fullwidth">
                                                        <span>Pesanan Saya</span>
                                                    </a>
                                                    <a href="<?= base_url('login_user/logout') ?>" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Logout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                    </li>
                                    <li class="hm-wishlist">
                                        <a href="<?= base_url('login_user') ?>">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <!-- Header Middle Wishlist Area End Here -->
                                <!-- Begin Header Mini Cart Area -->
                                <li class="hm-minicart">
                                    <div class="hm-minicart-trigger">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="item-text">

                                        </span>
                                    </div>
                                    <span></span>
                                    <div class="minicart">
                                        <?php if (!empty($this->cart->contents())) : ?>
                                            <ul class="minicart-product-list">
                                                <?php foreach ($this->cart->contents() as $item) : ?>
                                                    <li class="produk-keranjang">
                                                        <a href="<?= base_url('produk/detail/' . $item['id']); ?>" class="minicart-product-image">
                                                            <img src="<?= base_url('gambarvariasi/' . $item['options']['gambar']); ?>" alt="<?= $item['name']; ?>">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="<?= base_url('produk/detail/' . $item['id']); ?>"><?= $item['name']; ?></a></h6>
                                                            <p class=" harga-produk">RP.<?= number_format($item['options']['harga']); ?></p>
                                                            <p class="jumlah-produk">Jumlah: <?= $item['qty']; ?></p>
                                                            <p class="total-produk">Total Harga: <?= number_format($item['subtotal']); ?></p>
                                                        </div>
                                                        <!-- Tombol hapus dari keranjang -->
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php else : ?>
                                            <a href="<?= base_url('belanja') ?>" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                <span>Belum Ada Produk</span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($this->cart->total_items() > 0) : ?>
                                            <div class="minicart-button">
                                                <a href="<?= base_url('belanja') ?>" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                    <span>View Full Cart</span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <!-- Header Mini Cart Area End Here -->
                                </ul>
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                        <!-- Header Middle Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Middle Area End Here -->
            <!-- Begin Header Bottom Area -->

            <!-- Header Bottom Area End Here -->

        </header>