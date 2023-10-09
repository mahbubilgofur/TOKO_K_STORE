<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header class="li-header-4">
            <!-- Begin Header Top Area -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Top Left Area -->
                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <ul class="phone-wrap">
                                    <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                                </ul>
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
                        <!-- Begin Header Logo Area -->
                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="<?= base_url('home') ?>">
                                    <img src="<?= base_url() ?>template/images/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Header Logo Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                            <!-- Begin Header Middle Searchbox Area -->
                            <form action="<?= base_url('home/search') ?>" method="get" class="hm-searchbox">
                                <input type="text" name="keyword" placeholder="Enter your search key ...">
                                <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>

                            <!-- Header Middle Searchbox Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <?php if ($this->session->userdata('role_id') == 2) : ?>
                                        <li class="hm-wishlist">
                                            <a href="<?= base_url('login_user/logout') ?>">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </a>
                                        </li>
                                    <?php else : ?>
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
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a>
                                            <span class="item-text">
                                            </span>
                                        </div>
                                        <span></span>
                                        <div class="minicart">
                                            <ul class="minicart-product-list">
                                                <?php foreach ($produk_keranjang as $produk) { ?>
                                                    <li class="produk-keranjang">
                                                        <a href="single-product.html" class="minicart-product-image">
                                                            <img src="<?= base_url('gambarproduk/' . $produk['gambar']); ?>" alt="<?= $produk['nama']; ?>">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="single-product.html"><?= $produk['nama']; ?></a></h6>
                                                            <p class="harga-produk">RP.<?= $produk['harga']; ?></p>
                                                            <!-- Di sini Anda dapat menambahkan detail lainnya seperti harga, jumlah, dll. -->
                                                        </div>
                                                        <!-- <button class="close">
                                                            <i class="fa fa-close"></i>
                                                        </button> -->
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="minicart-button">
                                                <a href="<?= base_url('home/keranjang') ?>" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                    <span>View Full Cart</span>
                                                </a>

                                                <a href="?= base_url(home/checkout) ?>" class="li-button li-button-fullwidth li-button-sm">
                                                    <span>Checkout</span>
                                                </a>
                                            </div>
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
                                        <li><a href="<?= base_url('home/kartun') ?>">KAOS KARTUN</a></li>
                                        <li><a href="<?= base_url('home/olahraga') ?>">KAOS OLAH RAGA</a> </li>
                                        <li><a href="<?= base_url('home/panjang') ?>">KAOS PANJANG</a> </li>
                                        <li><a href="<?= base_url('home/polos') ?>">KAOS POLOS</a> </li>
                                        <li><a href="<?= base_url('home/hitam') ?>">KAOS HITAM</a></li>
                                        <li><a href="<?= base_url('home/keren') ?>">KAOS KEREN</a></li>
                                        <li><a href="<?= base_url('home/anime') ?>">KAOS ANIME</a></li>
                                        <li><a href="<?= base_url('home/distro') ?>">KAOS DISTRO</a></li>
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