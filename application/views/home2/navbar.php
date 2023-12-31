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
                                <li>
                                    <span>Ikuti Kami</span>
                                    <a href="#">
                                        <i class="fab fa-facebook" style="color: white;"></i>
                                    </a>
                                    <a href="<?= base_url('login_user') ?>">
                                        <i class="fa-brands fa-instagram" style="color: white; margin-right: 20px;"></i>
                                    </a>
                                </li>

                            </div>
                        </div>
                        <!-- Header Top Left Area End Here -->
                        <!-- Begin Header Top Right Area -->
                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <!-- <li>
                                        <span class="language-selector-wrapper">USERLOGIN</span>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-50">
                                <a href="<?= base_url('home') ?>">
                                    <img src="<?= base_url() ?>assets/gambar_icon/logoo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
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
                                                            <img src="<?= base_url('gambarproduk/' . $item['options']['gambar1']); ?>" alt="<?= $item['name']; ?>">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="<?= base_url('produk/detail/' . $item['id']); ?>"><?= $item['name']; ?></a></h6>
                                                            <p class=" harga-produk">RP.<?= number_format($item['price']); ?></p>
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
            <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Header Bottom Menu Area -->
                            <div class="hb-menu">
                                <nav>
                                    <ul>
                                        <!-- <li><a href="<?= base_url('home/kartun') ?>">KAOS KARTUN</a></li>
                                        <li><a href="<?= base_url('home/olahraga') ?>">KAOS OLAH RAGA</a> </li>
                                        <li><a href="<?= base_url('home/panjang') ?>">KAOS PANJANG</a> </li>
                                        <li><a href="<?= base_url('home/polos') ?>">KAOS POLOS</a> </li>
                                        <li><a href="<?= base_url('home/hitam') ?>">KAOS HITAM</a></li>
                                        <li><a href="<?= base_url('home/keren') ?>">KAOS KEREN</a></li>
                                        <li><a href="<?= base_url('home/anime') ?>">KAOS ANIME</a></li>
                                        <li><a href="<?= base_url('home/distro') ?>">KAOS DISTRO</a></li> -->
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Bottom Menu Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Bottom Area End Here -->
            <!-- Begin Mobile Menu Area -->
            <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
                <div class="container">
                    <div class="row">
                        <div class="mobile-menu">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End Here -->
        </header>